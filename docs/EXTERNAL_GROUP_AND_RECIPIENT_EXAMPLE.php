<?php
// event handler and examples for usage of external newsletter mailing groups and recipients
class ExternalNewsletterMailFilterModule extends FilterModule {
	
	public function onMailGroups($aContainer) {
		$aMailGroups = &$aContainer[0];
		// $aMailGroups: array of groups
		// To add your custom groups, use the following format:
		// key: Something you can easily discern later on. Must not be numeric
		// value: Name of your custom mail group
	}
	
	public function onMailGroupsRecipients($aMailGroups, $aContainer) {
		$aRecipients = &$aContainer[0];
		// To populate recipients for your custom mail groups:
		// Fill array with recipients (either objects or email addresses).
		// When using objects, make sure they have the following methods: getName() and getEmail().
		// You should also check the existing $aRecipients for duplicates.
		
		// foreach($aMailGroups as $mMailGroupIdentifier) {
		// 	if(!is_string($mMailGroupIdentifier) || !StringUtil::startsWith($mMailGroupIdentifier, 'my_identifier_')) {
		// 		continue;
		// 	}
		// 	$iObjectId = (int)substr($mMailGroupIdentifier, strlen('my_identifier_'));
		// 	$aItems = SomePeer::getSomeEmails($iObjectId);
		// 	foreach($aItems as $oObject) {
		// 		if($oObject->getPerson()) {
		// 			$aRecipients[] = $oObject->getPerson();
		// 		} else {
		// 			$aRecipients[] = $oObject->getEmail();
		// 		}
		// 	}
		// }
	}
}