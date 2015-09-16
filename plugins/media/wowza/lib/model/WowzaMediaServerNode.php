<?php

class WowzaMediaServerNode extends MediaServerNode {
	const DEFAULT_MANIFEST_PORT = 1935;
	const DEFAULT_WEB_SERVICES_PORT = 888;
	const DEFAULT_WEB_SERVICES_PROTOCOL = 'http';
	const DEFAULT_APPLICATION = 'kLive';
	const DEFAULT_TRANSCODER = 'default';
	const DEFAULT_GPUID = -1;
	
	const CUSTOM_DATA_APP_PREFIX = 'app_prefix';
	const CUSTOM_DATA_TRANSCIDER_CONFIG = 'transcoder';
	const CUSTOM_DATA_GPUID = 'gpuid';
	const CUSTOM_DATA_APPLICATION_NAME = 'application_name';
	const CUSTOM_DATA_LIVE_SERVICE_PORT = 'live_service_port';
	const CUSTOM_DATA_LIVE_SERVICE_PROTOCOL = 'live_service_protocol';
	const CUSTOM_DATA_LIVE_SERVICE_INTERNAL_DOMAIN = 'live_service_internal_domain';
	
	const WEB_SERVICE_LIVE = 'live';
	
	private $isExternalMediaServer = false;
	
	static protected $webServices = array(
		self::WEB_SERVICE_LIVE => 'KalturaMediaServerLiveService',
	);
	
	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or equivalent initialization method).
	 * @see __construct()
	 */
	public function applyDefaultValues()
	{
		parent::applyDefaultValues();
		
		$this->setType(serverNodeType::MEDIA_SERVER);
	}
	
	public function getManifestUrl($protocol = 'http')
	{		
		$playbackHost = $this->getPlaybackHost();
		
		$url = "$protocol://$playbackHost";
		$url = str_replace("{hostName}", $hostname, $url);
		return $url;
		
	}
	
	public function getLiveWebServiceName()
	{
		return WowzaMediaServerNode::WEB_SERVICE_LIVE;
	}
	
	public function getPlaybackHost()
	{
		$domain = $this->getPlaybackHostName();
		$hostname = $this->getHostname();
		$appPrefix = $this->getAppPrefix();
		$port = WowzaMediaServerNode::DEFAULT_MANIFEST_PORT;
		
		$protocolPortConfiguration = $this->getProtocolPort();
		if(count($protocolPortConfiguration) && isset($protocolPortConfiguration[$protocol]))
			$port = $protocolPortConfiguration[$protocol];
		
		if(!$this->getIsExternalMediaServer())
			$hostname = preg_replace('/\..*$/', '', $hostname);
		
		return "$domain:$port/$appPrefix";
	}
	
	/**
	 * @param string $serviceName
	 * @return KalturaMediaServerClient
	 */
	public function getWebService($serviceName)
	{	
		if(!isset(self::$webServices[$service]))
			return null;
			
		$serviceClass = self::$webServices[$service];
		
		$domain = $this->getLiveServiceInternalDomain() ? $this->getLiveServiceInternalDomain() : $this->getHostname();
		$port = $this->getLiveServiceProtocol() ? $this->getLiveServiceProtocol() : WowzaMediaServerNode::DEFAULT_WEB_SERVICES_PORT;
		$protocol = $this->getLiveServiceProtocol() ? $this->getLiveServiceProtocol() : WowzaMediaServerNode::DEFAULT_WEB_SERVICES_PROTOCOL;
		
		$url = "$protocol://$domain:$port/$service?wsdl";
		KalturaLog::debug("Service URL: $url");
		return new $serviceClass($url);
	}
	
	public function setAppPrefix($appPrefix)
	{
		$this->putInCustomData(self::CUSTOM_DATA_APP_PREFIX, $appPrefix);
	}
	
	public function getAppPrefix()
	{
		return $this->getFromCustomData(self::CUSTOM_DATA_APP_PREFIX, null, "");
	}
	
	public function setTranscoder($transcoder)
	{
		$this->putInCustomData(self::CUSTOM_DATA_TRANSCIDER_CONFIG, $transcoder);
	}
	
	public function getTranscoder()
	{
		return $this->getFromCustomData(self::CUSTOM_DATA_TRANSCIDER_CONFIG, null, WowzaMediaServerNode::DEFAULT_TRANSCODER);
	}
	
	public function setGPUID($gpuid)
	{
		$this->putInCustomData(self::CUSTOM_DATA_GPUID, $gpuid);
	}
	
	public function getGPUID()
	{
		return $this->getFromCustomData(self::CUSTOM_DATA_GPUID, null, WowzaMediaServerNode::DEFAULT_GPUID);
	}
	
	public function setLiveServicePort($liveServicePort)
	{
		$this->putInCustomData(self::CUSTOM_DATA_LIVE_SERVICE_PORT, $liveServicePort);
	}
	
	public function getLiveServicePort()
	{
		return $this->getFromCustomData(self::CUSTOM_DATA_LIVE_SERVICE_PORT, null, null);
	}
	
	public function setLiveServiceProtocol($liveServiceProtocol)
	{
		$this->putInCustomData(self::CUSTOM_DATA_LIVE_SERVICE_PROTOCOL, $liveServiceProtocol);
	}
	
	public function getLiveServiceProtocol()
	{
		return $this->getFromCustomData(self::CUSTOM_DATA_LIVE_SERVICE_PROTOCOL, null, null);
	}
	
	public function setLiveServiceInternalDomain($liveServiceInternalDomain)
	{
		$this->putInCustomData(self::CUSTOM_DATA_LIVE_SERVICE_INTERNAL_DOMAIN, $liveServiceInternalDomain);
	}
	
	public function getLiveServiceInternalDomain()
	{
		return $this->getFromCustomData(self::CUSTOM_DATA_LIVE_SERVICE_INTERNAL_DOMAIN, null, null);
	}

} // WowzaMediaServer
