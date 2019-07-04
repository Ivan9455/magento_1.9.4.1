<?php

class CodeDrop_CallRequest_Model_Resource_Phone extends Mage_Core_Model_Resource_Db_Abstract
{
    public function _construct()
    {
        $this->_init('codedrop_callrequest/phone', 'id');
    }
}
