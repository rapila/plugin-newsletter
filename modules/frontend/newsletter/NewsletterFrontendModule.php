<?php
/**
 * @package modules.frontend
 * @subpackage rapila-plugin-newsletter
 */
class NewsletterFrontendModule extends DynamicFrontendModule {
	
	// Display options used in {@link NewsletterFrontendConfigWidgetModule::getDisplayOptions()} 
	public static $DISPLAY_OPTIONS = array('newsletter_subscribe', 'newsletter_unsubscribe', 'newsletter_display_list', 'newsletter_display_detail');

	// Subscriber
	private $oSubscriber;
	private static $B_CONFIRMED;
	const PARAM_OPT_IN_CONFIRM = 'opt_in_confirm';


	public function __construct($oLanguageObject = null, $aRequestPath = null, $iId = 1) {
		parent::__construct($oLanguageObject, $aRequestPath, $iId);
	}

	public function renderFrontend() {
		if(isset($_REQUEST[self::PARAM_OPT_IN_CONFIRM]) && self::$B_CONFIRMED === null) {
			self::$B_CONFIRMED = true;
			return $this->newsletterOptInConfirm();
		}
		$aOptions = @unserialize($this->getData());
		switch($aOptions['display_mode']) {
			case 'newsletter_subscribe': return $this->newsletterSubscribe($aOptions['subscriber_group_id']);
			case 'newsletter_unsubscribe': return $this->newsletterUnsubscribe();
			case 'newsletter_display_list': return $this->displayNewsletterList($aOptions['subscriber_group_id']);
			case 'newsletter_display_detail': return $this->displayNewsletterDetail($aOptions);
		}
	}

	// Subscribe methods
	private function newsletterSubscribe($mSubscriberGroupId) {
		/**
		* @todo: consider array to become scalar as there is no need for multiple values, or is there?
		*/
		if(is_array($mSubscriberGroupId) && count($mSubscriberGroupId) > 0) {
			$mSubscriberGroupId = $mSubscriberGroupId[0];
		}
		if(!SubscriberGroupQuery::create()->findPk($mSubscriberGroupId)) {
			throw new Exception(__CLASS__.': configured subscriber_group_id '.$mSubscriberGroupId.' does not exist!');
		}
		$oTemplate = $this->constructTemplate("newsletter_subscribe");

		// Process form
		if(Manager::isPost() && isset($_POST['newsletter_subscribe'])) {
			$this->processSubscribe($mSubscriberGroupId, $oTemplate);
		}
		return $oTemplate;
	}

	private function processSubscribe($iSubscriberGroupId, $oTemplate) {
		$oFlash = Flash::getFlash();
		$oFlash->checkForEmail('subscriber_email', 'email_required_for_subscription');

		$oFlash->finishReporting();
		if(Flash::noErrors()) {
			$this->oSubscriber = SubscriberQuery::create()->filterByEmail($_POST['subscriber_email'])->findOne();

			// Create new subscriber if it does not exist yet
			if($this->oSubscriber === null) {
				$this->oSubscriber = new Subscriber();
				$this->oSubscriber->setEmail($_POST['subscriber_email']);
				$this->oSubscriber->setPreferredLanguageId(isset($_REQUEST['preferred_language_id']) ? $_REQUEST['preferred_language_id'] : Session::language());
				$this->oSubscriber->setName(isset($_POST['name']) ? $_POST['name'] : $this->oSubscriber->getEmail());
				$this->oSubscriber->setCreatedAt(date('c'));
			}

			// Add newsletter subscription if it does not exist yet
			$bHasNewSubscription = false;
			if($iSubscriberGroupId && !$this->oSubscriber->hasSubscriberGroupMembership($iSubscriberGroupId)) {
				$bHasNewSubscription = $this->oSubscriber->addSubscriberGroupMembershipBySubscriberGroupId($iSubscriberGroupId) !== null;
			}
			SubscriberGroupMembershipPeer::ignoreRights(true);
			SubscriberPeer::ignoreRights(true);
			$this->oSubscriber->save();

			$sConfirmMessage = StringPeer::getString('wns.newsletter.subscribe.success');
			// Notifiy only if a new subscription has been added, otherwise ignore

			if($bHasNewSubscription) {
				if(Settings::getSetting('newsletter', 'optin_confirmation_required', true)) {
					$sConfirmMessage = StringPeer::getString('wns.newsletter.subscribe_opt_in.success');
					$this->notifySubscriberOptIn($iSubscriberGroupId);
				} else {
					$this->notifySubscriber();
				}
			}
			$oTemplate->replaceIdentifier('message', $sConfirmMessage);
		}
	}

