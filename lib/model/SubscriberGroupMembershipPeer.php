<?php

  // include base peer class
  require_once 'model/om/BaseSubscriberGroupMembershipPeer.php';

  // include object class
  include_once 'model/SubscriberGroupMembership.php';


/**
 * @package    model
 */
class SubscriberGroupMembershipPeer extends BaseSubscriberGroupMembershipPeer {

	public static function mayOperateOn($oUser, $mObject, $sOperation) {
		return SubscriberPeer::mayOperateOn($oUser, $mObject->getSubscriber(), $sOperation);
	}

}

