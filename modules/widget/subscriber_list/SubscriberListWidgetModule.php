<?php
/**
 * @package modules.widget
 */
class SubscriberListWidgetModule extends WidgetModule {
	
	private $oListWidget;
	public $oDelegateProxy;
	
	public function __construct() {
		$this->oListWidget = new ListWidgetModule();
		$this->oDelegateProxy = new CriteriaListWidgetDelegate($this, "Subscriber", 'name');
		$this->oListWidget->setDelegate($this->oDelegateProxy);
	}
	
	public function doWidget() {
		$aTagAttributes = array('class' => 'subscriber_list');
		$oListTag = new TagWriter('table', $aTagAttributes);
		$this->oListWidget->setListTag($oListTag);
		return $this->oListWidget->doWidget();
	}
		
	public function getColumnIdentifiers() {
		return array('id', 'name', 'email', 'preferred_language_id', 'delete');
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

	public function getCriteria() {
		$oCriteria = new Criteria();
		if($this->oDelegateProxy->getSubscriberGroupId() !== CriteriaListWidgetDelegate::SELECT_ALL) {
			if($this->oDelegateProxy->getSubscriberGroupId() === CriteriaListWidgetDelegate::SELECT_WITHOUT) {
				$oCriteria->addJoin(SubscriberPeer::ID, SubscriberGroupMembershipPeer::SUBSCRIBER_ID, Criteria::LEFT_JOIN);
				$oCriteria->add(SubscriberGroupMembershipPeer::SUBSCRIBER_ID, null, Criteria::ISNULL);
			} else {
				$oCriteria->addJoin(SubscriberPeer::ID, SubscriberGroupMembershipPeer::SUBSCRIBER_ID, Criteria::INNER_JOIN);
				$oCriteria->add(SubscriberGroupMembershipPeer::SUBSCRIBER_GROUP_ID, $this->oDelegateProxy->getSubscriberGroupId());
			}
		}
		return $oCriteria;
	}

}