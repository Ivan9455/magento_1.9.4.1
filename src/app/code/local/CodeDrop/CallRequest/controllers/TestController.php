<?php

class CodeDrop_CallRequest_TestController extends Mage_Core_Controller_Front_Action
{
    public function renamedAction()
    {
        $enabled = Mage::getStoreConfig('codedrop_callrequest/settings/enabled');
        $enabled2 = Mage::getStoreConfig('codedrop_callrequest/settings');
        var_dump([
            'enabled' => $enabled,
            'enabled2' => $enabled2
        ]);
        die;
    }
}
