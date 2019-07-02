<?php

class CodeDrop_CallRequest_Block_Adminhtml_Callrequest_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

    /**
     * Init form
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('phone_form');
        $this->setTitle(Mage::helper('codedrop_callrequest')->__('Phone Information'));
    }

    protected function _prepareForm()
    {
        $model = Mage::registry('codedrop_callrequest_phone');

        $form = new Varien_Data_Form(
            array('id' => 'edit_form', 'action' => $this->getData('action'), 'method' => 'post')
        );

        $form->setHtmlIdPrefix('phone_');

        $fieldset = $form->addFieldset('base_fieldset',
            array('legend' => Mage::helper('cms')->__('General Information'), 'class' => 'fieldset-wide'));

        if ($model->getBlockId()) {
            $fieldset->addField('id', 'hidden', array(
                'name' => 'id',
            ));
        }

        //        $fieldset->addField('title', 'text', array(
        //            'name' => 'title',
        //            'label' => Mage::helper('codedrop_callrequest')->__('Block Title'),
        //            'title' => Mage::helper('codedrop_callrequest')->__('Block Title'),
        //            'required' => true,
        //        ));
        //
        //        $fieldset->addField('identifier', 'text', array(
        //            'name' => 'identifier',
        //            'label' => Mage::helper('codedrop_callrequest')->__('Identifier'),
        //            'title' => Mage::helper('codedrop_callrequest')->__('Identifier'),
        //            'required' => true,
        //            'class' => 'validate-xml-identifier',
        //        ));

        /**
         * Check is single store mode
         */
        if (!Mage::app()->isSingleStoreMode()) {
            $field = $fieldset->addField('store_id', 'multiselect', array(
                'name' => 'stores[]',
                'label' => Mage::helper('cms')->__('Store View'),
                'title' => Mage::helper('cms')->__('Store View'),
                'required' => true,
                'values' => Mage::getSingleton('adminhtml/system_store')->getStoreValuesForForm(false, true),
            ));
            $renderer = $this->getLayout()->createBlock('adminhtml/store_switcher_form_renderer_fieldset_element');
            $field->setRenderer($renderer);
        } else {
            $fieldset->addField('store_id', 'hidden', array(
                'name' => 'stores[]',
                'value' => Mage::app()->getStore(true)->getId()
            ));
            $model->setStoreId(Mage::app()->getStore(true)->getId());
        }

        $fieldset->addField('name', 'text', array(
            'name' => 'name',
            'label' => Mage::helper('codedrop_callrequest')->__('Name'),
            'title' => Mage::helper('codedrop_callrequest')->__('Name'),
            'required' => true,
        ));

        $fieldset->addField('status', 'select', array(
            'name' => 'status',
            'label' => Mage::helper('codedrop_callrequest')->__('Status'),
            'title' => Mage::helper('codedrop_callrequest')->__('Status'),
            'required' => true,
            'options' => Mage::getModel('codedrop_callrequest/source_status')->toArray()
        ));

        $fieldset->addField('phone_number', 'text', array(
            'name' => 'phone_number',
            'label' => Mage::helper('codedrop_callrequest')->__('Phone number'),
            'title' => Mage::helper('codedrop_callrequest')->__('Phone number'),
            'required' => true,
        ));

        $fieldset->addField('description', 'text', array(
            'name' => 'description',
            'label' => Mage::helper('codedrop_callrequest')->__('Description'),
            'title' => Mage::helper('codedrop_callrequest')->__('Description'),
            'required' => true,
        ));

        $fieldset->addField('call_date', 'text', array(
            'name' => 'call_date',
            'label' => Mage::helper('codedrop_callrequest')->__('Call date'),
            'title' => Mage::helper('codedrop_callrequest')->__('Call date'),
            'required' => true,
        ));

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }

}
