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
			return $this->newsletterSubscribe($aOptions);
		}
		if($aOptions['display_mode'] === 'newsletter_display') {
			
		}		
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
	
	private function newsletterSubscribe($aOptions) {
		if(isset($aOptions['subscriber_group_id']) && $aOptions['subscriber_group_id'] !== null) {
			if(!SubscriberGroupPeer::retrieveByPK($aOptions['subscriber_group_id'])) {
				throw new Exception(__CLASS__.': configured subscriber_group_id '.$aOptions['subscriber_group_id'].' does not exist!');
			}
		}
		$oTemplate = $this->constructTemplate("newsletter_subscribe");

		if(Manager::isPost()) {
			$oFlash = Flash::getFlash();
			if($oFlash->checkForValue('subscriber_email', 'email_required_for_subscription')) {
				$oFlash->checkForEmail('subscriber_email', 'email_required_for_subscription');
			}

			$oFlash->finishReporting();
			if(Flash::noErrors()) {
				$this->oSubscriber = SubscriberPeer::getByEmail($_POST['subscriber_email']);
				if($this->oSubscriber === null) {
					$this->oSubscriber = new Subscriber();
					$this->oSubscriber->setEmail($_POST['subscriber_email']);
					$this->oSubscriber->setPreferredLanguageId(isset($_REQUEST['preferred_language_id']) ? $_REQUEST['preferred_language_id'] : Session::language());
					$this->oSubscriber->setName(isset($_POST['name']) ? $_POST['name'] : $this->oSubscriber->getEmail());
					$this->oSubscriber->setCreatedAt(date('c'));
				}
				if($aOptions['subscriber_group_id']) {
					$this->oSubscriber->addSubscriberGroupMembershipIfNotExists($aOptions['subscriber_group_id']);
				}
				$this->oSubscriber->save();
				$this->notifySubscriber();
				unset($_REQUEST['subscriber_email']);
				$oTemplate->replaceIdentifier('message', StringPeer::getString('newsletter.subscribe.success'));
			}
		}		
		return $oTemplate;	
	}
	
	public function notifySubscriber() {
		$oEmailTemplate = $this->constructTemplate('email_subscription_notification');
		$oEmailTemplate->replaceIdentifier('name', $this->oSubscriber->getName());
		$sSenderName = Settings::getSetting('newsletter_plugin', 'sender_name', 'Rapila on '.$_SERVER['HTTP_HOST']);
		$sSenderEmail = LinkUtil::getDomainHolderEmail('no-reply');
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