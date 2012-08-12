<?php
/**
 * @package modules.widget
 * @subpackage rapila-plugin-newsletter
 */
class MailGroupInputWidgetModule extends WidgetModule {
	
	public function getMailGroups($bIncludeTemporaryMailGroups=true, $bIncludeGeneratedMailGroups=true) {
		
		// Get subscriber groups, add membership count if external mailgroups are not include, i.e. called from subscriber_import widget
		$aMailGroups = self::getSubscriberGroups(true, $bIncludeGeneratedMailGroups);
		
		// If filter is implemented in project this allows to add on-the-fly mail groups
		// E.g. a group of recipients that have registered for an event and there for create a temporary mail group
		if($bIncludeTemporaryMailGroups) {
			FilterModule::getFilters()->handleMailGroups(array(&$aMailGroups));
		}
		return $aMailGroups;
	}
	
	public static function getSubscriberGroups($bAddMembershipCount=true, $bIncludeGeneratedMailGroups=true) {
		return SubscriberGroupPeer::getAllAssoc(false, $bAddMembershipCount, $bIncludeGeneratedMailGroups);
	}
	
	public static function hasSubscriberGroups() {
		return count(self::getSubscriberGroups(false)) > 0;
	}

}