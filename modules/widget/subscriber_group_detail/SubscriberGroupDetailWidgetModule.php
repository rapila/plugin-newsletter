<?php
/**
 * @package modules.widget
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
		$oSubscriberGroup = SubscriberGroupQuery::create()->findPk($this->iSubscriberGroupId);
		if($oSubscriberGroup === null) {
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
		return $oSubscriberGroup->save();
	}
}