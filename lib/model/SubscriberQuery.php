<?php


/**
 * @package    propel.generator.model
 */
class SubscriberQuery extends BaseSubscriberQuery {
	public function exclude($oSubscriber) {
		if($oSubscriber === null || $oSubscriber->isNew()) {
			return $this;
		}
		return $this->filterById($oSubscriber->getId(), Criteria::NOT_EQUAL);
	}
}

