<?php
require_once(__DIR__ . '/WebexXmlRequestType.class.php');

class WebexXmlHistoryOrderMCHisByType extends WebexXmlRequestType
{
	const _CONFNAME = 'CONFNAME';
					
	const _STARTTIME = 'STARTTIME';
					
	const _TOTALATTENDEE = 'TOTALATTENDEE';
					
	const _HOSTNAME = 'HOSTNAME';
					
	const _ASSISTREQUEST = 'ASSISTREQUEST';
					
	const _ASSISTCONFIRM = 'ASSISTCONFIRM';
					
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
		return 'orderMCHisByType';
	}
	
}
		
