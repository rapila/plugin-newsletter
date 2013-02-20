<?php
/**
 * @package modules.widget
 * @subpackage rapila-plugin-newsletter
 */
class MailGroupInputWidgetModule extends WidgetModule {
	
	public function listMailGroups($bIncludeExternalMailGroups = true, $bIncludeGeneratedMailGroups = true) {
		
		// Get subscriber groups with membership count in not used for subscriber import
		$bUsedForSubscriberImport = $bIncludeExternalMailGroups === false && $bIncludeGeneratedMailGroups = false;
		$oQuery = SubscriberGroupQuery::create()->excludeTemporary($bIncludeGeneratedMailGroups)->orderByName();
		$aMailGroups = array();
		foreach($oQuery->find() as $oSubscriberGroup) {
			$sId = (string) $oSubscriberGroup->getId();
			$aMailGroups[$sId] = $oSubscriberGroup->getName().(!$bUsedForSubscriberImport ? ' ('.$oSubscriberGroup->countSubscriberGroupMemberships().')' : '');
		}
		
		// If filter is implemented in project this allows to add on-the-fly mail groups
		// E.g. a group of recipients that have registered for an event and there for create a temporary mail group
		if($bIncludeExternalMailGroups) {
			FilterModule::getFilters()->handleMailGroups(array(&$aMailGroups));
		}
		return $aMailGroups;
	}
}