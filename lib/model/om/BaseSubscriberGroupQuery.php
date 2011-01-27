<?php


/**
 * Base class that represents a query for the 'subscriber_groups' table.
 *
 * 
 *
 * @method     SubscriberGroupQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SubscriberGroupQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     SubscriberGroupQuery orderBySenderEmail($order = Criteria::ASC) Order by the sender_email column
 * @method     SubscriberGroupQuery orderByIsDefault($order = Criteria::ASC) Order by the is_default column
 * @method     SubscriberGroupQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     SubscriberGroupQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     SubscriberGroupQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     SubscriberGroupQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method     SubscriberGroupQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 *
 * @method     SubscriberGroupQuery groupById() Group by the id column
 * @method     SubscriberGroupQuery groupByName() Group by the name column
 * @method     SubscriberGroupQuery groupBySenderEmail() Group by the sender_email column
 * @method     SubscriberGroupQuery groupByIsDefault() Group by the is_default column
 * @method     SubscriberGroupQuery groupByDescription() Group by the description column
 * @method     SubscriberGroupQuery groupByCreatedAt() Group by the created_at column
 * @method     SubscriberGroupQuery groupByUpdatedAt() Group by the updated_at column
 * @method     SubscriberGroupQuery groupByCreatedBy() Group by the created_by column
 * @method     SubscriberGroupQuery groupByUpdatedBy() Group by the updated_by column
 *
 * @method     SubscriberGroupQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SubscriberGroupQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SubscriberGroupQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SubscriberGroupQuery leftJoinUserRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByCreatedBy relation
 * @method     SubscriberGroupQuery rightJoinUserRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByCreatedBy relation
 * @method     SubscriberGroupQuery innerJoinUserRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByCreatedBy relation
 *
 * @method     SubscriberGroupQuery leftJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByUpdatedBy relation
 * @method     SubscriberGroupQuery rightJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByUpdatedBy relation
 * @method     SubscriberGroupQuery innerJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByUpdatedBy relation
 *
 * @method     SubscriberGroupQuery leftJoinNewsletterMailing($relationAlias = null) Adds a LEFT JOIN clause to the query using the NewsletterMailing relation
 * @method     SubscriberGroupQuery rightJoinNewsletterMailing($relationAlias = null) Adds a RIGHT JOIN clause to the query using the NewsletterMailing relation
 * @method     SubscriberGroupQuery innerJoinNewsletterMailing($relationAlias = null) Adds a INNER JOIN clause to the query using the NewsletterMailing relation
 *
 * @method     SubscriberGroupQuery leftJoinSubscriberGroupMembership($relationAlias = null) Adds a LEFT JOIN clause to the query using the SubscriberGroupMembership relation
 * @method     SubscriberGroupQuery rightJoinSubscriberGroupMembership($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SubscriberGroupMembership relation
 * @method     SubscriberGroupQuery innerJoinSubscriberGroupMembership($relationAlias = null) Adds a INNER JOIN clause to the query using the SubscriberGroupMembership relation
 *
 * @method     SubscriberGroup findOne(PropelPDO $con = null) Return the first SubscriberGroup matching the query
 * @method     SubscriberGroup findOneOrCreate(PropelPDO $con = null) Return the first SubscriberGroup matching the query, or a new SubscriberGroup object populated from the query conditions when no match is found
 *
 * @method     SubscriberGroup findOneById(int $id) Return the first SubscriberGroup filtered by the id column
 * @method     SubscriberGroup findOneByName(string $name) Return the first SubscriberGroup filtered by the name column
 * @method     SubscriberGroup findOneBySenderEmail(string $sender_email) Return the first SubscriberGroup filtered by the sender_email column
 * @method     SubscriberGroup findOneByIsDefault(boolean $is_default) Return the first SubscriberGroup filtered by the is_default column
 * @method     SubscriberGroup findOneByDescription(string $description) Return the first SubscriberGroup filtered by the description column
 * @method     SubscriberGroup findOneByCreatedAt(string $created_at) Return the first SubscriberGroup filtered by the created_at column
 * @method     SubscriberGroup findOneByUpdatedAt(string $updated_at) Return the first SubscriberGroup filtered by the updated_at column
 * @method     SubscriberGroup findOneByCreatedBy(int $created_by) Return the first SubscriberGroup filtered by the created_by column
 * @method     SubscriberGroup findOneByUpdatedBy(int $updated_by) Return the first SubscriberGroup filtered by the updated_by column
 *
 * @method     array findById(int $id) Return SubscriberGroup objects filtered by the id column
 * @method     array findByName(string $name) Return SubscriberGroup objects filtered by the name column
 * @method     array findBySenderEmail(string $sender_email) Return SubscriberGroup objects filtered by the sender_email column
 * @method     array findByIsDefault(boolean $is_default) Return SubscriberGroup objects filtered by the is_default column
 * @method     array findByDescription(string $description) Return SubscriberGroup objects filtered by the description column
 * @method     array findByCreatedAt(string $created_at) Return SubscriberGroup objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return SubscriberGroup objects filtered by the updated_at column
 * @method     array findByCreatedBy(int $created_by) Return SubscriberGroup objects filtered by the created_by column
 * @method     array findByUpdatedBy(int $updated_by) Return SubscriberGroup objects filtered by the updated_by column
 *
 * @package    propel.generator.model.om
 */
