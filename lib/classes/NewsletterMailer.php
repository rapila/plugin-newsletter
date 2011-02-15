
<?php

/**
* @package newsletter
*/
class NewsletterMailer {
	private $aRecipients;
	private $oNewsletter;
	private $bUseSubscriberGroups;
	private $oUnsubscribePage;
	private $sSenderName;
	private $sSenderEmailAddress;

	private $aInvalidEmails = array();
	
	public function __construct($oNewsletter, $aRecipients, $bRequiresUnsubsribeLink, $sSenderEmailAddress) {
		if($oNewsletter === null) {
			throw new Exception('Error in'.__METHOD__.': requires a Newsletter object, null given');
		}
		$this->aRecipients = $aRecipients;
		$this->oNewsletter = $oNewsletter;
		$this->bUseSubscriberGroups = MailGroupInputWidgetModule::hasSubscriberGroups();
		$this->sSenderName = Settings::getSetting('newsletter_plugin', 'sender_name', "Newsletter Plugin Sender Name");
		$this->sSenderEmailAddress = $sSenderEmailAddress;
		if($bRequiresUnsubsribeLink) {
			// unsubscribe page is required, a page that contains a content object NewsletterFrontendModule, ie the subscribe page
			$this->oUnsubscribePage = PagePeer::getPageByName(Settings::getSetting('newsletter_plugin', 'unsubscribe_page_name', 'subscribe'));
			if ($this->oUnsubscribePage === null) {
				throw new Exception('Error in'.__METHOD__.': a public and hidden unsubscribe page is required for unsubscribe to function');
			}
		}
	}
	
	public function send() {
		// get newsletter email main template and template body and css by template name
		$oEmailTemplate = new Template('main', array(DIRNAME_TEMPLATES, 'newsletter'));
		$oEmailTemplate->replaceIdentifier('newsletter_template_css', new Template("{$this->oNewsletter->getTemplateName()}.css", array(DIRNAME_TEMPLATES, 'newsletter')));
		
		// parse links differently in text
		RichtextUtil::$USE_ABSOLUTE_LINKS = true;
		$oEMailContent = RichtextUtil::parseStorageForFrontendOutput(stream_get_contents($this->oNewsletter->getNewsletterBody()));
		RichtextUtil::$USE_ABSOLUTE_LINKS = false;
		
		// Replace add surrounding (body.tmpl) before content if exists. Template needs to contain a newsletter_content identifier
		if(ResourceFinder::findResource(array(DIRNAME_TEMPLATES, NewsletterDetailWidgetModule::NEWSLETTER_DIRNAME, "{$this->oNewsletter->getTemplateName()}.body.tmpl")) !== null) {
			$oEmailTemplate->replaceIdentifier('newsletter_content', new Template("{$this->oNewsletter->getTemplateName()}.body", array(DIRNAME_TEMPLATES, NewsletterDetailWidgetModule::NEWSLETTER_DIRNAME)), null, Template::LEAVE_IDENTIFIERS);
		}
		$oEmailTemplate->replaceIdentifier('newsletter_content', $oEMailContent, null, Template::LEAVE_IDENTIFIERS);
		$oEmailTemplate->replaceIdentifier('subject', $this->oNewsletter->getSubject());
		$oEmailTemplate->replaceIdentifier('language', $this->oNewsletter->getLanguageId());
		$oEmailTemplate->replaceIdentifier('newsletter_link', LinkUtil::absoluteLink(LinkUtil::link(array('display_newsletter', 'newsletter', $this->oNewsletter->getId()), 'FileManager')));
		$oEmailTemplate->replaceIdentifier('newsletter_date', LocaleUtil::localizeDate(null, $this->oNewsletter->getLanguageId()));
		$oEmailTemplate->replaceIdentifier('newsletter_timestamp', time());

		// process templates with each recipient, depending on whether recipient is object and object of Subscriber or string
		foreach($this->aRecipients as $mRecipient) {
			$this->sendNewsletter($mRecipient, clone $oEmailTemplate);
		}
		
		return count($this->aInvalidEmails) === 0;
	}
	
	private function sendNewsletter($mRecipient, $oEmailTemplateInstance) {
		if(is_object($mRecipient)) {
			$oEmailTemplateInstance->replaceIdentifier('recipient', $mRecipient->getName());
			if($mRecipient instanceof Subscriber && $this->oUnsubscribePage) {
				$oEmailTemplateInstance->replaceIdentifier('unsubscribe_link', LinkUtil::absoluteLink(LinkUtil::link($this->oUnsubscribePage->getLink(), 'FrontendManager', $mRecipient->getUnsubscribeQueryParams())));
			}
		}
		else {
			$oEmailTemplateInstance->replaceIdentifier('recipient', $mRecipient);
		}
		// send newsletter and store invalid emails
		try {
			$sPlainTextMethod = Settings::getSetting('newsletter_plugin', 'plain_text_alternative_method', 'markdown');
			$oEMail = null;
			if($sPlainTextMethod === null || $sPlainTextMethod === false) {
				$oEMail = new EMail($this->oNewsletter->getSubject(), $oEmailTemplateInstance, true);
			} else {
				$oEMail = new EMail($this->oNewsletter->getSubject(), MIMEMultipart::alternativeMultipartForTemplate($oEmailTemplateInstance, null, null, $sPlainTextMethod), true);
			}
			if(is_object($mRecipient)) {
				$oEMail->addRecipient($mRecipient->getEmail(), $mRecipient->getName());
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