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
		return SubscriberGroupPeer::getAllAssoc();
	}
	
		
}