<?php


/**
 * Base class that represents a query for the 'newsletter_mailings' table.
 *
 * 
 *
 * @method     NewsletterMailingQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     NewsletterMailingQuery orderByDateSent($order = Criteria::ASC) Order by the date_sent column
 * @method     NewsletterMailingQuery orderBySubscriberGroupId($order = Criteria::ASC) Order by the subscriber_group_id column
 * @method     NewsletterMailingQuery orderByExternalMailGroupId($order = Criteria::ASC) Order by the external_mail_group_id column
 * @method     NewsletterMailingQuery orderByNewsletterId($order = Criteria::ASC) Order by the newsletter_id column
 * @method     NewsletterMailingQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method     NewsletterMailingQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     NewsletterMailingQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     NewsletterMailingQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 *
 * @method     NewsletterMailingQuery groupById() Group by the id column
 * @method     NewsletterMailingQuery groupByDateSent() Group by the date_sent column
 * @method     NewsletterMailingQuery groupBySubscriberGroupId() Group by the subscriber_group_id column
 * @method     NewsletterMailingQuery groupByExternalMailGroupId() Group by the external_mail_group_id column
 * @method     NewsletterMailingQuery groupByNewsletterId() Group by the newsletter_id column
 * @method     NewsletterMailingQuery groupByCreatedBy() Group by the created_by column
 * @method     NewsletterMailingQuery groupByCreatedAt() Group by the created_at column
 * @method     NewsletterMailingQuery groupByUpdatedAt() Group by the updated_at column
 * @method     NewsletterMailingQuery groupByUpdatedBy() Group by the updated_by column
 *
 * @method     NewsletterMailingQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     NewsletterMailingQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     NewsletterMailingQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     NewsletterMailingQuery leftJoinSubscriberGroup($relationAlias = '') Adds a LEFT JOIN clause to the query using the SubscriberGroup relation
 * @method     NewsletterMailingQuery rightJoinSubscriberGroup($relationAlias = '') Adds a RIGHT JOIN clause to the query using the SubscriberGroup relation
 * @method     NewsletterMailingQuery innerJoinSubscriberGroup($relationAlias = '') Adds a INNER JOIN clause to the query using the SubscriberGroup relation
 *
 * @method     NewsletterMailingQuery leftJoinNewsletter($relationAlias = '') Adds a LEFT JOIN clause to the query using the Newsletter relation
 * @method     NewsletterMailingQuery rightJoinNewsletter($relationAlias = '') Adds a RIGHT JOIN clause to the query using the Newsletter relation
 * @method     NewsletterMailingQuery innerJoinNewsletter($relationAlias = '') Adds a INNER JOIN clause to the query using the Newsletter relation
 *
 * @method     NewsletterMailingQuery leftJoinUser($relationAlias = '') Adds a LEFT JOIN clause to the query using the User relation
 * @method     NewsletterMailingQuery rightJoinUser($relationAlias = '') Adds a RIGHT JOIN clause to the query using the User relation
 * @method     NewsletterMailingQuery innerJoinUser($relationAlias = '') Adds a INNER JOIN clause to the query using the User relation
 *
 * @method     NewsletterMailing findOne(PropelPDO $con = null) Return the first NewsletterMailing matching the query
 * @method     NewsletterMailing findOneById(int $id) Return the first NewsletterMailing filtered by the id column
 * @method     NewsletterMailing findOneByDateSent(string $date_sent) Return the first NewsletterMailing filtered by the date_sent column
 * @method     NewsletterMailing findOneBySubscriberGroupId(int $subscriber_group_id) Return the first NewsletterMailing filtered by the subscriber_group_id column
 * @method     NewsletterMailing findOneByExternalMailGroupId(string $external_mail_group_id) Return the first NewsletterMailing filtered by the external_mail_group_id column
 * @method     NewsletterMailing findOneByNewsletterId(int $newsletter_id) Return the first NewsletterMailing filtered by the newsletter_id column
 * @method     NewsletterMailing findOneByCreatedBy(int $created_by) Return the first NewsletterMailing filtered by the created_by column
 * @method     NewsletterMailing findOneByCreatedAt(string $created_at) Return the first NewsletterMailing filtered by the created_at column
 * @method     NewsletterMailing findOneByUpdatedAt(string $updated_at) Return the first NewsletterMailing filtered by the updated_at column
 * @method     NewsletterMailing findOneByUpdatedBy(int $updated_by) Return the first NewsletterMailing filtered by the updated_by column
 *
 * @method     array findById(int $id) Return NewsletterMailing objects filtered by the id column
 * @method     array findByDateSent(string $date_sent) Return NewsletterMailing objects filtered by the date_sent column
 * @method     array findBySubscriberGroupId(int $subscriber_group_id) Return NewsletterMailing objects filtered by the subscriber_group_id column
 * @method     array findByExternalMailGroupId(string $external_mail_group_id) Return NewsletterMailing objects filtered by the external_mail_group_id column
 * @method     array findByNewsletterId(int $newsletter_id) Return NewsletterMailing objects filtered by the newsletter_id column
 * @method     array findByCreatedBy(int $created_by) Return NewsletterMailing objects filtered by the created_by column
 * @method     array findByCreatedAt(string $created_at) Return NewsletterMailing objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return NewsletterMailing objects filtered by the updated_at column
 * @method     array findByUpdatedBy(int $updated_by) Return NewsletterMailing objects filtered by the updated_by column
 *
 * @package    propel.generator.model.om
 */
