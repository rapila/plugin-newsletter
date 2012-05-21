<?php
// event handler and examples for usage of external newsletter mailing groups and recipients
class ExternalNewsletterMailFilterModule extends FilterModule {

 /** onMailGroups()
	* 
	* @param array()
	* for further information:
	* @see filter handling in MailGroupInputWidgetModule > Filter::getFilter()->handleMailGroups()
	* @return void
	*/	
	public function onMailGroups($aContainer) {
		$aMailGroups = &$aContainer[0];
		// add array of your custom mail groups to this $aMailGroups
		// use the following format:
		// • key: Something you can easily discern later on. Must not be numeric
		// • value: Name of your custom mail group, preferrably with prefix for transparency
	}
	
 /** onMailGroupsRecipients()
	* 
	* @param array of mail groups
	* @param array
	* for further information:
	* @see filter handling in NewsletterSendWidgetModule > Filter::getFilter()->handleMailGroupsRecipients()
	* @return void
	*/
	public function onMailGroupsRecipients($aMailGroups, $aContainer) {
		$aRecipients = &$aContainer[0];
		// add array of your recipients to this $aRecipients
		// use the following format:
		// • Fill array with recipients (either objects or e-mail addresses).
		// • When using objects, make sure they have the following methods: getName() and getEmail().
		// • You should also check the existing $aRecipients for duplicates.
		// • example of how to add your recipients:
		// foreach($aMailGroups as $mMailGroupIdentifier) {
		// 	if(!is_string($mMailGroupIdentifier) || !StringUtil::startsWith($mMailGroupIdentifier, 'my_identifier_')) {
		// 		continue;
		// 	}
		// 	$iObjectId = (int)substr($mMailGroupIdentifier, strlen('my_identifier_'));
		// 	$aItems = ExamplePeer::getSomeEmails($iObjectId);
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