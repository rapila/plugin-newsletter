<?php
// event handler and examples for usage of external newsletter mailing groups and recipients
class ExternalNewsletterMailFilterModule extends FilterModule {
	
	public function onExternalMailGroupsOptions(&$aExternalMailGroupOptions) {
		// fill array assoc
		// key: NewsletterMailingBackendModule::EXTERNAL_GROUP_PREFIX.[object_id_related_to_object_with_recipients]
		// value: name of external custom mail group
		// $aExternalMailGroupOptions = ExamplePeer::getCustomGroupsForNewsletterMailAssoc();
	}
	
	public function onExternalMailGroupsRecipients($sObjectId, &$aExternalMailGroupRecipients) {
		// fill array with recipients of either object::Person or string email
		// for example
		// $aRegistrations = EventRegistrationPeer::getRecipientsByEventId($sObjectId);
		// foreach($aRegistrations as $oRegistration) {
		// 	if($aRegistrations->getPerson()) {
		// 		$aExternalMailGroupRecipients[] = $oEventRegistration->getPerson();
		// 	} else {
		// 		$aExternalMailGroupRecipients[] = $oEventRegistration->getEmail();
		// 	}
		// }
	}
	
	public function onExternalMailGroupInformation($sEventId, &$aExternalMailGroupInfo) {
		// add info string of external source
		// for example
		// $aEvent = EventPeer::retrieveByPK($sEventId);
		// if($aEvent) {
		// 	$aExternalMailGroupInfo = $aEvent->getTitleForSelect();
		// } else {
		// 	$aExternalMailGroupInfo = 'unknown external mail group';
		// }
	}

}