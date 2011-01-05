<?php

require_once 'propel/map/MapBuilder.php';
include_once 'creole/CreoleTypes.php';


/**
 * This class adds structure of 'subscriber_group_memberships' table to 'mini_cms' DatabaseMap object.
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
class SubscriberGroupMembershipMapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'model.map.SubscriberGroupMembershipMapBuilder';

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

		$tMap = $this->dbMap->addTable('subscriber_group_memberships');
		$tMap->setPhpName('SubscriberGroupMembership');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('SUBSCRIBER_ID', 'SubscriberId', 'int' , CreoleTypes::INTEGER, 'subscribers', 'ID', true, null);

		$tMap->addForeignPrimaryKey('SUBSCRIBER_GROUP_ID', 'SubscriberGroupId', 'int' , CreoleTypes::INTEGER, 'subscriber_groups', 'ID', true, null);

	} // doBuild()

} // SubscriberGroupMembershipMapBuilder
