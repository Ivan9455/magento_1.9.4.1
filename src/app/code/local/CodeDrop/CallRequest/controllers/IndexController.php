<?php

class CodeDrop_CallRequest_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function click_buttonAction()
    {
        var_dump('12223');
        die;
    }
}
