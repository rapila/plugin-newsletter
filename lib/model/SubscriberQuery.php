<?php


/**
 * Skeleton subclass for performing query and update operations on the 'subscribers' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.model
 */
class SubscriberQuery extends BaseSubscriberQuery {
	public function exclude($oSubscriber) {
		if($oSubscriber === null || $oSubscriber->isNew()) {
			return $this;
		}
		return $this->filterById($oSubscriber->getId(), Criteria::NOT_EQUAL);
	}
} // SubscriberQuery
