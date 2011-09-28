<?php
/**
 * @package modules.widget
 */
class NewsletterDetailWidgetModule extends PersistentWidgetModule {
	private $sLanguageId = null;
	private $iNewsletterId;
	private $iBatchSize = 50;

	const NEWSLETTER_DIRNAME = 'newsletter';
	const DEFAULT_TEMPLATE_NAME = 'default';
	const CSS_TEMPLATE_SUFFIX = '.css';
	const CONTENT_TEMPLATE_SUFFIX = '.content';

	public function __construct($sSessionKey = null) {
		parent::__construct($sSessionKey);
		$oRichtextWidget = WidgetModule::getWidget('rich_text', null, '', 'newsletter_plugin');
		$this->setSetting('rich_text_session', $oRichtextWidget->getSessionKey());
	}
	
	public function setNewsletterId($iNewsletterId) {
		$this->iNewsletterId = $iNewsletterId;
	}
	
	public function getNewsletterData() {
		$oNewsletter = NewsletterPeer::retrieveByPK($this->iNewsletterId);
		$aResult = $oNewsletter->toArray();
		unset($aResult['NewsletterBody']);
		$aResult['template_options'] = self::getMatchingCustomTemplates();
		$aResult['CreatedInfo'] = Util::formatCreatedInfo($oNewsletter);
		$aResult['UpdatedInfo'] = Util::formatUpdatedInfo($oNewsletter);
		$aResult['SessionUserEmail'] = Session::getSession()->getUser()->getEmail();
		$aResult['HasBeedSent'] = $oNewsletter->countNewsletterMailings() > 0;
		$aNewsletterMailings = array();
		$oCriteria = new Criteria();
		$oCriteria->addDescendingOrderByColumn(NewsletterMailingPeer::DATE_SENT);
		foreach($oNewsletter->getNewsletterMailings($oCriteria) as $oNewletterMailing) {
			$aNewsletterMailingInfo = array();
			$aNewsletterMailingInfo['UserInitials'] = $oNewletterMailing->getUserRelatedByCreatedBy() ? $oNewletterMailing->getUserRelatedByCreatedBy()->getInitials() : '';
			$aNewsletterMailingInfo['DateSent'] = $oNewletterMailing->getDateSentFormatted('h:m');
			if($oNewletterMailing->getSubscriberGroupName()) {
				$aNewsletterMailingInfo['MailGroupName'] = $oNewletterMailing->getSubscriberGroupName();
				$aNewsletterMailingInfo['MailGroupType'] = StringPeer::getString('wns.mail_group.subscribers');
			} else {
				$aNewsletterMailingInfo['MailGroupName'] = $oNewletterMailing->getMailGroupId();
				$aNewsletterMailingInfo['MailGroupType'] = StringPeer::getString('wns.mail_group.external');
			}
			$aNewsletterMailings[] = $aNewsletterMailingInfo;
		}
		$aResult['newsletter_mailings'] = $aNewsletterMailings;
		return $aResult;
	}
	
	public function duplicateNewsletter($iOriginalId) {
		$oNewsletter = NewsletterPeer::retrieveByPK($iOriginalId);
		if($oNewsletter) {
			$oNewNewsletter = new Newsletter();
			$oNewNewsletter->setSubject('[Copy] '. $oNewsletter->getSubject());
			$oNewNewsletter->setNewsletterBody($oNewsletter->getNewsletterBody());
			$oNewNewsletter->setLanguageId($oNewsletter->getLanguageId());
			$oNewNewsletter->setIsHtml($oNewsletter->getIsHtml());
			$oNewNewsletter->setTemplateName($oNewsletter->getTemplateName());
			$oNewNewsletter->save();
			return $oNewNewsletter->getId();
		}
	}
	
	public function getNewsletterBody($sTemplateName = null) {
		if($sTemplateName) {
			return self::getNewsletterBodyTemplateByName($sTemplateName)->__toString();
		}
		$oNewsletter = NewsletterPeer::retrieveByPK($this->iNewsletterId);
		if($oNewsletter !== null && $oNewsletter->getNewsletterBody() !== null) {
			return RichtextUtil::parseStorageForBackendOutput(stream_get_contents($oNewsletter->getNewsletterBody()))->__toString();
		} else if($oNewsletter !== null) {
			$sTemplateName = $oNewsletter->getTemplateName();
			return self::getNewsletterBodyTemplateByName($sTemplateName)->__toString();
		}
		return null;
	}
	
