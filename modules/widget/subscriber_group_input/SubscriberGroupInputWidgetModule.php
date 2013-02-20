<?php
/**
 * @package modules.widget
 * @subpackage rapila-plugin-newsletter
 */
class SubscriberGroupInputWidgetModule extends WidgetModule {
	
	public function subscriberGroups() {
		$aSubscriberGroups = SubscriberGroupQuery::create()->orderByName()->select(array('Id', 'Name'))->find()->toKeyValue('Id', 'Name');
		// @todo: handle external mail groups
		// FilterModule::getFilters()->handleMailGroups(&$aSubscriberGroups));
		return $aSubscriberGroups;
	}
}