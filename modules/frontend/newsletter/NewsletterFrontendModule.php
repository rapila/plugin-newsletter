<?php

class NewsletterFrontendModule extends DynamicFrontendModule implements WidgetBasedFrontendModule {
	
	public static $DISPLAY_OPTIONS = array('newsletter_subscribe', 'newsletter_unsubscribe', 'newsletter_display');
	private $oSubscriber;
	
	public function __construct($oLanguageObject = null, $aRequestPath = null, $iId = 1) {
		parent::__construct($oLanguageObject, $aRequestPath, $iId);
	}
	
	public function renderFrontend() {
		if(isset($_REQUEST['unsubscribe'])) {
			return $this->newsletterUnsubscribe();
		}
		$aOptions = @unserialize($this->getData());
		if($aOptions['display_mode'] === 'newsletter_subscribe') {
			return $this->newsletterSubscribe();
		}
		if($aOptions['display_mode'] === 'newsletter_display') {
			
		}		
		// the display_mode "newsletter_unsubscribe" does not have to be implemented because the request param "unsubscribe" will be handled anyway
	}
	
	private function newsletterUnsubscribe() {
		$oSubscriber = SubscriberPeer::getByEmail($_REQUEST['unsubscribe']);
		// if subscriber exists and the required checksum is correct
		if($oSubscriber && $oSubscriber->getUnsubscribeChecksum() == $_REQUEST['checksum']) {
			if(isset($_REQUEST['subscriber_group_id'])) {
				$oSubscriber->deleteSubscriberGroupMembership($_REQUEST['subscriber_group_id']);
			} else {
				if(SubscriberGroupPeer::hasSubscriberGroups() === false) {
					$oSubscriber->delete();
				}
			}
		}
		// display unsubscribe confirmation international
		return $this->constructTemplate('unsubscribe_confirm');
	}
	
	private function displayNewsletters() {
		// order by distinct newsletter mailings, first date with a view
		// show archive
		// show last
		// create file module for rendering newsletter for see in browser
	}
	
	private function newsletterSubscribe() {
		$oTemplate = $this->constructTemplate("newsletter_subscribe");
		if(Manager::isPost()) {
			$oFlash = Flash::getFlash();
			$oFlash->checkForEmail('subscriber_email', 'email_required_for_subscription');
			$oFlash->finishReporting();
			if(Flash::noErrors()) {
				$this->oSubscriber = SubscriberPeer::getByEmail($_POST['subscriber_email']);
				if($this->oSubscriber === null) {
					$this->oSubscriber = new Subscriber();
					$this->oSubscriber->setEmail($_POST['subscriber_email']);
					$this->oSubscriber->setPreferredLanguageId(isset($_REQUEST['preferred_language_id']) ? $_REQUEST['preferred_language_id'] : Session::language());
					$this->oSubscriber->setName(isset($_POST['name']) ? $_POST['name'] : $this->oSubscriber->getEmail());
					$this->oSubscriber->setCreatedAt(date('c'));
					$this->oSubscriber->save();
				}
				if(SubscriberGroupPeer::hasSubscriberGroups()) {
					$iSubscriberGroupId = isset($_POST['subscriber_group_id']) ? $_POST['subscriber_group_id'] : Settings::getSetting('newsletter_plugin', 'subscriber_group_default_id', 1);
					$this->oSubscriber->addSubscriberGroupMembershipIfNotExists($iSubscriberGroupId);
				}
				$this->notifySubscriber();
				$oTemplate->replaceIdentifier('message', StringPeer::getString('newsletter.subscribe.success'));
			}
		}
		$oTemplate->replaceIdentifier('message', StringPeer::getString('wns.newsletter.subscribe.message'));
		
		return $oTemplate;	
	}
	
	public function notifySubscriber() {
		$oEmailTemplate = $this->constructTemplate('email_subscription_notification');
		$oEmailTemplate->replaceIdentifier('name', $this->oSubscriber->getName());
		$sSenderName = Settings::getSetting('newsletter_plugin', 'sender_name', 'Rapila on '.$_SERVER['HTTP_HOST']);
		$sSenderEmail = Settings::getSetting('newsletter_plugin', 'sender_email_address', 'noreply@example.com');
		$oEmailTemplate->replaceIdentifier('signature', $sSenderName);
		$oEmailTemplate->replaceIdentifier('weblink', LinkUtil::getHostName());
		$oEmail = new EMail(StringPeer::getString('wns.subscriber_email.subject'), $oEmailTemplate);
		$oEmail->setSender($sSenderName, $sSenderEmail);
		$oEmail->addRecipient($this->oSubscriber->getEmail());
		// $oEmail->addBlindCarbonCopyRecipient($sSenderEmail, $sSenderEmail);
		$oEmail->send();
	}
	
	public function widgetData() {
		return @unserialize($this->getData());	
	}
	
	public function widgetSave($mData) {
		$this->oLanguageObject->setData(serialize($mData));
		return $this->oLanguageObject->save();
	}
	
	public function getWidget() {
		$aOptions = @unserialize($this->getData());	
		$oWidget = new NewsletterEditWidgetModule(null, $this);
		$oWidget->setDisplayMode($aOptions);
		return $oWidget;
	}
}