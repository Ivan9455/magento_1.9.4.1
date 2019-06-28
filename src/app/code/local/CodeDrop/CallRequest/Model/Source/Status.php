<?php

class CodeDrop_CallRequest_Model_Source_Status
{
    public const ENABLED = '1';
    public const DISABLED = '0';

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            array('value' => self::ENABLED, 'label' => Mage::helper('callreuqst')->__('Enabled')),
            array('value' => self::DISABLED, 'label' => Mage::helper('callreuqst')->__('Disabled')),
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
            self::DISABLED => Mage::helper('callreuqst')->__('Disabled'),
            self::ENABLED => Mage::helper('callreuqst')->__('Enabled'),
        ];
    }

}
