<?php
/**
 * @package modules.widget
 * @subpackage rapila-plugin-newsletter
 */
class NewsletterFrontendConfigWidgetModule extends FrontendConfigWidgetModule {

	public function getDisplayOptions() {
		$aResult = array();
		foreach(NewsletterFrontendModule::$DISPLAY_OPTIONS as $Option) {
			$aResult[$Option] = TranslationPeer::getString('newsletter_config.option.'.$Option, null, StringUtil::makeReadableName($Option));
		}
		return $aResult;
	}

	public function getSubscriberGroups() {
		if(SubscriberGroupQuery::create()->count() === 0) {
			$oSubscriberGroup = new SubscriberGroup();
			$oSubscriberGroup->setName(TranslationPeer::getString('wns.subscriber_group.default.name'));
			$oSubscriberGroup->setDisplayName(TranslationPeer::getString('wns.subscriber_group.default.display_name'));
			$oSubscriberGroup->save();
		}
		return SubscriberGroupQuery::create()->select(array('Id', 'Name'))->orderByName()->find()->toKeyValue('Id', 'Name');
	}
}
