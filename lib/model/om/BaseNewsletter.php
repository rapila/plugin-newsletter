<?php


/**
 * Base class that represents a row from the 'newsletters' table.
 *
 * 
 *
 * @package    propel.generator.model.om
 */
abstract class BaseNewsletter extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'NewsletterPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        NewsletterPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the subject field.
	 * @var        string
	 */
	protected $subject;

	/**
	 * The value for the newsletter_body field.
	 * @var        resource
	 */
	protected $newsletter_body;

	/**
	 * The value for the language_id field.
	 * @var        string
	 */
	protected $language_id;

	/**
	 * The value for the is_approved field.
	 * Note: this column has a database default value of: false
	 * @var        boolean
	 */
	protected $is_approved;

	/**
	 * The value for the is_html field.
	 * Note: this column has a database default value of: true
	 * @var        boolean
	 */
	protected $is_html;

	/**
	 * The value for the template_name field.
	 * @var        string
	 */
	protected $template_name;

	/**
	 * The value for the created_at field.
	 * @var        string
	 */
	protected $created_at;

	/**
	 * The value for the updated_at field.
	 * @var        string
	 */
	protected $updated_at;

	/**
	 * The value for the created_by field.
	 * @var        int
	 */
	protected $created_by;

	/**
	 * The value for the updated_by field.
	 * @var        int
	 */
	protected $updated_by;

	/**
	 * @var        User
	 */
	protected $aUserRelatedByCreatedBy;

	/**
	 * @var        User
	 */
	protected $aUserRelatedByUpdatedBy;

	/**
	 * @var        array NewsletterMailing[] Collection to store aggregation of NewsletterMailing objects.
	 */
	protected $collNewsletterMailings;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->is_approved = false;
		$this->is_html = true;
	}

	/**
	 * Initializes internal state of BaseNewsletter object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [subject] column value.
	 * 
	 * @return     string
	 */
	public function getSubject()
	{
		return $this->subject;
	}

	/**
	 * Get the [newsletter_body] column value.
	 * 
	 * @return     resource
	 */
	public function getNewsletterBody()
	{
		return $this->newsletter_body;
	}

	/**
	 * Get the [language_id] column value.
	 * 
	 * @return     string
	 */
	public function getLanguageId()
	{
		return $this->language_id;
	}

	/**
	 * Get the [is_approved] column value.
	 * 
	 * @return     boolean
	 */
	public function getIsApproved()
	{
		return $this->is_approved;
	}

	/**
	 * Get the [is_html] column value.
	 * 
	 * @return     boolean
	 */
	public function getIsHtml()
	{
		return $this->is_html;
	}

	/**
	 * Get the [template_name] column value.
	 * 
	 * @return     string
	 */
	public function getTemplateName()
	{
		return $this->template_name;
	}

	/**
	 * Get the [optionally formatted] temporal [created_at] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getCreatedAt($format = 'Y-m-d H:i:s')
	{
		if ($this->created_at === null) {
			return null;
		}


		if ($this->created_at === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->created_at);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->created_at, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [optionally formatted] temporal [updated_at] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getUpdatedAt($format = 'Y-m-d H:i:s')
	{
		if ($this->updated_at === null) {
			return null;
		}


		if ($this->updated_at === '0000-00-00 00:00:00') {
			// while technically this is not a default value of NULL,
			// this seems to be closest in meaning.
			return null;
		} else {
			try {
				$dt = new DateTime($this->updated_at);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->updated_at, true), $x);
			}
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [created_by] column value.
	 * 
	 * @return     int
	 */
	public function getCreatedBy()
	{
		return $this->created_by;
	}

	/**
	 * Get the [updated_by] column value.
	 * 
	 * @return     int
	 */
	public function getUpdatedBy()
	{
		return $this->updated_by;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Newsletter The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NewsletterPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [subject] column.
	 * 
	 * @param      string $v new value
	 * @return     Newsletter The current object (for fluent API support)
	 */
	public function setSubject($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->subject !== $v) {
			$this->subject = $v;
			$this->modifiedColumns[] = NewsletterPeer::SUBJECT;
		}

		return $this;
	} // setSubject()

	/**
	 * Set the value of [newsletter_body] column.
	 * 
	 * @param      resource $v new value
	 * @return     Newsletter The current object (for fluent API support)
	 */
	public function setNewsletterBody($v)
	{
		// Because BLOB columns are streams in PDO we have to assume that they are
		// always modified when a new value is passed in.  For example, the contents
		// of the stream itself may have changed externally.
		if (!is_resource($v) && $v !== null) {
			$this->newsletter_body = fopen('php://memory', 'r+');
			fwrite($this->newsletter_body, $v);
			rewind($this->newsletter_body);
		} else { // it's already a stream
			$this->newsletter_body = $v;
		}
		$this->modifiedColumns[] = NewsletterPeer::NEWSLETTER_BODY;

		return $this;
	} // setNewsletterBody()

	/**
	 * Set the value of [language_id] column.
	 * 
	 * @param      string $v new value
	 * @return     Newsletter The current object (for fluent API support)
	 */
	public function setLanguageId($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->language_id !== $v) {
			$this->language_id = $v;
			$this->modifiedColumns[] = NewsletterPeer::LANGUAGE_ID;
		}

		return $this;
	} // setLanguageId()

	/**
	 * Sets the value of the [is_approved] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     Newsletter The current object (for fluent API support)
	 */
	public function setIsApproved($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->is_approved !== $v) {
			$this->is_approved = $v;
			$this->modifiedColumns[] = NewsletterPeer::IS_APPROVED;
		}

		return $this;
	} // setIsApproved()

	/**
	 * Sets the value of the [is_html] column.
	 * Non-boolean arguments are converted using the following rules:
	 *   * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
	 *   * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
	 * Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
	 * 
	 * @param      boolean|integer|string $v The new value
	 * @return     Newsletter The current object (for fluent API support)
	 */
	public function setIsHtml($v)
	{
		if ($v !== null) {
			if (is_string($v)) {
				$v = in_array(strtolower($v), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
			} else {
				$v = (boolean) $v;
			}
		}

		if ($this->is_html !== $v) {
			$this->is_html = $v;
			$this->modifiedColumns[] = NewsletterPeer::IS_HTML;
		}

		return $this;
	} // setIsHtml()

	/**
	 * Set the value of [template_name] column.
	 * 
	 * @param      string $v new value
	 * @return     Newsletter The current object (for fluent API support)
	 */
	public function setTemplateName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->template_name !== $v) {
			$this->template_name = $v;
			$this->modifiedColumns[] = NewsletterPeer::TEMPLATE_NAME;
		}

		return $this;
	} // setTemplateName()

	/**
	 * Sets the value of [created_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Newsletter The current object (for fluent API support)
	 */
	public function setCreatedAt($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->created_at !== null || $dt !== null) {
			$currentDateAsString = ($this->created_at !== null && $tmpDt = new DateTime($this->created_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->created_at = $newDateAsString;
				$this->modifiedColumns[] = NewsletterPeer::CREATED_AT;
			}
		} // if either are not null

		return $this;
	} // setCreatedAt()

	/**
	 * Sets the value of [updated_at] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.
	 *               Empty strings are treated as NULL.
	 * @return     Newsletter The current object (for fluent API support)
	 */
	public function setUpdatedAt($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');
		if ($this->updated_at !== null || $dt !== null) {
			$currentDateAsString = ($this->updated_at !== null && $tmpDt = new DateTime($this->updated_at)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
			if ($currentDateAsString !== $newDateAsString) {
				$this->updated_at = $newDateAsString;
				$this->modifiedColumns[] = NewsletterPeer::UPDATED_AT;
			}
		} // if either are not null

		return $this;
	} // setUpdatedAt()

	/**
	 * Set the value of [created_by] column.
	 * 
	 * @param      int $v new value
	 * @return     Newsletter The current object (for fluent API support)
	 */
	public function setCreatedBy($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = NewsletterPeer::CREATED_BY;
		}

		if ($this->aUserRelatedByCreatedBy !== null && $this->aUserRelatedByCreatedBy->getId() !== $v) {
			$this->aUserRelatedByCreatedBy = null;
		}

		return $this;
	} // setCreatedBy()

	/**
	 * Set the value of [updated_by] column.
	 * 
	 * @param      int $v new value
	 * @return     Newsletter The current object (for fluent API support)
	 */
	public function setUpdatedBy($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = NewsletterPeer::UPDATED_BY;
		}

		if ($this->aUserRelatedByUpdatedBy !== null && $this->aUserRelatedByUpdatedBy->getId() !== $v) {
			$this->aUserRelatedByUpdatedBy = null;
		}

		return $this;
	} // setUpdatedBy()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
			if ($this->is_approved !== false) {
				return false;
			}

			if ($this->is_html !== true) {
				return false;
			}

		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->subject = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			if ($row[$startcol + 2] !== null) {
				$this->newsletter_body = fopen('php://memory', 'r+');
				fwrite($this->newsletter_body, $row[$startcol + 2]);
				rewind($this->newsletter_body);
			} else {
				$this->newsletter_body = null;
			}
			$this->language_id = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->is_approved = ($row[$startcol + 4] !== null) ? (boolean) $row[$startcol + 4] : null;
			$this->is_html = ($row[$startcol + 5] !== null) ? (boolean) $row[$startcol + 5] : null;
			$this->template_name = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->created_at = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->updated_at = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->created_by = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
			$this->updated_by = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 11; // 11 = NewsletterPeer::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException("Error populating Newsletter object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

		if ($this->aUserRelatedByCreatedBy !== null && $this->created_by !== $this->aUserRelatedByCreatedBy->getId()) {
			$this->aUserRelatedByCreatedBy = null;
		}
		if ($this->aUserRelatedByUpdatedBy !== null && $this->updated_by !== $this->aUserRelatedByUpdatedBy->getId()) {
			$this->aUserRelatedByUpdatedBy = null;
		}
	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NewsletterPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = NewsletterPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aUserRelatedByCreatedBy = null;
			$this->aUserRelatedByUpdatedBy = null;
			$this->collNewsletterMailings = null;

		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NewsletterPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$deleteQuery = NewsletterQuery::create()
				->filterByPrimaryKey($this->getPrimaryKey());
			$ret = $this->preDelete($con);
			// denyable behavior
			if(!(NewsletterPeer::isIgnoringRights() || $this->mayOperate("delete"))) {
				throw new PropelException(new NotPermittedException("delete.by_role", array("role_key" => "newsletters")));
			}

			if ($ret) {
				$deleteQuery->delete($con);
				$this->postDelete($con);
				$con->commit();
				$this->setDeleted(true);
			} else {
				$con->commit();
			}
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NewsletterPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
				// denyable behavior
				if(!(NewsletterPeer::isIgnoringRights() || $this->mayOperate("insert"))) {
					throw new PropelException(new NotPermittedException("insert.by_role", array("role_key" => "newsletters")));
				}

				// extended_timestampable behavior
				if (!$this->isColumnModified(NewsletterPeer::CREATED_AT)) {
					$this->setCreatedAt(time());
				}
				if (!$this->isColumnModified(NewsletterPeer::UPDATED_AT)) {
					$this->setUpdatedAt(time());
				}
				// attributable behavior
				
				if(Session::getSession()->isAuthenticated()) {
					if (!$this->isColumnModified(NewsletterPeer::CREATED_BY)) {
						$this->setCreatedBy(Session::getSession()->getUser()->getId());
					}
					if (!$this->isColumnModified(NewsletterPeer::UPDATED_BY)) {
						$this->setUpdatedBy(Session::getSession()->getUser()->getId());
					}
				}

			} else {
				$ret = $ret && $this->preUpdate($con);
				// denyable behavior
				if(!(NewsletterPeer::isIgnoringRights() || $this->mayOperate("update"))) {
					throw new PropelException(new NotPermittedException("update.by_role", array("role_key" => "newsletters")));
				}

				// extended_timestampable behavior
				if ($this->isModified() && !$this->isColumnModified(NewsletterPeer::UPDATED_AT)) {
					$this->setUpdatedAt(time());
				}
				// attributable behavior
				
				if(Session::getSession()->isAuthenticated()) {
					if ($this->isModified() && !$this->isColumnModified(NewsletterPeer::UPDATED_BY)) {
						$this->setUpdatedBy(Session::getSession()->getUser()->getId());
					}
				}
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				NewsletterPeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aUserRelatedByCreatedBy !== null) {
				if ($this->aUserRelatedByCreatedBy->isModified() || $this->aUserRelatedByCreatedBy->isNew()) {
					$affectedRows += $this->aUserRelatedByCreatedBy->save($con);
				}
				$this->setUserRelatedByCreatedBy($this->aUserRelatedByCreatedBy);
			}

			if ($this->aUserRelatedByUpdatedBy !== null) {
				if ($this->aUserRelatedByUpdatedBy->isModified() || $this->aUserRelatedByUpdatedBy->isNew()) {
					$affectedRows += $this->aUserRelatedByUpdatedBy->save($con);
				}
				$this->setUserRelatedByUpdatedBy($this->aUserRelatedByUpdatedBy);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = NewsletterPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(NewsletterPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.NewsletterPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += NewsletterPeer::doUpdate($this, $con);
				}

				// Rewind the newsletter_body LOB column, since PDO does not rewind after inserting value.
				if ($this->newsletter_body !== null && is_resource($this->newsletter_body)) {
					rewind($this->newsletter_body);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collNewsletterMailings !== null) {
				foreach ($this->collNewsletterMailings as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aUserRelatedByCreatedBy !== null) {
				if (!$this->aUserRelatedByCreatedBy->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUserRelatedByCreatedBy->getValidationFailures());
				}
			}

			if ($this->aUserRelatedByUpdatedBy !== null) {
				if (!$this->aUserRelatedByUpdatedBy->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aUserRelatedByUpdatedBy->getValidationFailures());
				}
			}


			if (($retval = NewsletterPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collNewsletterMailings !== null) {
					foreach ($this->collNewsletterMailings as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NewsletterPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getSubject();
				break;
			case 2:
				return $this->getNewsletterBody();
				break;
			case 3:
				return $this->getLanguageId();
				break;
			case 4:
				return $this->getIsApproved();
				break;
			case 5:
				return $this->getIsHtml();
				break;
			case 6:
				return $this->getTemplateName();
				break;
			case 7:
				return $this->getCreatedAt();
				break;
			case 8:
				return $this->getUpdatedAt();
				break;
			case 9:
				return $this->getCreatedBy();
				break;
			case 10:
				return $this->getUpdatedBy();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 *                    Defaults to BasePeer::TYPE_PHPNAME.
	 * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
	 * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
	 * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
	{
		if (isset($alreadyDumpedObjects['Newsletter'][$this->getPrimaryKey()])) {
			return '*RECURSION*';
		}
		$alreadyDumpedObjects['Newsletter'][$this->getPrimaryKey()] = true;
		$keys = NewsletterPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getSubject(),
			$keys[2] => $this->getNewsletterBody(),
			$keys[3] => $this->getLanguageId(),
			$keys[4] => $this->getIsApproved(),
			$keys[5] => $this->getIsHtml(),
			$keys[6] => $this->getTemplateName(),
			$keys[7] => $this->getCreatedAt(),
			$keys[8] => $this->getUpdatedAt(),
			$keys[9] => $this->getCreatedBy(),
			$keys[10] => $this->getUpdatedBy(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aUserRelatedByCreatedBy) {
				$result['UserRelatedByCreatedBy'] = $this->aUserRelatedByCreatedBy->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->aUserRelatedByUpdatedBy) {
				$result['UserRelatedByUpdatedBy'] = $this->aUserRelatedByUpdatedBy->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
			}
			if (null !== $this->collNewsletterMailings) {
				$result['NewsletterMailings'] = $this->collNewsletterMailings->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
			}
		}
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NewsletterPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setSubject($value);
				break;
			case 2:
				$this->setNewsletterBody($value);
				break;
			case 3:
				$this->setLanguageId($value);
				break;
			case 4:
				$this->setIsApproved($value);
				break;
			case 5:
				$this->setIsHtml($value);
				break;
			case 6:
				$this->setTemplateName($value);
				break;
			case 7:
				$this->setCreatedAt($value);
				break;
			case 8:
				$this->setUpdatedAt($value);
				break;
			case 9:
				$this->setCreatedBy($value);
				break;
			case 10:
				$this->setUpdatedBy($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NewsletterPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setSubject($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNewsletterBody($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setLanguageId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setIsApproved($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setIsHtml($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTemplateName($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCreatedAt($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setUpdatedAt($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCreatedBy($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setUpdatedBy($arr[$keys[10]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(NewsletterPeer::DATABASE_NAME);

		if ($this->isColumnModified(NewsletterPeer::ID)) $criteria->add(NewsletterPeer::ID, $this->id);
		if ($this->isColumnModified(NewsletterPeer::SUBJECT)) $criteria->add(NewsletterPeer::SUBJECT, $this->subject);
		if ($this->isColumnModified(NewsletterPeer::NEWSLETTER_BODY)) $criteria->add(NewsletterPeer::NEWSLETTER_BODY, $this->newsletter_body);
		if ($this->isColumnModified(NewsletterPeer::LANGUAGE_ID)) $criteria->add(NewsletterPeer::LANGUAGE_ID, $this->language_id);
		if ($this->isColumnModified(NewsletterPeer::IS_APPROVED)) $criteria->add(NewsletterPeer::IS_APPROVED, $this->is_approved);
		if ($this->isColumnModified(NewsletterPeer::IS_HTML)) $criteria->add(NewsletterPeer::IS_HTML, $this->is_html);
		if ($this->isColumnModified(NewsletterPeer::TEMPLATE_NAME)) $criteria->add(NewsletterPeer::TEMPLATE_NAME, $this->template_name);
		if ($this->isColumnModified(NewsletterPeer::CREATED_AT)) $criteria->add(NewsletterPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(NewsletterPeer::UPDATED_AT)) $criteria->add(NewsletterPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(NewsletterPeer::CREATED_BY)) $criteria->add(NewsletterPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(NewsletterPeer::UPDATED_BY)) $criteria->add(NewsletterPeer::UPDATED_BY, $this->updated_by);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NewsletterPeer::DATABASE_NAME);
		$criteria->add(NewsletterPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getId();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Newsletter (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
	{
		$copyObj->setSubject($this->getSubject());
		$copyObj->setNewsletterBody($this->getNewsletterBody());
		$copyObj->setLanguageId($this->getLanguageId());
		$copyObj->setIsApproved($this->getIsApproved());
		$copyObj->setIsHtml($this->getIsHtml());
		$copyObj->setTemplateName($this->getTemplateName());
		$copyObj->setCreatedAt($this->getCreatedAt());
		$copyObj->setUpdatedAt($this->getUpdatedAt());
		$copyObj->setCreatedBy($this->getCreatedBy());
		$copyObj->setUpdatedBy($this->getUpdatedBy());

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getNewsletterMailings() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addNewsletterMailing($relObj->copy($deepCopy));
				}
			}

		} // if ($deepCopy)

		if ($makeNew) {
			$copyObj->setNew(true);
			$copyObj->setId(NULL); // this is a auto-increment column, so set to default value
		}
	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     Newsletter Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     NewsletterPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new NewsletterPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a User object.
	 *
	 * @param      User $v
	 * @return     Newsletter The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setUserRelatedByCreatedBy(User $v = null)
	{
		if ($v === null) {
			$this->setCreatedBy(NULL);
		} else {
			$this->setCreatedBy($v->getId());
		}

		$this->aUserRelatedByCreatedBy = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the User object, it will not be re-added.
		if ($v !== null) {
			$v->addNewsletterRelatedByCreatedBy($this);
		}

		return $this;
	}


	/**
	 * Get the associated User object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     User The associated User object.
	 * @throws     PropelException
	 */
	public function getUserRelatedByCreatedBy(PropelPDO $con = null)
	{
		if ($this->aUserRelatedByCreatedBy === null && ($this->created_by !== null)) {
			$this->aUserRelatedByCreatedBy = UserQuery::create()->findPk($this->created_by, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aUserRelatedByCreatedBy->addNewslettersRelatedByCreatedBy($this);
			 */
		}
		return $this->aUserRelatedByCreatedBy;
	}

	/**
	 * Declares an association between this object and a User object.
	 *
	 * @param      User $v
	 * @return     Newsletter The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setUserRelatedByUpdatedBy(User $v = null)
	{
		if ($v === null) {
			$this->setUpdatedBy(NULL);
		} else {
			$this->setUpdatedBy($v->getId());
		}

		$this->aUserRelatedByUpdatedBy = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the User object, it will not be re-added.
		if ($v !== null) {
			$v->addNewsletterRelatedByUpdatedBy($this);
		}

		return $this;
	}


	/**
	 * Get the associated User object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     User The associated User object.
	 * @throws     PropelException
	 */
	public function getUserRelatedByUpdatedBy(PropelPDO $con = null)
	{
		if ($this->aUserRelatedByUpdatedBy === null && ($this->updated_by !== null)) {
			$this->aUserRelatedByUpdatedBy = UserQuery::create()->findPk($this->updated_by, $con);
			/* The following can be used additionally to
				guarantee the related object contains a reference
				to this object.  This level of coupling may, however, be
				undesirable since it could result in an only partially populated collection
				in the referenced object.
				$this->aUserRelatedByUpdatedBy->addNewslettersRelatedByUpdatedBy($this);
			 */
		}
		return $this->aUserRelatedByUpdatedBy;
	}


	/**
	 * Initializes a collection based on the name of a relation.
	 * Avoids crafting an 'init[$relationName]s' method name
	 * that wouldn't work when StandardEnglishPluralizer is used.
	 *
	 * @param      string $relationName The name of the relation to initialize
	 * @return     void
	 */
	public function initRelation($relationName)
	{
		if ('NewsletterMailing' == $relationName) {
			return $this->initNewsletterMailings();
		}
	}

	/**
	 * Clears out the collNewsletterMailings collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addNewsletterMailings()
	 */
	public function clearNewsletterMailings()
	{
		$this->collNewsletterMailings = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collNewsletterMailings collection.
	 *
	 * By default this just sets the collNewsletterMailings collection to an empty array (like clearcollNewsletterMailings());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @param      boolean $overrideExisting If set to true, the method call initializes
	 *                                        the collection even if it is not empty
	 *
	 * @return     void
	 */
	public function initNewsletterMailings($overrideExisting = true)
	{
		if (null !== $this->collNewsletterMailings && !$overrideExisting) {
			return;
		}
		$this->collNewsletterMailings = new PropelObjectCollection();
		$this->collNewsletterMailings->setModel('NewsletterMailing');
	}

	/**
	 * Gets an array of NewsletterMailing objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this Newsletter is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array NewsletterMailing[] List of NewsletterMailing objects
	 * @throws     PropelException
	 */
	public function getNewsletterMailings($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collNewsletterMailings || null !== $criteria) {
			if ($this->isNew() && null === $this->collNewsletterMailings) {
				// return empty collection
				$this->initNewsletterMailings();
			} else {
				$collNewsletterMailings = NewsletterMailingQuery::create(null, $criteria)
					->filterByNewsletter($this)
					->find($con);
				if (null !== $criteria) {
					return $collNewsletterMailings;
				}
				$this->collNewsletterMailings = $collNewsletterMailings;
			}
		}
		return $this->collNewsletterMailings;
	}

	/**
	 * Returns the number of related NewsletterMailing objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related NewsletterMailing objects.
	 * @throws     PropelException
	 */
	public function countNewsletterMailings(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collNewsletterMailings || null !== $criteria) {
			if ($this->isNew() && null === $this->collNewsletterMailings) {
				return 0;
			} else {
				$query = NewsletterMailingQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByNewsletter($this)
					->count($con);
			}
		} else {
			return count($this->collNewsletterMailings);
		}
	}

	/**
	 * Method called to associate a NewsletterMailing object to this object
	 * through the NewsletterMailing foreign key attribute.
	 *
	 * @param      NewsletterMailing $l NewsletterMailing
	 * @return     Newsletter The current object (for fluent API support)
	 */
	public function addNewsletterMailing(NewsletterMailing $l)
	{
		if ($this->collNewsletterMailings === null) {
			$this->initNewsletterMailings();
		}
		if (!$this->collNewsletterMailings->contains($l)) { // only add it if the **same** object is not already associated
			$this->collNewsletterMailings[]= $l;
			$l->setNewsletter($this);
		}

		return $this;
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Newsletter is new, it will return
	 * an empty collection; or if this Newsletter has previously
	 * been saved, it will retrieve related NewsletterMailings from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Newsletter.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array NewsletterMailing[] List of NewsletterMailing objects
	 */
	public function getNewsletterMailingsJoinSubscriberGroup($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = NewsletterMailingQuery::create(null, $criteria);
		$query->joinWith('SubscriberGroup', $join_behavior);

		return $this->getNewsletterMailings($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Newsletter is new, it will return
	 * an empty collection; or if this Newsletter has previously
	 * been saved, it will retrieve related NewsletterMailings from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Newsletter.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array NewsletterMailing[] List of NewsletterMailing objects
	 */
	public function getNewsletterMailingsJoinUserRelatedByCreatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = NewsletterMailingQuery::create(null, $criteria);
		$query->joinWith('UserRelatedByCreatedBy', $join_behavior);

		return $this->getNewsletterMailings($query, $con);
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this Newsletter is new, it will return
	 * an empty collection; or if this Newsletter has previously
	 * been saved, it will retrieve related NewsletterMailings from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in Newsletter.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array NewsletterMailing[] List of NewsletterMailing objects
	 */
	public function getNewsletterMailingsJoinUserRelatedByUpdatedBy($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = NewsletterMailingQuery::create(null, $criteria);
		$query->joinWith('UserRelatedByUpdatedBy', $join_behavior);

		return $this->getNewsletterMailings($query, $con);
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->subject = null;
		$this->newsletter_body = null;
		$this->language_id = null;
		$this->is_approved = null;
		$this->is_html = null;
		$this->template_name = null;
		$this->created_at = null;
		$this->updated_at = null;
		$this->created_by = null;
		$this->updated_by = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
		$this->applyDefaultValues();
		$this->resetModified();
		$this->setNew(true);
		$this->setDeleted(false);
	}

	/**
	 * Resets all references to other model objects or collections of model objects.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect
	 * objects with circular references (even in PHP 5.3). This is currently necessary
	 * when using Propel in certain daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all referrer objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collNewsletterMailings) {
				foreach ($this->collNewsletterMailings as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		if ($this->collNewsletterMailings instanceof PropelCollection) {
			$this->collNewsletterMailings->clearIterator();
		}
		$this->collNewsletterMailings = null;
		$this->aUserRelatedByCreatedBy = null;
		$this->aUserRelatedByUpdatedBy = null;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string) $this->exportTo(NewsletterPeer::DEFAULT_STRING_FORMAT);
	}

	// referencing behavior
	
	/**
	 * @return A list of References (not Objects) which this Newsletter references
	 */
	public function getReferenced()
	{
		return ReferencePeer::getReferencesFromObject($this);
	}
	// denyable behavior
	public function mayOperate($sOperation, $oUser = false) {
		if($oUser === false) {
			$oUser = Session::getSession()->getUser();
		}
		if($oUser && ($this->isNew() || $this->getCreatedBy() === $oUser->getId()) && NewsletterPeer::mayOperateOnOwn($oUser, $this, $sOperation)) {
			return true;
		}
		return NewsletterPeer::mayOperateOn($oUser, $this, $sOperation);
	}
	public function mayBeInserted($oUser = false) {
		return $this->mayOperate($oUser, "insert");
	}
	public function mayBeUpdated($oUser = false) {
		return $this->mayOperate($oUser, "update");
	}
	public function mayBeDeleted($oUser = false) {
		return $this->mayOperate($oUser, "delete");
	}

	// extended_timestampable behavior
	
	/**
	 * Mark the current object so that the update date doesn't get updated during next save
	 *
	 * @return     Newsletter The current object (for fluent API support)
	 */
	public function keepUpdateDateUnchanged()
	{
		$this->modifiedColumns[] = NewsletterPeer::UPDATED_AT;
		return $this;
	}
	
	/**
	 * @return created_at as int (timestamp)
	 */
	public function getCreatedAtTimestamp()
	{
		return (int)$this->getCreatedAt('U');
	}
	
	/**
	 * @return created_at formatted to the current locale
	 */
	public function getCreatedAtFormatted($sLanguageId = null, $sFormatString = 'x')
	{
		if($this->created_at === null) {
			return null;
		}
		return LocaleUtil::localizeDate($this->created_at, $sLanguageId, $sFormatString);
	}
	
	/**
	 * @return updated_at as int (timestamp)
	 */
	public function getUpdatedAtTimestamp()
	{
		return (int)$this->getUpdatedAt('U');
	}
	
	/**
	 * @return updated_at formatted to the current locale
	 */
	public function getUpdatedAtFormatted($sLanguageId = null, $sFormatString = 'x')
	{
		if($this->updated_at === null) {
			return null;
		}
		return LocaleUtil::localizeDate($this->updated_at, $sLanguageId, $sFormatString);
	}

	// attributable behavior
	
	/**
	 * Mark the current object so that the updated user doesn't get updated during next save
	 *
	 * @return     Newsletter The current object (for fluent API support)
	 */
	public function keepUpdateUserUnchanged()
	{
		$this->modifiedColumns[] = NewsletterPeer::UPDATED_BY;
		return $this;
	}

} // BaseNewsletter
