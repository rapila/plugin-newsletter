<?php
class NewsletterSendWidgetModule extends PersistentWidgetModule {
	private $sLanguageId = null;
	private $iNewsletterId;
	private $iBatchSize = 50;

	private $aUnsuccessfulAttempts;
	
	public function setNewsletterId($iNewsletterId) {
		$this->iNewsletterId = $iNewsletterId;
	}
	
	public function getNewsletterIsApproved() {
		return NewsletterPeer::retrieveByPK($this->iNewsletterId)->getIsApproved();
	}
	
	public function getNewsletterSubject() {
		return NewsletterPeer::retrieveByPK($this->iNewsletterId)->getSubject();
	}
	
	public function sendTestNewsletter($mRecipients = array()) {
		$this->aUnsuccessfulAttempts = array();
		$oNewsletter = NewsletterPeer::retrieveByPK($this->iNewsletterId);
		$oNewsletterMailer = new NewsletterMailer($oNewsletter, $mRecipients, false, LinkUtil::getDomainHolderEmail('newsletter'));
		if($oNewsletterMailer->send()) {
			return true;
		} else {
			$this->aUnsuccessfulAttempts = $oNewsletterMailer->getInvalidEmails();
			return false;
		}
	}
	
	public function getSenderEmails() {
		$aResult = Settings::getSetting('newsletter_plugin', 'sender_email_addresses', array(LinkUtil::getDomainHolderEmail('newsletter')));
		return $aResult;
	}
	
	public function getExpectedBatchCount($aMailGroups = null) {
		return floor(SubscriberPeer::countSubscribersBySubscriberGroupMembership($aMailGroups)/$this->iBatchSize);
	}

	public function sendNewsletter($aMailGroups = null, $sSenderEmail = null, $iBatchNumber = 0) {
		if(!$sSenderEmail) {
			$sSenderEmail = LinkUtil::getDomainHolderEmail('newsletter');
		}
		if($aMailGroups === null && SubscriberGroupPeer::hasSubscriberGroups()) {
			throw new LocalizedException("newsletter.mailing.subscriber_groups_required");
		}
		
		$aRecipients = SubscriberPeer::getSubscribersBySubscriberGroupMembership($aMailGroups, $iBatchNumber*$this->iBatchSize, $this->iBatchSize);
		
		$bRequiresUnsubsribeLink = true;
		// FIXME: what if SOME of the mail groups are external?
		if(count($aRecipients) === 0) {
			$bRequiresUnsubsribeLink = false;
			// no normal newsletter to internal subscriber_group, no unsubscribe required
			// add or use external mail group recipients if implemented and exist
			FilterModule::getFilters()->handleExternalMailGroupsRecipients($aMailGroups, array(&$aRecipients));
		}
		
		// send newsletter if newsletter is chosen and there are recipients
		$oNewsletter = NewsletterPeer::retrieveByPK($this->iNewsletterId);
		if($oNewsletter === null) {
			throw new LocalizedException("newsletter.mailing.newsletter_missing");
		}
		
		if($iBatchNumber === 0) {
			$this->aUnsuccessfulAttempts = array();
		}
		
		$oNewsletterMailer = new NewsletterMailer($oNewsletter, $aRecipients, $bRequiresUnsubsribeLink, $sSenderEmail);
		
		if(!$oNewsletterMailer->send()) {
			$this->aUnsuccessfulAttempts = array_merge($this->aUnsuccessfulAttempts, $oNewsletterMailer->getInvalidEmails());
		}
		if(count($aRecipients) === $this->iBatchSize) {
			return $iBatchNumber+1;
		} else {
			// return batch count/boolean and register Mailings per group
			foreach($aMailGroups as $mMailGroupId) {
				$oNewsletterMailing = new NewsletterMailing();
				$oNewsletterMailing->setDateSent(date('c'));
				if(is_numeric($mMailGroupId)) {
					$oNewsletterMailing->setSubscriberGroupId($mMailGroupId);
				} else {
					$oNewsletterMailing->setExternalMailGroupId($mMailGroupId);
				}
				$oNewsletterMailing->setNewsletterId($oNewsletter->getId());
				$oNewsletterMailing->save();
			}
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