<?php

class NewsletterFrontendModule extends DynamicFrontendModule {
	
	public static $DISPLAY_OPTIONS = array('newsletter_subscribe', 'newsletter_subscribe_opt_in', 'newsletter_unsubscribe', 'newsletter_display_list', 'newsletter_display_detail');
	private $oSubscriber;
	private static $B_CONFIRMED;
	const PARAM_OPT_IN_CONFIRM = 'opt_in_confirm';
	
	
	public function __construct($oLanguageObject = null, $aRequestPath = null, $iId = 1) {
		parent::__construct($oLanguageObject, $aRequestPath, $iId);
	}
	
	public function renderFrontend() {
		if(isset($_REQUEST['unsubscribe'])) {
			return $this->newsletterUnsubscribe(Manager::isPost());
		}
		if(isset($_REQUEST[self::PARAM_OPT_IN_CONFIRM]) && self::$B_CONFIRMED === null) {
			self::$B_CONFIRMED = true;
			return $this->newsletterOptInConfirm();
		}
		$aOptions = @unserialize($this->getData());

		switch($aOptions['display_mode']) {
			case 'newsletter_subscribe': return $this->newsletterSubscribe($aOptions);
			case 'newsletter_subscribe_opt_in': return $this->newsletterSubscribe($aOptions, true);
			case 'newsletter_unsubscribe': return $this->newsletterUnsubscribe();
			case 'newsletter_display_list': return $this->displayNewsletterList($aOptions);
			case 'newsletter_display_detail': return $this->displayNewsletterDetail($aOptions);
		}
	}
	
	private function newsletterUnsubscribe() {
		if(Manager::isPost()) {
			return $this->processOptOutSuscriptions();
		}
		// if subscriber exists and the required checksum is correct
		if(!isset($_REQUEST['unsubscribe'])) {
			return $this->constructTemplate('unsubscribe_general_info');
		}
		$oSubscriber = SubscriberPeer::getByEmail($_REQUEST['unsubscribe']);
		if($oSubscriber && $oSubscriber->getUnsubscribeChecksum() == $_REQUEST['checksum']) {

			SubscriberPeer::ignoreRights(true);
			if(isset($_REQUEST['subscriber_group_id'])) {
				$oSubscriber->deleteSubscriberGroupMembership($_REQUEST['subscriber_group_id']);
			} else {
				// @todo check change jm, not very elegant
				$aSubscriberGroupMemberShips =  $oSubscriber->getSubscriberGroupMemberships();
				$aValidSubscriptions = array();
				if(count($aSubscriberGroupMemberShips) > 1) {
					foreach($aSubscriberGroupMemberShips as $oSubscriberGroupMembership) {
						if($oSubscriberGroupMembership->getSubscriberGroup()->getDisplayName() == null) {
							continue;
						}
						$aValidSubscriptions[] = $oSubscriberGroupMembership;
					}
				}
				// display newsletter options to opt-in or out if there is more then one valid one
				// otherwise delete the subscriber and inform
				if(count($aValidSubscriptions) > 1) {
					$oTemplate = $this->constructTemplate('unsubscribe_optout_form');
					$oTemplate->replaceIdentifier('checksum', $_REQUEST['checksum']);
					$oTemplate->replaceIdentifier('email', $oSubscriber->getEmail());
					foreach($aValidSubscriptions as $oSubscriberGroupMemberships) {
						$oCheckboxTemplate = $this->constructTemplate('unsubscribe_optout_checkbox');
						$oCheckboxTemplate->replaceIdentifier('subscriber_group_id', $oSubscriberGroupMemberships->getSubscriberGroupId());
						$oCheckboxTemplate->replaceIdentifier('subscriber_group_name', $oSubscriberGroupMemberships->getSubscriberGroup()->getDisplayName());
						$oTemplate->replaceIdentifierMultiple('subscriber_group_checkbox', $oCheckboxTemplate);
					}
					return $oTemplate;
				}
				// there is one or less subscriptions (without subscriptions without display_name [considered as temp groups])
				// so all the subscriptions are deleted
				$oSubscriber->delete();
			}
			// display unsubscribe confirmation international
			return $this->constructTemplate('unsubscribe_confirm');
		}
		return $this->constructTemplate('unsubscribe_unknown_error');
	}
	
	private function processOptOutSuscriptions() {
		$oSubscriber = SubscriberPeer::getByEmail($_POST['email']);
		if($oSubscriber && $oSubscriber->getUnsubscribeChecksum() == $_POST['checksum']) {
			foreach($_POST['subscriber_group_id'] as $iSubscriberGroupId) {
				$oSubscriber->deleteSubscriberGroupMembership($iSubscriberGroupId);
			}
		}
		$oTemplate = $this->constructTemplate('unsubscribe_optout_confirm');
		$sConfirmMessageKey = 'wns.unsubscribe_optout.subsriber_removed';
		if($oSubscriber) {
			$bRemoveSubscriber = true;
			$iCountRemoved = 0;
			foreach($oSubscriber->getSubscriberGroupMemberships() as $oMembership) {
				$iCountRemoved++;
				if($oMembership->getSubscriberGroup()->getDisplayName() != null) {
					$bRemoveSubscriber = false;
				}
			}
			if($bRemoveSubscriber) {
				$oSubscriber->delete();
				$oTemplate->replaceIdentifier('unsubscribe_optout_message_subscriber', StringPeer::getString('wns.unsubscribe_optout.subsriber_removed'));
			} 
			if($iCountRemoved > 1) {
				$sConfirmMessageKey = 'wns.unsubscribe_optout.subscriptions_removed';
			} else {
				$sConfirmMessageKey = 'wns.unsubscribe_optout.subscription_removed';
			}
		}
		$oTemplate->replaceIdentifier('unsubscribe_optout_message', StringPeer::getString($sConfirmMessageKey));
		return $oTemplate;
	}
	
