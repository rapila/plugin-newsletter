<?php
class SubscriberImportWidgetModule extends PersistentWidgetModule {
	
	const GENERATED_PREFIX = 'Imported-';
	public function __construct($sSessionKey = null) {
		parent::__construct($sSessionKey);
	}
	
	/** addSubscibers()
	* @param array of email addresses to be added, if they don't exist
	* @param string number of target subscriber group
	* description:
	* • subscribers are added if they don't exist
	* • subscriber_group_membership is added if it does'nt exist
	*
	* @return array of integer received all / actually added
	*/
	public function addSubscibers($aSubscribers, $mTargetSubscriberGroup) {
		$sSubscribers = '';
		$aTargetSubscriberGroups = is_array($mTargetSubscriberGroup) ? $mTargetSubscriberGroup : array($mTargetSubscriberGroup);
		
		// if is string it has not been processed and validated by js
		if(is_string($aSubscribers)) {
			// preg_match_all, use
			$sSubscribers = trim($aSubscribers);$aSubscribers = array();
			$sSubscribers = preg_replace_callback('/'.Flash::$EMAIL_CHECK_PATTERN.'/', function($aMatches) use (&$aSubscribers) {
				$aSubscribers[] = $aMatches[0];
				return '';
			}, $sSubscribers);
		}
		$aSubscribers = array_unique($aSubscribers);
		$iCountAll = count($aSubscribers);
		$iMembershipsAdded = 0;
		
		// @todo check change jm
		// always add temporary groups with all importet subscribers
		$oSubscriberGroup = new SubscriberGroup();
		$oSubscriberGroup->setName(self::GENERATED_PREFIX.date('Ymd-Hs'));
		$oSubscriberGroup->save();
		array_push($aTargetSubscriberGroups, $oSubscriberGroup->getId());
		
		foreach($aSubscribers as $sEmail) {
			$oSubscriber = SubscriberQuery::create()->filterByEmail($sEmail)->findOne();
			
			// create new if subscriber does not exist and email is correct
			if($oSubscriber === null) {
				$oSubscriber = new Subscriber();
				$oSubscriber->setEmail($sEmail);
				$oSubscriber->setName($sEmail);
			}
			// add subscriber_group_membership if a subscriber exists and no subscriber_group_membership exists
			if($oSubscriber !== null) {
				$bHasMemberShip = false;
				// @todo check change jm > handle multiple groups including generated one
				// please check meaning and function of counting new subscriptions, only one is counted per subsriber $iMembershipsAdded
				foreach($aTargetSubscriberGroups as $iSubscriberGroupId) {
					if(!$oSubscriber->hasNewsletterBySubscriberGroupId((int) $iSubscriberGroupId)) {
						$bHasMemberShip = true;
						$oSubscriberGroupMembership = new SubscriberGroupMembership();
						$oSubscriberGroupMembership->setSubscriberGroupId($iSubscriberGroupId);
						$oSubscriber->addSubscriberGroupMembership($oSubscriberGroupMembership);
					}
				}
				if($bHasMemberShip) {
					$iMembershipsAdded++;
				}
				$oSubscriber->save();
			}
		}
		return array('all' => $iCountAll, 'added' => $iMembershipsAdded, 'text' => $sSubscribers);
	}
}