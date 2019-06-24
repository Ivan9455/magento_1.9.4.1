<?php

class CodeDrop_CallRequest_Model_Resource_Block extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {
        $this->_init('callrequest/block', 'block_id');
    }
}