	private function newsletterOptInConfirm() {
		$oSubscriberGroupMembership = SubscriberGroupMembershipQuery::create()->filterByOptInHash($_REQUEST[self::PARAM_OPT_IN_CONFIRM])->findOne();
		// if subscriber exists and the required checksum is correct
		if($oSubscriberGroupMembership) {
			SubscriberGroupMembershipPeer::ignoreRights(true);
			$oSubscriberGroupMembership->setOptInHash(null);
			$oSubscriberGroupMembership->save();
			return $this->constructTemplate('newsletter_optin_confirm');
		}
		return $this->constructTemplate('newsletter_optin_error');
	}
	
	private function displayNewsletterList($aOptions) {
		$iSubscriberGroupId = @$aOptions['subscriber_group_id'];
		$oQuery = NewsletterQuery::create()->filterApprovedForLanguage(Session::language())->orderByCreatedAt(Criteria::DESC);
		if($iSubscriberGroupId) {
			$oQuery->joinNewsletterMailing()->useQuery('NewsletterMailing')->filterBySubscriberGroupId($iSubscriberGroupId)->endUse();
		}
		$aRecentNewsletters = $oQuery->limit(10)->find();
		$bHasNewsletters = count($aRecentNewsletters) > 0;
		$oTemplate = $this->constructTemplate('newsletter_display_list');
		if($bHasNewsletters === false) {
			$oTemplate->replaceIdentifier('newsletter_item', TagWriter::quickTag('p', array('class' => 'no_result_message'), StringPeer::getString('wns.newsletter.no_newsletter_available')));
		}
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
	
	private function newsletterSubscribe($aOptions, $bOptInRequired=false) {
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
				}
				$bIsNewSubscription = false;
				if($aOptions['subscriber_group_id']) {
					$bIsNewSubscription = $this->oSubscriber->addSubscriberGroupMembershipIfNotExists($aOptions['subscriber_group_id']);
				}
				SubscriberGroupMembershipPeer::ignoreRights(true);
				SubscriberPeer::ignoreRights(true);
				$this->oSubscriber->save();
				
				// notifiy only if a new subscription has been added
				if($bIsNewSubscription) {
					if($bOptInRequired) {
						$this->notifySubscriberOptIn($aOptions['subscriber_group_id'], $bIsNewSubscription);
					} else {
						$this->notifySubscriber($bIsNewSubscription);
					}
				}
				unset($_REQUEST['subscriber_email']);
				$sConfirmMessage = StringPeer::getString('wns.newsletter.subscribe_opt_in.success');
				if($bOptInRequired === false) {
					$sConfirmMessage = StringPeer::getString('wns.newsletter.subscribe.success');
				}
				$oTemplate->replaceIdentifier('message', $sConfirmMessage);
			}
		}		
		return $oTemplate;	
	}
	
	public function notifySubscriber($bIsNewSubscription = true) {
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
	
	public function notifySubscriberOptIn($iSubscriberGroupId, $bIsNewSubscription=true) {
		$oEmailTemplate = $this->constructTemplate('email_subscription_optin_notification');
		$oEmailTemplate->replaceIdentifier('name', $this->oSubscriber->getName());
		$sSenderName = Settings::getSetting('newsletter_plugin', 'sender_name', 'Rapila Newsletter on '.$_SERVER['HTTP_HOST']);
		$sSenderEmail = LinkUtil::getDomainHolderEmail('no-reply');
		$oEmailTemplate->replaceIdentifier('signature', $sSenderName);
		$oEmailTemplate->replaceIdentifier('weblink', LinkUtil::getHostName());
		$oSubscribePage = PagePeer::getPageByIdentifier(Settings::getSetting('newsletter_plugin', 'unsubscribe_page', 'subscribe'));
		if ($oSubscribePage === null) {
			// Fallback: try searching the page by name
			$oSubscribePage = PagePeer::getPageByName(Settings::getSetting('newsletter_plugin', 'unsubscribe_page', 'subscribe'));
			if ($oSubscribePage === null) {
				throw new Exception('Error in'.__METHOD__.': a public and hidden page is required for optin subscribe action');
			}
		}
		$oOptinConfirmLink = LinkUtil::absoluteLink(LinkUtil::link($oSubscribePage->getLink(), null, array(self::PARAM_OPT_IN_CONFIRM => Subscriber::getOptInChecksumByEmailAndSubscriberGroupId($this->oSubscriber->getEmail(), $iSubscriberGroupId))));
		
		$oEmailTemplate->replaceIdentifier('optin_link', TagWriter::quickTag('a', array('href' => $oOptinConfirmLink), StringPeer::getString('newsletter_subscription.optin_link_text')));
		$oEmail = new EMail(StringPeer::getString('wns.subscriber_email.subject'), $oEmailTemplate, true);
		$oEmail->setSender($sSenderName, $sSenderEmail);
		$oEmail->addRecipient($this->oSubscriber->getEmail());
		$oEmail->send();
	}
	
	public function getSaveData($mData) {
		$oFlash = new Flash($mData);
		$oFlash->checkForValue('display_mode', 'display_mode_required');
		if($mData['display_mode'] !== 'newsletter_unsubscribe') {
			$oFlash->checkForValue('subscriber_group_id', 'subscriber_group_required');
		}
		$oFlash->finishReporting();
		
		if($oFlash->hasMessages()) {
			throw new ValidationException($oFlash);
		}
		return parent::getSaveData($mData);
	}

}
