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
	
	public static function getSubscriberGroups($bOrderByName = false, $bJoinBySubscribers = false, $bIncludeGeneratedMailGroups = true) {
		$oQuery = SubscriberGroupQuery::create();
		if($bJoinBySubscribers) {
			$oQuery->joinSubscriberGroupMembership();
		}
		if($bOrderByName) {
			$oQuery->orderByName();
		} else {
			$oQuery->orderById();
		}
		// @todo check change jm
		if($bIncludeGeneratedMailGroups === false) {
			$oQuery->filterByDisplayName(null, Criteria::ISNOTNULL);
		}
		return $oQuery->find();
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
	* @param boolean show external mail groups
	* @param boolean show count
	* @return array assoc for select
	*/
	public static function getAllAssoc($bDoJoinSubscriberMemberships=false, $bAddMemberShipCount=false, $bIncludeGeneratedMailGroups=true) {
		$aResult = array();
		foreach(self::getSubscriberGroups(true, $bDoJoinSubscriberMemberships, $bIncludeGeneratedMailGroups) as $oSubscriberGroup) {
			$iGroupId = (string) $oSubscriberGroup->getId();
			$iCountMembershipsAddon = '';
			
			// Add membership count info if required
			if($bAddMemberShipCount) {
				$iCountMembershipsAddon = ' ('.$oSubscriberGroup->countSubscriberGroupMemberships().')';
			}
			$aResult[$iGroupId] = $oSubscriberGroup->getName().$iCountMembershipsAddon;
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

