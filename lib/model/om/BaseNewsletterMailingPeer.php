<?php


/**
 * Base static class for performing query and update operations on the 'newsletter_mailings' table.
 *
 *
 *
 * @package propel.generator.model.om
 */
abstract class BaseNewsletterMailingPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'rapila';

    /** the table name for this class */
    const TABLE_NAME = 'newsletter_mailings';

    /** the related Propel class for this table */
    const OM_CLASS = 'NewsletterMailing';

    /** the related TableMap class for this table */
    const TM_CLASS = 'NewsletterMailingTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 10;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 10;

    /** the column name for the ID field */
    const ID = 'newsletter_mailings.ID';

    /** the column name for the DATE_SENT field */
    const DATE_SENT = 'newsletter_mailings.DATE_SENT';

    /** the column name for the SUBSCRIBER_GROUP_ID field */
    const SUBSCRIBER_GROUP_ID = 'newsletter_mailings.SUBSCRIBER_GROUP_ID';

    /** the column name for the EXTERNAL_MAIL_GROUP_ID field */
    const EXTERNAL_MAIL_GROUP_ID = 'newsletter_mailings.EXTERNAL_MAIL_GROUP_ID';

    /** the column name for the NEWSLETTER_ID field */
    const NEWSLETTER_ID = 'newsletter_mailings.NEWSLETTER_ID';

    /** the column name for the RECIPIENT_COUNT field */
    const RECIPIENT_COUNT = 'newsletter_mailings.RECIPIENT_COUNT';

    /** the column name for the CREATED_AT field */
    const CREATED_AT = 'newsletter_mailings.CREATED_AT';

    /** the column name for the UPDATED_AT field */
    const UPDATED_AT = 'newsletter_mailings.UPDATED_AT';

    /** the column name for the CREATED_BY field */
    const CREATED_BY = 'newsletter_mailings.CREATED_BY';

    /** the column name for the UPDATED_BY field */
    const UPDATED_BY = 'newsletter_mailings.UPDATED_BY';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of NewsletterMailing objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array NewsletterMailing[]
     */
    public static $instances = array();


    // denyable behavior
    private static $IGNORE_RIGHTS = false;
    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. NewsletterMailingPeer::$fieldNames[NewsletterMailingPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('Id', 'DateSent', 'SubscriberGroupId', 'ExternalMailGroupId', 'NewsletterId', 'RecipientCount', 'CreatedAt', 'UpdatedAt', 'CreatedBy', 'UpdatedBy', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'dateSent', 'subscriberGroupId', 'externalMailGroupId', 'newsletterId', 'recipientCount', 'createdAt', 'updatedAt', 'createdBy', 'updatedBy', ),
        BasePeer::TYPE_COLNAME => array (NewsletterMailingPeer::ID, NewsletterMailingPeer::DATE_SENT, NewsletterMailingPeer::SUBSCRIBER_GROUP_ID, NewsletterMailingPeer::EXTERNAL_MAIL_GROUP_ID, NewsletterMailingPeer::NEWSLETTER_ID, NewsletterMailingPeer::RECIPIENT_COUNT, NewsletterMailingPeer::CREATED_AT, NewsletterMailingPeer::UPDATED_AT, NewsletterMailingPeer::CREATED_BY, NewsletterMailingPeer::UPDATED_BY, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID', 'DATE_SENT', 'SUBSCRIBER_GROUP_ID', 'EXTERNAL_MAIL_GROUP_ID', 'NEWSLETTER_ID', 'RECIPIENT_COUNT', 'CREATED_AT', 'UPDATED_AT', 'CREATED_BY', 'UPDATED_BY', ),
        BasePeer::TYPE_FIELDNAME => array ('id', 'date_sent', 'subscriber_group_id', 'external_mail_group_id', 'newsletter_id', 'recipient_count', 'created_at', 'updated_at', 'created_by', 'updated_by', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. NewsletterMailingPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'DateSent' => 1, 'SubscriberGroupId' => 2, 'ExternalMailGroupId' => 3, 'NewsletterId' => 4, 'RecipientCount' => 5, 'CreatedAt' => 6, 'UpdatedAt' => 7, 'CreatedBy' => 8, 'UpdatedBy' => 9, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'dateSent' => 1, 'subscriberGroupId' => 2, 'externalMailGroupId' => 3, 'newsletterId' => 4, 'recipientCount' => 5, 'createdAt' => 6, 'updatedAt' => 7, 'createdBy' => 8, 'updatedBy' => 9, ),
        BasePeer::TYPE_COLNAME => array (NewsletterMailingPeer::ID => 0, NewsletterMailingPeer::DATE_SENT => 1, NewsletterMailingPeer::SUBSCRIBER_GROUP_ID => 2, NewsletterMailingPeer::EXTERNAL_MAIL_GROUP_ID => 3, NewsletterMailingPeer::NEWSLETTER_ID => 4, NewsletterMailingPeer::RECIPIENT_COUNT => 5, NewsletterMailingPeer::CREATED_AT => 6, NewsletterMailingPeer::UPDATED_AT => 7, NewsletterMailingPeer::CREATED_BY => 8, NewsletterMailingPeer::UPDATED_BY => 9, ),
        BasePeer::TYPE_RAW_COLNAME => array ('ID' => 0, 'DATE_SENT' => 1, 'SUBSCRIBER_GROUP_ID' => 2, 'EXTERNAL_MAIL_GROUP_ID' => 3, 'NEWSLETTER_ID' => 4, 'RECIPIENT_COUNT' => 5, 'CREATED_AT' => 6, 'UPDATED_AT' => 7, 'CREATED_BY' => 8, 'UPDATED_BY' => 9, ),
        BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'date_sent' => 1, 'subscriber_group_id' => 2, 'external_mail_group_id' => 3, 'newsletter_id' => 4, 'recipient_count' => 5, 'created_at' => 6, 'updated_at' => 7, 'created_by' => 8, 'updated_by' => 9, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * Translates a fieldname to another type
     *
     * @param      string $name field name
     * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @param      string $toType   One of the class type constants
     * @return string          translated name of the field.
     * @throws PropelException - if the specified name could not be found in the fieldname mappings.
     */
    public static function translateFieldName($name, $fromType, $toType)
    {
        $toNames = NewsletterMailingPeer::getFieldNames($toType);
        $key = isset(NewsletterMailingPeer::$fieldKeys[$fromType][$name]) ? NewsletterMailingPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(NewsletterMailingPeer::$fieldKeys[$fromType], true));
        }

        return $toNames[$key];
    }

    /**
     * Returns an array of field names.
     *
     * @param      string $type The type of fieldnames to return:
     *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @return array           A list of field names
     * @throws PropelException - if the type is not valid.
     */
    public static function getFieldNames($type = BasePeer::TYPE_PHPNAME)
    {
        if (!array_key_exists($type, NewsletterMailingPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return NewsletterMailingPeer::$fieldNames[$type];
    }

    /**
     * Convenience method which changes table.column to alias.column.
     *
     * Using this method you can maintain SQL abstraction while using column aliases.
     * <code>
     *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
     *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
     * </code>
     * @param      string $alias The alias for the current table.
     * @param      string $column The column name for current table. (i.e. NewsletterMailingPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(NewsletterMailingPeer::TABLE_NAME.'.', $alias.'.', $column);
    }

    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param      Criteria $criteria object containing the columns to add.
     * @param      string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(NewsletterMailingPeer::ID);
            $criteria->addSelectColumn(NewsletterMailingPeer::DATE_SENT);
            $criteria->addSelectColumn(NewsletterMailingPeer::SUBSCRIBER_GROUP_ID);
            $criteria->addSelectColumn(NewsletterMailingPeer::EXTERNAL_MAIL_GROUP_ID);
            $criteria->addSelectColumn(NewsletterMailingPeer::NEWSLETTER_ID);
            $criteria->addSelectColumn(NewsletterMailingPeer::RECIPIENT_COUNT);
            $criteria->addSelectColumn(NewsletterMailingPeer::CREATED_AT);
            $criteria->addSelectColumn(NewsletterMailingPeer::UPDATED_AT);
            $criteria->addSelectColumn(NewsletterMailingPeer::CREATED_BY);
            $criteria->addSelectColumn(NewsletterMailingPeer::UPDATED_BY);
        } else {
            $criteria->addSelectColumn($alias . '.ID');
            $criteria->addSelectColumn($alias . '.DATE_SENT');
            $criteria->addSelectColumn($alias . '.SUBSCRIBER_GROUP_ID');
            $criteria->addSelectColumn($alias . '.EXTERNAL_MAIL_GROUP_ID');
            $criteria->addSelectColumn($alias . '.NEWSLETTER_ID');
            $criteria->addSelectColumn($alias . '.RECIPIENT_COUNT');
            $criteria->addSelectColumn($alias . '.CREATED_AT');
            $criteria->addSelectColumn($alias . '.UPDATED_AT');
            $criteria->addSelectColumn($alias . '.CREATED_BY');
            $criteria->addSelectColumn($alias . '.UPDATED_BY');
        }
    }

    /**
     * Returns the number of rows matching criteria.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @return int Number of matching rows.
     */
    public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
    {
        // we may modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(NewsletterMailingPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            NewsletterMailingPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(NewsletterMailingPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(NewsletterMailingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        // BasePeer returns a PDOStatement
        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }
    /**
     * Selects one object from the DB.
     *
     * @param      Criteria $criteria object used to create the SELECT statement.
     * @param      PropelPDO $con
     * @return                 NewsletterMailing
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = NewsletterMailingPeer::doSelect($critcopy, $con);
        if ($objects) {
            return $objects[0];
        }

        return null;
    }
    /**
     * Selects several row from the DB.
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con
     * @return array           Array of selected Objects
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelect(Criteria $criteria, PropelPDO $con = null)
    {
        return NewsletterMailingPeer::populateObjects(NewsletterMailingPeer::doSelectStmt($criteria, $con));
    }
    /**
     * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
     *
     * Use this method directly if you want to work with an executed statement durirectly (for example
     * to perform your own object hydration).
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con The connection to use
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return PDOStatement The executed PDOStatement object.
     * @see        BasePeer::doSelect()
     */
    public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(NewsletterMailingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            NewsletterMailingPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(NewsletterMailingPeer::DATABASE_NAME);

        // BasePeer returns a PDOStatement
        return BasePeer::doSelect($criteria, $con);
    }
    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doSelect*()
     * methods in your stub classes -- you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by doSelect*()
     * and retrieveByPK*() calls.
     *
     * @param      NewsletterMailing $obj A NewsletterMailing object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = (string) $obj->getId();
            } // if key === null
            NewsletterMailingPeer::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param      mixed $value A NewsletterMailing object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof NewsletterMailing) {
                $key = (string) $value->getId();
            } elseif (is_scalar($value)) {
                // assume we've been passed a primary key
                $key = (string) $value;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or NewsletterMailing object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(NewsletterMailingPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   NewsletterMailing Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(NewsletterMailingPeer::$instances[$key])) {
                return NewsletterMailingPeer::$instances[$key];
            }
        }

        return null; // just to be explicit
    }

    /**
     * Clear the instance pool.
     *
     * @return void
     */
    public static function clearInstancePool()
    {
        NewsletterMailingPeer::$instances = array();
    }

    /**
     * Method to invalidate the instance pool of all tables related to newsletter_mailings
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return string A string version of PK or null if the components of primary key in result array are all null.
     */
    public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
    {
        // If the PK cannot be derived from the row, return null.
        if ($row[$startcol] === null) {
            return null;
        }

        return (string) $row[$startcol];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $startcol = 0)
    {

        return (int) $row[$startcol];
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function populateObjects(PDOStatement $stmt)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = NewsletterMailingPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = NewsletterMailingPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = NewsletterMailingPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                NewsletterMailingPeer::addInstanceToPool($obj, $key);
            } // if key exists
        }
        $stmt->closeCursor();

        return $results;
    }
    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return array (NewsletterMailing object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = NewsletterMailingPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = NewsletterMailingPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + NewsletterMailingPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = NewsletterMailingPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            NewsletterMailingPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related SubscriberGroup table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinSubscriberGroup(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(NewsletterMailingPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            NewsletterMailingPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(NewsletterMailingPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(NewsletterMailingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(NewsletterMailingPeer::SUBSCRIBER_GROUP_ID, SubscriberGroupPeer::ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Newsletter table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinNewsletter(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(NewsletterMailingPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            NewsletterMailingPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(NewsletterMailingPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(NewsletterMailingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(NewsletterMailingPeer::NEWSLETTER_ID, NewsletterPeer::ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related UserRelatedByCreatedBy table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinUserRelatedByCreatedBy(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(NewsletterMailingPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            NewsletterMailingPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(NewsletterMailingPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(NewsletterMailingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(NewsletterMailingPeer::CREATED_BY, UserPeer::ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related UserRelatedByUpdatedBy table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinUserRelatedByUpdatedBy(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(NewsletterMailingPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            NewsletterMailingPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(NewsletterMailingPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(NewsletterMailingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(NewsletterMailingPeer::UPDATED_BY, UserPeer::ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Selects a collection of NewsletterMailing objects pre-filled with their SubscriberGroup objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of NewsletterMailing objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSubscriberGroup(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(NewsletterMailingPeer::DATABASE_NAME);
        }

        NewsletterMailingPeer::addSelectColumns($criteria);
        $startcol = NewsletterMailingPeer::NUM_HYDRATE_COLUMNS;
        SubscriberGroupPeer::addSelectColumns($criteria);

        $criteria->addJoin(NewsletterMailingPeer::SUBSCRIBER_GROUP_ID, SubscriberGroupPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = NewsletterMailingPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = NewsletterMailingPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = NewsletterMailingPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                NewsletterMailingPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = SubscriberGroupPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = SubscriberGroupPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = SubscriberGroupPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    SubscriberGroupPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (NewsletterMailing) to $obj2 (SubscriberGroup)
                $obj2->addNewsletterMailing($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of NewsletterMailing objects pre-filled with their Newsletter objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of NewsletterMailing objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinNewsletter(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(NewsletterMailingPeer::DATABASE_NAME);
        }

        NewsletterMailingPeer::addSelectColumns($criteria);
        $startcol = NewsletterMailingPeer::NUM_HYDRATE_COLUMNS;
        NewsletterPeer::addSelectColumns($criteria);

        $criteria->addJoin(NewsletterMailingPeer::NEWSLETTER_ID, NewsletterPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = NewsletterMailingPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = NewsletterMailingPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = NewsletterMailingPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                NewsletterMailingPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = NewsletterPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = NewsletterPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = NewsletterPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    NewsletterPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (NewsletterMailing) to $obj2 (Newsletter)
                $obj2->addNewsletterMailing($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of NewsletterMailing objects pre-filled with their User objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of NewsletterMailing objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinUserRelatedByCreatedBy(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(NewsletterMailingPeer::DATABASE_NAME);
        }

        NewsletterMailingPeer::addSelectColumns($criteria);
        $startcol = NewsletterMailingPeer::NUM_HYDRATE_COLUMNS;
        UserPeer::addSelectColumns($criteria);

        $criteria->addJoin(NewsletterMailingPeer::CREATED_BY, UserPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = NewsletterMailingPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = NewsletterMailingPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = NewsletterMailingPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                NewsletterMailingPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = UserPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = UserPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    UserPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (NewsletterMailing) to $obj2 (User)
                $obj2->addNewsletterMailingRelatedByCreatedBy($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of NewsletterMailing objects pre-filled with their User objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of NewsletterMailing objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinUserRelatedByUpdatedBy(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(NewsletterMailingPeer::DATABASE_NAME);
        }

        NewsletterMailingPeer::addSelectColumns($criteria);
        $startcol = NewsletterMailingPeer::NUM_HYDRATE_COLUMNS;
        UserPeer::addSelectColumns($criteria);

        $criteria->addJoin(NewsletterMailingPeer::UPDATED_BY, UserPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = NewsletterMailingPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = NewsletterMailingPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = NewsletterMailingPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                NewsletterMailingPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = UserPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = UserPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    UserPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (NewsletterMailing) to $obj2 (User)
                $obj2->addNewsletterMailingRelatedByUpdatedBy($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining all related tables
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(NewsletterMailingPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            NewsletterMailingPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(NewsletterMailingPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(NewsletterMailingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(NewsletterMailingPeer::SUBSCRIBER_GROUP_ID, SubscriberGroupPeer::ID, $join_behavior);

        $criteria->addJoin(NewsletterMailingPeer::NEWSLETTER_ID, NewsletterPeer::ID, $join_behavior);

        $criteria->addJoin(NewsletterMailingPeer::CREATED_BY, UserPeer::ID, $join_behavior);

        $criteria->addJoin(NewsletterMailingPeer::UPDATED_BY, UserPeer::ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }

    /**
     * Selects a collection of NewsletterMailing objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of NewsletterMailing objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(NewsletterMailingPeer::DATABASE_NAME);
        }

        NewsletterMailingPeer::addSelectColumns($criteria);
        $startcol2 = NewsletterMailingPeer::NUM_HYDRATE_COLUMNS;

        SubscriberGroupPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + SubscriberGroupPeer::NUM_HYDRATE_COLUMNS;

        NewsletterPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + NewsletterPeer::NUM_HYDRATE_COLUMNS;

        UserPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + UserPeer::NUM_HYDRATE_COLUMNS;

        UserPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + UserPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(NewsletterMailingPeer::SUBSCRIBER_GROUP_ID, SubscriberGroupPeer::ID, $join_behavior);

        $criteria->addJoin(NewsletterMailingPeer::NEWSLETTER_ID, NewsletterPeer::ID, $join_behavior);

        $criteria->addJoin(NewsletterMailingPeer::CREATED_BY, UserPeer::ID, $join_behavior);

        $criteria->addJoin(NewsletterMailingPeer::UPDATED_BY, UserPeer::ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = NewsletterMailingPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = NewsletterMailingPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = NewsletterMailingPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                NewsletterMailingPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined SubscriberGroup rows

            $key2 = SubscriberGroupPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = SubscriberGroupPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = SubscriberGroupPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    SubscriberGroupPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (NewsletterMailing) to the collection in $obj2 (SubscriberGroup)
                $obj2->addNewsletterMailing($obj1);
            } // if joined row not null

            // Add objects for joined Newsletter rows

            $key3 = NewsletterPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = NewsletterPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = NewsletterPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    NewsletterPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (NewsletterMailing) to the collection in $obj3 (Newsletter)
                $obj3->addNewsletterMailing($obj1);
            } // if joined row not null

            // Add objects for joined User rows

            $key4 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = UserPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = UserPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    UserPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (NewsletterMailing) to the collection in $obj4 (User)
                $obj4->addNewsletterMailingRelatedByCreatedBy($obj1);
            } // if joined row not null

            // Add objects for joined User rows

            $key5 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol5);
            if ($key5 !== null) {
                $obj5 = UserPeer::getInstanceFromPool($key5);
                if (!$obj5) {

                    $cls = UserPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    UserPeer::addInstanceToPool($obj5, $key5);
                } // if obj5 loaded

                // Add the $obj1 (NewsletterMailing) to the collection in $obj5 (User)
                $obj5->addNewsletterMailingRelatedByUpdatedBy($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related SubscriberGroup table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptSubscriberGroup(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(NewsletterMailingPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            NewsletterMailingPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(NewsletterMailingPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(NewsletterMailingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(NewsletterMailingPeer::NEWSLETTER_ID, NewsletterPeer::ID, $join_behavior);

        $criteria->addJoin(NewsletterMailingPeer::CREATED_BY, UserPeer::ID, $join_behavior);

        $criteria->addJoin(NewsletterMailingPeer::UPDATED_BY, UserPeer::ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Newsletter table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptNewsletter(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(NewsletterMailingPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            NewsletterMailingPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(NewsletterMailingPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(NewsletterMailingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(NewsletterMailingPeer::SUBSCRIBER_GROUP_ID, SubscriberGroupPeer::ID, $join_behavior);

        $criteria->addJoin(NewsletterMailingPeer::CREATED_BY, UserPeer::ID, $join_behavior);

        $criteria->addJoin(NewsletterMailingPeer::UPDATED_BY, UserPeer::ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related UserRelatedByCreatedBy table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptUserRelatedByCreatedBy(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(NewsletterMailingPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            NewsletterMailingPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(NewsletterMailingPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(NewsletterMailingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(NewsletterMailingPeer::SUBSCRIBER_GROUP_ID, SubscriberGroupPeer::ID, $join_behavior);

        $criteria->addJoin(NewsletterMailingPeer::NEWSLETTER_ID, NewsletterPeer::ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related UserRelatedByUpdatedBy table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptUserRelatedByUpdatedBy(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(NewsletterMailingPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            NewsletterMailingPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(NewsletterMailingPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(NewsletterMailingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(NewsletterMailingPeer::SUBSCRIBER_GROUP_ID, SubscriberGroupPeer::ID, $join_behavior);

        $criteria->addJoin(NewsletterMailingPeer::NEWSLETTER_ID, NewsletterPeer::ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Selects a collection of NewsletterMailing objects pre-filled with all related objects except SubscriberGroup.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of NewsletterMailing objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptSubscriberGroup(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(NewsletterMailingPeer::DATABASE_NAME);
        }

        NewsletterMailingPeer::addSelectColumns($criteria);
        $startcol2 = NewsletterMailingPeer::NUM_HYDRATE_COLUMNS;

        NewsletterPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + NewsletterPeer::NUM_HYDRATE_COLUMNS;

        UserPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + UserPeer::NUM_HYDRATE_COLUMNS;

        UserPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + UserPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(NewsletterMailingPeer::NEWSLETTER_ID, NewsletterPeer::ID, $join_behavior);

        $criteria->addJoin(NewsletterMailingPeer::CREATED_BY, UserPeer::ID, $join_behavior);

        $criteria->addJoin(NewsletterMailingPeer::UPDATED_BY, UserPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = NewsletterMailingPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = NewsletterMailingPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = NewsletterMailingPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                NewsletterMailingPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Newsletter rows

                $key2 = NewsletterPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = NewsletterPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = NewsletterPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    NewsletterPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (NewsletterMailing) to the collection in $obj2 (Newsletter)
                $obj2->addNewsletterMailing($obj1);

            } // if joined row is not null

                // Add objects for joined User rows

                $key3 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = UserPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = UserPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    UserPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (NewsletterMailing) to the collection in $obj3 (User)
                $obj3->addNewsletterMailingRelatedByCreatedBy($obj1);

            } // if joined row is not null

                // Add objects for joined User rows

                $key4 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = UserPeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = UserPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    UserPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (NewsletterMailing) to the collection in $obj4 (User)
                $obj4->addNewsletterMailingRelatedByUpdatedBy($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of NewsletterMailing objects pre-filled with all related objects except Newsletter.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of NewsletterMailing objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptNewsletter(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(NewsletterMailingPeer::DATABASE_NAME);
        }

        NewsletterMailingPeer::addSelectColumns($criteria);
        $startcol2 = NewsletterMailingPeer::NUM_HYDRATE_COLUMNS;

        SubscriberGroupPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + SubscriberGroupPeer::NUM_HYDRATE_COLUMNS;

        UserPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + UserPeer::NUM_HYDRATE_COLUMNS;

        UserPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + UserPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(NewsletterMailingPeer::SUBSCRIBER_GROUP_ID, SubscriberGroupPeer::ID, $join_behavior);

        $criteria->addJoin(NewsletterMailingPeer::CREATED_BY, UserPeer::ID, $join_behavior);

        $criteria->addJoin(NewsletterMailingPeer::UPDATED_BY, UserPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = NewsletterMailingPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = NewsletterMailingPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = NewsletterMailingPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                NewsletterMailingPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined SubscriberGroup rows

                $key2 = SubscriberGroupPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = SubscriberGroupPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = SubscriberGroupPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    SubscriberGroupPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (NewsletterMailing) to the collection in $obj2 (SubscriberGroup)
                $obj2->addNewsletterMailing($obj1);

            } // if joined row is not null

                // Add objects for joined User rows

                $key3 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = UserPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = UserPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    UserPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (NewsletterMailing) to the collection in $obj3 (User)
                $obj3->addNewsletterMailingRelatedByCreatedBy($obj1);

            } // if joined row is not null

                // Add objects for joined User rows

                $key4 = UserPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = UserPeer::getInstanceFromPool($key4);
                    if (!$obj4) {

                        $cls = UserPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    UserPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (NewsletterMailing) to the collection in $obj4 (User)
                $obj4->addNewsletterMailingRelatedByUpdatedBy($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of NewsletterMailing objects pre-filled with all related objects except UserRelatedByCreatedBy.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of NewsletterMailing objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptUserRelatedByCreatedBy(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(NewsletterMailingPeer::DATABASE_NAME);
        }

        NewsletterMailingPeer::addSelectColumns($criteria);
        $startcol2 = NewsletterMailingPeer::NUM_HYDRATE_COLUMNS;

        SubscriberGroupPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + SubscriberGroupPeer::NUM_HYDRATE_COLUMNS;

        NewsletterPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + NewsletterPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(NewsletterMailingPeer::SUBSCRIBER_GROUP_ID, SubscriberGroupPeer::ID, $join_behavior);

        $criteria->addJoin(NewsletterMailingPeer::NEWSLETTER_ID, NewsletterPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = NewsletterMailingPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = NewsletterMailingPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = NewsletterMailingPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                NewsletterMailingPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined SubscriberGroup rows

                $key2 = SubscriberGroupPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = SubscriberGroupPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = SubscriberGroupPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    SubscriberGroupPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (NewsletterMailing) to the collection in $obj2 (SubscriberGroup)
                $obj2->addNewsletterMailing($obj1);

            } // if joined row is not null

                // Add objects for joined Newsletter rows

                $key3 = NewsletterPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = NewsletterPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = NewsletterPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    NewsletterPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (NewsletterMailing) to the collection in $obj3 (Newsletter)
                $obj3->addNewsletterMailing($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of NewsletterMailing objects pre-filled with all related objects except UserRelatedByUpdatedBy.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of NewsletterMailing objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptUserRelatedByUpdatedBy(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(NewsletterMailingPeer::DATABASE_NAME);
        }

        NewsletterMailingPeer::addSelectColumns($criteria);
        $startcol2 = NewsletterMailingPeer::NUM_HYDRATE_COLUMNS;

        SubscriberGroupPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + SubscriberGroupPeer::NUM_HYDRATE_COLUMNS;

        NewsletterPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + NewsletterPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(NewsletterMailingPeer::SUBSCRIBER_GROUP_ID, SubscriberGroupPeer::ID, $join_behavior);

        $criteria->addJoin(NewsletterMailingPeer::NEWSLETTER_ID, NewsletterPeer::ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = NewsletterMailingPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = NewsletterMailingPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = NewsletterMailingPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                NewsletterMailingPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined SubscriberGroup rows

                $key2 = SubscriberGroupPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = SubscriberGroupPeer::getInstanceFromPool($key2);
                    if (!$obj2) {

                        $cls = SubscriberGroupPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    SubscriberGroupPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (NewsletterMailing) to the collection in $obj2 (SubscriberGroup)
                $obj2->addNewsletterMailing($obj1);

            } // if joined row is not null

                // Add objects for joined Newsletter rows

                $key3 = NewsletterPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = NewsletterPeer::getInstanceFromPool($key3);
                    if (!$obj3) {

                        $cls = NewsletterPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    NewsletterPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (NewsletterMailing) to the collection in $obj3 (Newsletter)
                $obj3->addNewsletterMailing($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }

    /**
     * Returns the TableMap related to this peer.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getDatabaseMap(NewsletterMailingPeer::DATABASE_NAME)->getTable(NewsletterMailingPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseNewsletterMailingPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseNewsletterMailingPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new NewsletterMailingTableMap());
      }
    }

    /**
     * The class that the Peer will make instances of.
     *
     *
     * @return string ClassName
     */
    public static function getOMClass()
    {
        return NewsletterMailingPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a NewsletterMailing or Criteria object.
     *
     * @param      mixed $values Criteria or NewsletterMailing object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(NewsletterMailingPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from NewsletterMailing object
        }

        if ($criteria->containsKey(NewsletterMailingPeer::ID) && $criteria->keyContainsValue(NewsletterMailingPeer::ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.NewsletterMailingPeer::ID.')');
        }


        // Set the correct dbName
        $criteria->setDbName(NewsletterMailingPeer::DATABASE_NAME);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = BasePeer::doInsert($criteria, $con);
            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

    /**
     * Performs an UPDATE on the database, given a NewsletterMailing or Criteria object.
     *
     * @param      mixed $values Criteria or NewsletterMailing object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(NewsletterMailingPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(NewsletterMailingPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(NewsletterMailingPeer::ID);
            $value = $criteria->remove(NewsletterMailingPeer::ID);
            if ($value) {
                $selectCriteria->add(NewsletterMailingPeer::ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(NewsletterMailingPeer::TABLE_NAME);
            }

        } else { // $values is NewsletterMailing object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(NewsletterMailingPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the newsletter_mailings table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(NewsletterMailingPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(NewsletterMailingPeer::TABLE_NAME, $con, NewsletterMailingPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            NewsletterMailingPeer::clearInstancePool();
            NewsletterMailingPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a NewsletterMailing or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or NewsletterMailing object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param      PropelPDO $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *				if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, PropelPDO $con = null)
     {
        if ($con === null) {
            $con = Propel::getConnection(NewsletterMailingPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            NewsletterMailingPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof NewsletterMailing) { // it's a model object
            // invalidate the cache for this single object
            NewsletterMailingPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(NewsletterMailingPeer::DATABASE_NAME);
            $criteria->add(NewsletterMailingPeer::ID, (array) $values, Criteria::IN);
            // invalidate the cache for this object(s)
            foreach ((array) $values as $singleval) {
                NewsletterMailingPeer::removeInstanceFromPool($singleval);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(NewsletterMailingPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();

            $affectedRows += BasePeer::doDelete($criteria, $con);
            NewsletterMailingPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given NewsletterMailing object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      NewsletterMailing $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(NewsletterMailingPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(NewsletterMailingPeer::TABLE_NAME);

            if (! is_array($cols)) {
                $cols = array($cols);
            }

            foreach ($cols as $colName) {
                if ($tableMap->hasColumn($colName)) {
                    $get = 'get' . $tableMap->getColumn($colName)->getPhpName();
                    $columns[$colName] = $obj->$get();
                }
            }
        } else {

        }

        return BasePeer::doValidate(NewsletterMailingPeer::DATABASE_NAME, NewsletterMailingPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve a single object by pkey.
     *
     * @param      int $pk the primary key.
     * @param      PropelPDO $con the connection to use
     * @return NewsletterMailing
     */
    public static function retrieveByPK($pk, PropelPDO $con = null)
    {

        if (null !== ($obj = NewsletterMailingPeer::getInstanceFromPool((string) $pk))) {
            return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(NewsletterMailingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria = new Criteria(NewsletterMailingPeer::DATABASE_NAME);
        $criteria->add(NewsletterMailingPeer::ID, $pk);

        $v = NewsletterMailingPeer::doSelect($criteria, $con);

        return !empty($v) > 0 ? $v[0] : null;
    }

    /**
     * Retrieve multiple objects by pkey.
     *
     * @param      array $pks List of primary keys
     * @param      PropelPDO $con the connection to use
     * @return NewsletterMailing[]
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function retrieveByPKs($pks, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(NewsletterMailingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $objs = null;
        if (empty($pks)) {
            $objs = array();
        } else {
            $criteria = new Criteria(NewsletterMailingPeer::DATABASE_NAME);
            $criteria->add(NewsletterMailingPeer::ID, $pks, Criteria::IN);
            $objs = NewsletterMailingPeer::doSelect($criteria, $con);
        }

        return $objs;
    }

    // denyable behavior
    public static function ignoreRights($bIgnore = true) {
        self::$IGNORE_RIGHTS = $bIgnore;
    }
    public static function isIgnoringRights() {
        return self::$IGNORE_RIGHTS || PHP_SAPI === "cli";
    }
    public static function mayOperateOn($oUser, $mObject, $sOperation) {
        if($oUser === null) {
            return false;
        }
        if($oUser->getIsAdmin()) {
            return true;
        }
        return $oUser->hasRole("newsletter_mailings");
    }
    public static function mayOperateOnOwn($oUser, $mObject, $sOperation) {
        return $oUser->hasRole("newsletter_mailings-own");
    }

} // BaseNewsletterMailingPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseNewsletterMailingPeer::buildTableMap();

