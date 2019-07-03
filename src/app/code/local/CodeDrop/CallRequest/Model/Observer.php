<?php

class CodeDrop_CallRequest_Model_Observe{
    /**
     * @param Varien_Event_Observer $observer
     */
    public function click_button_after(Varien_Event_Observer $observer){
        var_dump($observer->getEvent()->getData('quote_item')->getData());die;
    }
}
