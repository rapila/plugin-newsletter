<?php
/**
 * @package modules.widget
 * @subpackage rapila-plugin-newsletter
 */
class MailGroupInputWidgetModule extends WidgetModule {
	
	public function getMailGroups($bIncludeTemporaryMailGroups = true, $bIncludeGeneratedMailGroups = true) {
		
		// Get subscriber groups with membership count in not used for subscriber import
		$bUsedForSubscriberImport = $bIncludeTemporaryMailGroups === false && $bIncludeGeneratedMailGroups = false;
		$oQuery = SubscriberGroupQuery::create()->excludeTemporary($bIncludeGeneratedMailGroups)->orderByName();
		$aMailGroups = array();
		$sMembershipCount = ''
		foreach($oQuery->find() as $oSubscriberGroup) {
			if($bUsedForSubscriberImport === false) {
				$sMembershipCount = ' ('.$oSubscriberGroup->countSubscriberGroupMemberships().')';
			}
			$sId = (string) $oSubscriberGroup->getId();
			$aMailGroups[$sId] = $oSubscriberGroup->getName().$sMembershipCount;
		}
		
		// If filter is implemented in project this allows to add on-the-fly mail groups
		// E.g. a group of recipients that have registered for an event and there for create a temporary mail group
		if($bIncludeTemporaryMailGroups) {
			FilterModule::getFilters()->handleMailGroups(array(&$aMailGroups));
		}
		return $aMailGroups;
	}
}