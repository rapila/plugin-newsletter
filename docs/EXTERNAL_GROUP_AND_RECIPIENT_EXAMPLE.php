<?php
// event handler and examples for usage of external newsletter mailing groups and recipients
class ExternalNewsletterMailFilterModule extends FilterModule {
	
	public function onExternalMailGroups($aContainer) {
		$aMailGroups = &$aContainer[0];
		// fill array assoc $aMailGroups
		// key: NewsletterMailingBackendModule::EXTERNAL_GROUP_PREFIX.[object_id_related_to_object_with_recipients]
		// value: name of external custom mail group
		// $aExternalMailGroupOptions = ExamplePeer::getCustomGroupsForNewsletterMailAssoc();
	}
	
	public function onExternalMailGroupsRecipients($aMailGroups, $aContainer) {
		$aRecipients = &$aContainer[0];
		// fill array with recipients of either object::Person or string email
		// for example
		// $aRegistrations = EventRegistrationPeer::getRecipientsByEventId($sObjectId);
		// foreach($aRegistrations as $oRegistration) {
		// 	if($aRegistrations->getPerson()) {
		// 		$aRecipients[] = $oEventRegistration->getPerson();
		// 	} else {
		// 		$aRecipients[] = $oEventRegistration->getEmail();
		// 	}
		// }
	}
}