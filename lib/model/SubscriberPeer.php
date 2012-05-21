<?php

	// include base peer class
	require_once 'model/om/BaseSubscriberPeer.php';

	// include object class
	include_once 'model/Subscriber.php';

/**
 * @package		 model
 */
class SubscriberPeer extends BaseSubscriberPeer {
	
	private static $TEMPLATE_LINKS = array( 'default'									=> '?unsubscribe=%s&subscriber_group_id=%s&checksum=%s',
																					'using_subscriber_groups' => '?unsubscribe=%s&checksum=%s'
																					);
	 
	public static function getUnsubscribeQueryTemplate() {
		if(SubscriberGroupPeer::hasSubscriberGroups()) {
			return self::$TEMPLATE_LINKS['default'];
		}
		return self::$TEMPLATE_LINKS['using_subscriber_groups'];
	}
	
	
  public static function addSearchToCriteria($sSearch, $oCriteria) {
		$oSearchCriterion = $oCriteria->getNewCriterion(self::NAME, "%$sSearch%", Criteria::LIKE);
		$oSearchCriterion->addOr($oCriteria->getNewCriterion(self::EMAIL, "%$sSearch%", Criteria::LIKE));
		$oCriteria->add($oSearchCriterion);
	}
	
	public static function getByEmail($sEmail) {
		$oCriteria = new Criteria();
		$oCriteria->add(self::EMAIL, $sEmail);
		return self::doSelectOne($oCriteria);
	}
	
	public static function subscriberExists($sEmail) {
		return self::getByEmail($sEmail) !== null;
	}
	
	public static function getSubscribersBySubscriberGroupMembership($mSubscriberGroupMemberShip=null, $iStart=null, $iLimit=null) {
		$oCriteria = self::getSubscribersBySubscriberGroupMembershipCriteria($mSubscriberGroupMemberShip);
		if($iStart !== null) {
			$oCriteria->setOffset($iStart);
		}
		if($iLimit !== null) {
			$oCriteria->setLimit($iLimit);
		}
		return self::doSelect($oCriteria);
	}
	
	public static function countSubscribersBySubscriberGroupMembership($mSubscriberGroupMemberShip=null) {
		return self::doCount(self::getSubscribersBySubscriberGroupMembershipCriteria($mSubscriberGroupMemberShip));
	}
	
	public static function getSubscribersBySubscriberGroupMembershipCriteria($mSubscriberGroupMemberShip=null) {
		$oCriteria = new Criteria();
		$oCriteria->setDistinct();
		if($mSubscriberGroupMemberShip !== null) {
			$aSubscriberGroupMemberShips = is_array($mSubscriberGroupMemberShip) ? $mSubscriberGroupMemberShip : array($mSubscriberGroupMemberShip);
			$oCriteria->addJoin(SubscriberPeer::ID, SubscriberGroupMembershipPeer::SUBSCRIBER_ID, Criteria::INNER_JOIN);
			$oCriteria->add(SubscriberGroupMembershipPeer::SUBSCRIBER_GROUP_ID, $aSubscriberGroupMemberShips, Criteria::IN);
			$oCriteria->add(SubscriberGroupMembershipPeer::OPT_IN_HASH, null, Criteria::ISNULL);
		}
		return $oCriteria;
	}
}

