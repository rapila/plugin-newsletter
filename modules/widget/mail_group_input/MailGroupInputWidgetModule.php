<?php
/**
* @package modules.widget
*/
class MailGroupInputWidgetModule extends WidgetModule {
	
	const BACKEND_CREATED_SUFFIX = '_import';
	
	public function getMailGroups($bIncludeExternalMailGroups=true) {
		
		//Get subscriber groups, add membership count if external mailgroups are not include, i.e. called from subscriber_import widget
		$aMailGroups = self::getSubscriberGroups($bIncludeExternalMailGroups);
		
		//If filter is implemented in project this allows to add on-the-fly mail groups
		if($bIncludeExternalMailGroups) {
			//Include external mail groups, ie dynamic groups of recipients that have registered for an event
			FilterModule::getFilters()->handleMailGroups(array(&$aMailGroups));
		}
		return $aMailGroups;
	}
	
	public static function getSubscriberGroups($bIncludeExternalMailGroups, $bAddMembershipCount=true) {
		return SubscriberGroupPeer::getAllAssoc(false, $bIncludeExternalMailGroups, $bAddMembershipCount);
	}
	
	public static function hasSubscriberGroups() {
		return count(self::getSubscriberGroups(false)) > 0;
	}
	
	/** getBackendCreatedSubscriberGroups()
	* add temporary subscriber groups that only exist as long as there are subscriber_group_memberships with boolean is_backend_created=true
	* @return array of subscriber_group_ids
	*/	
	public function getBackendCreatedSubscriberGroups() {
		$aResult = array();
		foreach($this->getBackendCreatedSubscriberGroupQuery()->find() as $oSubscriberGroupMembership) {
			$aResult[] = $oSubscriberGroupMembership->getSubscriberGroupId();
		}
		return $aResult;
	}
	
	private function getBackendCreatedSubscriberGroupQuery() {
		return SubscriberGroupMembershipQuery::create()->filterByIsBackendCreated(true)->groupBySubscriberGroupId();
	}
	
	public function getHasBackendCreatedSubscriberGroups() {
		return $this->getBackendCreatedSubscriberGroupQuery()->count() > 0;
	}

}