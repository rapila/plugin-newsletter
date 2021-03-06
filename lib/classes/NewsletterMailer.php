
<?php

/**
* @package newsletter
*/
class NewsletterMailer {

	// Array of newsletter recipients
	private $aRecipients;

	// Newsletter object
	private $oNewsletter;

	// Unsubsribe page required for optOut form, see {@link NewsletterFrontendModule::newsletterUnsubscribe()}
	private $oUnsubscribePage;

	// Sender name
	private $sSenderName;

	// Sender e-mail
	private $sSenderEmailAddress;

	// Array of invalid e-mail addresses
	private $aInvalidEmails = array();


 /** __construct()
	* @param object Newsletter
	* @param array recipients mixed string email / object
	* @param boolean $bRequiresUnsubsribeLink
	* @param string sender email
	* @param string sender name
	*
	* @return void
	*/
	public function __construct($oNewsletter, $aRecipients, $bRequiresUnsubsribeLink, $sSenderEmailAddress, $sSenderName = null) {
		if($oNewsletter === null) {
			throw new Exception('Error in'.__METHOD__.': requires a Newsletter object, null given');
		}
		// Prepare sender email and name
		$this->aRecipients = $aRecipients;
		$this->oNewsletter = $oNewsletter;
		$this->sSenderEmailAddress = $sSenderEmailAddress;
		if($sSenderName !== null) {
			$this->sSenderName = $sSenderName;
		} else {
			$this->sSenderName = Settings::getSetting('newsletter', 'sender_name', "Rapila Newsletter Plugin");
		}

		if($bRequiresUnsubsribeLink) {
			// Unsubscribe page is required, a page that contains a content object NewsletterFrontendModule
			$this->oUnsubscribePage = PageQuery::create()->findOneByIdentifier(Settings::getSetting('newsletter', 'unsubscribe_page', 'unsubscribe'));
			if ($this->oUnsubscribePage === null) {

				// Fallback: try searching the page by name
				$this->oUnsubscribePage = PageQuery::create()->findOneByName(Settings::getSetting('newsletter', 'unsubscribe_page', 'unsubscribe'));
				if ($this->oUnsubscribePage === null) {
					throw new LocalizedException('newsletter.unsubscriber_page_required_error', array('method' => "NewsletterMailer::__construct()"));
				}
			}
		}
	}

 /** send()
	* Description:
	* • This method is called when NewsletterMailer is instanciated
	* • All newsletter, sender and recipient info are ready
	*
	* @return boolean has_invalid email addresses
	*/
	public function send() {
		// Get newsletter email main template and template body and css by template name
		$oEmailTemplate = new Template('main', array(DIRNAME_TEMPLATES, 'newsletter'));
		$oEmailTemplate->replaceIdentifier('newsletter_template_css', new Template("{$this->oNewsletter->getTemplateName()}.css", array(DIRNAME_TEMPLATES, 'newsletter')));

		// Parse links differently in text
		RichtextUtil::$USE_ABSOLUTE_LINKS = LinkUtil::isSSL();
		$oEMailContent = RichtextUtil::parseStorageForFrontendOutput(stream_get_contents($this->oNewsletter->getNewsletterBody()));
		RichtextUtil::$USE_ABSOLUTE_LINKS = null;

		// Replace add surrounding (body.tmpl) before content if exists. Template needs to contain a newsletter_content identifier
		if(ResourceFinder::findResource(array(DIRNAME_TEMPLATES, NewsletterDetailWidgetModule::NEWSLETTER_DIRNAME, "{$this->oNewsletter->getTemplateName()}.body.tmpl")) !== null) {
			$oEmailTemplate->replaceIdentifier('newsletter_content', new Template("{$this->oNewsletter->getTemplateName()}.body", array(DIRNAME_TEMPLATES, NewsletterDetailWidgetModule::NEWSLETTER_DIRNAME)), null, Template::LEAVE_IDENTIFIERS);
		}
		$oEmailTemplate->replaceIdentifier('newsletter_content', $oEMailContent, null, Template::LEAVE_IDENTIFIERS);
		$oEmailTemplate->replaceIdentifier('subject', $this->oNewsletter->getSubject());
		$oEmailTemplate->replaceIdentifier('language', $this->oNewsletter->getLanguageId());
		$oEmailTemplate->replaceIdentifier('newsletter_link', LinkUtil::absoluteLink($this->oNewsletter->getDisplayLink()));
		$oEmailTemplate->replaceIdentifier('newsletter_date', LocaleUtil::localizeDate(null, $this->oNewsletter->getLanguageId()));
		$oEmailTemplate->replaceIdentifier('newsletter_timestamp', time());

		// Process templates with each recipient, depending on whether recipient is object and object of Subscriber or string
		foreach($this->aRecipients as $mRecipient) {
			$this->sendNewsletter($mRecipient, clone $oEmailTemplate);
		}

		return count($this->aInvalidEmails) === 0;

	}

 /** sendNewsletter()
	*
	* @param mixed string/object recipient
	* @param object oEmailTemplateInstance
	*
	* @return void
	*/
	private function sendNewsletter($mRecipient, $oEmailTemplateInstance) {
		if(is_object($mRecipient)) {
			$oEmailTemplateInstance->replaceIdentifier('recipient', $mRecipient->getName());
			if($mRecipient instanceof Subscriber && $this->oUnsubscribePage) {
				$sLanguageId = FrontendManager::shouldIncludeLanguageInLink() ? $this->oNewsletter->getLanguageId() : false;
				if(method_exists($mRecipient, 'getUnsubscribeQueryParams')) {
					$sUnsubscribeLink = LinkUtil::absoluteLink(LinkUtil::link($this->oUnsubscribePage->getLink(), 'FrontendManager', $mRecipient->getUnsubscribeQueryParams(), $sLanguageId));
					$oEmailTemplateInstance->replaceIdentifier('unsubscribe_link', $sUnsubscribeLink);
				}
			}
		}
		else {
			$oEmailTemplateInstance->replaceIdentifier('recipient', $mRecipient);
		}
		// Send newsletter and store invalid emails
		try {
			$sPlainTextMethod = Settings::getSetting('newsletter', 'plain_text_alternative_method', 'markdown');
			$oEMail = null;
			if($sPlainTextMethod === null || $sPlainTextMethod === false) {
				$oEMail = new EMail($this->oNewsletter->getSubject(), $oEmailTemplateInstance, true);
			} else {
				$oEMail = new EMail($this->oNewsletter->getSubject(), MIMEMultipart::alternativeMultipartForTemplate($oEmailTemplateInstance, null, null, $sPlainTextMethod), true);
			}
			if(is_object($mRecipient)) {
				$oEMail->addRecipient($mRecipient->getEmail(), $mRecipient->getName() === $mRecipient->getEmail() ? null : $mRecipient->getName());
			} else {
				$oEMail->addRecipient($mRecipient);
			}
			$oEMail->setSender($this->sSenderName, $this->sSenderEmailAddress);
			$oEMail->send();
		} catch (Exception $e) {
			$this->aInvalidEmails[] = new NewsletterSendFailure($e, $mRecipient);
		}
	}

	public function setInvalidEmails($aInvalidEmails) {
		$this->aInvalidEmails = $aInvalidEmails;
	}

	public function getInvalidEmails() {
		return $this->aInvalidEmails;
	}

}