abstract class BaseSubscriberGroupQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseSubscriberGroupQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'mini_cms', $modelName = 'SubscriberGroup', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SubscriberGroupQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SubscriberGroupQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SubscriberGroupQuery) {
			return $criteria;
		}
		$query = new SubscriberGroupQuery();
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
	 * Use instance pooling to avoid a database query if the object exists
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    SubscriberGroup|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = SubscriberGroupPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * $objs = $c->findPks(array(12, 56, 832), $con);
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
	 * @return    SubscriberGroupQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SubscriberGroupPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SubscriberGroupQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SubscriberGroupPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SubscriberGroupQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SubscriberGroupPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the name column
	 * 
	 * @param     string $name The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SubscriberGroupQuery The current query, for fluid interface
	 */
	public function filterByName($name = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($name)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $name)) {
				$name = str_replace('*', '%', $name);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SubscriberGroupPeer::NAME, $name, $comparison);
	}

	/**
	 * Filter the query on the sender_email column
	 * 
	 * @param     string $senderEmail The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SubscriberGroupQuery The current query, for fluid interface
	 */
	public function filterBySenderEmail($senderEmail = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($senderEmail)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $senderEmail)) {
				$senderEmail = str_replace('*', '%', $senderEmail);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SubscriberGroupPeer::SENDER_EMAIL, $senderEmail, $comparison);
	}

	/**
	 * Filter the query on the is_default column
	 * 
	 * @param     boolean|string $isDefault The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SubscriberGroupQuery The current query, for fluid interface
	 */
	public function filterByIsDefault($isDefault = null, $comparison = null)
	{
		if (is_string($isDefault)) {
			$is_default = in_array(strtolower($isDefault), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(SubscriberGroupPeer::IS_DEFAULT, $isDefault, $comparison);
	}

	/**
	 * Filter the query on the description column
	 * 
	 * @param     string $description The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SubscriberGroupQuery The current query, for fluid interface
	 */
	public function filterByDescription($description = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($description)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $description)) {
				$description = str_replace('*', '%', $description);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SubscriberGroupPeer::DESCRIPTION, $description, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SubscriberGroupQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(SubscriberGroupPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(SubscriberGroupPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SubscriberGroupPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SubscriberGroupQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(SubscriberGroupPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(SubscriberGroupPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SubscriberGroupPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query on the created_by column
	 * 
	 * @param     int|array $createdBy The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SubscriberGroupQuery The current query, for fluid interface
	 */
	public function filterByCreatedBy($createdBy = null, $comparison = null)
	{
		if (is_array($createdBy)) {
			$useMinMax = false;
			if (isset($createdBy['min'])) {
				$this->addUsingAlias(SubscriberGroupPeer::CREATED_BY, $createdBy['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdBy['max'])) {
				$this->addUsingAlias(SubscriberGroupPeer::CREATED_BY, $createdBy['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SubscriberGroupPeer::CREATED_BY, $createdBy, $comparison);
	}

	/**
	 * Filter the query on the updated_by column
	 * 
	 * @param     int|array $updatedBy The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SubscriberGroupQuery The current query, for fluid interface
	 */
	public function filterByUpdatedBy($updatedBy = null, $comparison = null)
	{
		if (is_array($updatedBy)) {
			$useMinMax = false;
			if (isset($updatedBy['min'])) {
				$this->addUsingAlias(SubscriberGroupPeer::UPDATED_BY, $updatedBy['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedBy['max'])) {
				$this->addUsingAlias(SubscriberGroupPeer::UPDATED_BY, $updatedBy['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SubscriberGroupPeer::UPDATED_BY, $updatedBy, $comparison);
	}

	/**
	 * Filter the query by a related User object
	 *
	 * @param     User $user  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SubscriberGroupQuery The current query, for fluid interface
	 */
	public function filterByUserRelatedByCreatedBy($user, $comparison = null)
	{
		return $this
			->addUsingAlias(SubscriberGroupPeer::CREATED_BY, $user->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the UserRelatedByCreatedBy relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SubscriberGroupQuery The current query, for fluid interface
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
	 * @return    SubscriberGroupQuery The current query, for fluid interface
	 */
	public function filterByUserRelatedByUpdatedBy($user, $comparison = null)
	{
		return $this
			->addUsingAlias(SubscriberGroupPeer::UPDATED_BY, $user->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the UserRelatedByUpdatedBy relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SubscriberGroupQuery The current query, for fluid interface
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
	 * Filter the query by a related NewsletterMailing object
	 *
	 * @param     NewsletterMailing $newsletterMailing  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SubscriberGroupQuery The current query, for fluid interface
	 */
	public function filterByNewsletterMailing($newsletterMailing, $comparison = null)
	{
		return $this
			->addUsingAlias(SubscriberGroupPeer::ID, $newsletterMailing->getSubscriberGroupId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the NewsletterMailing relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SubscriberGroupQuery The current query, for fluid interface
	 */
	public function joinNewsletterMailing($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('NewsletterMailing');
		
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
			$this->addJoinObject($join, 'NewsletterMailing');
		}
		
		return $this;
	}

	/**
	 * Use the NewsletterMailing relation NewsletterMailing object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    NewsletterMailingQuery A secondary query class using the current class as primary query
	 */
	public function useNewsletterMailingQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinNewsletterMailing($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'NewsletterMailing', 'NewsletterMailingQuery');
	}

	/**
	 * Filter the query by a related SubscriberGroupMembership object
	 *
	 * @param     SubscriberGroupMembership $subscriberGroupMembership  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SubscriberGroupQuery The current query, for fluid interface
	 */
	public function filterBySubscriberGroupMembership($subscriberGroupMembership, $comparison = null)
	{
		return $this
			->addUsingAlias(SubscriberGroupPeer::ID, $subscriberGroupMembership->getSubscriberGroupId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SubscriberGroupMembership relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SubscriberGroupQuery The current query, for fluid interface
	 */
	public function joinSubscriberGroupMembership($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('SubscriberGroupMembership');
		
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
			$this->addJoinObject($join, 'SubscriberGroupMembership');
		}
		
		return $this;
	}

	/**
	 * Use the SubscriberGroupMembership relation SubscriberGroupMembership object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SubscriberGroupMembershipQuery A secondary query class using the current class as primary query
	 */
	public function useSubscriberGroupMembershipQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinSubscriberGroupMembership($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SubscriberGroupMembership', 'SubscriberGroupMembershipQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     SubscriberGroup $subscriberGroup Object to remove from the list of results
	 *
	 * @return    SubscriberGroupQuery The current query, for fluid interface
	 */
	public function prune($subscriberGroup = null)
	{
		if ($subscriberGroup) {
			$this->addUsingAlias(SubscriberGroupPeer::ID, $subscriberGroup->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

	// extended_timestampable behavior
	
	/**
	 * Filter by the latest updated
	 *
	 * @param      int $nbDays Maximum age of the latest update in days
	 *
	 * @return     SubscriberGroupQuery The current query, for fuid interface
	 */
	public function recentlyUpdated($nbDays = 7)
	{
		return $this->addUsingAlias(SubscriberGroupPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Filter by the latest created
	 *
	 * @param      int $nbDays Maximum age of in days
	 *
	 * @return     SubscriberGroupQuery The current query, for fuid interface
	 */
	public function recentlyCreated($nbDays = 7)
	{
		return $this->addUsingAlias(SubscriberGroupPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Order by update date desc
	 *
	 * @return     SubscriberGroupQuery The current query, for fuid interface
	 */
	public function lastUpdatedFirst()
	{
		return $this->addDescendingOrderByColumn(SubscriberGroupPeer::UPDATED_AT);
	}
	
	/**
	 * Order by update date asc
	 *
	 * @return     SubscriberGroupQuery The current query, for fuid interface
	 */
	public function firstUpdatedFirst()
	{
		return $this->addAscendingOrderByColumn(SubscriberGroupPeer::UPDATED_AT);
	}
	
	/**
	 * Order by create date desc
	 *
	 * @return     SubscriberGroupQuery The current query, for fuid interface
	 */
	public function lastCreatedFirst()
	{
		return $this->addDescendingOrderByColumn(SubscriberGroupPeer::CREATED_AT);
	}
	
	/**
	 * Order by create date asc
	 *
	 * @return     SubscriberGroupQuery The current query, for fuid interface
	 */
	public function firstCreatedFirst()
	{
		return $this->addAscendingOrderByColumn(SubscriberGroupPeer::CREATED_AT);
	}

} // BaseSubscriberGroupQuery
