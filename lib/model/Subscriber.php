<?php

require_once 'model/om/BaseSubscriber.php';

/**
 * @package		 model
 */
class Subscriber extends BaseSubscriber {

	public function getSubscribedGroupIds($bWithKeyAsValue=true) {
		$aResult = array();
		foreach($this->getSubscriberGroupMemberships() as $oMembership) {
			if($bWithKeyAsValue) {
				$aResult[$oMembership->getSubscriberGroupId()] = $oMembership->getSubscriberGroupId();
			} else {
				$aResult[] = $oMembership->getSubscriberGroupId();
			}
		}
		return $aResult;
	}
	
	public function getHasNewsletter() {
		return !$this->isNew();
	}
	
	public function hasNewsletterBySubscriberGroupId($iSubscriberGroupId) {
		if($iSubscriberGroupId instanceof SubscriberGroup) {
			$iSubscriberGroupId = $iSubscriberGroupId->getId();
		}
		foreach($this->getSubscriberGroupMemberships() as $oSubscriberGroupMembership) {
			if($oSubscriberGroupMembership->getSubscriberGroupId() == $iSubscriberGroupId) {
				return true;
			}
		}
		return false;
	}
	
	public function setHasNewsletter($bHasNewsletter) {
		if($bHasNewsletter) {
			// only needs to be saved if is news
			if($this->isNew()) {
				$this->save();
			}
		} else {
			if(!$this->isNew()) {
				$this->delete();
			}
		}
	}
	
	/**
	 * @param array of subscriber_group_ids
	 * @return void
	 * usage: only for requests that are supposed to handle all the subscriptions
	 *				if you just want to add a subscription from a simple newsletter subscribe form, use addSubscriberGroupMembershipIfNotExists()
	 */
	public function setHasNewsletterBySubscriberGroupIds($aSubscriberGroupIds) {
		// in case there are no subscriptions
		if(count($aSubscriberGroupIds) === 0 && !$this->isNew()) {
			$this->delete();
			return;
		}
		// remove all
		foreach($this->getSubscriberGroupMemberships() as $oSubscriberGroupMembership) {
			$oSubscriberGroupMembership->delete();
		}
		// create new
		foreach($aSubscriberGroupIds as $iSubscriberGroupId) {
			$this->addSubscriberGroupMembershipBySubscriberGroupId($iSubscriberGroupId);
		}
		$this->save();	
	}
	
	// display the name even if it does not exist
	public function getName() {
		if(parent::getName() != null) {
			return parent::getName();
		}
		return $this->getEmail();
	}
	
	/**
	 * @param integer subscriber_group_id
	 * @return void
	 * description: 
	 * if subscriber_group is numeric, the single subsciption is deleted [and the subscriber in case there are no subscriptions left]
	 * if subscriber_group is __all then the subscriber and all subscriptions are deleted directly
	 */
	public function deleteSubscriberGroupMembership($iSubscriberGroupId) {
		if($iSubscriberGroupId === CriteriaListWidgetDelegate::SELECT_ALL) {
			return $this->delete();
		}
		foreach($this->getSubscriberGroupMemberships() as $oSubscriberGroupMembership) {
			if($iSubscriberGroupId == $oSubscriberGroupMembership->getSubscriberGroupId()) {
				$oSubscriberGroupMembership->delete();
			}
		}
		if($this->countSubscriberGroupMemberships() === 0) {
			$this->delete();
		}
	}
	
	/**
	 * @param integer subscriber_group_id
	 * @return void
	 * usage: for adding subscriptions without touching the others @see setHasNewsletterBySubscriberGroupIds()
	 */
	public function addSubscriberGroupMembershipIfNotExists($iSubscriberGroupId) {
		$bSubscriberGroupMembershipExists = false;
		foreach($this->getSubscriberGroupMemberships() as $oSubscriberGroupMembership) {
			if($iSubscriberGroupId == $oSubscriberGroupMembership->getSubscriberGroupId()) {
				$bSubscriberGroupMembershipExists = true;
			}
		} 
		if($bSubscriberGroupMembershipExists === false) {
			return $this->addSubscriberGroupMembershipBySubscriberGroupId($iSubscriberGroupId);
		}
	}
	
	private function addSubscriberGroupMembershipBySubscriberGroupId($iSubscriberGroupId) {
		$oSubscriberGroupMembership = new SubscriberGroupMembership();
		$oSubscriberGroupMembership->setSubscriberGroupId($iSubscriberGroupId);
		if(Settings::getSetting('newsletter_plugin', 'opting_confirmation_required', true)) {
			$oSubscriberGroupMembership->setOptInHash($this->getOptInChecksum($iSubscriberGroupId));
		}
		return $this->addSubscriberGroupMembership($oSubscriberGroupMembership);
	}
		
	public function getUnsubscribeChecksum() {
		return md5($this->getEmail().$this->getCreatedAt());
	}
	
	public function getOptInChecksum($iSubscriberGroupId) {
		return self::getOptInChecksumByEmailAndSubscriberGroupId($this->getEmail(), $iSubscriberGroupId);
	}
	
	public static function getOptInChecksumByEmailAndSubscriberGroupId($sEmail, $iSubscriberGroupId) {
		return md5($sEmail.$iSubscriberGroupId);
	}
	
	public function getUnsubscribeQueryParams() {
		$aParameters = array();
		$aParameters['unsubscribe'] = $this->getEmail();
		$aParameters['checksum'] = $this->getUnsubscribeChecksum();
		return $aParameters;
	}
	
}