abstract class BaseNewsletterMailingQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseNewsletterMailingQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'mini_cms', $modelName = 'NewsletterMailing', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new NewsletterMailingQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    NewsletterMailingQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof NewsletterMailingQuery) {
			return $criteria;
		}
		$query = new NewsletterMailingQuery();
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
	 * @return    NewsletterMailing|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = NewsletterMailingPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    NewsletterMailingQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(NewsletterMailingPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    NewsletterMailingQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(NewsletterMailingPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewsletterMailingQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(NewsletterMailingPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the date_sent column
	 * 
	 * @param     string|array $dateSent The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewsletterMailingQuery The current query, for fluid interface
	 */
	public function filterByDateSent($dateSent = null, $comparison = null)
	{
		if (is_array($dateSent)) {
			$useMinMax = false;
			if (isset($dateSent['min'])) {
				$this->addUsingAlias(NewsletterMailingPeer::DATE_SENT, $dateSent['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($dateSent['max'])) {
				$this->addUsingAlias(NewsletterMailingPeer::DATE_SENT, $dateSent['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(NewsletterMailingPeer::DATE_SENT, $dateSent, $comparison);
	}

	/**
	 * Filter the query on the subscriber_group_id column
	 * 
	 * @param     int|array $subscriberGroupId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewsletterMailingQuery The current query, for fluid interface
	 */
	public function filterBySubscriberGroupId($subscriberGroupId = null, $comparison = null)
	{
		if (is_array($subscriberGroupId)) {
			$useMinMax = false;
			if (isset($subscriberGroupId['min'])) {
				$this->addUsingAlias(NewsletterMailingPeer::SUBSCRIBER_GROUP_ID, $subscriberGroupId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($subscriberGroupId['max'])) {
				$this->addUsingAlias(NewsletterMailingPeer::SUBSCRIBER_GROUP_ID, $subscriberGroupId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(NewsletterMailingPeer::SUBSCRIBER_GROUP_ID, $subscriberGroupId, $comparison);
	}

	/**
	 * Filter the query on the external_mail_group_id column
	 * 
	 * @param     string $externalMailGroupId The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewsletterMailingQuery The current query, for fluid interface
	 */
	public function filterByExternalMailGroupId($externalMailGroupId = null, $comparison = null)
	{
		if (is_array($externalMailGroupId)) {
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		} elseif (preg_match('/[\%\*]/', $externalMailGroupId)) {
			$externalMailGroupId = str_replace('*', '%', $externalMailGroupId);
			if (null === $comparison) {
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(NewsletterMailingPeer::EXTERNAL_MAIL_GROUP_ID, $externalMailGroupId, $comparison);
	}

	/**
	 * Filter the query on the newsletter_id column
	 * 
	 * @param     int|array $newsletterId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewsletterMailingQuery The current query, for fluid interface
	 */
	public function filterByNewsletterId($newsletterId = null, $comparison = null)
	{
		if (is_array($newsletterId)) {
			$useMinMax = false;
			if (isset($newsletterId['min'])) {
				$this->addUsingAlias(NewsletterMailingPeer::NEWSLETTER_ID, $newsletterId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($newsletterId['max'])) {
				$this->addUsingAlias(NewsletterMailingPeer::NEWSLETTER_ID, $newsletterId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(NewsletterMailingPeer::NEWSLETTER_ID, $newsletterId, $comparison);
	}

	/**
	 * Filter the query on the created_by column
	 * 
	 * @param     int|array $createdBy The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewsletterMailingQuery The current query, for fluid interface
	 */
	public function filterByCreatedBy($createdBy = null, $comparison = null)
	{
		if (is_array($createdBy)) {
			$useMinMax = false;
			if (isset($createdBy['min'])) {
				$this->addUsingAlias(NewsletterMailingPeer::CREATED_BY, $createdBy['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdBy['max'])) {
				$this->addUsingAlias(NewsletterMailingPeer::CREATED_BY, $createdBy['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(NewsletterMailingPeer::CREATED_BY, $createdBy, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewsletterMailingQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(NewsletterMailingPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(NewsletterMailingPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(NewsletterMailingPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewsletterMailingQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(NewsletterMailingPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(NewsletterMailingPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(NewsletterMailingPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query on the updated_by column
	 * 
	 * @param     int|array $updatedBy The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewsletterMailingQuery The current query, for fluid interface
	 */
	public function filterByUpdatedBy($updatedBy = null, $comparison = null)
	{
		if (is_array($updatedBy)) {
			$useMinMax = false;
			if (isset($updatedBy['min'])) {
				$this->addUsingAlias(NewsletterMailingPeer::UPDATED_BY, $updatedBy['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedBy['max'])) {
				$this->addUsingAlias(NewsletterMailingPeer::UPDATED_BY, $updatedBy['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(NewsletterMailingPeer::UPDATED_BY, $updatedBy, $comparison);
	}

	/**
	 * Filter the query by a related SubscriberGroup object
	 *
	 * @param     SubscriberGroup $subscriberGroup  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewsletterMailingQuery The current query, for fluid interface
	 */
	public function filterBySubscriberGroup($subscriberGroup, $comparison = null)
	{
		return $this
			->addUsingAlias(NewsletterMailingPeer::SUBSCRIBER_GROUP_ID, $subscriberGroup->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the SubscriberGroup relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    NewsletterMailingQuery The current query, for fluid interface
	 */
	public function joinSubscriberGroup($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
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
	public function useSubscriberGroupQuery($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinSubscriberGroup($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'SubscriberGroup', 'SubscriberGroupQuery');
	}

	/**
	 * Filter the query by a related Newsletter object
	 *
	 * @param     Newsletter $newsletter  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewsletterMailingQuery The current query, for fluid interface
	 */
	public function filterByNewsletter($newsletter, $comparison = null)
	{
		return $this
			->addUsingAlias(NewsletterMailingPeer::NEWSLETTER_ID, $newsletter->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Newsletter relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    NewsletterMailingQuery The current query, for fluid interface
	 */
	public function joinNewsletter($relationAlias = '', $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Newsletter');
		
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
			$this->addJoinObject($join, 'Newsletter');
		}
		
		return $this;
	}

	/**
	 * Use the Newsletter relation Newsletter object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    NewsletterQuery A secondary query class using the current class as primary query
	 */
	public function useNewsletterQuery($relationAlias = '', $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinNewsletter($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Newsletter', 'NewsletterQuery');
	}

	/**
	 * Filter the query by a related User object
	 *
	 * @param     User $user  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewsletterMailingQuery The current query, for fluid interface
	 */
	public function filterByUser($user, $comparison = null)
	{
		return $this
			->addUsingAlias(NewsletterMailingPeer::UPDATED_BY, $user->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the User relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    NewsletterMailingQuery The current query, for fluid interface
	 */
	public function joinUser($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('User');
		
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
			$this->addJoinObject($join, 'User');
		}
		
		return $this;
	}

	/**
	 * Use the User relation User object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    UserQuery A secondary query class using the current class as primary query
	 */
	public function useUserQuery($relationAlias = '', $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinUser($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'User', 'UserQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     NewsletterMailing $newsletterMailing Object to remove from the list of results
	 *
	 * @return    NewsletterMailingQuery The current query, for fluid interface
	 */
	public function prune($newsletterMailing = null)
	{
		if ($newsletterMailing) {
			$this->addUsingAlias(NewsletterMailingPeer::ID, $newsletterMailing->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

	// extended_timestampable behavior
	
	/**
	 * Filter by the latest updated
	 *
	 * @param      int $nbDays Maximum age of the latest update in days
	 *
	 * @return     NewsletterMailingQuery The current query, for fuid interface
	 */
	public function recentlyUpdated($nbDays = 7)
	{
		return $this->addUsingAlias(NewsletterMailingPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Filter by the latest created
	 *
	 * @param      int $nbDays Maximum age of in days
	 *
	 * @return     NewsletterMailingQuery The current query, for fuid interface
	 */
	public function recentlyCreated($nbDays = 7)
	{
		return $this->addUsingAlias(NewsletterMailingPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Order by update date desc
	 *
	 * @return     NewsletterMailingQuery The current query, for fuid interface
	 */
	public function lastUpdatedFirst()
	{
		return $this->addDescendingOrderByColumn(NewsletterMailingPeer::UPDATED_AT);
	}
	
	/**
	 * Order by update date asc
	 *
	 * @return     NewsletterMailingQuery The current query, for fuid interface
	 */
	public function firstUpdatedFirst()
	{
		return $this->addAscendingOrderByColumn(NewsletterMailingPeer::UPDATED_AT);
	}
	
	/**
	 * Order by create date desc
	 *
	 * @return     NewsletterMailingQuery The current query, for fuid interface
	 */
	public function lastCreatedFirst()
	{
		return $this->addDescendingOrderByColumn(NewsletterMailingPeer::CREATED_AT);
	}
	
	/**
	 * Order by create date asc
	 *
	 * @return     NewsletterMailingQuery The current query, for fuid interface
	 */
	public function firstCreatedFirst()
	{
		return $this->addAscendingOrderByColumn(NewsletterMailingPeer::CREATED_AT);
	}

} // BaseNewsletterMailingQuery
