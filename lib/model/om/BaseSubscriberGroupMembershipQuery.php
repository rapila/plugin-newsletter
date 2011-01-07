<?php


/**
 * Base class that represents a query for the 'subscriber_group_memberships' table.
 *
 * 
 *
 * @method     SubscriberGroupMembershipQuery orderBySubscriberId($order = Criteria::ASC) Order by the subscriber_id column
 * @method     SubscriberGroupMembershipQuery orderBySubscriberGroupId($order = Criteria::ASC) Order by the subscriber_group_id column
 * @method     SubscriberGroupMembershipQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     SubscriberGroupMembershipQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     SubscriberGroupMembershipQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method     SubscriberGroupMembershipQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 *
 * @method     SubscriberGroupMembershipQuery groupBySubscriberId() Group by the subscriber_id column
 * @method     SubscriberGroupMembershipQuery groupBySubscriberGroupId() Group by the subscriber_group_id column
 * @method     SubscriberGroupMembershipQuery groupByCreatedAt() Group by the created_at column
 * @method     SubscriberGroupMembershipQuery groupByUpdatedAt() Group by the updated_at column
 * @method     SubscriberGroupMembershipQuery groupByCreatedBy() Group by the created_by column
 * @method     SubscriberGroupMembershipQuery groupByUpdatedBy() Group by the updated_by column
 *
 * @method     SubscriberGroupMembershipQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SubscriberGroupMembershipQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SubscriberGroupMembershipQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SubscriberGroupMembershipQuery leftJoinSubscriber($relationAlias = null) Adds a LEFT JOIN clause to the query using the Subscriber relation
 * @method     SubscriberGroupMembershipQuery rightJoinSubscriber($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Subscriber relation
 * @method     SubscriberGroupMembershipQuery innerJoinSubscriber($relationAlias = null) Adds a INNER JOIN clause to the query using the Subscriber relation
 *
 * @method     SubscriberGroupMembershipQuery leftJoinSubscriberGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the SubscriberGroup relation
 * @method     SubscriberGroupMembershipQuery rightJoinSubscriberGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SubscriberGroup relation
 * @method     SubscriberGroupMembershipQuery innerJoinSubscriberGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the SubscriberGroup relation
 *
 * @method     SubscriberGroupMembershipQuery leftJoinUserRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByCreatedBy relation
 * @method     SubscriberGroupMembershipQuery rightJoinUserRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByCreatedBy relation
 * @method     SubscriberGroupMembershipQuery innerJoinUserRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByCreatedBy relation
 *
 * @method     SubscriberGroupMembershipQuery leftJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByUpdatedBy relation
 * @method     SubscriberGroupMembershipQuery rightJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByUpdatedBy relation
 * @method     SubscriberGroupMembershipQuery innerJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByUpdatedBy relation
 *
 * @method     SubscriberGroupMembership findOne(PropelPDO $con = null) Return the first SubscriberGroupMembership matching the query
 * @method     SubscriberGroupMembership findOneOrCreate(PropelPDO $con = null) Return the first SubscriberGroupMembership matching the query, or a new SubscriberGroupMembership object populated from the query conditions when no match is found
 *
 * @method     SubscriberGroupMembership findOneBySubscriberId(int $subscriber_id) Return the first SubscriberGroupMembership filtered by the subscriber_id column
 * @method     SubscriberGroupMembership findOneBySubscriberGroupId(int $subscriber_group_id) Return the first SubscriberGroupMembership filtered by the subscriber_group_id column
 * @method     SubscriberGroupMembership findOneByCreatedAt(string $created_at) Return the first SubscriberGroupMembership filtered by the created_at column
 * @method     SubscriberGroupMembership findOneByUpdatedAt(string $updated_at) Return the first SubscriberGroupMembership filtered by the updated_at column
 * @method     SubscriberGroupMembership findOneByCreatedBy(int $created_by) Return the first SubscriberGroupMembership filtered by the created_by column
 * @method     SubscriberGroupMembership findOneByUpdatedBy(int $updated_by) Return the first SubscriberGroupMembership filtered by the updated_by column
 *
 * @method     array findBySubscriberId(int $subscriber_id) Return SubscriberGroupMembership objects filtered by the subscriber_id column
 * @method     array findBySubscriberGroupId(int $subscriber_group_id) Return SubscriberGroupMembership objects filtered by the subscriber_group_id column
 * @method     array findByCreatedAt(string $created_at) Return SubscriberGroupMembership objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return SubscriberGroupMembership objects filtered by the updated_at column
 * @method     array findByCreatedBy(int $created_by) Return SubscriberGroupMembership objects filtered by the created_by column
 * @method     array findByUpdatedBy(int $updated_by) Return SubscriberGroupMembership objects filtered by the updated_by column
 *
 * @package    propel.generator.model.om
 */
abstract class BaseSubscriberGroupMembershipQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseSubscriberGroupMembershipQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'mini_cms', $modelName = 'SubscriberGroupMembership', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SubscriberGroupMembershipQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SubscriberGroupMembershipQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SubscriberGroupMembershipQuery) {
			return $criteria;
		}
		$query = new SubscriberGroupMembershipQuery();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

	/**
	 * Find object by primary key
	 * <code>
	 * $obj = $c->findPk(array(12, 34), $con);
	 * </code>
	 * @param     array[$subscriber_id, $subscriber_group_id] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    SubscriberGroupMembership|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = SubscriberGroupMembershipPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && $this->getFormatter()->isObjectFormatter()) {
			// the object is alredy in the instance pool
			return $obj;
		} else {
			// the object has not been requested yet, or the formatter is not an object formatter
			$criteria = $this->isKeepQuery() ? clone $this : $this;
			$stmt = $criteria
				->filterByPrimaryKey($key)
				->getSelectStatement($con);
			return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
		}
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
	 * </code>
	 * @param     array $keys Primary keys to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{	
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		return $this
			->filterByPrimaryKeys($keys)
			->find($con);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    SubscriberGroupMembershipQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		$this->addUsingAlias(SubscriberGroupMembershipPeer::SUBSCRIBER_ID, $key[0], Criteria::EQUAL);
		$this->addUsingAlias(SubscriberGroupMembershipPeer::SUBSCRIBER_GROUP_ID, $key[1], Criteria::EQUAL);
		
		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SubscriberGroupMembershipQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		if (empty($keys)) {
			return $this->add(null, '1<>1', Criteria::CUSTOM);
		}
		foreach ($keys as $key) {
			$cton0 = $this->getNewCriterion(SubscriberGroupMembershipPeer::SUBSCRIBER_ID, $key[0], Criteria::EQUAL);
			$cton1 = $this->getNewCriterion(SubscriberGroupMembershipPeer::SUBSCRIBER_GROUP_ID, $key[1], Criteria::EQUAL);
			$cton0->addAnd($cton1);
			$this->addOr($cton0);
		}
		
		return $this;
	}

	/**
	 * Filter the query on the subscriber_id column
	 * 
	 * @param     int|array $subscriberId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SubscriberGroupMembershipQuery The current query, for fluid interface
	 */
	public function filterBySubscriberId($subscriberId = null, $comparison = null)
	{
		if (is_array($subscriberId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SubscriberGroupMembershipPeer::SUBSCRIBER_ID, $subscriberId, $comparison);
	}

	/**
	 * Filter the query on the subscriber_group_id column
	 * 
	 * @param     int|array $subscriberGroupId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SubscriberGroupMembershipQuery The current query, for fluid interface
	 */
	public function filterBySubscriberGroupId($subscriberGroupId = null, $comparison = null)
	{
		if (is_array($subscriberGroupId) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SubscriberGroupMembershipPeer::SUBSCRIBER_GROUP_ID, $subscriberGroupId, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SubscriberGroupMembershipQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(SubscriberGroupMembershipPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(SubscriberGroupMembershipPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SubscriberGroupMembershipPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SubscriberGroupMembershipQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(SubscriberGroupMembershipPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(SubscriberGroupMembershipPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SubscriberGroupMembershipPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query on the created_by column
	 * 
	 * @param     int|array $createdBy The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SubscriberGroupMembershipQuery The current query, for fluid interface
	 */
	public function filterByCreatedBy($createdBy = null, $comparison = null)
	{
		if (is_array($createdBy)) {
			$useMinMax = false;
			if (isset($createdBy['min'])) {
				$this->addUsingAlias(SubscriberGroupMembershipPeer::CREATED_BY, $createdBy['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdBy['max'])) {
				$this->addUsingAlias(SubscriberGroupMembershipPeer::CREATED_BY, $createdBy['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SubscriberGroupMembershipPeer::CREATED_BY, $createdBy, $comparison);
	}

	/**
	 * Filter the query on the updated_by column
	 * 
	 * @param     int|array $updatedBy The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SubscriberGroupMembershipQuery The current query, for fluid interface
	 */
	public function filterByUpdatedBy($updatedBy = null, $comparison = null)
	{
		if (is_array($updatedBy)) {
			$useMinMax = false;
			if (isset($updatedBy['min'])) {
				$this->addUsingAlias(SubscriberGroupMembershipPeer::UPDATED_BY, $updatedBy['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedBy['max'])) {
				$this->addUsingAlias(SubscriberGroupMembershipPeer::UPDATED_BY, $updatedBy['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SubscriberGroupMembershipPeer::UPDATED_BY, $updatedBy, $comparison);
	}

	/**
	 * Filter the query by a related Subscriber object
	 *
	 * @param     Subscriber $subscriber  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SubscriberGroupMembershipQuery The current query, for fluid interface
	 */
	public function filterBySubscriber($subscriber, $comparison = null)
	{
		return $this
			->addUsingAlias(SubscriberGroupMembershipPeer::SUBSCRIBER_ID, $subscriber->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Subscriber relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SubscriberGroupMembershipQuery The current query, for fluid interface
	 */
	public function joinSubscriber($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Subscriber');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Subscriber');
		}
		
		return $this;
	}

	/**
	 * Use the Subscriber relation Subscriber object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SubscriberQuery A secondary query class using the current class as primary query
	 */
	public function useSubscriberQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSubscriber($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Subscriber', 'SubscriberQuery');
	}

	/**
	 * Filter the query by a related SubscriberGroup object
	 *
	 * @param     SubscriberGroup $subscriberGroup  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SubscriberGroupMembershipQuery The current query, for fluid interface
	 */
	public function filterBySubscriberGroup($subscriberGroup, $comparison = null)
	{
		return $this
			->addUsingAlias(SubscriberGroupMembershipPeer::SUBSCRIBER_GROUP_ID, $subscriberGroup->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SubscriberGroup relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SubscriberGroupMembershipQuery The current query, for fluid interface
	 */
	public function joinSubscriberGroup($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SubscriberGroup');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'SubscriberGroup');
		}
		
		return $this;
	}

	/**
	 * Use the SubscriberGroup relation SubscriberGroup object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SubscriberGroupQuery A secondary query class using the current class as primary query
	 */
	public function useSubscriberGroupQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSubscriberGroup($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SubscriberGroup', 'SubscriberGroupQuery');
	}

	/**
	 * Filter the query by a related User object
	 *
	 * @param     User $user  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SubscriberGroupMembershipQuery The current query, for fluid interface
	 */
	public function filterByUserRelatedByCreatedBy($user, $comparison = null)
	{
		return $this
			->addUsingAlias(SubscriberGroupMembershipPeer::CREATED_BY, $user->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the UserRelatedByCreatedBy relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SubscriberGroupMembershipQuery The current query, for fluid interface
	 */
	public function joinUserRelatedByCreatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('UserRelatedByCreatedBy');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'UserRelatedByCreatedBy');
		}
		
		return $this;
	}

	/**
	 * Use the UserRelatedByCreatedBy relation User object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserQuery A secondary query class using the current class as primary query
	 */
	public function useUserRelatedByCreatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinUserRelatedByCreatedBy($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'UserRelatedByCreatedBy', 'UserQuery');
	}

	/**
	 * Filter the query by a related User object
	 *
	 * @param     User $user  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SubscriberGroupMembershipQuery The current query, for fluid interface
	 */
	public function filterByUserRelatedByUpdatedBy($user, $comparison = null)
	{
		return $this
			->addUsingAlias(SubscriberGroupMembershipPeer::UPDATED_BY, $user->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the UserRelatedByUpdatedBy relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SubscriberGroupMembershipQuery The current query, for fluid interface
	 */
	public function joinUserRelatedByUpdatedBy($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('UserRelatedByUpdatedBy');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'UserRelatedByUpdatedBy');
		}
		
		return $this;
	}

	/**
	 * Use the UserRelatedByUpdatedBy relation User object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserQuery A secondary query class using the current class as primary query
	 */
	public function useUserRelatedByUpdatedByQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinUserRelatedByUpdatedBy($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'UserRelatedByUpdatedBy', 'UserQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     SubscriberGroupMembership $subscriberGroupMembership Object to remove from the list of results
	 *
	 * @return    SubscriberGroupMembershipQuery The current query, for fluid interface
	 */
	public function prune($subscriberGroupMembership = null)
	{
		if ($subscriberGroupMembership) {
			$this->addCond('pruneCond0', $this->getAliasedColName(SubscriberGroupMembershipPeer::SUBSCRIBER_ID), $subscriberGroupMembership->getSubscriberId(), Criteria::NOT_EQUAL);
			$this->addCond('pruneCond1', $this->getAliasedColName(SubscriberGroupMembershipPeer::SUBSCRIBER_GROUP_ID), $subscriberGroupMembership->getSubscriberGroupId(), Criteria::NOT_EQUAL);
			$this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
	  }
	  
		return $this;
	}

	// extended_timestampable behavior
	
	/**
	 * Filter by the latest updated
	 *
	 * @param      int $nbDays Maximum age of the latest update in days
	 *
	 * @return     SubscriberGroupMembershipQuery The current query, for fuid interface
	 */
	public function recentlyUpdated($nbDays = 7)
	{
		return $this->addUsingAlias(SubscriberGroupMembershipPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Filter by the latest created
	 *
	 * @param      int $nbDays Maximum age of in days
	 *
	 * @return     SubscriberGroupMembershipQuery The current query, for fuid interface
	 */
	public function recentlyCreated($nbDays = 7)
	{
		return $this->addUsingAlias(SubscriberGroupMembershipPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Order by update date desc
	 *
	 * @return     SubscriberGroupMembershipQuery The current query, for fuid interface
	 */
	public function lastUpdatedFirst()
	{
		return $this->addDescendingOrderByColumn(SubscriberGroupMembershipPeer::UPDATED_AT);
	}
	
	/**
	 * Order by update date asc
	 *
	 * @return     SubscriberGroupMembershipQuery The current query, for fuid interface
	 */
	public function firstUpdatedFirst()
	{
		return $this->addAscendingOrderByColumn(SubscriberGroupMembershipPeer::UPDATED_AT);
	}
	
	/**
	 * Order by create date desc
	 *
	 * @return     SubscriberGroupMembershipQuery The current query, for fuid interface
	 */
	public function lastCreatedFirst()
	{
		return $this->addDescendingOrderByColumn(SubscriberGroupMembershipPeer::CREATED_AT);
	}
	
	/**
	 * Order by create date asc
	 *
	 * @return     SubscriberGroupMembershipQuery The current query, for fuid interface
	 */
	public function firstCreatedFirst()
	{
		return $this->addAscendingOrderByColumn(SubscriberGroupMembershipPeer::CREATED_AT);
	}

} // BaseSubscriberGroupMembershipQuery
