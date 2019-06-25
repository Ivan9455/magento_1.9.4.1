<?php

/**
 * @var $install Mage_Core_Model_Resource_Setup
 */

$install = $this;
$install->startSetup();
$install->getConnection()
    ->addColumn($install->getTable('codedrop_callrequest/phone'), 'call_date', [
        'type' => Varien_Db_Ddl_Table::TYPE_DATETIME,
        'nullable' => false,
        'comment' => 'call date'
    ]);
$install->endSetup();