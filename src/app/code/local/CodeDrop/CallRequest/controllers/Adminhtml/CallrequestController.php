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
        $blockObject = (array)Mage::getSingleton('adminhtml/session')->getBlockObject(true);
        if (count($blockObject)) {
            Mage::registry('codedrop_callrequest_phone')->setData($blockObject);
        }
        $this->loadLayout();
        $this->_addContent($this->getLayout()->createBlock('codedrop_callrequest/adminhtml_callrequest_edit'));
        $this->renderLayout();
    }

    public function saveAction()
    {
        try {
            $id = $this->getRequest()->getParam('id');
            $block = Mage::getModel('codedrop_callrequest/phone')->load($id);
            $block->setStatus($this->getRequest()->getParam('status'))->save();
            if (!$block->getId()) {
                Mage::getSingleton('adminhtml/session')->addError('Cannot save the phone');
            }
        } catch (Exception $e) {
            Mage::logException($e);
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            Mage::getSingleton('adminhtml/session')->setBlockObject($block->getData());
        }

        Mage::getSingleton('adminhtml/session')->addSuccess('Phone was saved successfully!');

        $this->_redirect('*/*/' . $this->getRequest()->getParam('back', 'index'));
    }

}
