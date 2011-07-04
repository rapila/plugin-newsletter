<?php


/**
 * Base class that represents a query for the 'newsletters' table.
 *
 * 
 *
 * @method     NewsletterQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     NewsletterQuery orderBySubject($order = Criteria::ASC) Order by the subject column
 * @method     NewsletterQuery orderByNewsletterBody($order = Criteria::ASC) Order by the newsletter_body column
 * @method     NewsletterQuery orderByLanguageId($order = Criteria::ASC) Order by the language_id column
 * @method     NewsletterQuery orderByIsApproved($order = Criteria::ASC) Order by the is_approved column
 * @method     NewsletterQuery orderByIsHtml($order = Criteria::ASC) Order by the is_html column
 * @method     NewsletterQuery orderByTemplateName($order = Criteria::ASC) Order by the template_name column
 * @method     NewsletterQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method     NewsletterQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method     NewsletterQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method     NewsletterQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 *
 * @method     NewsletterQuery groupById() Group by the id column
 * @method     NewsletterQuery groupBySubject() Group by the subject column
 * @method     NewsletterQuery groupByNewsletterBody() Group by the newsletter_body column
 * @method     NewsletterQuery groupByLanguageId() Group by the language_id column
 * @method     NewsletterQuery groupByIsApproved() Group by the is_approved column
 * @method     NewsletterQuery groupByIsHtml() Group by the is_html column
 * @method     NewsletterQuery groupByTemplateName() Group by the template_name column
 * @method     NewsletterQuery groupByCreatedAt() Group by the created_at column
 * @method     NewsletterQuery groupByUpdatedAt() Group by the updated_at column
 * @method     NewsletterQuery groupByCreatedBy() Group by the created_by column
 * @method     NewsletterQuery groupByUpdatedBy() Group by the updated_by column
 *
 * @method     NewsletterQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     NewsletterQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     NewsletterQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     NewsletterQuery leftJoinUserRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByCreatedBy relation
 * @method     NewsletterQuery rightJoinUserRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByCreatedBy relation
 * @method     NewsletterQuery innerJoinUserRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByCreatedBy relation
 *
 * @method     NewsletterQuery leftJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByUpdatedBy relation
 * @method     NewsletterQuery rightJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByUpdatedBy relation
 * @method     NewsletterQuery innerJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByUpdatedBy relation
 *
 * @method     NewsletterQuery leftJoinNewsletterMailing($relationAlias = null) Adds a LEFT JOIN clause to the query using the NewsletterMailing relation
 * @method     NewsletterQuery rightJoinNewsletterMailing($relationAlias = null) Adds a RIGHT JOIN clause to the query using the NewsletterMailing relation
 * @method     NewsletterQuery innerJoinNewsletterMailing($relationAlias = null) Adds a INNER JOIN clause to the query using the NewsletterMailing relation
 *
 * @method     Newsletter findOne(PropelPDO $con = null) Return the first Newsletter matching the query
 * @method     Newsletter findOneOrCreate(PropelPDO $con = null) Return the first Newsletter matching the query, or a new Newsletter object populated from the query conditions when no match is found
 *
 * @method     Newsletter findOneById(int $id) Return the first Newsletter filtered by the id column
 * @method     Newsletter findOneBySubject(string $subject) Return the first Newsletter filtered by the subject column
 * @method     Newsletter findOneByNewsletterBody(resource $newsletter_body) Return the first Newsletter filtered by the newsletter_body column
 * @method     Newsletter findOneByLanguageId(string $language_id) Return the first Newsletter filtered by the language_id column
 * @method     Newsletter findOneByIsApproved(boolean $is_approved) Return the first Newsletter filtered by the is_approved column
 * @method     Newsletter findOneByIsHtml(boolean $is_html) Return the first Newsletter filtered by the is_html column
 * @method     Newsletter findOneByTemplateName(string $template_name) Return the first Newsletter filtered by the template_name column
 * @method     Newsletter findOneByCreatedAt(string $created_at) Return the first Newsletter filtered by the created_at column
 * @method     Newsletter findOneByUpdatedAt(string $updated_at) Return the first Newsletter filtered by the updated_at column
 * @method     Newsletter findOneByCreatedBy(int $created_by) Return the first Newsletter filtered by the created_by column
 * @method     Newsletter findOneByUpdatedBy(int $updated_by) Return the first Newsletter filtered by the updated_by column
 *
 * @method     array findById(int $id) Return Newsletter objects filtered by the id column
 * @method     array findBySubject(string $subject) Return Newsletter objects filtered by the subject column
 * @method     array findByNewsletterBody(resource $newsletter_body) Return Newsletter objects filtered by the newsletter_body column
 * @method     array findByLanguageId(string $language_id) Return Newsletter objects filtered by the language_id column
 * @method     array findByIsApproved(boolean $is_approved) Return Newsletter objects filtered by the is_approved column
 * @method     array findByIsHtml(boolean $is_html) Return Newsletter objects filtered by the is_html column
 * @method     array findByTemplateName(string $template_name) Return Newsletter objects filtered by the template_name column
 * @method     array findByCreatedAt(string $created_at) Return Newsletter objects filtered by the created_at column
 * @method     array findByUpdatedAt(string $updated_at) Return Newsletter objects filtered by the updated_at column
 * @method     array findByCreatedBy(int $created_by) Return Newsletter objects filtered by the created_by column
 * @method     array findByUpdatedBy(int $updated_by) Return Newsletter objects filtered by the updated_by column
 *
 * @package    propel.generator.model.om
 */
