<?php
/**
 * @package modules.file
 */
class DisplayNewsletterFileModule extends FileModule {
	
	protected $oNewsletter;
	protected $oMailing;
	
	public function __construct($aRequestPath) {
		parent::__construct($aRequestPath);
		
		$sBase = Manager::usePath();
		$iId = Manager::usePath();
		
		if($sBase === 'newsletter') {
			$this->oNewsletter = NewsletterPeer::retrieveByPK($iId);
			if($this->oNewsletter === null) {
				throw new Exception('No such newsletter exists');
			}
		} else if ($sBase === 'mailing') {
			$this->oMailing = NewsletterMailingPeer::retrieveByPK($iId);
			if($this->oMailing === null) {
				throw new Exception('No such mailing exists');
			}
			$this->oNewsletter = $this->oMailing->getNewsletter();
		}
	}

	public function renderFile() {
		$oOutput = new XHTMLOutput(XHTMLOutput::SETTING_HTML_4_TRANSITIONAL, true, null, $this->oNewsletter->getLanguageId());
		$oOutput->render();

		$oNewsletterTemplate = new Template('main_display', array(DIRNAME_TEMPLATES, 'newsletter'), false, true);

		$oNewsletterTemplate->replaceIdentifier('newsletter_template_css', new Template("{$this->oNewsletter->getTemplateName()}.css", array(DIRNAME_TEMPLATES, 'newsletter')));

		$oNewsletterContent = RichtextUtil::parseStorageForFrontendOutput(stream_get_contents($this->oNewsletter->getNewsletterBody()));
		if(ResourceFinder::findResource(array(DIRNAME_TEMPLATES, NewsletterDetailWidgetModule::NEWSLETTER_DIRNAME, "{$this->oNewsletter->getTemplateName()}.body.tmpl")) !== null) {
			$oNewsletterTemplate->replaceIdentifier('newsletter_content', new Template("{$this->oNewsletter->getTemplateName()}.body", array(DIRNAME_TEMPLATES, NewsletterDetailWidgetModule::NEWSLETTER_DIRNAME)), null, Template::LEAVE_IDENTIFIERS);
		}
		$oNewsletterTemplate->replaceIdentifier('newsletter_content', $oNewsletterContent, null, Template::LEAVE_IDENTIFIERS);
		$oNewsletterTemplate->replaceIdentifier('language', $this->oNewsletter->getLanguageId());
		if($this->oMailing !== null) {
			$oNewsletterTemplate->replaceIdentifier('newsletter_date', LocaleUtil::localizeDate($this->oMailing->getDateSent(null)->getTimestamp(), $this->oNewsletter->getLanguageId()));
			$oNewsletterTemplate->replaceIdentifier('newsletter_timestamp', $this->oMailing->getDateSent(null)->getTimestamp());
		} else {
			$oNewsletterTemplate->replaceIdentifier('newsletter_date', LocaleUtil::localizeDate($this->oNewsletter->getCreatedAt(null)->getTimestamp(), $this->oNewsletter->getLanguageId()));
			$oNewsletterTemplate->replaceIdentifier('newsletter_timestamp', $this->oNewsletter->getCreatedAt(null)->getTimestamp());
		}
		$oNewsletterTemplate->replaceIdentifier('recipient', StringPeer::getString('wns.newsletter.recipient', $this->oNewsletter->getLanguageId()));
		$oNewsletterTemplate->replaceIdentifier('subject', $this->oNewsletter->getSubject());

		$oNewsletterTemplate->render();
	}
}
