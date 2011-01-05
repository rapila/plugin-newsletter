<?php

  // include base peer class
  require_once 'model/om/BaseNewsletterPeer.php';

  // include object class
  include_once 'model/Newsletter.php';

/**
 * @package    model
 */
class NewsletterPeer extends BaseNewsletterPeer {
  
  public static function getBySubjectSearch($sSearch=null, $sOrderField='created_at', $sSortOrder='desc') {
    $oCriteria = new Criteria();
    $oCriteria->add(self::SUBJECT, "%$sSearch%", Criteria::LIKE);
    Util::addSortColumn($oCriteria, constant('self::'.strtoupper($sOrderField)), $sSortOrder);
    if($sOrderField != 'SUBJECT') {
      $oCriteria->addAscendingOrderByColumn(self::SUBJECT);
    }
    return self::doSelect($oCriteria);
  }
  
  public static function addSearchToCriteria($sSearch, $oCriteria) {
    $oCriteria->add(self::SUBJECT, "%$sSearch%", Criteria::LIKE);
  }

  public static function getRecentNewsletters($iLimit=10, $bCountOnly=false) {
    $oCriteria = new Criteria();
    $oCriteria->addDescendingOrderByColumn(self::CREATED_AT);
    $oCriteria->addAscendingOrderByColumn(self::SUBJECT);
    $oCriteria->setLimit($iLimit);
    if($bCountOnly) {
      return self::doCount($oCriteria);
    }
    return self::doSelect($oCriteria);
  }
  
  public static function getUnsentNewsletters() {
    $oCriteria = new Criteria();
    $oCriteria->addDescendingOrderByColumn(self::CREATED_AT);
    $oCriteria->addAscendingOrderByColumn(self::SUBJECT);
    $oCriteria->addJoin(self::ID, NewsletterMailingPeer::NEWSLETTER_ID, Criteria::LEFT_JOIN);
    $oCriteria->add(NewsletterMailingPeer::NEWSLETTER_ID, null, Criteria::ISNULL);
    return self::doSelect($oCriteria);
  }
  
  public static function getNewslettersWithSentInfo($iLimit = 10) {
    $oCriteria = new Criteria();
    $oCriteria->addDescendingOrderByColumn(self::CREATED_AT);
    $oCriteria->addAscendingOrderByColumn(self::SUBJECT);
    $oCriteria->addJoin(self::ID, NewsletterMailingPeer::NEWSLETTER_ID, Criteria::LEFT_JOIN);
    $oCriteria->setLimit($iLimit);
    $aResult = array();
    foreach(self::doSelect($oCriteria) as $oNewsletter) {
      $oNewsletterName = '['.$oNewsletter->getCreatedAt('Y-m-d').'] '. $oNewsletter->getSubject();
      $aSentFirstletters = array();
      if($oNewsletter->hasNewsletterMailings()) {
        foreach($oNewsletter->getNewsletterMailings() as $oNewsletterMailing) {
          if($oNewsletterMailing->getSubscriberGroup()) {
            $aSentFirstletters[] = $oNewsletterMailing->getSubscriberGroup()->getNameFirstLetter();
          } elseif($oNewsletterMailing->getExternalMailGroupId()) {
            $aSentFirstletters[] = 'Ext';
					}
        }
        if(count($aSentFirstletters) > 0) {
          $oNewsletterName .= ' ['.StringPeer::getString('newsletter_mailing.sent_info').' '.implode(', ', $aSentFirstletters).']';
        }
      } 
      $aResult[$oNewsletter->getId()] = $oNewsletterName;
    }
    return $aResult;
  }

}
