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
            $block
                ->setData($this->getRequest()->getParams())
                ->setCreatedAt(Mage::app()->getLocale()->date())
                ->save();
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

    public function deleteAction()
    {
        $block = Mage::getModel('codedrop_callrequest/phone')
            ->setId($this->getRequest()->getParam('id'))
            ->delete();
        if ($block->getId()) {
            Mage::getSingleton('adminhtml/session')->addSuccess('Phone was deleted successfully!');
        } else {
            Mage::getSingleton('adminhtml/session')->addError('Phone was deleted error!');
        }

        $this->_redirect('*/*/');
    }

    public function massStatusAction()
    {
        $statuses = $this->getRequest()->getParams();
        try {
            $phones = Mage::getModel('codedrop_callrequest/phone')
                ->getCollection()
                ->addFieldToFilter('id', ['in' => $statuses['massaction']]);
            foreach ($phones as $phone) {
                $phone->setStatus($statuses['block_status'])->save();
            }
        } catch (Exception $e) {
            Mage::logException($e);
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());

            return $this->_redirect('*/*/');
        }
        Mage::getSingleton('adminhtml/session')->addSuccess('Phone were updated!');

        return $this->_redirect('*/*/');
    }

    public function massDeleteAction()
    {
        $blocks = $this->getRequest()->getParams();
        try {
            $phones = Mage::getModel('codedrop_callrequest/phone')
                ->getCollection()
                ->addFieldToFilter('id', ['in' => $blocks['massaction']]);
            foreach ($phones as $phone) {
                $phone->delete();
            }
        } catch (Exception $e) {
            Mage::logException($e);
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());

            return $this->_redirect('*/*/');
        }
        Mage::getSingleton('adminhtml/session')->addSuccess('Phone were deleted!');

        return $this->_redirect('*/*/');
    }
}
