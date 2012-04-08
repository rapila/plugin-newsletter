<?php
/**
* @package modules.widget
*/
class MailGroupInputWidgetModule extends WidgetModule {
	
	public function getMailGroups() {
		$aMailGroups = self::getSubscriberGroups();
		// if filter is implemented in project this allows to add on-the-fly mail groups
		FilterModule::getFilters()->handleMailGroups(array(&$aMailGroups));
		return $aMailGroups;
	}
	
	public static function getSubscriberGroups() {
		return SubscriberGroupPeer::getAllAssoc(false, true);
	}
	
	public static function hasSubscriberGroups() {
		return count(self::getSubscriberGroups()) > 0;
	}
}