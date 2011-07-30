<?php
/**
 * @package modules.widget
 */
class NewsletterListWidgetModule extends WidgetModule {
	
	private $oListWidget;
	public $oDelegateProxy;
	private $oLanguageFilter;
	
	public function __construct() {
		$this->oListWidget = new ListWidgetModule();
		$this->oDelegateProxy = new CriteriaListWidgetDelegate($this, "Newsletter", 'subject');
		$this->oListWidget->setDelegate($this->oDelegateProxy);
		$this->oLanguageFilter = WidgetModule::getWidget('language_input', null, true);
	}
	
	public function doWidget() {
		$aTagAttributes = array('class' => 'newsletter_list');
		$oListTag = new TagWriter('table', $aTagAttributes);
		$this->oListWidget->setListTag($oListTag);
		return $this->oListWidget->doWidget();
	}
		
	public function getColumnIdentifiers() {
		return array('id', 'subject', 'language_id', 'template_name', 'group_sent_to', 'is_approved', 'send_test', 'last_sent_localized', 'delete');
	}

	public function getMetadataForColumn($sColumnIdentifier) {
		$aResult = array('is_sortable' => true);
		switch($sColumnIdentifier) {
			case 'id':
				$aResult['heading'] = StringPeer::getString('wns.id');
				break;
			case 'subject':
				$aResult['heading'] = StringPeer::getString('wns.newsletter.subject');
				break;
			case 'language_id':
				$aResult['has_data'] = true;
				$aResult['heading'] = '';
				$aResult['heading_filter'] = array('language_input', $this->oLanguageFilter->getSessionKey());
				$aResult['is_sortable'] = false;
				break;
			case 'template_name':
				$aResult['heading'] = StringPeer::getString('wns.newsletter.template_name');
				break;
			case 'is_approved':
				$aResult['heading'] = StringPeer::getString('wns.newsletter.is_approved');
				break;
			case 'group_sent_to':
				$aResult['heading'] = StringPeer::getString('wns.newsletter.subscriber_group');
				break;
			case 'last_sent_localized':
				$aResult['heading'] = StringPeer::getString('wns.newsletter.last_sent');
				break;
			case 'send_test':
				$aResult['field_name'] = 'play';
				$aResult['heading'] = StringPeer::getString('wns.newsletter.send_test');
				$aResult['display_type'] = ListWidgetModule::DISPLAY_TYPE_ICON;
				$aResult['is_sortable'] = false;
				break;			
			case 'delete':
				$aResult['field_name'] = 'trash';
				$aResult['heading'] = ' ';
				$aResult['display_type'] = ListWidgetModule::DISPLAY_TYPE_ICON;
				$aResult['is_sortable'] = false;
				break;
		}
		return $aResult;
	}
	
	public function getDatabaseColumnForColumn($sColumnIdentifier) {
		if($sColumnIdentifier === 'group_sent_to') {
			return NewsletterMailingPeer::SUBSCRIBER_GROUP_ID;
		}
		if($sColumnIdentifier === 'last_sent_localized') {
			return NewsletterPeer::UPDATED_AT;
		}
		if($sColumnIdentifier === 'subscriber_group_id') {
			return NewsletterMailingPeer::SUBSCRIBER_GROUP_ID;
		}
		return null;
	}
	
	public function getFilterTypeForColumn($sColumnIdentifier) {
		if($sColumnIdentifier === 'subscriber_group_id') {
			return CriteriaListWidgetDelegate::FILTER_TYPE_IS;
		}
		if($sColumnIdentifier === 'language_id') {
			return CriteriaListWidgetDelegate::FILTER_TYPE_IS;
		}
		return null;
	}
	
	public function getLanguageName() {
		return StringPeer::getString('language.'.$this->oDelegateProxy->getLanguageId(), null, $this->oDelegateProxy->getLanguageId());
	}
	
  public function getCriteria() {
		$oCriteria = new Criteria();
		$oCriteria->setDistinct();
    $oCriteria->addJoin(NewsletterPeer::ID, NewsletterMailingPeer::NEWSLETTER_ID, Criteria::LEFT_JOIN);
		return $oCriteria;
	}

}