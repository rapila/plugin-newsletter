<?php
/**
 * @package modules.admin 
 * @subpackage rapila-plugin-newsletter
 */
class NewslettersAdminModule extends AdminModule {

	private $oListWidget;
	private $oSidebarWidget;
	
	public function __construct() {
		$this->oListWidget = new NewsletterListWidgetModule();
		if(isset($_REQUEST['subscriber_group_id'])) {
			$this->oListWidget->oDelegateProxy->setSubscriberGroupId($_REQUEST['subscriber_group_id']);
		}
		$this->addResourceParameter(ResourceIncluder::RESOURCE_TYPE_JS, 'subscriber_group_id', $this->oListWidget->oDelegateProxy->getSubscriberGroupId());
		$this->oSidebarWidget = new ListWidgetModule();
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
		return array('id', 'readable_name', 'magic_column');
	}
	
	public function getMetadataForColumn($sColumnIdentifier) {
		$aResult = array();
		switch($sColumnIdentifier) {
			case 'readable_name':
				$aResult['heading'] = StringPeer::getString('wns.newsletter.subscriber_group');
				break;
			case 'magic_column':
				$aResult['display_type'] = ListWidgetModule::DISPLAY_TYPE_CLASSNAME;
				$aResult['has_data'] = false;
				break;
		}
		return $aResult;
	}
	
	public function getCustomListElements() {
		if(SubscriberGroupPeer::doCount(new Criteria()) > 0) {
		 	return array(
				array('id' => CriteriaListWidgetDelegate::SELECT_ALL,
							'readable_name' => StringPeer::getString('wns.subscriber_group.select_all_title'),
							'magic_column' => 'all'),
				array('id' => CriteriaListWidgetDelegate::SELECT_WITHOUT,
							'readable_name' => StringPeer::getString('wns.subscriber_group.select_without_title'),
							'magic_column' => 'without')
			);
		}
		return array();
	}
	
	public function usedWidgets() {
		return array($this->oListWidget, $this->oSidebarWidget);
	}
	
	public function getCriteria() {
		$oCriteria = new Criteria();
		if($this->oListWidget->oDelegateProxy->getSubscriberGroupId() === CriteriaListWidgetDelegate::SELECT_ALL) {
			return $oCriteria;
		}
		if($this->oListWidget->oDelegateProxy->getSubscriberGroupId() === CriteriaListWidgetDelegate::SELECT_WITHOUT) {
			$oCriteria->addJoin(NewsletterPeer::ID, NewsletterMailingPeer::NEWSLETTER_ID, Criteria::INNER_JOIN);
			$oCriteria->add(NewsletterMailingPeer::NEWSLETTER_ID, null, Criteria::ISNULL);
		} else {
			$oCriteria->addJoin(NewsletterPeer::ID, NewsletterMailingPeer::NEWSLETTER_ID, Criteria::INNER_JOIN);
			$oCriteria->add(NewsletterMailingPeer::SUBSCRIBER_GROUP_ID, $this->oListWidget->oDelegateProxy->getSubscriberGroupId());
		}
		return $oCriteria;
	}
}