	public function notifySubscriber() {
		$oEmailTemplate = $this->constructTemplate('email_subscription_notification');
		$this->sendMail($oEmailTemplate);
	}

	public function notifySubscriberOptIn($iSubscriberGroupId) {
		$oEmailTemplate = $this->constructTemplate('email_subscription_optin_notification');
		/**
		* note: unsubscribe_page is just the main communication page where forms like 
		* • optin confirm or 
		* • unsubscribe optout 
		* can be easily displayed and safely managed
		*/
		$oUnsubscribePage = PageQuery::create()->findOneByIdentifier(Settings::getSetting('newsletter', 'unsubscribe_page', 'unsubscribe'));
		if ($oUnsubscribePage === null) {
			// Fallback: try searching the page by name
			$oUnsubscribePage = PageQuery::create()->findOneByName(Settings::getSetting('newsletter', 'unsubscribe_page', 'unsubscribe'));
			if ($oUnsubscribePage === null) {
				throw new Exception('Error in'.__METHOD__.': a public and hidden page is required for optin subscribe action');
			}
		}
		$oOptinConfirmLink = LinkUtil::absoluteLink(LinkUtil::link($oUnsubscribePage->getLink(), null, array(self::PARAM_OPT_IN_CONFIRM => Subscriber::getOptInChecksumByEmailAndSubscriberGroupId($this->oSubscriber->getEmail(), $iSubscriberGroupId))), null, LinkUtil::isSSL());
		$oEmailTemplate->replaceIdentifier('optin_link', TagWriter::quickTag('a', array('href' => $oOptinConfirmLink), StringPeer::getString('newsletter_subscription.optin_link_text')));
		$this->sendMail($oEmailTemplate, true);
	}

	private function sendMail($oEmailTemplate, $bSendHtml = false) {
		$oEmailTemplate->replaceIdentifier('name', $this->oSubscriber->getName());
		$sSenderName = Settings::getSetting('newsletter', 'sender_name', 'Rapila Newsletter Plugin');
		$sSenderEmail = Settings::getSetting('newsletter', 'sender_email', LinkUtil::getDomainHolderEmail('no-reply'));
		$oEmailTemplate->replaceIdentifier('signature', $sSenderName);
		$oEmailTemplate->replaceIdentifier('weblink', LinkUtil::getHostName());
		$oEmail = new EMail(StringPeer::getString('wns.subscriber_email.subject'), $oEmailTemplate, $bSendHtml);
		$oEmail->setSender($sSenderName, $sSenderEmail);
		$oEmail->addRecipient($this->oSubscriber->getEmail());
		$oEmail->send();
	}

