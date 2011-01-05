<?php

require_once 'model/om/BaseNewsletterMailing.php';


/**
 * @package		 model
 */
class NewsletterMailing extends BaseNewsletterMailing {

	public function getName($iLength = 20) {
		$sNewsletterName = $this->getNewsletter() ? $this->getNewsletter()->getSubject() : 'oNewsletter missing!';
		return $this->getDateSentFormatted().StringUtil::truncate($sNewsletterName, $iLength);
	}
	
	public function getDateSentFormatted() {
		return '['.$this->getDateSent('Y-m-d').'] ';
	}

	/**
	* getMailGroupId()
	* @return external_mail_group_id if exists, else subscriber_group_id
	*/
	public function getMailGroupId() {
		if($this->getExternalMailGroupId() != null) {
			return $this->getExternalMailGroupId();
		}
		return $this->getSubscriberGroupId();
	}
	
	public function getSubscriberGroupName() {
		if($this->getSubscriberGroup()) {
			return $this->getSubscriberGroup()->getName();
		}
		return null;
	}
}

