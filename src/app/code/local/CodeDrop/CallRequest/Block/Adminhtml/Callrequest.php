<?php

class CodeDrop_CallRequest_Block_Adminhtml_Callrequest extends Mage_Adminhtml_Block_Widget_Grid_Container
{

    public function __construct()
    {
        $this->_controller = 'adminhtml_callrequest';
        $this->_blockGroup = 'codedrop_callrequest';
        $this->_headerText = Mage::helper('codedrop_callrequest')->__('Callrequest');
        $this->_addButtonLabel = Mage::helper('codedrop_callrequest')->__('Add New Block');
        parent::__construct();
    }

}
