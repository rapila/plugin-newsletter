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
	
	// Display the name even if it does not exist
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
	
	// Alias of hasSubscriberGroupMembership
	public function hasNewsletterBySubscriberGroupId($iSubscriberGroup) {
		return $this->hasSubscriberGroupMembership($iSubscriberGroup);
	}
	
	public function hasSubscriberGroupMembership($iSubscriberGroup) {
		if($iSubscriberGroup instanceof SubscriberGroup) {
			$iSubscriberGroup = $iSubscriberGroup->getId();
		}
		return SubscriberGroupMembershipQuery::create()->findPk(array($this->getId(), $iSubscriberGroup)) !== null;
	}
	
	public function addSubscriberGroupMembershipBySubscriberGroupId($iSubscriberGroupId) {
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

