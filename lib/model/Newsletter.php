<?php

require_once 'model/om/BaseNewsletter.php';

/**
 * @package		 model
 */
class Newsletter extends BaseNewsletter {
	
	// alias for automatic parseTree nameForObject
	public function getName($iLength=35) {
		return StringUtil::truncate($this->getSubject(), $iLength);
	}
	
	public function getNameWithDate() {
		$sDate = $this->getUpdatedAt() != null ? '['.$this->getUpdatedAt('Y-m-d').'] ': '';
		return $sDate.$this->getName();
	}
	
	public function hasNewsletterMailings() {
		return $this->countNewsletterMailings() > 0;
	}

	public function getGroupSentTo() {
		$aResult = array();
		foreach($this->getNewsletterMailings() as $oMailing) {
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
		$aMailings = $this->getNewsletterMailings();
		$iCount = count($aMailings);
		if($iCount > 0) {
			LocaleUtil::localizeDate($aMailings[$iCount-1]->getDateSent('c'));
		}
		return null;
	}
	
}

