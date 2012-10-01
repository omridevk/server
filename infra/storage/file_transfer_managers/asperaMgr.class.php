<?php
/**
 * Extends the 'kFileTransferMgr' class & implements a file transfer manager using the SFTP protocol.
 * For additional comments please look at the 'kFileTransferMgr' class.
 * 
 * @package infra
 * @subpackage Storage
 */
class asperaMgr extends kFileTransferMgr
{
	
	private $sftp_id = false;
	
	private $pass = null;

	private $server;
	
	private $port;
	 
	private $user;
	
	private $privKeyFile;
	
	
	public function getConnection()
	{
		if ($this->sftp_id != null && $this->sftp_id != false) {
			return $this->sftp_id;
		}
		else {
			return $this->connection_id;
		}
	}
	
	private function getSsh2Connection() {
		return $this->connection_id;
	}
	
	private function getSftpConnection() {
		return $this->sftp_id;
	}
	
	/**********************************************************************/
	/* Implementation of abstract functions from class 'kFileTransferMgr' */
	/**********************************************************************/
	
	// aspera connect to server:port
	protected function doConnect($aspera_server, &$aspera_port)
	{
	// try connecting to server
		if (!$aspera_port || $aspera_port == 0) {
                	$aspera_port = 22;
		}
		$this->port = $aspera_port;
		$this->server = $aspera_server;
		return ssh2_connect($aspera_server, $aspera_port);
	}
	
	
	// login to an existing connection with given user/pass (ftp_passive_mode is irrelevant)
	protected function doLogin($aspera_user, $aspera_pass, $ftp_passive_mode = TRUE)
	{
		$this->user = $aspera_user;
		$this->pass = $aspera_pass;
		if (ssh2_auth_password($this->getSsh2Connection(), $aspera_user, $aspera_pass)) {
			$this->sftp_id = ssh2_sftp($this->getSsh2Connection());
			return ($this->sftp_id != false && $this->sftp_id != null);
		}
		else {
			return false;
		}
	}
	
	
	// login using a public key
	protected function doLoginPubKey($user, $pubKeyFile, $privKeyFile, $passphrase = null)
	{
		$this->user = $user;
		$this->privKeyFile = $privKeyFile;
		
		// try to login
		if (ssh2_auth_pubkey_file($this->getSsh2Connection(), $user, $pubKeyFile, $privKeyFile, $passphrase)) {
			$this->sftp_id = ssh2_sftp($this->getSsh2Connection());
			return ($this->sftp_id != false && $this->sftp_id != null);
		}
		else {
			return false;
		}
	}
	
	// upload a file to the server (ftp_mode is irrelevant
	protected function doPutFile ($remote_file, $local_file, $ftp_mode, $http_field_name = null, $http_file_name = null) {
		$remote_file = ltrim($remote_file,'/');
		$absolute_path = trim($this->start_dir,'/').'/'.$remote_file;
		$absolute_path = trim($absolute_path, '/');
		$cmd = "(echo $this->pass) | ascp ";
		if ( $this->privKeyFile)
			$cmd.="-i $this->privKeyFile";
		$cmd .= " $local_file $this->user@$this->servert:$remote_file";
		KalturaLog::debug ( 'Put file using command: ' . $cmd );
		$return_value = null;
		$beginTime = date();
		system ( $cmd, $return_value );
		$duration = (date() - $beginTime)/1000;
		KalturaLog::debug ( "upload took [$duration]sec with value [$return_value]");

		return $return_value;
	}
		
	// download a file from the server (ftp_mode is irrelevant)
	protected function doGetFile ($remote_file, $local_file, $ftp_mode)
	{	
		$sftp = $this->getSftpConnection();
		$remote_file = ltrim($remote_file,'/');
		$absolute_path = trim($this->start_dir,'/').'/'.$remote_file;
		$absolute_path = trim($absolute_path, '/');
        $stream = @fopen("ssh2.sftp://$sftp/$absolute_path", 'r');
        if (!$stream) {
        	return false;
        }
        
        //Writes the file in chunks (for large files bug)
        $fileToWriteHandle = fopen($local_file, "w+");
        $ret = $this->writeFileInChunks($stream, $fileToWriteHandle);
        @fclose($fileToWriteHandle);
        @fclose($stream);

        return $ret;
	}
	
	// create a new directory
	protected function doMkDir ($remote_path)
	{
	    $remote_path = ltrim($remote_path,'/');
		return ssh2_sftp_mkdir($this->getSftpConnection(), $remote_path);
	}
	
	// chmod the given remote file
	protected function doChmod ($remote_file, $chmod_code)
	{
	    $remote_file = ltrim($remote_file,'/');
		$chmod_cmd = 'chmod ' . $chmod_code . ' ' . $remote_file;
		$exec_output = $this->execCommand($chmod_cmd);
		return (trim($exec_output) == ''); // empty output means the command passed ok
	}
	
	// return true/false according to existence of file on the server
	protected function doFileExists($remote_file)
	{
	    $remote_file = ltrim($remote_file,'/');
		$sftp = $this->getSftpConnection();
		$stats = @ssh2_sftp_stat($sftp, $remote_file);
		return ($stats !== false);
	}

    // return the current working directory
	protected function doPwd ()
	{
		$pwd_cmd = 'pwd';
		$result = $this->execCommand($pwd_cmd);
		if (strstr($result, '/') === false) {
		    return '';
		}
		return $result;
	}

    // delete a file and return true/false according to success
    protected function doDelFile ($remote_file)
    {
        $remote_file = ltrim($remote_file,'/');
    	return ssh2_sftp_unlink($this->getSftpConnection(), $remote_file); 
    }

