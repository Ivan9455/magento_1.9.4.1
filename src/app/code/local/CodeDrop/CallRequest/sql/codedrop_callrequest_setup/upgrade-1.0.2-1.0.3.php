<?php

/**
 * @var $install Mage_Core_Model_Resource_Setup
 */

$install = $this;
$install->startSetup();
$install->run('ALTER TABLE ' . $install->getTable('codedrop_callrequest/phone') .
    sprintf(' ALTER status SET DEFAULT %s;', CodeDrop_CallRequest_Model_Source_Status::DISABLED));
$install->endSetup();
