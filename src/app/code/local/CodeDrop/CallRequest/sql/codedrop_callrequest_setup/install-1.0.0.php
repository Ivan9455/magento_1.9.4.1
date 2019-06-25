<?php

/**
 * @var $install Mage_Core_Model_Resource_Setup
 */

$install = $this;
$install->startSetup();

$table = $install->getConnection()
    ->newTable($install->getTable('codedrop_callrequest/phone'))
    ->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, [
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
    ])->addColumn('name', Varien_Db_Ddl_Table::TYPE_VARCHAR, 255, [
        'nullable' => false
    ])->addColumn('phone_number', Varien_Db_Ddl_Table::TYPE_INTEGER, null, [
        'nullable' => false
    ])->addColumn('description', Varien_Db_Ddl_Table::TYPE_TEXT, null, [
        'nullable' => false
    ])->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, [
        'nullable' => false
    ])->addColumn('status', Varien_Db_Ddl_Table::TYPE_INTEGER, null, [
        'nullable' => false
    ]);

$install->getConnection()->createTable($table);

$install->endSetup();
