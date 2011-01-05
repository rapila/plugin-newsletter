<?php

require_once 'model/om/BaseSubscriberGroupMembership.php';


/**
 * @package    model
 */
class SubscriberGroupMembership extends BaseSubscriberGroupMembership {
  
  // returns a hash of ids for unsubscribe verification
  public function getUnsubscriptionVerifiction() {
    return md5($this->subscriber_id.$this->subscriber_group_id);
  }
  
}

