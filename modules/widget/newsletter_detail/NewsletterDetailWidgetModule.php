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
		return $aResult;
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
		$aTemplateList = ResourceFinder::findResourceByExpressions(array(DIRNAME_TEMPLATES, self::NEWSLETTER_DIRNAME, '/.+.content.tmpl/'));
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
		$oNewsletter->setLanguageId($aNewsletterData['language_id']);
		$oNewsletter->setTemplateName($aNewsletterData['template_name']);
		$oNewsletter->setSubject($aNewsletterData['subject']);
		$oNewsletter->setNewsletterBody(RichtextUtil::parseInputFromMceForStorage($aNewsletterData['newsletter_body']));

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