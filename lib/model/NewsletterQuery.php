<?php


/**
 * @package    propel.generator.model
 */
class NewsletterQuery extends BaseNewsletterQuery {
	public function filterApprovedForLanguage($sLanguageId = null) {
		$sLanguageId = $sLanguageId === null ? Session::language() : $sLanguageId;
		$this->condition('language_null', 'Newsletter.LanguageId is null');
		$this->condition('language_'.$sLanguageId, 'Newsletter.LanguageId = ?', $sLanguageId);
		return $this->filterByIsApproved(true)->where(array('language_null', 'language_'.$sLanguageId), Criteria::LOGICAL_OR);
	}
}

