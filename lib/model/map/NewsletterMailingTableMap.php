<?php



/**
 * This class defines the structure of the 'newsletter_mailings' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.model.map
 */
class NewsletterMailingTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'model.map.NewsletterMailingTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('newsletter_mailings');
		$this->setPhpName('NewsletterMailing');
		$this->setClassname('NewsletterMailing');
		$this->setPackage('model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('DATE_SENT', 'DateSent', 'TIMESTAMP', true, null, null);
		$this->addForeignKey('SUBSCRIBER_GROUP_ID', 'SubscriberGroupId', 'INTEGER', 'subscriber_groups', 'ID', false, null, null);
		$this->addColumn('EXTERNAL_MAIL_GROUP_ID', 'ExternalMailGroupId', 'VARCHAR', false, 255, null);
		$this->addForeignKey('NEWSLETTER_ID', 'NewsletterId', 'INTEGER', 'newsletters', 'ID', true, null, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null, null);
		$this->addForeignKey('CREATED_BY', 'CreatedBy', 'INTEGER', 'users', 'ID', false, null, null);
		$this->addForeignKey('UPDATED_BY', 'UpdatedBy', 'INTEGER', 'users', 'ID', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('SubscriberGroup', 'SubscriberGroup', RelationMap::MANY_TO_ONE, array('subscriber_group_id' => 'id', ), null, null);
    $this->addRelation('Newsletter', 'Newsletter', RelationMap::MANY_TO_ONE, array('newsletter_id' => 'id', ), 'CASCADE', null);
    $this->addRelation('UserRelatedByCreatedBy', 'User', RelationMap::MANY_TO_ONE, array('created_by' => 'id', ), 'SET NULL', null);
    $this->addRelation('UserRelatedByUpdatedBy', 'User', RelationMap::MANY_TO_ONE, array('updated_by' => 'id', ), 'SET NULL', null);
	} // buildRelations()

	/**
	 * 
	 * Gets the list of behaviors registered for this table
	 * 
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'extended_timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', ),
			'attributable' => array('create_column' => 'created_by', 'update_column' => 'updated_by', ),
		);
	} // getBehaviors()

} // NewsletterMailingTableMap
