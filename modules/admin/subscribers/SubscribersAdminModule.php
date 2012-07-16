<?php
/**
 * @package modules.admin
 */
class SubscribersAdminModule extends AdminModule {

	private $oListWidget;
	private $oSidebarWidget;

	public function __construct() {
		$this->oListWidget 	= new SubscriberListWidgetModule();
		if(isset($_REQUEST['subscriber_group_id'])) {
			$this->oListWidget->oDelegateProxy->setSubscriberGroupId($_REQUEST['subscriber_group_id']);
		}
		$this->addResourceParameter(ResourceIncluder::RESOURCE_TYPE_JS, 'subscriber_group_id', $this->oListWidget->oDelegateProxy->getSubscriberGroupId());
		$this->oSidebarWidget 		= new ListWidgetModule();
		$this->oSidebarWidget->setListTag(new TagWriter('ul'));
		$this->oSidebarWidget->setDelegate(new CriteriaListWidgetDelegate($this, 'SubscriberGroup', 'name'));
	}
	
	public function mainContent() {
		return $this->oListWidget->doWidget();
	}
	
	public function sidebarContent() {
		return $this->oSidebarWidget->doWidget();
	}
	
	public function getColumnIdentifiers() {
		return array('subscriber_group_id', 'readable_name', 'magic_column');
	}
	
	public function getMetadataForColumn($sColumnIdentifier) {
		$aResult = array();
		switch($sColumnIdentifier) {
			case 'subscriber_group_id':
				$aResult['display_type'] = ListWidgetModule::DISPLAY_TYPE_DATA;
				$aResult['field_name'] = 'id';
				break;
			case 'readable_name':
				$aResult['heading'] = StringPeer::getString('subscriber_group.sidebar_heading');
				break;
			case 'magic_column':
				$aResult['display_type'] = ListWidgetModule::DISPLAY_TYPE_CLASSNAME;
				$aResult['has_data'] = false;
				break;
		}
		return $aResult;
	}

	public function getCustomListElements() {
		if(SubscriberGroupQuery::create()->count() > 0) {
			return array(
				array('subscriber_group_id' => CriteriaListWidgetDelegate::SELECT_ALL,
							'readable_name' => StringPeer::getString('wns.users.select_all_title'),
							'magic_column' => 'all'),
				array('subscriber_group_id' => CriteriaListWidgetDelegate::SELECT_WITHOUT,
							'readable_name' => StringPeer::getString('wns.users.select_without_title'),
							'magic_column' => 'without'));
		}
		return array();
	}

	public function usedWidgets() {
		return array($this->oListWidget, $this->oSidebarWidget);
	}
}
