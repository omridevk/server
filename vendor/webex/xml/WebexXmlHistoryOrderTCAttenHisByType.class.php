<?php
require_once(__DIR__ . '/WebexXmlRequestType.class.php');

class WebexXmlHistoryOrderTCAttenHisByType extends WebexXmlRequestType
{
	const _NAME = 'NAME';
					
	const _STARTTIME = 'STARTTIME';
					
	const _COMPANY = 'COMPANY';
					
	const _COUNTRY = 'COUNTRY';
					
	const _STATE = 'STATE';
					
	const _CITY = 'CITY';
					
	const _CONFID = 'CONFID';
					
	/* (non-PHPdoc)
	 * @see WebexXmlObject::getAttributeType()
	 */
	protected function getAttributeType($attributeName)
	{
		switch ($attributeName)
		{
		}
		
		return parent::getAttributeType($attributeName);
	}
	
	/* (non-PHPdoc)
	 * @see WebexXmlRequestType::getMembers()
	 */
	public function getMembers()
	{
		return array(
		);
	}
	
	/* (non-PHPdoc)
	 * @see WebexXmlRequestType::getRequiredMembers()
	 */
	protected function getRequiredMembers()
	{
		return array(
		);
	}
	
	/* (non-PHPdoc)
	 * @see WebexXmlRequestType::getXmlNodeName()
	 */
	protected function getXmlNodeName()
	{
		return 'orderTCAttenHisByType';
	}
	
}
		
