<?php
/**
 * @package modules.widget
 * @subpackage rapila-plugin-newsletter
 */
class SubscriberGroupInputWidgetModule extends WidgetModule {
	
	public function getSubscriberGroups() {
		$bGetGroupsWithSubscribersOnly = false;
		$aSubscriberGroups = SubscriberGroupPeer::getSubscriberGroups(true, $bGetGroupsWithSubscribersOnly);
		$aSubscriberGroups = WidgetJsonFileModule::jsonBaseObjects($aSubscriberGroups, array('id', 'name'));
		// @todo: handle external mail groups
		// FilterModule::getFilters()->handleMailGroups(&$aSubscriberGroups));
		return $aSubscriberGroups;
	}
}