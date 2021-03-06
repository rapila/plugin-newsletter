<?php


/**
 * Base class that represents a query for the 'newsletter_mailings' table.
 *
 *
 *
 * @method NewsletterMailingQuery orderById($order = Criteria::ASC) Order by the id column
 * @method NewsletterMailingQuery orderByDateSent($order = Criteria::ASC) Order by the date_sent column
 * @method NewsletterMailingQuery orderBySubscriberGroupId($order = Criteria::ASC) Order by the subscriber_group_id column
 * @method NewsletterMailingQuery orderByExternalMailGroupId($order = Criteria::ASC) Order by the external_mail_group_id column
 * @method NewsletterMailingQuery orderByNewsletterId($order = Criteria::ASC) Order by the newsletter_id column
 * @method NewsletterMailingQuery orderByRecipientCount($order = Criteria::ASC) Order by the recipient_count column
 * @method NewsletterMailingQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method NewsletterMailingQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 * @method NewsletterMailingQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method NewsletterMailingQuery orderByUpdatedBy($order = Criteria::ASC) Order by the updated_by column
 *
 * @method NewsletterMailingQuery groupById() Group by the id column
 * @method NewsletterMailingQuery groupByDateSent() Group by the date_sent column
 * @method NewsletterMailingQuery groupBySubscriberGroupId() Group by the subscriber_group_id column
 * @method NewsletterMailingQuery groupByExternalMailGroupId() Group by the external_mail_group_id column
 * @method NewsletterMailingQuery groupByNewsletterId() Group by the newsletter_id column
 * @method NewsletterMailingQuery groupByRecipientCount() Group by the recipient_count column
 * @method NewsletterMailingQuery groupByCreatedAt() Group by the created_at column
 * @method NewsletterMailingQuery groupByUpdatedAt() Group by the updated_at column
 * @method NewsletterMailingQuery groupByCreatedBy() Group by the created_by column
 * @method NewsletterMailingQuery groupByUpdatedBy() Group by the updated_by column
 *
 * @method NewsletterMailingQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method NewsletterMailingQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method NewsletterMailingQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method NewsletterMailingQuery leftJoinSubscriberGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the SubscriberGroup relation
 * @method NewsletterMailingQuery rightJoinSubscriberGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SubscriberGroup relation
 * @method NewsletterMailingQuery innerJoinSubscriberGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the SubscriberGroup relation
 *
 * @method NewsletterMailingQuery leftJoinNewsletter($relationAlias = null) Adds a LEFT JOIN clause to the query using the Newsletter relation
 * @method NewsletterMailingQuery rightJoinNewsletter($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Newsletter relation
 * @method NewsletterMailingQuery innerJoinNewsletter($relationAlias = null) Adds a INNER JOIN clause to the query using the Newsletter relation
 *
 * @method NewsletterMailingQuery leftJoinUserRelatedByCreatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByCreatedBy relation
 * @method NewsletterMailingQuery rightJoinUserRelatedByCreatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByCreatedBy relation
 * @method NewsletterMailingQuery innerJoinUserRelatedByCreatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByCreatedBy relation
 *
 * @method NewsletterMailingQuery leftJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserRelatedByUpdatedBy relation
 * @method NewsletterMailingQuery rightJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserRelatedByUpdatedBy relation
 * @method NewsletterMailingQuery innerJoinUserRelatedByUpdatedBy($relationAlias = null) Adds a INNER JOIN clause to the query using the UserRelatedByUpdatedBy relation
 *
 * @method NewsletterMailing findOne(PropelPDO $con = null) Return the first NewsletterMailing matching the query
 * @method NewsletterMailing findOneOrCreate(PropelPDO $con = null) Return the first NewsletterMailing matching the query, or a new NewsletterMailing object populated from the query conditions when no match is found
 *
 * @method NewsletterMailing findOneByDateSent(string $date_sent) Return the first NewsletterMailing filtered by the date_sent column
 * @method NewsletterMailing findOneBySubscriberGroupId(int $subscriber_group_id) Return the first NewsletterMailing filtered by the subscriber_group_id column
 * @method NewsletterMailing findOneByExternalMailGroupId(string $external_mail_group_id) Return the first NewsletterMailing filtered by the external_mail_group_id column
 * @method NewsletterMailing findOneByNewsletterId(int $newsletter_id) Return the first NewsletterMailing filtered by the newsletter_id column
 * @method NewsletterMailing findOneByRecipientCount(int $recipient_count) Return the first NewsletterMailing filtered by the recipient_count column
 * @method NewsletterMailing findOneByCreatedAt(string $created_at) Return the first NewsletterMailing filtered by the created_at column
 * @method NewsletterMailing findOneByUpdatedAt(string $updated_at) Return the first NewsletterMailing filtered by the updated_at column
 * @method NewsletterMailing findOneByCreatedBy(int $created_by) Return the first NewsletterMailing filtered by the created_by column
 * @method NewsletterMailing findOneByUpdatedBy(int $updated_by) Return the first NewsletterMailing filtered by the updated_by column
 *
 * @method array findById(int $id) Return NewsletterMailing objects filtered by the id column
 * @method array findByDateSent(string $date_sent) Return NewsletterMailing objects filtered by the date_sent column
 * @method array findBySubscriberGroupId(int $subscriber_group_id) Return NewsletterMailing objects filtered by the subscriber_group_id column
 * @method array findByExternalMailGroupId(string $external_mail_group_id) Return NewsletterMailing objects filtered by the external_mail_group_id column
 * @method array findByNewsletterId(int $newsletter_id) Return NewsletterMailing objects filtered by the newsletter_id column
 * @method array findByRecipientCount(int $recipient_count) Return NewsletterMailing objects filtered by the recipient_count column
 * @method array findByCreatedAt(string $created_at) Return NewsletterMailing objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return NewsletterMailing objects filtered by the updated_at column
 * @method array findByCreatedBy(int $created_by) Return NewsletterMailing objects filtered by the created_by column
 * @method array findByUpdatedBy(int $updated_by) Return NewsletterMailing objects filtered by the updated_by column
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
    public function __construct($dbName = null, $modelName = null, $modelAlias = null)
    {
        if (null === $dbName) {
            $dbName = 'rapila';
        }
        if (null === $modelName) {
            $modelName = 'NewsletterMailing';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new NewsletterMailingQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   NewsletterMailingQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return NewsletterMailingQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof NewsletterMailingQuery) {
            return $criteria;
        }
        $query = new NewsletterMailingQuery(null, null, $modelAlias);

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
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return   NewsletterMailing|NewsletterMailing[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = NewsletterMailingPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(NewsletterMailingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 NewsletterMailing A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneById($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 NewsletterMailing A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `id`, `date_sent`, `subscriber_group_id`, `external_mail_group_id`, `newsletter_id`, `recipient_count`, `created_at`, `updated_at`, `created_by`, `updated_by` FROM `newsletter_mailings` WHERE `id` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new NewsletterMailing();
            $obj->hydrate($row);
            NewsletterMailingPeer::addInstanceToPool($obj, (string) $key);
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
     * @return NewsletterMailing|NewsletterMailing[]|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|NewsletterMailing[]|mixed the list of results, formatted by the current formatter
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
     * @return NewsletterMailingQuery The current query, for fluid interface
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
     * @return NewsletterMailingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(NewsletterMailingPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id >= 12
     * $query->filterById(array('max' => 12)); // WHERE id <= 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NewsletterMailingQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(NewsletterMailingPeer::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(NewsletterMailingPeer::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NewsletterMailingPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the date_sent column
     *
     * Example usage:
     * <code>
     * $query->filterByDateSent('2011-03-14'); // WHERE date_sent = '2011-03-14'
     * $query->filterByDateSent('now'); // WHERE date_sent = '2011-03-14'
     * $query->filterByDateSent(array('max' => 'yesterday')); // WHERE date_sent < '2011-03-13'
     * </code>
     *
     * @param     mixed $dateSent The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NewsletterMailingQuery The current query, for fluid interface
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
     * Example usage:
     * <code>
     * $query->filterBySubscriberGroupId(1234); // WHERE subscriber_group_id = 1234
     * $query->filterBySubscriberGroupId(array(12, 34)); // WHERE subscriber_group_id IN (12, 34)
     * $query->filterBySubscriberGroupId(array('min' => 12)); // WHERE subscriber_group_id >= 12
     * $query->filterBySubscriberGroupId(array('max' => 12)); // WHERE subscriber_group_id <= 12
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
     * @return NewsletterMailingQuery The current query, for fluid interface
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
     * Example usage:
     * <code>
     * $query->filterByExternalMailGroupId('fooValue');   // WHERE external_mail_group_id = 'fooValue'
     * $query->filterByExternalMailGroupId('%fooValue%'); // WHERE external_mail_group_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $externalMailGroupId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NewsletterMailingQuery The current query, for fluid interface
     */
    public function filterByExternalMailGroupId($externalMailGroupId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($externalMailGroupId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $externalMailGroupId)) {
                $externalMailGroupId = str_replace('*', '%', $externalMailGroupId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NewsletterMailingPeer::EXTERNAL_MAIL_GROUP_ID, $externalMailGroupId, $comparison);
    }

    /**
     * Filter the query on the newsletter_id column
     *
     * Example usage:
     * <code>
     * $query->filterByNewsletterId(1234); // WHERE newsletter_id = 1234
     * $query->filterByNewsletterId(array(12, 34)); // WHERE newsletter_id IN (12, 34)
     * $query->filterByNewsletterId(array('min' => 12)); // WHERE newsletter_id >= 12
     * $query->filterByNewsletterId(array('max' => 12)); // WHERE newsletter_id <= 12
     * </code>
     *
     * @see       filterByNewsletter()
     *
     * @param     mixed $newsletterId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NewsletterMailingQuery The current query, for fluid interface
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
     * Filter the query on the recipient_count column
     *
     * Example usage:
     * <code>
     * $query->filterByRecipientCount(1234); // WHERE recipient_count = 1234
     * $query->filterByRecipientCount(array(12, 34)); // WHERE recipient_count IN (12, 34)
     * $query->filterByRecipientCount(array('min' => 12)); // WHERE recipient_count >= 12
     * $query->filterByRecipientCount(array('max' => 12)); // WHERE recipient_count <= 12
     * </code>
     *
     * @param     mixed $recipientCount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NewsletterMailingQuery The current query, for fluid interface
     */
    public function filterByRecipientCount($recipientCount = null, $comparison = null)
    {
        if (is_array($recipientCount)) {
            $useMinMax = false;
            if (isset($recipientCount['min'])) {
                $this->addUsingAlias(NewsletterMailingPeer::RECIPIENT_COUNT, $recipientCount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($recipientCount['max'])) {
                $this->addUsingAlias(NewsletterMailingPeer::RECIPIENT_COUNT, $recipientCount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NewsletterMailingPeer::RECIPIENT_COUNT, $recipientCount, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at < '2011-03-13'
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
     * @return NewsletterMailingQuery The current query, for fluid interface
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
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at < '2011-03-13'
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
     * @return NewsletterMailingQuery The current query, for fluid interface
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
     * Filter the query on the created_by column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedBy(1234); // WHERE created_by = 1234
     * $query->filterByCreatedBy(array(12, 34)); // WHERE created_by IN (12, 34)
     * $query->filterByCreatedBy(array('min' => 12)); // WHERE created_by >= 12
     * $query->filterByCreatedBy(array('max' => 12)); // WHERE created_by <= 12
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
     * @return NewsletterMailingQuery The current query, for fluid interface
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
     * Filter the query on the updated_by column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedBy(1234); // WHERE updated_by = 1234
     * $query->filterByUpdatedBy(array(12, 34)); // WHERE updated_by IN (12, 34)
     * $query->filterByUpdatedBy(array('min' => 12)); // WHERE updated_by >= 12
     * $query->filterByUpdatedBy(array('max' => 12)); // WHERE updated_by <= 12
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
     * @return NewsletterMailingQuery The current query, for fluid interface
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
     * @param   SubscriberGroup|PropelObjectCollection $subscriberGroup The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 NewsletterMailingQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySubscriberGroup($subscriberGroup, $comparison = null)
    {
        if ($subscriberGroup instanceof SubscriberGroup) {
            return $this
                ->addUsingAlias(NewsletterMailingPeer::SUBSCRIBER_GROUP_ID, $subscriberGroup->getId(), $comparison);
        } elseif ($subscriberGroup instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(NewsletterMailingPeer::SUBSCRIBER_GROUP_ID, $subscriberGroup->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return NewsletterMailingQuery The current query, for fluid interface
     */
    public function joinSubscriberGroup($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
        if ($relationAlias) {
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
     * @return   SubscriberGroupQuery A secondary query class using the current class as primary query
     */
    public function useSubscriberGroupQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSubscriberGroup($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SubscriberGroup', 'SubscriberGroupQuery');
    }

    /**
     * Filter the query by a related Newsletter object
     *
     * @param   Newsletter|PropelObjectCollection $newsletter The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 NewsletterMailingQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByNewsletter($newsletter, $comparison = null)
    {
        if ($newsletter instanceof Newsletter) {
            return $this
                ->addUsingAlias(NewsletterMailingPeer::NEWSLETTER_ID, $newsletter->getId(), $comparison);
        } elseif ($newsletter instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(NewsletterMailingPeer::NEWSLETTER_ID, $newsletter->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByNewsletter() only accepts arguments of type Newsletter or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Newsletter relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return NewsletterMailingQuery The current query, for fluid interface
     */
    public function joinNewsletter($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
        if ($relationAlias) {
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
     * @return   NewsletterQuery A secondary query class using the current class as primary query
     */
    public function useNewsletterQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinNewsletter($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Newsletter', 'NewsletterQuery');
    }

    /**
     * Filter the query by a related User object
     *
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 NewsletterMailingQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUserRelatedByCreatedBy($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(NewsletterMailingPeer::CREATED_BY, $user->getId(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(NewsletterMailingPeer::CREATED_BY, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return NewsletterMailingQuery The current query, for fluid interface
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
        if ($relationAlias) {
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
     * @return   UserQuery A secondary query class using the current class as primary query
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
     * @param   User|PropelObjectCollection $user The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 NewsletterMailingQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUserRelatedByUpdatedBy($user, $comparison = null)
    {
        if ($user instanceof User) {
            return $this
                ->addUsingAlias(NewsletterMailingPeer::UPDATED_BY, $user->getId(), $comparison);
        } elseif ($user instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(NewsletterMailingPeer::UPDATED_BY, $user->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return NewsletterMailingQuery The current query, for fluid interface
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
        if ($relationAlias) {
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
     * @return   UserQuery A secondary query class using the current class as primary query
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
     * @param   NewsletterMailing $newsletterMailing Object to remove from the list of results
     *
     * @return NewsletterMailingQuery The current query, for fluid interface
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
     * @return     NewsletterMailingQuery The current query, for fluid interface
     */
    public function recentlyUpdated($nbDays = 7)
    {
        return $this->addUsingAlias(NewsletterMailingPeer::UPDATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by update date desc
     *
     * @return     NewsletterMailingQuery The current query, for fluid interface
     */
    public function lastUpdatedFirst()
    {
        return $this->addDescendingOrderByColumn(NewsletterMailingPeer::UPDATED_AT);
    }

    /**
     * Order by update date asc
     *
     * @return     NewsletterMailingQuery The current query, for fluid interface
     */
    public function firstUpdatedFirst()
    {
        return $this->addAscendingOrderByColumn(NewsletterMailingPeer::UPDATED_AT);
    }

    /**
     * Filter by the latest created
     *
     * @param      int $nbDays Maximum age of in days
     *
     * @return     NewsletterMailingQuery The current query, for fluid interface
     */
    public function recentlyCreated($nbDays = 7)
    {
        return $this->addUsingAlias(NewsletterMailingPeer::CREATED_AT, time() - $nbDays * 24 * 60 * 60, Criteria::GREATER_EQUAL);
    }

    /**
     * Order by create date desc
     *
     * @return     NewsletterMailingQuery The current query, for fluid interface
     */
    public function lastCreatedFirst()
    {
        return $this->addDescendingOrderByColumn(NewsletterMailingPeer::CREATED_AT);
    }

    /**
     * Order by create date asc
     *
     * @return     NewsletterMailingQuery The current query, for fluid interface
     */
    public function firstCreatedFirst()
    {
        return $this->addAscendingOrderByColumn(NewsletterMailingPeer::CREATED_AT);
    }
    // extended_keyable behavior

    public function filterByPKArray($pkArray) {
            return $this->filterByPrimaryKey($pkArray[0]);
    }

    public function filterByPKString($pkString) {
        return $this->filterByPrimaryKey($pkString);
    }

}
