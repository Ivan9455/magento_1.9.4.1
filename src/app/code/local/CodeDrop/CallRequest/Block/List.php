<?php

class CodeDrop_CallRequest_Block_List extends Mage_Core_Block_Template
{

    public function getBlocks()
    {

        return Mage::getModel('codedrop_callrequest/phone')->getCollection();
    }
}
