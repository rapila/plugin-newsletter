<?php
/**
 * @package modules.admin 
 * @subpackage rapila-plugin-newsletter
 */
class SubscriberGroupsAdminModule extends AdminModule {

	private $oListWidget;
	
	public function __construct() {
		$this->oListWidget = new SubscriberGroupListWidgetModule();
	}
	
	public function mainContent() {
		return $this->oListWidget->doWidget();
	}
		
	public function sidebarContent() {
	}	
	
	public function usedWidgets() {
		return array($this->oListWidget);
	}
}
