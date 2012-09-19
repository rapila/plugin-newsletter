## Example of how to restrict the display of a newsletter

Implement a FilterModule taking advantage of FilterModule::getFilters()->handleNewsletterDisplayRequested($this->oNewsletter)

~~~.php
<?php
class NewsletterPermissionFilterModule extends FilterModule {
	
	public function onNewsletterDisplayRequested($oNewsletter) {
		if($oNewsletter === null) {
			return; // redirect no not found?
		}
		
		// Check permission in case the newsletter is for authenticated users only
		if(!$this->requiresAuthentication($oNewsletter)) {
			return;
		}
		
		$oErrorPage = PageQuery::create()->findOneByName(Settings::getSetting('error_pages', 'not_permitted', 'error_403'));
		if($oErrorPage) {
			LinkUtil::redirect(LinkUtil::link($oErrorPage->getLinkArray(), "FrontendManager"));
		} else {
			print "Not permitted";exit;
		}
	}
	
	private function requiresAuthentication($oNewsletter) {
		/** @todo OPTIMIZE: maybe this can be done dynamically, using methods like LanguageObjectQuery::filterByStringInData() ? */
		$oQuery = LanguageObjectQuery::create()->joinContentObject()->useQuery('ContentObject')->joinPage()->useQuery('Page')->filterByIsProtected(true)->endUse()->filterByObjectType('newsletter')->endUse()->filterByData("%newsletter_display_list%", Criteria::LIKE)->_or()->filterByData("%newsletter_display_detail%", Criteria::LIKE);
		$oLanguageObject = $oQuery->findOne();
		if($oLanguageObject === null) {
			return false;
		}
		return true;
	}
}
~~~