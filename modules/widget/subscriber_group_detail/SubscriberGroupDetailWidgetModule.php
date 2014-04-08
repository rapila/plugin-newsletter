<?php
/**
 * @package modules.widget
 * @subpackage rapila-plugin-newsletter
 */
class SubscriberGroupDetailWidgetModule extends PersistentWidgetModule {
	private $iSubscriberGroupId;
	
	public function setSubscriberGroupId($iSubscriberGroupId) {
		$this->iSubscriberGroupId = $iSubscriberGroupId;
	}
	
	public function loadData() {
		$oSubscriberGroup = SubscriberGroupQuery::create()->findPk($this->iSubscriberGroupId);
		$aResult = $oSubscriberGroup->toArray();
		$aResult['CreatedInfo'] = Util::formatCreatedInfo($oSubscriberGroup);
		$aResult['UpdatedInfo'] = Util::formatUpdatedInfo($oSubscriberGroup);
		return $aResult;
	}

	private function validate($aSubscriberGroupData) {
		$oFlash = Flash::getFlash();
		$oFlash->setArrayToCheck($aSubscriberGroupData);
		$oFlash->checkForValue('name', 'name_required');
		$oFlash->finishReporting();
	}
	
	public function saveData($aSubscriberGroupData) {
		if($this->iSubscriberGroupId) {
			$oSubscriberGroup = SubscriberGroupQuery::create()->findPk($this->iSubscriberGroupId);
		} else {
			$oSubscriberGroup = new SubscriberGroup();
			$oSubscriberGroup->setCreatedBy(Session::getSession()->getUserId());
			$oSubscriberGroup->setCreatedAt(date('c'));
		}
		$oSubscriberGroup->setName($aSubscriberGroupData['name']);
		$oSubscriberGroup->setDisplayName($aSubscriberGroupData['display_name'] == null ? null : $aSubscriberGroupData['display_name']);

		$this->validate($aSubscriberGroupData);
    if(!Flash::noErrors()) {
			throw new ValidationException();
		}
		$oSubscriberGroup->save();
		
		$oResult = new stdClass();
		$oResult->id = $oSubscriberGroup->getId();
		if($this->iSubscriberGroupId === null) {
			$oResult->inserted = true;
		} else {
			$oResult->updated = true;
		}
		$this->iSubscriberGroupId = $oResult->id;
		return $oResult;
	}
}