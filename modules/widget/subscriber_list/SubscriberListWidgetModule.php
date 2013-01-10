<?php
/**
 * @package modules.widget
 * @subpackage rapila-plugin-newsletter
 */
class SubscriberListWidgetModule extends WidgetModule {
	
	private $oListWidget;
	public $oDelegateProxy;
	
	public function __construct() {
		$this->oListWidget = new ListWidgetModule();
		$this->oDelegateProxy = new CriteriaListWidgetDelegate($this, "Subscriber", 'created_at', Criteria::DESC);
		$this->oListWidget->setDelegate($this->oDelegateProxy);
	}
	
	public function doWidget() {
		$aTagAttributes = array('class' => 'subscriber_list');
		$oListTag = new TagWriter('table', $aTagAttributes);
		$this->oListWidget->setListTag($oListTag);
		return $this->oListWidget->doWidget();
	}
		
	public function getColumnIdentifiers() {
		return array('id', 'email', 'name', 'is_unconfirmed', 'preferred_language_id', 'created_at_formatted', 'delete');
	}

	public function getMetadataForColumn($sColumnIdentifier) {
		$aResult = array('is_sortable' => true);
		switch($sColumnIdentifier) {
			case 'id':
				$aResult['display_type'] = ListWidgetModule::DISPLAY_TYPE_DATA;
				break;
			case 'name':
				$aResult['heading'] = StringPeer::getString('wns.subscriber.name');
				break;
			case 'is_unconfirmed':
				$aResult['heading'] = StringPeer::getString('wns.subscriber.is_unconfirmed');
				break;
			case 'preferred_language_id':
				$aResult['heading'] = StringPeer::getString('wns.preferred_language_id');
				break;
			case 'email':
				$aResult['heading'] = StringPeer::getString('wns.email');
				break;
			case 'created_at_formatted':
				$aResult['heading'] = StringPeer::getString('wns.date_of_subscription');
				break;
			case 'delete':
				$aResult['heading'] = ' ';
				$aResult['display_type'] = ListWidgetModule::DISPLAY_TYPE_ICON;
				$aResult['field_name'] = 'trash';
				$aResult['is_sortable'] = false;
				break;
		}
		return $aResult;
	}
	
	public function getDatabaseColumnForColumn($sColumnIdentifier) {
		if($sColumnIdentifier === 'subscriber_group_id') {
			return SubscriberGroupPeer::ID;
		}
		if($sColumnIdentifier === 'created_at_formatted') {
			return SubscriberPeer::CREATED_AT;
		}
		return null;
	}
	
	public function getFilterTypeForColumn($sColumnIdentifier) {
		if($sColumnIdentifier === 'subscriber_group_id') {
			return CriteriaListWidgetDelegate::FILTER_TYPE_MANUAL;
		}
		return null;
	}
	
	public function getSubscriberGroupName() {
		if(is_numeric($this->oDelegateProxy->getSubscriberGroupId())) {
			$oSubscriberGroup = SubscriberGroupQuery::create()->findPk($this->oDelegateProxy->getSubscriberGroupId());
			if($oSubscriberGroup) {
				return $oSubscriberGroup->getName();
			}
		}
    if($this->oDelegateProxy->getSubscriberGroupId() === CriteriaListWidgetDelegate::SELECT_WITHOUT) {
			return StringPeer::getString('wns.subscriber_group.without');
		}
		return $this->oDelegateProxy->getSubscriberGroupId();
	}
	
	public function getSubscriberGroupHasSubscriptions($iSubscriberGroupId) {
		return SubscriberGroupMembershipQuery::create()->filterBySubscriberGroupId($iSubscriberGroupId)->count() > 0;
	}
	
	public function deleteRow($aRowData, $oCriteria) {
		$oSubscriber = SubscriberQuery::create()->findPk($aRowData['id']);
		return $oSubscriber->deleteSubscriberGroupMembership($this->oDelegateProxy->getSubscriberGroupId());
	}

	public function getCriteria() {
		$oQuery = SubscriberQuery::create();
		$sJoinType = is_numeric($this->oDelegateProxy->getSubscriberGroupId()) ? Criteria::INNER_JOIN : Criteria::LEFT_JOIN;
		$oSubscriberGroupMembershipQuery = $oQuery->joinSubscriberGroupMembership(null, $sJoinType)->useQuery('SubscriberGroupMembership');
		if(is_numeric($this->oDelegateProxy->getSubscriberGroupId())) {
			$oSubscriberGroupMembershipQuery->filterBySubscriberGroupId($this->oDelegateProxy->getSubscriberGroupId());
		} else {
			if($this->oDelegateProxy->getSubscriberGroupId() === CriteriaListWidgetDelegate::SELECT_WITHOUT) {
				$oSubscriberGroupMembershipQuery->filterBySubscriberGroupId(null, Criteria::ISNULL);
			}
		}
		$oSubscriberGroupMembershipQuery->endUse();
		return $oQuery->distinct();
	}
}