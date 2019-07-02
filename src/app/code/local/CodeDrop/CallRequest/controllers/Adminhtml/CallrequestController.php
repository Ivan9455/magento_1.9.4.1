<?php

class CodeDrop_CallRequest_Adminhtml_CallRequestController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->_addContent($this->getLayout()->createBlock('codedrop_callrequest/adminhtml_callrequest'));
        $this->renderLayout();
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function editAction()
    {
        $id = $this->getRequest()->getParam('id');
        Mage::register('codedrop_callrequest_phone', Mage::getModel('codedrop_callrequest/phone')->load($id));
        $this->loadLayout();
        $this->_addContent($this->getLayout()->createBlock('codedrop_callrequest/adminhtml_callrequest_edit'));
        $this->renderLayout();
    }
}
