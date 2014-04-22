<?php

require_once 'model/om/BaseNewsletter.php';

/**
 * @package		 model
 */
class Newsletter extends BaseNewsletter {
	
	// Alias for automatic parseTree nameForObject
	public function getName($iLength=35) {
		return StringUtil::truncate($this->getSubject(), $iLength);
	}
	
	public function getNameWithDate() {
		$sDate = $this->getUpdatedAt() != null ? '['.$this->getUpdatedAt('Y-m-d').'] ': '';
		return $sDate.$this->getName();
	}
	
	public function getLanguageName() {
		return LanguageInputWidgetModule::getLanguageName($this->getLanguageId());
	}
	
	public function getDisplayLink() {
		return LinkUtil::link(array('display_newsletter', 'newsletter', $this->getId()), 'FileManager');
	}
	
	public function hasNewsletterMailings() {
		return $this->countNewsletterMailings() > 0;
	}

	public function getGroupSentTo() {
		$oQuery = NewsletterMailingQuery::create()->joinSubscriberGroup(null, Criteria::INNER_JOIN)->orderBySubscriberGroupId();
		$aResult = array();
		foreach($this->getNewsletterMailings($oQuery) as $oMailing) {
			if($oMailing->getSubscriberGroupName()) {
				$aResult[] = $oMailing->getSubscriberGroupName();
			}
		}
		$iCount = count($aResult);
		if($iCount === 1) return $aResult[0];
		if($iCount === 0) return null;
		return $aResult[0]. ' (+'.($iCount-1).')';
	}
	
	public function getLastSent() {
		if($oMailing = $this->getLastMailing()) {
			return $oMailing->getDateSent(null)->getTimestamp();
		}
		return null;
	}
	
	public function getLastSentLocalized($sFormat = 'x') {
		if($this->getLastSent() != null) {
			return LocaleUtil::localizeDate($this->getLastSent(), null, $sFormat);
		}
		return null;
	}
	
	public function getLastMailing() {
		return NewsletterMailingQuery::create()->filterByNewsletter($this)->orderByCreatedAt(Criteria::DESC)->findOne();
	}
	
	/**
	* dummy method for placeholder column for test widget link
	*/
	public function getSendTest() {
		return true;
	}
	
}

