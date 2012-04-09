<?php
/**
* @package modules.widget
*/
class MailGroupInputWidgetModule extends WidgetModule {
	
	const BACKEND_CREATED_SUFFIX = '_import';
	public function getMailGroups($bIncludeTemporaryMailGroups=true) {
		
		// Get subscriber groups, add membership count if external mailgroups are not include, i.e. called from subscriber_import widget
		$aMailGroups = self::getSubscriberGroups($bIncludeTemporaryMailGroups);
		
		// If filter is implemented in project this allows to add on-the-fly mail groups
		// E.g. a group of recipients that have registered for an event and there for create a temporary mail group
		if($bIncludeTemporaryMailGroups) {
			FilterModule::getFilters()->handleMailGroups(array(&$aMailGroups));
		}
		return $aMailGroups;
	}
	
	public static function getSubscriberGroups($bIncludeTemporaryMailGroups, $bAddMembershipCount=true) {
		return SubscriberGroupPeer::getAllAssoc(false, $bIncludeTemporaryMailGroups, $bAddMembershipCount);
	}
	
	public static function hasSubscriberGroups() {
		return count(self::getSubscriberGroups(false)) > 0;
	}
	
	public function getHasBackendCreatedSubscriberGroups() {
		return SubscriberGroupMembershipQuery::create()->filterByIsBackendCreated(true)->groupBySubscriberGroupId()->count() > 0;
	}

}