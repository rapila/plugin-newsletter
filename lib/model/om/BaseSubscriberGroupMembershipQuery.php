<?php


/**
 * Base class that represents a query for the 'subscriber_group_memberships' table.
 *
 * 
 *
 * @method     SubscriberGroupMembershipQuery orderBySubscriberId($order = Criteria::ASC) Order by the subscriber_id column
 * @method     SubscriberGroupMembershipQuery orderBySubscriberGroupId($order = Criteria::ASC) Order by the subscriber_group_id column
 * @method     SubscriberGroupMembershipQuery orderByOptInConfirmRequired($order = Criteria::ASC) Order by the opt_in_confirm_required column
 * @method     SubscriberGroupMembershipQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     SubscriberGroupMembershipQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     SubscriberGroupMembershipQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method     SubscriberGroupMembershipQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 *
 * @method     SubscriberGroupMembershipQuery groupBySubscriberId() Group by the subscriber_id column
 * @method     SubscriberGroupMembershipQuery groupBySubscriberGroupId() Group by the subscriber_group_id column
 * @method     SubscriberGroupMembershipQuery groupByOptInConfirmRequired() Group by the opt_in_confirm_required column
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
 * @method     SubscriberGroupMembership findOneByOptInConfirmRequired(boolean $opt_in_confirm_required) Return the first SubscriberGroupMembership filtered by the opt_in_confirm_required column
 * @method     SubscriberGroupMembership findOneByCreatedAt(string $created_at) Return the first SubscriberGroupMembership filtered by the created_at column
 * @method     SubscriberGroupMembership findOneByUpdatedAt(string $updated_at) Return the first SubscriberGroupMembership filtered by the updated_at column
 * @method     SubscriberGroupMembership findOneByCreatedBy(int $created_by) Return the first SubscriberGroupMembership filtered by the created_by column
 * @method     SubscriberGroupMembership findOneByUpdatedBy(int $updated_by) Return the first SubscriberGroupMembership filtered by the updated_by column
 *
 * @method     array findBySubscriberId(int $subscriber_id) Return SubscriberGroupMembership objects filtered by the subscriber_id column
 * @method     array findBySubscriberGroupId(int $subscriber_group_id) Return SubscriberGroupMembership objects filtered by the subscriber_group_id column
 * @method     array findByOptInConfirmRequired(boolean $opt_in_confirm_required) Return SubscriberGroupMembership objects filtered by the opt_in_confirm_required column
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
	public function __construct($dbName = 'rapila', $modelName = 'SubscriberGroupMembership', $modelAlias = null)
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
	 * Find object by primary key.
	 * Propel uses the instance pool to skip the database if the object exists.
	 * Go fast if the query is untouched.
	 *
	 * <code>
	 * $obj = $c->findPk(array(12, 34), $con);
	 * </code>
	 *
	 * @param     array[$subscriber_id, $subscriber_group_id] $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    SubscriberGroupMembership|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ($key === null) {
			return null;
		}
		if ((null !== ($obj = SubscriberGroupMembershipPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
			// the object is alredy in the instance pool
			return $obj;
		}
		if ($con === null) {
			$con = Propel::getConnection(SubscriberGroupMembershipPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
		$this->basePreSelect($con);
		if ($this->formatter || $this->modelAlias || $this->with || $this->select
		 || $this->selectColumns || $this->asColumns || $this->selectModifiers
		 || $this->map || $this->having || $this->joins) {
			return $this->findPkComplex($key, $con);
		} else {
			return $this->findPkSimple($key, $con);
		}
	}

	/**
	 * Find object by primary key using raw SQL to go fast.
	 * Bypass doSelect() and the object formatter by using generated code.
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con A connection object
	 *
	 * @return    SubscriberGroupMembership A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, $con)
	{
		$sql = 'SELECT `SUBSCRIBER_ID`, `SUBSCRIBER_GROUP_ID`, `OPT_IN_CONFIRM_REQUIRED`, `CREATED_AT`, `UPDATED_AT`, `CREATED_BY`, `UPDATED_BY` FROM `subscriber_group_memberships` WHERE `SUBSCRIBER_ID` = :p0 AND `SUBSCRIBER_GROUP_ID` = :p1';
		try {
			$stmt = $con->prepare($sql);
			$stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
			$stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);
			throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
		}
		$obj = null;
		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$obj = new SubscriberGroupMembership();
			$obj->hydrate($row);
			SubscriberGroupMembershipPeer::addInstanceToPool($obj, serialize(array((string) $row[0], (string) $row[1])));
		}
		$stmt->closeCursor();

		return $obj;
	}

	/**
	 * Find object by primary key.
	 *
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con A connection object
	 *
	 * @return    SubscriberGroupMembership|array|mixed the result, formatted by the current formatter
	 */
	protected function findPkComplex($key, $con)
	{
		// As the query uses a PK condition, no limit(1) is necessary.
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		$stmt = $criteria
			->filterByPrimaryKey($key)
			->doSelect($con);
		return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
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
		if ($con === null) {
			$con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
		}
		$this->basePreSelect($con);
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		$stmt = $criteria
			->filterByPrimaryKeys($keys)
			->doSelect($con);
		return $criteria->getFormatter()->init($criteria)->format($stmt);
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
	 * Example usage:
	 * <code>
	 * $query->filterBySubscriberId(1234); // WHERE subscriber_id = 1234
	 * $query->filterBySubscriberId(array(12, 34)); // WHERE subscriber_id IN (12, 34)
	 * $query->filterBySubscriberId(array('min' => 12)); // WHERE subscriber_id > 12
	 * </code>
	 *
	 * @see       filterBySubscriber()
	 *
	 * @param     mixed $subscriberId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
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
	 * Example usage:
	 * <code>
	 * $query->filterBySubscriberGroupId(1234); // WHERE subscriber_group_id = 1234
	 * $query->filterBySubscriberGroupId(array(12, 34)); // WHERE subscriber_group_id IN (12, 34)
	 * $query->filterBySubscriberGroupId(array('min' => 12)); // WHERE subscriber_group_id > 12
	 * </code>
	 *
	 * @see       filterBySubscriberGroup()
	 *
	 * @param     mixed $subscriberGroupId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
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
	 * Filter the query on the opt_in_confirm_required column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByOptInConfirmRequired(true); // WHERE opt_in_confirm_required = true
	 * $query->filterByOptInConfirmRequired('yes'); // WHERE opt_in_confirm_required = true
	 * </code>
	 *
	 * @param     boolean|string $optInConfirmRequired The value to use as filter.
	 *              Non-boolean arguments are converted using the following rules:
	 *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SubscriberGroupMembershipQuery The current query, for fluid interface
	 */
	public function filterByOptInConfirmRequired($optInConfirmRequired = null, $comparison = null)
	{
		if (is_string($optInConfirmRequired)) {
			$opt_in_confirm_required = in_array(strtolower($optInConfirmRequired), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
		}
		return $this->addUsingAlias(SubscriberGroupMembershipPeer::OPT_IN_CONFIRM_REQUIRED, $optInConfirmRequired, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
	 * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
	 * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $createdAt The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
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
	 * Example usage:
	 * <code>
	 * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
	 * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
	 * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
	 * </code>
	 *
	 * @param     mixed $updatedAt The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
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
	 * Example usage:
	 * <code>
	 * $query->filterByCreatedBy(1234); // WHERE created_by = 1234
	 * $query->filterByCreatedBy(array(12, 34)); // WHERE created_by IN (12, 34)
	 * $query->filterByCreatedBy(array('min' => 12)); // WHERE created_by > 12
	 * </code>
	 *
	 * @see       filterByUserRelatedByCreatedBy()
	 *
	 * @param     mixed $createdBy The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
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
	 * Example usage:
	 * <code>
	 * $query->filterByUpdatedBy(1234); // WHERE updated_by = 1234
	 * $query->filterByUpdatedBy(array(12, 34)); // WHERE updated_by IN (12, 34)
	 * $query->filterByUpdatedBy(array('min' => 12)); // WHERE updated_by > 12
	 * </code>
	 *
	 * @see       filterByUserRelatedByUpdatedBy()
	 *
	 * @param     mixed $updatedBy The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
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
	 * @param     Subscriber|PropelCollection $subscriber The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SubscriberGroupMembershipQuery The current query, for fluid interface
	 */
	public function filterBySubscriber($subscriber, $comparison = null)
	{
		if ($subscriber instanceof Subscriber) {
			return $this
				->addUsingAlias(SubscriberGroupMembershipPeer::SUBSCRIBER_ID, $subscriber->getId(), $comparison);
		} elseif ($subscriber instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(SubscriberGroupMembershipPeer::SUBSCRIBER_ID, $subscriber->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterBySubscriber() only accepts arguments of type Subscriber or PropelCollection');
		}
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
	 * @param     SubscriberGroup|PropelCollection $subscriberGroup The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SubscriberGroupMembershipQuery The current query, for fluid interface
	 */
	public function filterBySubscriberGroup($subscriberGroup, $comparison = null)
	{
		if ($subscriberGroup instanceof SubscriberGroup) {
			return $this
				->addUsingAlias(SubscriberGroupMembershipPeer::SUBSCRIBER_GROUP_ID, $subscriberGroup->getId(), $comparison);
		} elseif ($subscriberGroup instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(SubscriberGroupMembershipPeer::SUBSCRIBER_GROUP_ID, $subscriberGroup->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterBySubscriberGroup() only accepts arguments of type SubscriberGroup or PropelCollection');
		}
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
	 * @param     User|PropelCollection $user The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SubscriberGroupMembershipQuery The current query, for fluid interface
	 */
	public function filterByUserRelatedByCreatedBy($user, $comparison = null)
	{
		if ($user instanceof User) {
			return $this
				->addUsingAlias(SubscriberGroupMembershipPeer::CREATED_BY, $user->getId(), $comparison);
		} elseif ($user instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(SubscriberGroupMembershipPeer::CREATED_BY, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByUserRelatedByCreatedBy() only accepts arguments of type User or PropelCollection');
		}
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
	 * @param     User|PropelCollection $user The related object(s) to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SubscriberGroupMembershipQuery The current query, for fluid interface
	 */
	public function filterByUserRelatedByUpdatedBy($user, $comparison = null)
	{
		if ($user instanceof User) {
			return $this
				->addUsingAlias(SubscriberGroupMembershipPeer::UPDATED_BY, $user->getId(), $comparison);
		} elseif ($user instanceof PropelCollection) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
			return $this
				->addUsingAlias(SubscriberGroupMembershipPeer::UPDATED_BY, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
		} else {
			throw new PropelException('filterByUserRelatedByUpdatedBy() only accepts arguments of type User or PropelCollection');
		}
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
	 * @return     SubscriberGroupMembershipQuery The current query, for fluid interface
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
	 * @return     SubscriberGroupMembershipQuery The current query, for fluid interface
	 */
	public function recentlyCreated($nbDays = 7)
	{
		return $this->addUsingAlias(SubscriberGroupMembershipPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Order by update date desc
	 *
	 * @return     SubscriberGroupMembershipQuery The current query, for fluid interface
	 */
	public function lastUpdatedFirst()
	{
		return $this->addDescendingOrderByColumn(SubscriberGroupMembershipPeer::UPDATED_AT);
	}
	
	/**
	 * Order by update date asc
	 *
	 * @return     SubscriberGroupMembershipQuery The current query, for fluid interface
	 */
	public function firstUpdatedFirst()
	{
		return $this->addAscendingOrderByColumn(SubscriberGroupMembershipPeer::UPDATED_AT);
	}
	
	/**
	 * Order by create date desc
	 *
	 * @return     SubscriberGroupMembershipQuery The current query, for fluid interface
	 */
	public function lastCreatedFirst()
	{
		return $this->addDescendingOrderByColumn(SubscriberGroupMembershipPeer::CREATED_AT);
	}
	
	/**
	 * Order by create date asc
	 *
	 * @return     SubscriberGroupMembershipQuery The current query, for fluid interface
	 */
	public function firstCreatedFirst()
	{
		return $this->addAscendingOrderByColumn(SubscriberGroupMembershipPeer::CREATED_AT);
	}

} // BaseSubscriberGroupMembershipQuery