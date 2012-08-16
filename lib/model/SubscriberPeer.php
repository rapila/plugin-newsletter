<?php

	// include base peer class
	require_once 'model/om/BaseSubscriberPeer.php';

	// include object class
	include_once 'model/Subscriber.php';

/**
 * @package		 model
 */
class SubscriberPeer extends BaseSubscriberPeer {	
	
  public static function addSearchToCriteria($sSearch, $oCriteria) {
		$oSearchCriterion = $oCriteria->getNewCriterion(self::NAME, "%$sSearch%", Criteria::LIKE);
		$oSearchCriterion->addOr($oCriteria->getNewCriterion(self::EMAIL, "%$sSearch%", Criteria::LIKE));
		$oCriteria->add($oSearchCriterion);
	}
}

