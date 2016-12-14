<?php
/**
 * @package modules.widget
 * @subpackage rapila-plugin-newsletter
 */
class SubscriberGroupListWidgetModule extends WidgetModule {

	private $oListWidget;
	public $oDelegateProxy;

	public function __construct() {
		$this->oListWidget = new ListWidgetModule();
		$this->oDelegateProxy = new CriteriaListWidgetDelegate($this, "SubscriberGroup", 'name');
		$this->oListWidget->setDelegate($this->oDelegateProxy);
	}

	public function doWidget() {
		$aTagAttributes = array('class' => 'subscriber_group_list');
		$oListTag = new TagWriter('table', $aTagAttributes);
		$this->oListWidget->setListTag($oListTag);
		return $this->oListWidget->doWidget();
	}

	public function getColumnIdentifiers() {
		return array('id', 'name', 'display_name', 'is_temporary', 'link_to_subscriber_data', 'delete');
	}

	public function getMetadataForColumn($sColumnIdentifier) {
		$aResult = array('is_sortable' => true);
		switch($sColumnIdentifier) {
			case 'id':
				$aResult['display_type'] = ListWidgetModule::DISPLAY_TYPE_DATA;
				break;
			case 'name':
				$aResult['heading'] = TranslationPeer::getString('wns.subscriber_group.name');
				break;
			case 'display_name':
				$aResult['heading'] = TranslationPeer::getString('wns.subscriber_group.display_name');
				break;
			case 'is_temporary':
				$aResult['heading'] = TranslationPeer::getString('wns.subscriber_group.is_temporary');
				$aResult['is_sortable'] = false;
				break;
			case 'link_to_subscriber_data':
				$aResult['heading'] = TranslationPeer::getString('wns.subscribers');
				$aResult['display_type'] = ListWidgetModule::DISPLAY_TYPE_URL;
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

}