	private function newsletterUnsubscribe() {
		if(!isset($_REQUEST['unsubscribe'])) {
			return $this->constructTemplate('unsubscribe_unknown_error');
		}

		// Process unsubscribe opt_out form if post
		$oSubscriber = SubscriberQuery::create()->filterByEmail($_REQUEST['unsubscribe'])->findOne();
		if(Manager::isPost()) {
			$mOutput = $this->processOptOutSuscriptions($oSubscriber);
			if($mOutput) {
				return $mOutput;
			}
		}

		// If subscriber does not exist or the required checksum is not correct, return error message
		if(!($oSubscriber && $oSubscriber->getUnsubscribeChecksum() === $_REQUEST['checksum'])) {
			return $this->constructTemplate('unsubscribe_unknown_error');
		}

		SubscriberPeer::ignoreRights(true);

		// Count valid subscriptions [with display_name, not temp or import groups]
		$aSubscriberGroupMemberShips = $oSubscriber->getSubscriberGroupMemberships();
		$aValidSubscriptions = array();
		if(count($aSubscriberGroupMemberShips) > 1) {
			foreach($aSubscriberGroupMemberShips as $oSubscriberGroupMembership) {
				if($oSubscriberGroupMembership->getSubscriberGroup()->getDisplayName() == null) {
					continue;
				}
				$aValidSubscriptions[] = $oSubscriberGroupMembership;
			}
		}
		// Display view with opt_out options if there is more then one valid subscription
		if(count($aValidSubscriptions) > 1) {
			$oTemplate = $this->constructTemplate('unsubscribe_optout_form');
			$oTemplate->replaceIdentifier('checksum', $_REQUEST['checksum']);
			$oTemplate->replaceIdentifier('email', $oSubscriber->getEmail());
			$bIsPostAndAllUnchecked = Manager::isPost() && !isset($_POST['subscriber_group_id']);
			foreach($aValidSubscriptions as $oSubscriberGroupMemberships) {
				$oCheckboxTemplate = $this->constructTemplate('unsubscribe_optout_checkbox');
				$oCheckboxTemplate->replaceIdentifier('subscriber_group_id', $oSubscriberGroupMemberships->getSubscriberGroupId());
				$oCheckboxTemplate->replaceIdentifier('subscriber_group_name', $oSubscriberGroupMemberships->getSubscriberGroup()->getDisplayName());
				$oCheckboxTemplate->replaceIdentifier('checked', !$bIsPostAndAllUnchecked ? ' checked="checked"' : '', null, Template::NO_HTML_ESCAPE);
				$oTemplate->replaceIdentifierMultiple('subscriber_group_checkbox', $oCheckboxTemplate);
			}
			return $oTemplate;
		}

		// Delete subscriber because there is not a valid subscription (all temp subscriptions are removed too)
		$oSubscriber->delete();

		// Display unsubscribe confirmation international
		return $this->constructTemplate('unsubscribe_confirm');
	}

	private function processOptOutSuscriptions($oSubscriber) {
		// If optOut subscriber is identified then delete all checked subscriber group memberships
		if($oSubscriber && $oSubscriber->getUnsubscribeChecksum() == $_POST['checksum']) {
			if (!isset($_POST['subscriber_group_id'])) {
				return false;
			}
			SubscriberGroupMembershipQuery::create()->filterBySubscriber($oSubscriber)->filterBySubscriberGroupId($_POST['subscriber_group_id'])->delete();
			if($oSubscriber->countSubscriberGroupMemberships() === 0) {
				$oSubscriber->delete();
				$oSubscriber = null;
			}
		}
		// Check remaining subscriber group memberships and inform accordingly
		$oTemplate = $this->constructTemplate('unsubscribe_optout_confirm');
		if(!$oSubscriber) {
			$oTemplate->replaceIdentifier('unsubscribe_optout_message_subscriber', StringPeer::getString('wns.unsubscribe_optout.subscriber_removed'));
		}
		$sSubscriptionsRemovedKey = count($_POST['subscriber_group_id']) > 1 ? 'wns.unsubscribe_optout.subscriptions_removed' : 'wns.unsubscribe_optout.subscription_removed';
		$oTemplate->replaceIdentifier('unsubscribe_optout_message_subscriptions', StringPeer::getString($sSubscriptionsRemovedKey));
		return $oTemplate;
	}

	private function newsletterOptInConfirm() {
		$oSubscriberGroupMembership = SubscriberGroupMembershipQuery::create()->filterByOptInHash($_REQUEST[self::PARAM_OPT_IN_CONFIRM])->findOne();

		// If subscriber exists and the required checksum is correct
		if($oSubscriberGroupMembership) {
			SubscriberGroupMembershipPeer::ignoreRights(true);
			$oSubscriberGroupMembership->setOptInHash(null);
			$oSubscriberGroupMembership->save();
			return $this->constructTemplate('newsletter_optin_confirm');
		}
	}

	private function displayNewsletterList($mSubscriberGroupId) {
		$oQuery = NewsletterQuery::create()->distinct()->filterApprovedForLanguage(Session::language())->orderByCreatedAt(Criteria::DESC);
		if($mSubscriberGroupId) {
			$oQuery->joinNewsletterMailing()->useQuery('NewsletterMailing')->filterBySubscriberGroupId($mSubscriberGroupId)->endUse();
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
		// @todo to be implemented
	}

	/**
	* getSaveData()
	* overwrite FrontendModule::getSaveData
	*/
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
