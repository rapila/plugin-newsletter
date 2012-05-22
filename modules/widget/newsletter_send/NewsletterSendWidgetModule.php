<?php
class NewsletterSendWidgetModule extends PersistentWidgetModule {
	private $sLanguageId = null;
	private $iNewsletterId;
	private $iBatchSize = 50;
	private $aRecipients = null;
	private $iSubscriberGroupId = null;
	private $sSenderEmail = null;
	private $aMailGroups = null;

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
	
	public function getSenderEmails() {
		$aResult = Settings::getSetting('newsletter_plugin', 'sender_email_addresses', array(LinkUtil::getDomainHolderEmail('newsletter')));
		// @todo add authorized users to sender_email_addresses
		return $aResult;
	}
	
	public function prepareForSending($aMailGroups = null, $sSenderEmail = null) {
		if(!$sSenderEmail) {
			$sSenderEmail = LinkUtil::getDomainHolderEmail('newsletter');
		}
		$this->sSenderEmail = $sSenderEmail;
		if($aMailGroups === null && SubscriberGroupPeer::hasSubscriberGroups()) {
			throw new LocalizedException("newsletter.mailing.subscriber_groups_required");
		}
		$this->aRecipients = SubscriberPeer::getSubscribersBySubscriberGroupMembership($aMailGroups);
		FilterModule::getFilters()->handleMailGroupsRecipients($aMailGroups, array(&$this->aRecipients));
		$this->aMailGroups = is_array($aMailGroups) ? $aMailGroups : array($aMailGroups);
		return ceil(count($this->aRecipients)/$this->iBatchSize);
	}

	public function sendNewsletter($iBatchNumber = 0) {
		if($this->aRecipients === null || $this->sSenderEmail === null || $this->aMailGroups === null) {
			throw new Exception("Error in sendNewsletter: prepare not called");
		}
		
		$bRequiresUnsubsribeLink = true;
		
		// send newsletter if newsletter is chosen and there are recipients
		$oNewsletter = NewsletterQuery::create()->findPk($this->iNewsletterId);
		if($oNewsletter === null) {
			throw new LocalizedException("newsletter.mailing.newsletter_missing");
		}
		
		if($iBatchNumber === 0) {
			$this->aUnsuccessfulAttempts = array();
		}
		
		$aRecipients = array_slice($this->aRecipients, $iBatchNumber*($this->iBatchSize), $this->iBatchSize);
		
		$oNewsletterMailer = new NewsletterMailer($oNewsletter, $aRecipients, $bRequiresUnsubsribeLink, $this->sSenderEmail);
		
		if(!$oNewsletterMailer->send()) {
			$this->aUnsuccessfulAttempts = array_merge($this->aUnsuccessfulAttempts, $oNewsletterMailer->getInvalidEmails());
		}
		if(count($aRecipients) === $this->iBatchSize) {
			return $iBatchNumber+1;
		} else {
			// return batch count/boolean and register Mailings per group
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