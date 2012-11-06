<?php
/**
 * @package modules.widget
 * @subpackage rapila-plugin-newsletter
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
		$oRichtextWidget = WidgetModule::getWidget('rich_text', null, '', 'newsletter');
		$this->setSetting('rich_text_session', $oRichtextWidget->getSessionKey());
	}
	
	public function setNewsletterId($iNewsletterId) {
		$this->iNewsletterId = $iNewsletterId;
	}
	
	public function loadNewsletterData() {
		if(!$this->iNewsletterId) {
			return null;
		}
		$oNewsletter = NewsletterQuery::create()->findPk($this->iNewsletterId);
		$aResult = $oNewsletter->toArray();
		unset($aResult['NewsletterBody']);
		$aResult['template_options'] = self::getMatchingCustomTemplates();
		$aResult['CreatedInfo'] = Util::formatCreatedInfo($oNewsletter);
		$aResult['UpdatedInfo'] = Util::formatUpdatedInfo($oNewsletter);
		$aResult['SessionUserEmail'] = Session::getSession()->getUser()->getEmail();
		$aResult['HasBeedSent'] = $oNewsletter->countNewsletterMailings() > 0;
		$aResult['newsletter_mailings'] = $this->getNewsletterMailings();
		return $aResult;
	}
	
	private function getNewsletterMailings() {
		$aResult = array();
		$aSubscriberGroups = SubscriberGroupQuery::create()->distinct()->joinNewsletterMailing(null, Criteria::INNER_JOIN)->find();
		foreach($aSubscriberGroups as $oSubscriberGroup) {
			$aNewsletterMailing = NewsletterMailingQuery::create()->filterByNewsletterId($this->iNewsletterId)->filterBySubscriberGroup($oSubscriberGroup)->find();
			$bHasMailing = count($aNewsletterMailing) > 0;
			if($bHasMailing) {
				$aSubscriberGroup = array('UserInitials' => array(), 'DateSent' => array(), 'RecipientCount' => array());
				foreach($aNewsletterMailing as $i => $oNewsletterMailing) {
					// Fill Groupname only once
					if($i === 0) {
						if($oNewsletterMailing->getSubscriberGroupName()) {
							$aSubscriberGroup['MailGroupName'] = $oNewsletterMailing->getSubscriberGroupName();
							$aSubscriberGroup['MailGroupType'] = StringPeer::getString('wns.mail_group.subscribers');
						} else {
							$aSubscriberGroup['MailGroupName'] = $oNewsletterMailing->getMailGroupId();
							$aSubscriberGroup['MailGroupType'] = StringPeer::getString('wns.mail_group.external');
						}
					}
					// Fill all mailing infos
					$aSubscriberGroup['UserInitials'][] = $oNewsletterMailing->getUserRelatedByCreatedBy() ? $oNewsletterMailing->getUserRelatedByCreatedBy()->getInitials() : '';
					$aSubscriberGroup['DateSent'][] = $oNewsletterMailing->getDateSentFormatted('H:i');
					$aSubscriberGroup['RecipientCount'][] = $oNewsletterMailing->getRecipientCount();
				}
				$aResult[] = $aSubscriberGroup;
			}
		}
		return $aResult;
	}
	
	public function duplicateNewsletter($iOriginalId) {
		$oNewsletter = NewsletterQuery::create()->findPk($iOriginalId);
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
		$oNewsletter = NewsletterQuery::create()->findPk($this->iNewsletterId);
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
		$oNewsletter = NewsletterQuery::create()->findPk($this->iNewsletterId);
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
		$oNewsletter = NewsletterQuery::create()->findPk($this->iNewsletterId);
		if($oNewsletter === null) {
			$oNewsletter = new Newsletter();
			$oNewsletter->setCreatedBy(Session::getSession()->getUserId());
			$oNewsletter->setCreatedAt(date('c'));
		}
		// If language is not set (not multilingual), write session language, since it is default language
		$sLanguageId = isset($aNewsletterData['language_id']) ? $aNewsletterData['language_id'] : Session::language();
		$oNewsletter->setLanguageId($sLanguageId);
		$oNewsletter->setTemplateName($aNewsletterData['template_name']);
		$oNewsletter->setSubject($aNewsletterData['subject']);
		$oRichtextUtil = new RichtextUtil();
		$oRichtextUtil->setTrackReferences($oNewsletter);
		$oNewsletter->setNewsletterBody($oRichtextUtil->parseInputFromEditor($aNewsletterData['newsletter_body']));

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
