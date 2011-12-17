<?php

class NewsletterFrontendModule extends DynamicFrontendModule {
	
	public static $DISPLAY_OPTIONS = array('newsletter_subscribe', 'newsletter_unsubscribe', 'newsletter_display_list', 'newsletter_display_detail');
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
		if($aOptions['display_mode'] === 'newsletter_display_list') {
			return $this->displayNewsletterList();
		}
		if($aOptions['display_mode'] === 'newsletter_display_detail') {
			return $this->displayNewsletterDetail();
		}		
	}
	
	private function newsletterUnsubscribe() {
		$oSubscriber = SubscriberPeer::getByEmail($_REQUEST['unsubscribe']);
		// if subscriber exists and the required checksum is correct
		if($oSubscriber && $oSubscriber->getUnsubscribeChecksum() == $_REQUEST['checksum']) {
			if(isset($_REQUEST['subscriber_group_id'])) {
				$oSubscriber->deleteSubscriberGroupMembership($_REQUEST['subscriber_group_id']);
			} else {
				SubscriberPeer::ignoreRights(true);
				$oSubscriber->delete();
				SubscriberPeer::ignoreRights(false);
			}
		}
		// display unsubscribe confirmation international
		return $this->constructTemplate('unsubscribe_confirm');
	}
	
	private function displayNewsletterList() {
		$aRecentNewsletters = NewsletterQuery::create()->filterApprovedForLanguage(Session::language())->orderByCreatedAt(Criteria::DESC)->limit(10)->find();
		// Util::dumpAll($aRecentNewsletters);
		$oTemplate = $this->constructTemplate('newsletter_display_list');
		foreach($aRecentNewsletters as $oNewsletter) {
			$oItemTemplate = $this->constructTemplate('newsletter_list_item');
			$oItemTemplate->replaceIdentifier('subject', $oNewsletter->getSubject());
			$oItemTemplate->replaceIdentifier('newsletter_link', $oNewsletter->getDisplayLink());
			$oItemTemplate->replaceIdentifier('date', $oNewsletter->getLastSent());
			$oItemTemplate->replaceIdentifier('template_name', $oNewsletter->getTemplateName());
			$oItemTemplate->replaceIdentifier('language_id', $oNewsletter->getLanguageId());

			$oTemplate->replaceIdentifierMultiple('newsletter_item', $oItemTemplate);
		}
		return $oTemplate;
	}
	
	private function displayNewsletterDetail() {
		
	}
	
	private function newsletterSubscribe($aOptions) {
		if(isset($aOptions['subscriber_group_id']) && $aOptions['subscriber_group_id'] !== null) {
			if(is_array($aOptions['subscriber_group_id']) && count($aOptions['subscriber_group_id']) > 0) {
				$aOptions['subscriber_group_id'] = $aOptions['subscriber_group_id'][0];
			}
			if(!SubscriberGroupPeer::retrieveByPK($aOptions['subscriber_group_id'])) {
				throw new Exception(__CLASS__.': configured subscriber_group_id '.$aOptions['subscriber_group_id'].' does not exist!');
			}
		}
		$oTemplate = $this->constructTemplate("newsletter_subscribe");

		if(Manager::isPost() && isset($_POST['newsletter_subscribe'])) {
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
				SubscriberGroupMembershipPeer::ignoreRights(true);
				SubscriberPeer::ignoreRights(true);
				$this->oSubscriber->save();
				$this->notifySubscriber();
				unset($_REQUEST['subscriber_email']);
				$oTemplate->replaceIdentifier('message', StringPeer::getString('wns.newsletter.subscribe.success'));
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
		$oEmail->send();
	}
}