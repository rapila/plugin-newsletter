<?php

	// include base peer class
	require_once 'model/om/BaseSubscriberGroupPeer.php';

	// include object class
	include_once 'model/SubscriberGroup.php';


/**
 * @package		 model
 */
class SubscriberGroupPeer extends BaseSubscriberGroupPeer {
	
	public static function getBySearch($sSearch=null) {
		$oCriteria = new Criteria();
		if($sSearch !== null) {
			$oCriteria->add(self::NAME, "%$sSearch%", Criteria::LIKE);
		}
		$oCriteria->addAscendingOrderByColumn(self::NAME);
		return self::doSelect($oCriteria);
	}
	
	public static function getSubscriberGroups($bOrderByName = false, $bJoinBySubscribers = false) {
		$oCriteria = new Criteria();
		if($bJoinBySubscribers) {
			$oCriteria->addJoin(self::ID, SubscriberGroupMembershipPeer::SUBSCRIBER_GROUP_ID, Criteria::INNER_JOIN);
		}
		if($bOrderByName) {
			$oCriteria->addAscendingOrderByColumn(self::NAME);
		} else {
			$oCriteria->addAscendingOrderByColumn(self::ID);
		}
		return self::doSelect($oCriteria);
	}
	
	public static function getSubscriberGroupArray() {
		$aResult = array();
		foreach(self::getSubscriberGroups(true) as $oSubscriberGroup) {
			$aResult[$oSubscriberGroup->getId()] = StringPeer::getString('subscriber_group_display_name.'.$oSubscriberGroup->getName(), null, $oSubscriberGroup->getName());
		}
		return $aResult;
	}
	
	public static function getPublicSubscriberGroups() {
		$oCriteria = new Criteria();
		// $oCriteria->add(self::ID, 3, Criteria::LESS_THAN);
		$oCriteria->addAscendingOrderByColumn(self::ID);
		return self::doSelect($oCriteria);
	}
	
	public static function hasPublicSubscriberGroups() {
		return count(self::getPublicSubscriberGroups()) > 0;
	}
	
	public static function hasSubscriberGroups() {
		return self::doCount(new Criteria()) > 0;
	}
	
	/** getAllAssoc()
	* @param boolean inner_join subscriber_group_memberships
	* @param boolean show external and backend_created subscriber groups
	* @param boolean show count
	* @return array assoc for select
	*/
	public static function getAllAssoc($bDoJoinSubscriberMemberships=false, $bIncludeTemporaryMailGroups=true, $bAddMemberShipCount=false) {
		$aResult = array();
		foreach(self::getSubscriberGroups(true, $bDoJoinSubscriberMemberships) as $oSubscriberGroup) {
			$iGroupId = (string) $oSubscriberGroup->getId();
			$sOriginalName = $oSubscriberGroup->getName();
			$iCountMemberships = '';
			$iCountBackendCreated = '';
			
			// add count info if required
			if($bAddMemberShipCount) {
				$iCountMemberships = ' ('.$oSubscriberGroup->countSubscriberGroupMembershipsByIsBackendCreated(false).')';
				$iCountBackendCreated = ' ('.$oSubscriberGroup->countSubscriberGroupMembershipsByIsBackendCreated(true).')';
			}
			
			// display subscriber_group info depending on whether backend created subscriber_group is shown
			if($bIncludeTemporaryMailGroups && $iCountBackendCreated !== '') {
				$aResult[$iGroupId] = $sOriginalName." ".StringPeer::getString('wns.backend_created.original_name_suffix').$iCountMemberships;
			} else {
				$aResult[$iGroupId] = $sOriginalName.$iCountMemberships;
			}
			if($bIncludeTemporaryMailGroups && $iCountBackendCreated !== '') {
				$aResult[$iGroupId.MailGroupInputWidgetModule::BACKEND_CREATED_SUFFIX] = $sOriginalName." ".StringPeer::getString('wns.backend_created.temporary_name_suffix').$iCountBackendCreated;
			}
		}
		return $aResult;
	}
	
	public static function getDefaultSubscriberGroupName() {
		$oDefaultGroup = self::getDefaultSubscriberGroup();
		if($oDefaultGroup) {
			return $oDefaultGroup->getName();
		}
		return null;
	}
	
	public static function getDefaultSubscriberGroupId() {
		$oDefaultGroup = self::getDefaultSubscriberGroup();
		if($oDefaultGroup) {
			return $oDefaultGroup->getId();
		}
		return null;
	}
	
	public static function getDefaultSubscriberGroup() {
		$oCriteria = new Criteria();
		$oCriteria->add(self::IS_DEFAULT, true);
		return self::doSelectOne($oCriteria);
	}
	
	public static function getSubscriberGroupByName($sName) {
		$oCriteria = new Criteria();
		$oCriteria->add(self::NAME, $sName);
		return self::doSelectOne($oCriteria);
	}
		
	public static function defaultIsSet() {
		$oCriteria = new Criteria();
		$oCriteria->add(self::IS_DEFAULT, true);
		return self::doCount($oCriteria) !== 0;
	}

}

