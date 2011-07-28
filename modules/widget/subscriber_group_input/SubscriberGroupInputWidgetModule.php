<?php
/**
* @package modules.widget
*/
class SubscriberGroupInputWidgetModule extends WidgetModule {
	
	public function getSubscriberGroups() {
		$bGetGroupsWithSubscribersOnly = false;
		$aSubscriberGroups = SubscriberGroupPeer::getSubscriberGroups(true, $bGetGroupsWithSubscribersOnly);
		$aSubscriberGroups = WidgetJsonFileModule::jsonBaseObjects($aSubscriberGroups, array('id', 'name'));
		// TODO: handle external mail groups
		// FilterModule::getFilters()->handleExternalMailGroups(&$aSubscriberGroups));
		return $aSubscriberGroups;
	}
}