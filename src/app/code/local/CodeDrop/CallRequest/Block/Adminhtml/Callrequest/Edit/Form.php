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

        $form = new Varien_Data_Form([
            'id' => 'edit_form',
            'action' => $this->getUrl('*/*/save', ['id' => $this->getRequest()->getParam('id')]),
            'method' => 'post'
        ]);

        $form->setHtmlIdPrefix('phone_');

        $fieldset = $form->addFieldset('base_fieldset',
            array(
                'legend' => Mage::helper('codedrop_callrequest')->__('General Information'),
                'class' => 'fieldset-wide'
            ));

        if ($model->getBlockId()) {
            $fieldset->addField('id', 'hidden', array(
                'name' => 'id',
            ));
        }

        $fieldset->addField('name', 'text', array(
            'name' => 'name',
            'label' => Mage::helper('codedrop_callrequest')->__('Name'),
            'title' => Mage::helper('codedrop_callrequest')->__('Name'),
            'required' => true,
            'disabled' => true,
            'readonly' => true,
        ));

        $fieldset->addField('status', 'select', array(
            'name' => 'status',
            'label' => Mage::helper('codedrop_callrequest')->__('Status'),
            'title' => Mage::helper('codedrop_callrequest')->__('Status'),
            'required' => true,
            'options' => Mage::getModel('codedrop_callrequest/source_status')->toArray()
        ));

        $fieldset->addField('phone_number', 'textarea', array(
            'name' => 'phone_number',
            'label' => Mage::helper('codedrop_callrequest')->__('Phone number'),
            'title' => Mage::helper('codedrop_callrequest')->__('Phone number'),
            'required' => true,
            'disabled' => true,
            'readonly' => true,
        ));

        $fieldset->addField('description', 'text', array(
            'name' => 'description',
            'label' => Mage::helper('codedrop_callrequest')->__('Description'),
            'title' => Mage::helper('codedrop_callrequest')->__('Description'),
            'required' => true,
            'disabled' => true,
            'readonly' => true,
        ));

        $fieldset->addField('call_date', 'text', array(
            'name' => 'call_date',
            'label' => Mage::helper('codedrop_callrequest')->__('Call date'),
            'title' => Mage::helper('codedrop_callrequest')->__('Call date'),
            'required' => true,
            'disabled' => true,
            'readonly' => true,
        ));

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }

}
