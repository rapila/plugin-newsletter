<?php

	// include base peer class
	require_once 'model/om/BaseNewsletterMailingPeer.php';

	// include object class
	include_once 'model/NewsletterMailing.php';


/**
 * @package		 model
 */
class NewsletterMailingPeer extends BaseNewsletterMailingPeer {

	public static function getAll($sSearch=null) {
		$oCriteria = new Criteria();
		$oCriteria->addDescendingOrderByColumn(self::DATE_SENT);
		return self::doSelect($oCriteria);
	}
	
	public static function getMailingNewsletterIdAndBySubscriberGroupId($iNewsletterId, $iSubscriberGroupId, $bCountOnly = false) {
		$oCriteria = new Criteria();
		$oCriteria->add(self::NEWSLETTER_ID, $iNewsletterId);
		$oCriteria->add(self::SUBSCRIBER_GROUP_ID, $iSubscriberGroupId);
		if($bCountOnly) {
			return self::doCount($oCriteria);
		}
		return self::doSelect($oCriteria);
	}
	
	public static function newsletterIsAlreadySent($iNewsletterId, $iSubscriberGroupId) {
		return self::getMailingNewsletterIdAndBySubscriberGroupId($iNewsletterId, $iSubscriberGroupId, true) > 0;
	}
	
	public static function getMailingByDateAndGroup($sDate, $iGroup=null) {
		$oCriteria = new Criteria();
		if($iGroup) {
			$oCriteria->add(self::SUBSCRIBER_GROUP_ID, $iGroup);
		}
		$sCustomSql = 'DATE('.self::DATE_SENT.') = '.$sDate;
		$oCriteria->add(self::DATE_SENT, $sCustomSql, Criteria::CUSTOM);
		return self::doSelect($oCriteria);
	}
	
	public static function hasMailingsForExternalMailGroup() {
		$oCriteria = new Criteria();
		$oCriteria->add(self::EXTERNAL_MAIL_GROUP_ID, null, Criteria::ISNOTNULL);
		return self::doCount($oCriteria) > 0;
	}
	
}

