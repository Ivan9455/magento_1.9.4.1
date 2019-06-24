<?php
/**
 * @var Mage_Core_Model_Resource_Setup $installer
 */
$installer = $this;
$installer->startSetup();
$table = $installer->getConnection()
    ->newTable($installer->getTable('callrequest'))
    ->addColumn('block_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, [
        'identity' => true,
        'unsigned' => true,
        'nullable' => false,
        'primary' => true
    ])->addColumn('user_name', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, [
        'nullable' => false,
    ])->addColumn('phone_number', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, [
        'nullable' => false,
    ])->addColumn('message', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, [
        'nullable' => true,
    ])->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, [
        'nullable' => false
    ]);
$installer->getConnection()->createTable($table);
$installer->endSetup();
