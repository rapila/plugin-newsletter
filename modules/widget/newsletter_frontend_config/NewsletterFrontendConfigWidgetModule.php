<?php
class NewsletterFrontendConfigWidgetModule extends FrontendConfigWidgetModule {

	public function __construct($sSessionKey, $oFrontendModule) {
		parent::__construct($sSessionKey, $oFrontendModule);
	}

	public function getDisplayOptions() {
		$aResult = array();
		foreach(NewsletterFrontendModule::$DISPLAY_OPTIONS as $Option) {
			$aResult[$Option] = StringPeer::getString('option.'.$Option, null, StringUtil::makeReadableName($Option));
		}
		return $aResult;
	}
	
	public function getSubscriberGroups() {
		return SubscriberGroupPeer::getAllAssoc();
	}
	
		
}