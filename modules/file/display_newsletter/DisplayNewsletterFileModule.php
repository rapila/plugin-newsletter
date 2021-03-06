<?php
/**
 * @package modules.file
 * @subpackage rapila-plugin-newsletter
 */
class DisplayNewsletterFileModule extends FileModule {

	protected $oNewsletter;
	protected $oMailing;

	public function __construct($aRequestPath) {
		parent::__construct($aRequestPath);

		$sBase = Manager::usePath();
		$iId = Manager::usePath();

		// Base path "newsletter" > display newsletter
		if($sBase === 'newsletter') {
			$iId = is_numeric($sBase) ? $sBase : $iId;
			$this->oNewsletter = NewsletterQuery::create()->findPk($iId);
			if($this->oNewsletter === null) {
				throw new Exception('No such newsletter exists');
			}
		}
		// Base path "mailing" > display newsletter by calling related newsletter mailing id
		else if ($sBase === 'mailing') {
			$this->oMailing = NewsletterMailingQuery::create()->findPk($iId);
			if($this->oMailing === null) {
				throw new Exception('No such mailing exists');
			}
			$this->oNewsletter = $this->oMailing->getNewsletter();
		}
		// Fallback numeric base for direct access to newsletter
		elseif(is_numeric($sBase)) {
			$this->oNewsletter = NewsletterQuery::create()->findPk($sBase);
		}

		// Throw exception if no newsletter is found
		if($this->oNewsletter === null) {
			throw new Exception('Error in DisplayNewsletterFileModule::__construct(): No such newsletter exists');
		}

		// Optional handling of authentication
		FilterModule::getFilters()->handleNewsletterDisplayRequested($this->oNewsletter);
	}

	/**
	* renderFile()
	* @return string xhtml output
	*/
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
		$oNewsletterTemplate->replaceIdentifier('recipient', TranslationPeer::getString('wns.newsletter.recipient', $this->oNewsletter->getLanguageId()));
		$oNewsletterTemplate->replaceIdentifier('subject', $this->oNewsletter->getSubject());

		$oNewsletterTemplate->render();
	}
}
