<?php

class CodeDrop_CallRequest_Adminhtml_CallRequestController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        //die('123');
        $this->loadLayout();
        //var_dump($this->getLayout()->createBlock('codedrop_callrequest/adminhtml_callrequest'));die();
        $this->_addContent($this->getLayout()->createBlock('codedrop_callrequest/adminhtml_callrequest'));
        $this->renderLayout();
    }
}
