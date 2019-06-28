<?php

class CodeDrop_CallRequest_Block_List extends Mage_Core_Block_Template
{

    public function getBlocks()
    {

        return Mage::getModel('codedrop_callrequest/phone')->getCollection();
//        return Mage::getModel('callrequest/phone')->getCollection()->addFieldToFilter('id',
//            ['eq' => CodeDrop_CallRequest_Model_Source_Status::ENABLED]);
    }
}
