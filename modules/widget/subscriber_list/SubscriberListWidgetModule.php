<?php
/**
 * @package modules.widget
 */
class SubscriberListWidgetModule extends WidgetModule {
	
	private $oListWidget;
	private $bIsBackendCreated;
	private $oIsBackendCreatedFilter;
	public $oDelegateProxy;
	
	public function __construct() {
		$this->oListWidget = new ListWidgetModule();
		$this->oDelegateProxy = new CriteriaListWidgetDelegate($this, "Subscriber", 'name');
		$this->oListWidget->setDelegate($this->oDelegateProxy);
		$this->oIsBackendCreatedFilter = WidgetModule::getWidget('boolean_input', null, false);
	}
	
	public function doWidget() {
		$aTagAttributes = array('class' => 'subscriber_list');
		$oListTag = new TagWriter('table', $aTagAttributes);
		$this->oListWidget->setListTag($oListTag);
		return $this->oListWidget->doWidget();
	}
		
	public function getColumnIdentifiers() {
		$aColumns = array('id', 'email', 'name', 'preferred_language_id');
		if(SubscriberGroupMembershipQuery::create()->filterByIsBackendCreated(true)->count() > 0) {
			$aColumns = array_merge($aColumns, array('is_backend_created'));
		}
		return array_merge($aColumns, array('delete'));
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
			case 'preferred_language_id':
				$aResult['heading'] = StringPeer::getString('wns.preferred_language_id');
				break;
			case 'email':
				$aResult['heading'] = StringPeer::getString('wns.email');
				break;
			case 'is_backend_created':
				$aResult['heading'] = StringPeer::getString('wns.subscriber.is_backend_created');
				$aResult['heading_filter'] = array('boolean_input', $this->oIsBackendCreatedFilter->getSessionKey());
				$aResult['is_sortable'] = false;
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
	
	public function getBackendCreatedName() {
		if($this->bIsBackendCreated === true) {
			return true;
		}
		return null;
	}
	
	public function getSubscriberGroupHasSubscriptions($iSubscriberGroupId) {
		return SubscriberGroupMembershipQuery::create()->filterBySubscriberGroupId($iSubscriberGroupId)->count() > 0;
	}
	
	public function deleteRow($aRowData, $oCriteria) {
		$oSubscriber = SubscriberQuery::create()->findPk($aRowData['id']);
		return $oSubscriber->deleteSubscriberGroupMembership($this->oDelegateProxy->getSubscriberGroupId());
	}

	public function setIsBackendCreated($bIsBackendCreated) {
		$this->bIsBackendCreated = $bIsBackendCreated;
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
		if($this->bIsBackendCreated) {
			$oSubscriberGroupMembershipQuery->filterByIsBackendCreated(true);
		}
		$oSubscriberGroupMembershipQuery->endUse();
		return $oQuery->distinct();
	}
}