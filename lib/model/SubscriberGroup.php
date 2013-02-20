<?php

require_once 'model/om/BaseSubscriberGroup.php';


/**
 * @package		 model
 */
class SubscriberGroup extends BaseSubscriberGroup {

	public function getReadableName() {
		if($this->getDisplayName()) {
			return $this->getDisplayName();
		}
		return $this->getName(). ' (!)';
	}
	
	public function getNameFirstLetter() {
		return strtoupper(substr($this->getName(), 0,1));
	}
	
	public function getIsTemporary() {
		return $this->getDisplayName() == null;
	}
	
	public function getSubscriberGroupMemberships($oCriteria = null, PropelPDO $oCon = null, $iLimit = null, $iOffset = null) {
		if($oCriteria === null) {
			$oCriteria = new Criteria();
		}
		$oCriteria->addJoin(SubscriberGroupMembershipPeer::SUBSCRIBER_ID, SubscriberPeer::ID, Criteria::INNER_JOIN);
		$oCriteria->addAscendingOrderByColumn(SubscriberPeer::EMAIL);
		if($iLimit !== null) {
			$oCriteria->setLimit($iLimit);
			if($iOffset) {
				$oCriteria->setOffset($iOffset);
			}
		}
		return parent::getSubscriberGroupMemberships($oCriteria, $oCon);
	}

	public function getLinkToSubscriberData() {
		$aArray = array();
		$aArray[] = $this->countSubscriberGroupMemberships();
		$aArray[] = LinkUtil::link(array('subscribers'), 'AdminManager', array('subscriber_group_id' => $this->getId()));
		return $aArray;
	}

}