	public function newsletterContentCss($sTemplateName = null) {
		if($sTemplateName) {
			return self::getNewsletterCssTemplateByName($sTemplateName)->render();
		}
		$oNewsletter = NewsletterPeer::retrieveByPK($this->iNewsletterId);
		if($oNewsletter !== null) {
			$sTemplateName = $oNewsletter->getTemplateName();
			return self::getNewsletterCssTemplateByName($sTemplateName)->render();
		}
		return null;
	}
	
	public static function getNewsletterCssTemplateByName($sTemplateName=null) {
		return self::getTemplateByNameAndType($sTemplateName, self::CSS_TEMPLATE_SUFFIX);
	}
	
	public static function getNewsletterBodyTemplateByName($sTemplateName=null) {
		return self::getTemplateByNameAndType($sTemplateName, self::CONTENT_TEMPLATE_SUFFIX);
	}
	
	public static function getTemplateByNameAndType($sTemplateName, $sType=self::CONTENT_TEMPLATE_SUFFIX) {
		if($sTemplateName === null) {
			$sTemplateName = self::DEFAULT_TEMPLATE_NAME;
		}
		return new Template($sTemplateName.$sType, array(DIRNAME_TEMPLATES, 'newsletter'));
	}

	public function getMatchingCustomTemplates($aPostfix = array(self::CONTENT_TEMPLATE_SUFFIX, self::CSS_TEMPLATE_SUFFIX)) {
		$aMatchingTemplates = array();
		$aTemplateList = ResourceFinder::findResourcesByExpressions(array(DIRNAME_TEMPLATES, self::NEWSLETTER_DIRNAME, '/.+.content.tmpl/'));
		foreach($aTemplateList as $sTemplateShortPath => $sTemplatePath) {
			$sTemplateName = substr($sTemplateShortPath, 0, -strlen(self::CONTENT_TEMPLATE_SUFFIX.'.tmpl'));
			$sTemplateName = substr($sTemplateName, strlen(DIRNAME_TEMPLATES.'/'.self::NEWSLETTER_DIRNAME.'/'));
			if(ResourceFinder::findResource(array(DIRNAME_TEMPLATES, self::NEWSLETTER_DIRNAME, "$sTemplateName.css.tmpl")) !== null) {
				$aMatchingTemplates[$sTemplateName] = $sTemplateName;
			}
		}
		return $aMatchingTemplates;
	}

	private function validate($aNewsletterData, $oNewsletter) {
		$oFlash = Flash::getFlash();
		$oFlash->setArrayToCheck($aNewsletterData);
		$oFlash->checkForValue('subject', 'subject_required');
		$oFlash->checkForValue('template_name', 'template_required');
		$oFlash->finishReporting();
	}
	
	public function saveData($aNewsletterData) {
		$oNewsletter = NewsletterPeer::retrieveByPK($this->iNewsletterId);
		if($oNewsletter === null) {
			$oNewsletter = new Newsletter();
			$oNewsletter->setCreatedBy(Session::getSession()->getUserId());
			$oNewsletter->setCreatedAt(date('c'));
		}
		// if language is not set (not multilingual), write session language, since it is default language, i guess
		$sLanguageId = isset($aNewsletterData['language_id']) ? $aNewsletterData['language_id'] : Session::language();
		$oNewsletter->setLanguageId($sLanguageId);
		$oNewsletter->setTemplateName($aNewsletterData['template_name']);
		$oNewsletter->setSubject($aNewsletterData['subject']);
		$oRichtextUtil = new RichtextUtil();
		$oRichtextUtil->setTrackReferences($oNewsletter);
		$oNewsletter->setNewsletterBody($oRichtextUtil->parseInputFromMce($aNewsletterData['newsletter_body']));

		$this->validate($aNewsletterData, $oNewsletter);
		if(!Flash::noErrors()) {
			throw new ValidationException();
		}
		if(isset($aNewsletterData['is_approved'])) {
		  $oNewsletter->setIsApproved($aNewsletterData['is_approved']);
		}
		if(isset($aNewsletterData['template_name'])) {
		  $oNewsletter->setTemplateName($aNewsletterData['template_name']);
		}
		return $oNewsletter->save();
	}
}
