<?php
/**
 * @package modules.widget
 * @subpackage rapila-plugin-newsletter
 */
class NewsletterListWidgetModule extends SpecializedListWidgetModule {

	protected $oLanguageFilter;
	public $oDelegateProxy;

	protected function createListWidget() {
		$oListWidget = new ListWidgetModule();
		$this->oDelegateProxy = new CriteriaListWidgetDelegate($this, "Newsletter", 'updated_at', 'desc');
		$oListWidget->setDelegate($this->oDelegateProxy);
		if(!LanguageInputWidgetModule::isMonolingual()) {
			$this->oLanguageFilter = WidgetModule::getWidget('language_input', null, true);
		}
		return $oListWidget;
	}

	public function getColumnIdentifiers() {
		$aResult = array('id', 'subject');
		if($this->oLanguageFilter !== null) {
			$aResult[] = 'language_id';
		}
		return array_merge($aResult, array('template_name', 'is_approved', 'group_sent_to', 'last_sent_localized', 'send_test', 'duplicate', 'delete'));
	}

	public function getMetadataForColumn($sColumnIdentifier) {
		$aResult = array('is_sortable' => true);
		switch($sColumnIdentifier) {
			case 'id':
				$aResult['heading'] = TranslationPeer::getString('wns.id');
				break;
			case 'subject':
				$aResult['heading'] = TranslationPeer::getString('wns.newsletter.subject');
				break;
			case 'language_id':
				$aResult['has_data'] = true;
				if(LanguageInputWidgetModule::isMonolingual()) {
					$aResult['heading'] = TranslationPeer::getString('wns.language');
				} else {
					$aResult['heading'] = '';
					$aResult['heading_filter'] = array('language_input', $this->oLanguageFilter->getSessionKey());
				}
				$aResult['field_name'] = 'language_name';
				$aResult['is_sortable'] = false;
				break;
			case 'template_name':
				$aResult['heading'] = TranslationPeer::getString('wns.newsletter.template_name');
				break;
			case 'is_approved':
				$aResult['heading'] = TranslationPeer::getString('wns.newsletter.is_approved');
				break;
			case 'group_sent_to':
				$aResult['heading'] = TranslationPeer::getString('wns.newsletter.subscriber_groups_sent_to');
				break;
			case 'last_sent_localized':
				$aResult['heading'] = TranslationPeer::getString('wns.newsletter.last_sent');
				$aResult['is_sortable'] = false;
				break;
			case 'send_test':
				$aResult['field_name'] = 'play';
				$aResult['heading'] = TranslationPeer::getString('wns.newsletter.send_test');
				$aResult['display_type'] = ListWidgetModule::DISPLAY_TYPE_ICON;
				$aResult['is_sortable'] = false;
				break;
			case 'duplicate':
				$aResult['field_name'] = 'plus';
				$aResult['heading'] = TranslationPeer::getString('wns.newsletter.duplicate');
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
		return TranslationPeer::getString('language.'.$this->oDelegateProxy->getLanguageId(), null, $this->oDelegateProxy->getLanguageId());
	}

	public function getSubscriberGroupHasNewsletterMailings($iSubscriberGroupId) {
		return NewsletterMailingQuery::create()->filterBySubscriberGroupId($iSubscriberGroupId)->count() > 0;
	}

	public function getSubscriberGroupId() {
		return $this->oDelegateProxy->getSubscriberGroupId();
	}

	public function getSubscriberGroupName() {
		if(is_numeric($this->oDelegateProxy->getSubscriberGroupId())) {
			$oSubscriberGroup = SubscriberGroupQuery::create()->findPk($this->oDelegateProxy->getSubscriberGroupId());
			if($oSubscriberGroup) {
				return $oSubscriberGroup->getName();
			}
		}
    if($this->oDelegateProxy->getSubscriberGroupId() === CriteriaListWidgetDelegate::SELECT_WITHOUT) {
			return TranslationPeer::getString('wns.subscriber_group.without');
		}
		return $this->oDelegateProxy->getSubscriberGroupId();
	}

  public function getCriteria() {
		return NewsletterQuery::create()->distinct()->joinNewsletterMailing(null, Criteria::LEFT_JOIN);
	}

}
