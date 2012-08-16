<?php


/**
 * @package    propel.generator.model
 */
class SubscriberGroupQuery extends BaseSubscriberGroupQuery {
	
	public function withMembershipsOnly($bWithMemberShipOnly = true) {
		if($bWithMemberShipOnly) {
			return $this->joinSubscriberGroupMembership();
		}
		return $this;
	}
	
	public function excludeTemporary($bExclude = true) {
		if($bExclude) {
			return $this->filterByDisplayName(null, Criteria::ISNOTNULL);
		}
		return $this;
	}
}

