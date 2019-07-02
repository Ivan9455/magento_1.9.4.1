<?php

class CodeDrop_CallRequest_Model_Source_Status
{
    public const ENABLED = '1';
    public const DISABLED = '2';

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => self::ENABLED, 'label' => Mage::helper('codedrop_callrequest')->__('Enabled')],
            ['value' => self::DISABLED, 'label' => Mage::helper('codedrop_callrequest')->__('Disabled')],
        ];
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return [
            self::DISABLED => Mage::helper('codedrop_callrequest')->__('Disabled'),
            self::ENABLED => Mage::helper('codedrop_callrequest')->__('Enabled'),
        ];
    }

}
