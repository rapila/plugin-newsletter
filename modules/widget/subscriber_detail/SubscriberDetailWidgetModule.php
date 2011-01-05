<?php
/**
 * @package modules.widget
 */
class SubscriberDetailWidgetModule extends PersistentWidgetModule {
	private $iSubscriberId;
	
	public function setSubscriberId($iSubscriberId) {
		$this->iSubscriberId = $iSubscriberId;
	}
	
	public function getSubscriberData() {
		$oSubscriber = SubscriberPeer::retrieveByPK($this->iSubscriberId);
		$aResult = $oSubscriber->toArray();
		$aResult['CreatedInfo'] = Util::formatCreatedInfo($oSubscriber);
		$aResult['UpdatedInfo'] = Util::formatUpdatedInfo($oSubscriber);
		return $aResult;
	}

	private function validate($aSubscriberData, $oSubscriber) {
		$oFlash = Flash::getFlash();
		$oFlash->setArrayToCheck($aSubscriberData);
		$oFlash->checkForValue('name', 'name_required');
		$oFlash->checkForEmail('email', 'valid_email');
		$oFlash->finishReporting();
	}
	
	public function saveData($aSubscriberData) {
		$oSubscriber = SubscriberPeer::retrieveByPK($this->iSubscriberId);
		if($oSubscriber === null) {
			$oSubscriber = new Subscriber();
			$oSubscriber->setCreatedBy(Session::getSession()->getUserId());
			$oSubscriber->setCreatedAt(date('c'));
		}
		$oSubscriber->setPreferredLanguageId($aSubscriberData['preferred_language_id']);
		$oSubscriber->setName($aSubscriberData['name']);
		$oSubscriber->setEmail($aSubscriberData['email']);

		$this->validate($aSubscriberData, $oSubscriber);
    if(!Flash::noErrors()) {
			throw new ValidationException();
		}
		return $oSubscriber->save();
	}
}