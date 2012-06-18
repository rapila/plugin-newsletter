<?php
class NewsletterFrontendConfigWidgetModule extends FrontendConfigWidgetModule {
	
	public function getDisplayOptions() {
		$aResult = array();
		foreach(NewsletterFrontendModule::$DISPLAY_OPTIONS as $Option) {
			$aResult[$Option] = StringPeer::getString('newsletter_config.option.'.$Option, null, StringUtil::makeReadableName($Option));
		}
		return $aResult;
	}
	
	public function getSubscriberGroups() {
		$aSubscriberGroups = SubscriberGroupPeer::getAllAssoc();
		if(count($aSubscriberGroups) === 0) {
			$oSubscriberGroup = new SubscriberGroup();
			$oSubscriberGroup->setName(StringPeer::getString('wns.subscriber_group.default.name'));
			$oSubscriberGroup->setDisplayName(StringPeer::getString('wns.subscriber_group.default.display_name'));
			$oSubscriberGroup->save();
			$aSubscriberGroups = SubscriberGroupPeer::getAllAssoc();
		}
		return $aSubscriberGroups;
	}	
}