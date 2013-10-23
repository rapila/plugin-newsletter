<?php



/**
 * This class defines the structure of the 'newsletters' table.
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
class NewsletterTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'model.map.NewsletterTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('newsletters');
        $this->setPhpName('Newsletter');
        $this->setClassname('Newsletter');
        $this->setPackage('model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('SUBJECT', 'Subject', 'VARCHAR', true, 255, null);
        $this->addColumn('NEWSLETTER_BODY', 'NewsletterBody', 'BLOB', false, null, null);
        $this->addColumn('LANGUAGE_ID', 'LanguageId', 'VARCHAR', true, 3, null);
        $this->addColumn('IS_APPROVED', 'IsApproved', 'BOOLEAN', true, 1, false);
        $this->addColumn('IS_HTML', 'IsHtml', 'BOOLEAN', true, 1, true);
        $this->addColumn('TEMPLATE_NAME', 'TemplateName', 'VARCHAR', false, 60, null);
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
        $this->addRelation('UserRelatedByCreatedBy', 'User', RelationMap::MANY_TO_ONE, array('created_by' => 'id', ), 'SET NULL', null);
        $this->addRelation('UserRelatedByUpdatedBy', 'User', RelationMap::MANY_TO_ONE, array('updated_by' => 'id', ), 'SET NULL', null);
        $this->addRelation('NewsletterMailing', 'NewsletterMailing', RelationMap::ONE_TO_MANY, array('id' => 'newsletter_id', ), 'CASCADE', null, 'NewsletterMailings');
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
            'referencing' => array(),
            'denyable' => array('mode' => 'by_role', 'role_key' => '', 'owner_allowed' => '', ),
            'extended_timestampable' => array('create_column' => 'created_at', 'update_column' => 'updated_at', 'disable_updated_at' => 'false', ),
            'attributable' => array('create_column' => 'created_by', 'update_column' => 'updated_by', ),
            'extended_keyable' => array('key_separator' => '_', ),
        );
    } // getBehaviors()

} // NewsletterTableMap
