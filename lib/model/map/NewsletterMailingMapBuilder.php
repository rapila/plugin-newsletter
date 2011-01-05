<?php

require_once 'propel/map/MapBuilder.php';
include_once 'creole/CreoleTypes.php';


/**
 * This class adds structure of 'newsletter_mailings' table to 'mini_cms' DatabaseMap object.
 *
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    model.map
 */
class NewsletterMailingMapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'model.map.NewsletterMailingMapBuilder';

	/**
	 * The database map.
	 */
	private $dbMap;

	/**
	 * Tells us if this DatabaseMapBuilder is built so that we
	 * don't have to re-build it every time.
	 *
	 * @return     boolean true if this DatabaseMapBuilder is built, false otherwise.
	 */
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	/**
	 * Gets the databasemap this map builder built.
	 *
	 * @return     the databasemap
	 */
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	/**
	 * The doBuild() method builds the DatabaseMap
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap('mini_cms');

		$tMap = $this->dbMap->addTable('newsletter_mailings');
		$tMap->setPhpName('NewsletterMailing');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('DATE_SENT', 'DateSent', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addForeignKey('SUBSCRIBER_GROUP_ID', 'SubscriberGroupId', 'int', CreoleTypes::INTEGER, 'subscriber_groups', 'ID', false, null);

		$tMap->addColumn('EXTERNAL_MAIL_GROUP_ID', 'ExternalMailGroupId', 'string', CreoleTypes::VARCHAR, false, null);

		$tMap->addForeignKey('NEWSLETTER_ID', 'NewsletterId', 'int', CreoleTypes::INTEGER, 'newsletters', 'ID', true, null);

		$tMap->addColumn('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, true, null);

	} // doBuild()

} // NewsletterMailingMapBuilder
