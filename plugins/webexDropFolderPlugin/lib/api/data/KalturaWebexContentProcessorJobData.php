<?php
/**
 * @package plugins.WebexDropFolder
 * @subpackage api.objects
 */
class KalturaWebexDropFolderContentProcessorJobData extends KalturaDropFolderContentProcessorJobData
{
	/**
	 * @var string
	 */
	public $description;
	
	/**
	 * @var string
	 */
	public $webexHostId;

	/**
	 * @var int
	 */
	public $metadataProfileId;
	
	/**
	 * @var string
	 */
	public $webexHostIdMetadataFieldName;
	
	/**
	 * @var string
	 */
	public $categoriesIdsMetadataFieldName;
	
	private static $map_between_objects = array
	(
		"description",
		"webexHostId",
		"metadataProfileId",
		"webexHostIdMetadataFieldName",
		"categoriesIdsMetadataFieldName",
	);

	public function getMapBetweenObjects ( )
	{
		return array_merge ( parent::getMapBetweenObjects() , self::$map_between_objects );
	}

	
	public function toObject($dbData = null, $props_to_skip = array()) 
	{
		if(is_null($dbData))
			$dbData = new kWebexDropFolderContentProcessorJobData();
			
		return parent::toObject($dbData, $props_to_skip);
	}
}
