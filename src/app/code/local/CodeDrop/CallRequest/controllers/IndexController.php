<?php

class CodeDrop_CallRequest_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function saveAction()
    {
        if (Mage::app()->getRequest()->isAjax()) {
            $model = Mage::getModel('codedrop_callrequest/phone');

            $model
                ->setData($this->getRequest()->getParams())
                ->setCreatedAt(Mage::app()->getLocale()->date())
                ->save();
        }
        //$this->_redirectError('/');
    }
}