abstract class BaseNewsletterQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseNewsletterQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'mini_cms', $modelName = 'Newsletter', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new NewsletterQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    NewsletterQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof NewsletterQuery) {
			return $criteria;
		}
		$query = new NewsletterQuery();
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
	 * @return    Newsletter|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = NewsletterPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    NewsletterQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(NewsletterPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    NewsletterQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(NewsletterPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewsletterQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(NewsletterPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the subject column
	 * 
	 * @param     string $subject The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewsletterQuery The current query, for fluid interface
	 */
	public function filterBySubject($subject = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($subject)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $subject)) {
				$subject = str_replace('*', '%', $subject);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(NewsletterPeer::SUBJECT, $subject, $comparison);
	}

	/**
	 * Filter the query on the newsletter_body column
	 * 
	 * @param     mixed $newsletterBody The value to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewsletterQuery The current query, for fluid interface
	 */
	public function filterByNewsletterBody($newsletterBody = null, $comparison = null)
	{
		return $this->addUsingAlias(NewsletterPeer::NEWSLETTER_BODY, $newsletterBody, $comparison);
	}

	/**
	 * Filter the query on the language_id column
	 * 
	 * @param     string $languageId The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewsletterQuery The current query, for fluid interface
	 */
	public function filterByLanguageId($languageId = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($languageId)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $languageId)) {
				$languageId = str_replace('*', '%', $languageId);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(NewsletterPeer::LANGUAGE_ID, $languageId, $comparison);
	}

	/**
	 * Filter the query on the is_approved column
	 * 
	 * @param     boolean|string $isApproved The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewsletterQuery The current query, for fluid interface
	 */
	public function filterByIsApproved($isApproved = null, $comparison = null)
	{
		if (is_string($isApproved)) {
			$is_approved = in_array(strtolower($isApproved), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(NewsletterPeer::IS_APPROVED, $isApproved, $comparison);
	}

	/**
	 * Filter the query on the is_html column
	 * 
	 * @param     boolean|string $isHtml The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewsletterQuery The current query, for fluid interface
	 */
	public function filterByIsHtml($isHtml = null, $comparison = null)
	{
		if (is_string($isHtml)) {
			$is_html = in_array(strtolower($isHtml), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(NewsletterPeer::IS_HTML, $isHtml, $comparison);
	}

	/**
	 * Filter the query on the template_name column
	 * 
	 * @param     string $templateName The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewsletterQuery The current query, for fluid interface
	 */
	public function filterByTemplateName($templateName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($templateName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $templateName)) {
				$templateName = str_replace('*', '%', $templateName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(NewsletterPeer::TEMPLATE_NAME, $templateName, $comparison);
	}

	/**
	 * Filter the query on the created_at column
	 * 
	 * @param     string|array $createdAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewsletterQuery The current query, for fluid interface
	 */
	public function filterByCreatedAt($createdAt = null, $comparison = null)
	{
		if (is_array($createdAt)) {
			$useMinMax = false;
			if (isset($createdAt['min'])) {
				$this->addUsingAlias(NewsletterPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdAt['max'])) {
				$this->addUsingAlias(NewsletterPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(NewsletterPeer::CREATED_AT, $createdAt, $comparison);
	}

	/**
	 * Filter the query on the updated_at column
	 * 
	 * @param     string|array $updatedAt The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewsletterQuery The current query, for fluid interface
	 */
	public function filterByUpdatedAt($updatedAt = null, $comparison = null)
	{
		if (is_array($updatedAt)) {
			$useMinMax = false;
			if (isset($updatedAt['min'])) {
				$this->addUsingAlias(NewsletterPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedAt['max'])) {
				$this->addUsingAlias(NewsletterPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(NewsletterPeer::UPDATED_AT, $updatedAt, $comparison);
	}

	/**
	 * Filter the query on the created_by column
	 * 
	 * @param     int|array $createdBy The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewsletterQuery The current query, for fluid interface
	 */
	public function filterByCreatedBy($createdBy = null, $comparison = null)
	{
		if (is_array($createdBy)) {
			$useMinMax = false;
			if (isset($createdBy['min'])) {
				$this->addUsingAlias(NewsletterPeer::CREATED_BY, $createdBy['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($createdBy['max'])) {
				$this->addUsingAlias(NewsletterPeer::CREATED_BY, $createdBy['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(NewsletterPeer::CREATED_BY, $createdBy, $comparison);
	}

	/**
	 * Filter the query on the updated_by column
	 * 
	 * @param     int|array $updatedBy The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewsletterQuery The current query, for fluid interface
	 */
	public function filterByUpdatedBy($updatedBy = null, $comparison = null)
	{
		if (is_array($updatedBy)) {
			$useMinMax = false;
			if (isset($updatedBy['min'])) {
				$this->addUsingAlias(NewsletterPeer::UPDATED_BY, $updatedBy['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($updatedBy['max'])) {
				$this->addUsingAlias(NewsletterPeer::UPDATED_BY, $updatedBy['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(NewsletterPeer::UPDATED_BY, $updatedBy, $comparison);
	}

	/**
	 * Filter the query by a related User object
	 *
	 * @param     User $user  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    NewsletterQuery The current query, for fluid interface
	 */
	public function filterByUserRelatedByCreatedBy($user, $comparison = null)
	{
		return $this
			->addUsingAlias(NewsletterPeer::CREATED_BY, $user->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the UserRelatedByCreatedBy relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    NewsletterQuery The current query, for fluid interface
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
	 * @return    NewsletterQuery The current query, for fluid interface
	 */
	public function filterByUserRelatedByUpdatedBy($user, $comparison = null)
	{
		return $this
			->addUsingAlias(NewsletterPeer::UPDATED_BY, $user->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the UserRelatedByUpdatedBy relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    NewsletterQuery The current query, for fluid interface
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
	 * @return    NewsletterQuery The current query, for fluid interface
	 */
	public function filterByNewsletterMailing($newsletterMailing, $comparison = null)
	{
		return $this
			->addUsingAlias(NewsletterPeer::ID, $newsletterMailing->getNewsletterId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the NewsletterMailing relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    NewsletterQuery The current query, for fluid interface
	 */
	public function joinNewsletterMailing($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
	public function useNewsletterMailingQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinNewsletterMailing($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'NewsletterMailing', 'NewsletterMailingQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Newsletter $newsletter Object to remove from the list of results
	 *
	 * @return    NewsletterQuery The current query, for fluid interface
	 */
	public function prune($newsletter = null)
	{
		if ($newsletter) {
			$this->addUsingAlias(NewsletterPeer::ID, $newsletter->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

	// extended_timestampable behavior
	
	/**
	 * Filter by the latest updated
	 *
	 * @param      int $nbDays Maximum age of the latest update in days
	 *
	 * @return     NewsletterQuery The current query, for fluid interface
	 */
	public function recentlyUpdated($nbDays = 7)
	{
		return $this->addUsingAlias(NewsletterPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Filter by the latest created
	 *
	 * @param      int $nbDays Maximum age of in days
	 *
	 * @return     NewsletterQuery The current query, for fluid interface
	 */
	public function recentlyCreated($nbDays = 7)
	{
		return $this->addUsingAlias(NewsletterPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
	}
	
	/**
	 * Order by update date desc
	 *
	 * @return     NewsletterQuery The current query, for fluid interface
	 */
	public function lastUpdatedFirst()
	{
		return $this->addDescendingOrderByColumn(NewsletterPeer::UPDATED_AT);
	}
	
	/**
	 * Order by update date asc
	 *
	 * @return     NewsletterQuery The current query, for fluid interface
	 */
	public function firstUpdatedFirst()
	{
		return $this->addAscendingOrderByColumn(NewsletterPeer::UPDATED_AT);
	}
	
	/**
	 * Order by create date desc
	 *
	 * @return     NewsletterQuery The current query, for fluid interface
	 */
	public function lastCreatedFirst()
	{
		return $this->addDescendingOrderByColumn(NewsletterPeer::CREATED_AT);
	}
	
	/**
	 * Order by create date asc
	 *
	 * @return     NewsletterQuery The current query, for fluid interface
	 */
	public function firstCreatedFirst()
	{
		return $this->addAscendingOrderByColumn(NewsletterPeer::CREATED_AT);
	}

} // BaseNewsletterQuery
