<?php

class NewsletterSendFailure extends Exception {
	private $mRecipient;
	
	public function __construct($mOriginalException, $mRecipient) {
		parent::__construct($mOriginalException->getMessage(), $mOriginalException->getCode(), $mOriginalException);
		$this->mRecipient = $mRecipient;
	}
	
	public function setRecipient($mRecipient) {
		$this->mRecipient = $mRecipient;
	}

	public function getRecipient() {
		return $this->mRecipient;
	}
}