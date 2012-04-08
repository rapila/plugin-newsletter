<?php

/**
 * Data object containing the SQL and PHP code to migrate the database
 * up to version 1333629265.
 * Generated on 2012-04-05 14:34:25 by jmg
 */
class PropelMigration_1333629265
{

	public function preUp($manager)
	{
		// add the pre-migration code here
	}

	public function postUp($manager)
	{
		// add the post-migration code here
	}

	public function preDown($manager)
	{
		// add the pre-migration code here
	}

	public function postDown($manager)
	{
		// add the post-migration code here
	}

	/**
	 * Get the SQL statements for the Up migration
	 *
	 * @return array list of the SQL strings to execute for the Up migration
	 *               the keys being the datasources
	 */
	public function getUpSQL()
	{
		return array (
  'rapila' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

ALTER TABLE `subscriber_group_memberships` CHANGE `opt_in_hash` `opt_in_hash` VARCHAR(32);

ALTER TABLE `subscriber_group_memberships` ADD `is_backend_created` TINYINT UNSIGNED NOT NULL DEFAULT '0' AFTER `opt_in_hash` COMMENT \'is imported or manually added\';

ALTER TABLE `subscribers` CHANGE `preferred_language_id` `preferred_language_id` VARCHAR( 3 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
	}

	/**
	 * Get the SQL statements for the Down migration
	 *
	 * @return array list of the SQL strings to execute for the Down migration
	 *               the keys being the datasources
	 */
	public function getDownSQL()
	{
		return array (
  'rapila' => '
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

ALTER TABLE `subscriber_group_memberships` CHANGE `opt_in_hash` `opt_in_hash` CHAR(32);

ALTER TABLE `subscriber_group_memberships` DROP `is_backend_created`;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
',
);
	}

}