     // delete a directory and return true/false according to success
    protected function doDelDir ($remote_path)
    {
        //return ssh2_sftp_rmdir($this->getSftpConnection(), $remote_path);
        $remote_path = ltrim($remote_path,'/'); 
        $deldir_cmd = 'rm -r ' . $remote_path;
        $exec_output = $this->execCommand($deldir_cmd);
        return (trim($exec_output) == ''); // empty output means the command passed ok
    }

	protected function doList ($remote_path)
	{
	    $remote_path = ltrim($remote_path,'/');
        $lsdir_cmd = 'ls ' . $remote_path;
        $exec_output = $this->execCommand($lsdir_cmd);
		KalturaLog::info("sftp rawlist [$exec_output]");
        return array_filter(array_map('trim', explode("\n", $exec_output)), 'strlen');
	}	
	
	// download a file from the server
	public function fileGetContents ($remote_file)
	{
	    $sftp = $this->getSftpConnection();
	    $remote_file = ltrim($remote_file,'/');
	    $absolute_path = trim($this->start_dir,'/').'/'.$remote_file;
		$absolute_path = trim($absolute_path, '/');
		$uri = "ssh2.sftp://$sftp/$absolute_path";
        $stream = @fopen($uri, 'r');
        if (!$stream)
        	throw new kFileTransferMgrException("Failed to open stream [".$uri."]");
        	
        $contents = fread($stream, filesize($uri));
        if ($contents === false)
            throw new kFileTransferMgrException("Failed to read file from [".$uri."]");
                   
        return $contents;
	}
	
	// upload a file to the server
	public function filePutContents ($remote_file, $contents)
	{	
		if (!$this->fileExists(dirname($remote_file))) {
			$this->mkDir(dirname($remote_file));
		}
		
        $sftp = $this->getSftpConnection();
        $remote_file = ltrim($remote_file,'/');
        $absolute_path = trim($this->start_dir,'/').'/'.$remote_file;
		$absolute_path = trim($absolute_path, '/');
		$uri = "ssh2.sftp://$sftp/$absolute_path";
        $stream = @fopen($uri, 'w');
        if (!$stream)
        	throw new kFileTransferMgrException("Failed to open stream [".$uri."]");
        	
        if (@fwrite($stream, $contents) === false) {
            @fclose($stream);
        	throw new kFileTransferMgrException("Failed to upload file to [".$uri."]");
		}
        return @fclose($stream);
	}
	
	protected function doFileSize($remote_file)
	{
	    $remote_file = ltrim($remote_file,'/');
	    
//	    Misses files that larger than 2MB by returning a negativ value
//	    Misses files that larger than 4MB by returning again a positive value after overflowing the int
//		Just use ls -l instead and return the size as string
//		
//	    $statinfo = ssh2_sftp_stat($this->getSftpConnection(), $remote_file);
//	    $filesize = isset($statinfo['size']) ? $statinfo['size'] : null;
	    
    	$remote_folder = dirname($remote_file);
        $lsdir_cmd = "ls -l $remote_folder/*";
        $exec_output = $this->execCommand($lsdir_cmd);
        
		KalturaLog::info("sftp rawlist [$exec_output]");
		
		$filesInfo = array_filter(array_map('trim', explode("\n", $exec_output)), 'strlen');
			    
		$escapedRemoteFolder = str_replace('/', '\/', $remote_folder);
		// drwxrwxrwx 10 root root 4096 2010-11-24 23:45 file.ext
		// -rw-r--r--+ 1 mikew Domain Users 7270248766 Feb  9 11:16 Kaltura/LegislativeBriefing2012.mov
		$regexUnix = "^(?P<permissions>[-drwx]{10})\+?\s+(?P<number>\d{1,2})\s+(?P<owner>[\d\w]+)\s+(?P<group>[\d\w\s]+)\s+(?P<fileSize>\d*)\s+((?P<year1>\w{4})-(?P<month1>\d{2})-(?P<day1>\d{2})\s+(?P<hour1>\d{2}):(?P<minute1>\d{2})|(?P<month2>\w{3})\s+(?P<day2>\d{1,2})\s+((?P<hour2>\d{2}):(?P<minute2>\d{2})|(?P<year2>\d{4})))\s+$escapedRemoteFolder\/(?P<file>.+)\s*$";
	    
	    foreach($filesInfo as $fileInfo)
	    {
	    	$matches = null;
	    	if(!preg_match("/$regexUnix/", $fileInfo, $matches))
	    	{
	    		KalturaLog::err("Unix regex does not match ftp rawlist output [$fileInfo]");
				continue;
	    	}
	    	
	    	if($matches['file'] == basename($remote_file))
	    		return $matches['fileSize'];
	    }
	    return null;
	}
	
	protected function doModificationTime($remote_file)
	{
	    $remote_file = ltrim($remote_file,'/');
	    $statinfo = ssh2_sftp_stat($this->getSftpConnection(), $remote_file);
	    $modificationTime = isset($statinfo['mtime']) ? $statinfo['mtime'] : null;
	    return $modificationTime;
	}
	
	
	// execute the given command on the server
	private function execCommand($command_str)
	{
		KalturaLog::info($command_str);
		
		$stream = ssh2_exec($this->getSsh2Connection(), $command_str);
		if(!$stream || !is_resource($stream))
			return null;
		
  		stream_set_blocking($stream, true);
   		$output = stream_get_contents($stream);
   		fclose($stream);
   		return $output;
	}
	
}
