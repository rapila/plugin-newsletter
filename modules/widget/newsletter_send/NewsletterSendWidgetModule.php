<?php
/**
 * @package modules.widget
 * @subpackage rapila-plugin-newsletter
 */
class NewsletterSendWidgetModule extends PersistentWidgetModule {
	
	// Id of newsletter that is sent
	private $iNewsletterId;
	
	// Batch size number for smooth handling of batches of recipients sent in one request
	private $iBatchSize = 50;
	
	// All distinct recipient of the newsletter
	private $aRecipients = null;
	
	// sender email
	private $sSenderEmail = null;
	
	// Optional sender name
	private $sSenderName = null;
	
	// Mail groups [subscriber_groups, external_mail_groups]
	private $aMailGroups = null;

	// Unsuccessful or failed recipients
	private $aUnsuccessfulAttempts;
	
	public function setNewsletterId($iNewsletterId) {
		$this->iNewsletterId = $iNewsletterId;
	}
	
	public function getNewsletterIsApproved() {
		return NewsletterQuery::create()->findPk($this->iNewsletterId)->getIsApproved();
	}
	
	public function getNewsletterSubject() {
		return NewsletterQuery::create()->findPk($this->iNewsletterId)->getSubject();
	}
	
	public function sendTestNewsletter($mRecipients = array()) {
		$this->aUnsuccessfulAttempts = array();
		$oNewsletter = NewsletterQuery::create()->findPk($this->iNewsletterId);
		$oNewsletterMailer = new NewsletterMailer($oNewsletter, array_unique($mRecipients), false, LinkUtil::getDomainHolderEmail('newsletter'));
		if($oNewsletterMailer->send()) {
			return true;
		} else {
			$this->aUnsuccessfulAttempts = $oNewsletterMailer->getInvalidEmails();
			return false;
		}
	}
	
 /** getSenderEmails()
	* 
	* description: following sender options
	* • sender_email_addresses email/name
	* • current user email / fullname
	* • fallback domain_holder email or old array notation sender_email_addresses
	* 
	* @return array of key email and value name [email if name is not set]
	*/
	public function getSenderEmails() {
		$aConfig = Settings::getSetting('newsletter_plugin', 'sender_email_addresses', array(LinkUtil::getDomainHolderEmail('newsletter')));
		$aResult = array();
		foreach($aConfig as $mIndex => $mConfig) {
			// Numeric key are indexes of old email lists
			if(is_numeric($mIndex)) {
				$aResult[$mConfig] = $mConfig;
			} else {
				$aResult[$mIndex] = $mConfig;
			}
		}
		$oUser = Session::user();
		if($oUser) {
			$aResult[$oUser->getEmail()] = $oUser->getFullName();
		}
		return $aResult;
	}
	
 /** prepareForSending()
	* 
	* @param array of mail_group values [int subscriber_group_id, string external_mail_group]
	* @param string SenderMail
	* @param string SenderName
	*
	* description: prepare batch processing 
	* • validates send form
	* 
	* @return int batch count
	*/
	public function prepareForSending($aMailGroups = null, $sSenderEmail = null, $sSenderName = null) {
		if(!$sSenderEmail) {
			$sSenderEmail = LinkUtil::getDomainHolderEmail('newsletter');
		}
		$this->sSenderEmail = $sSenderEmail;
		if($sSenderName !== $sSenderEmail) {
			$this->sSenderName = $sSenderName;
		}
		$this->aRecipients = SubscriberPeer::getSubscribersBySubscriberGroupMembership($aMailGroups);
		FilterModule::getFilters()->handleMailGroupsRecipients($aMailGroups, array(&$this->aRecipients));
		
		// Validate prepareForSending
		$sError = null;
		if($aMailGroups === null) {
			$sError = 'mail_group_required';
		} else if(count($this->aRecipients) === 0) {
			$sError = 'no_recipients_available';
		}
		$oFlash = new Flash();
		if($sError) {
			$oFlash->addMessage($sError);
		}
		$oFlash->finishReporting();
		if($oFlash->hasMessages()) {
			throw new ValidationException($oFlash);
		}

		$this->aMailGroups = is_array($aMailGroups) ? $aMailGroups : array($aMailGroups);
		return ceil(count($this->aRecipients)/$this->iBatchSize);
	}

 /** sendNewsletter()
	* 
	* @param int BatchNumber
	* 
	* @return boolean full or partial success
	*/
	public function sendNewsletter($iBatchNumber = 0) {
		if($this->aRecipients === null || $this->sSenderEmail === null || $this->aMailGroups === null) {
			throw new Exception("Error in sendNewsletter: prepare not called");
		}
		
		// Send newsletter if newsletter is chosen and there are recipients
		$oNewsletter = NewsletterQuery::create()->findPk($this->iNewsletterId);
		if($oNewsletter === null) {
			throw new LocalizedException("newsletter.mailing.newsletter_missing");
		}

		if($iBatchNumber === 0) {
			$this->aUnsuccessfulAttempts = array();
		}
		
		$aRecipients = array_slice($this->aRecipients, $iBatchNumber*($this->iBatchSize), $this->iBatchSize);
		
		$bRequiresUnsubsribeLink = true;
		$oNewsletterMailer = new NewsletterMailer($oNewsletter, $aRecipients, $bRequiresUnsubsribeLink, $this->sSenderEmail, $this->sSenderName);
		
		if(!$oNewsletterMailer->send()) {
			$this->aUnsuccessfulAttempts = array_merge($this->aUnsuccessfulAttempts, $oNewsletterMailer->getInvalidEmails());
		}
		if(count($aRecipients) === $this->iBatchSize) {
			return $iBatchNumber+1;
		} else {
			// Return batch count/boolean and register Mailings per group
			$bOneGroupOnly = count($this->aMailGroups) === 1;
			foreach($this->aMailGroups as $mMailGroupId) {
				$oNewsletterMailing = new NewsletterMailing();
				$oNewsletterMailing->setDateSent(date('c'));
				if(is_numeric($mMailGroupId)) {
					$oNewsletterMailing->setSubscriberGroupId($mMailGroupId);
				} else {
					$oNewsletterMailing->setExternalMailGroupId($mMailGroupId);
				}
				// @todo check change jm > write recipient count if newsletter is sent to singe group only
				if($bOneGroupOnly) {
					$oNewsletterMailing->setRecipientCount(count($this->aRecipients));
				}
				$oNewsletterMailing->setNewsletterId($oNewsletter->getId());
				$oNewsletterMailing->save();
			}
			$this->aRecipients = null;
			$this->sSenderEmail = null;
			$this->aMailGroups = null;
			return count($this->aUnsuccessfulAttempts) === 0;
		}
	}
	
	public function unsuccessfulAttempts() {
		$aResult = array();
		foreach($this->aUnsuccessfulAttempts as $oException) {
			$sRecipient = $oException->getRecipient();
			if($sRecipient instanceof Subscriber) {
				$sRecipient = "{$sRecipient->getName()} <{$sRecipient->getEmail()}>";
			}
			$aResult[] = array('message' => "Exception when trying to execute the last action {$oException->getMessage()}", "recipient" => $sRecipient, 'code' => $oException->getCode(), 'file' => $oException->getFile(), 'line' => $oException->getLine(), 'trace' => $oException->getTrace(), 'exception_type' => get_class($oException));
		}
		return $aResult;
	}
}