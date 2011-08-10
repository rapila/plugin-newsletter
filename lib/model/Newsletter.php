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
	
	public function getDisplayLink() {
		return LinkUtil::link(array('display_newsletter', 'newsletter', $this->getId()), 'FileManager');
	}
	
	public function hasNewsletterMailings() {
		return $this->countNewsletterMailings() > 0;
	}

	public function getGroupSentTo() {
		$aResult = array();
		$oCriteria = new Criteria();
		$oCriteria->addJoin(NewsletterMailingPeer::SUBSCRIBER_GROUP_ID, SubscriberGroupPeer::ID, Criteria::INNER_JOIN);
		$oCriteria->addAscendingOrderByColumn(NewsletterMailingPeer::SUBSCRIBER_GROUP_ID);
		foreach($this->getNewsletterMailings($oCriteria) as $oMailing) {
			if($oMailing->getSubscriberGroupName()) {
				$aResult[] = $oMailing->getSubscriberGroupName();
			}
		}
		$iCount = count($aResult);
		if($iCount === 1) return $aResult[0];
		if($iCount === 0) return null;
		return $aResult[0]. ' (+'.($iCount-1).')';
	}
	
	public function getLastSent($oMailing = null) {
		if($oMailing === null) {
			$oMailing = $this->getFirstMailing();
		}
		if($oMailing !== null) {
			return $oMailing->getDateSent(null)->getTimestamp();
		}
		return $this->getCreatedAt(null)->getTimestamp();
	}
	
	public function getLastSentLocalized($sFormat = 'x') {
		return LocaleUtil::localizeDate($this->getLastSent(), null, $sFormat);
	}
	
	public function getFirstMailing() {
		return NewsletterMailingQuery::create()->filterByNewsletter($this)->orderByCreatedAt()->findOne();
	}
	
	public function getSendTest() {
		return true;
	}
	
}

