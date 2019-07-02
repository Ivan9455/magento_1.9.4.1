<?php

class CodeDrop_CallRequest_Block_Adminhtml_Callrequest_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        $this->_objectId = 'id';
        $this->_controller = 'adminhtml_callrequest';
        $this->_blockGroup = 'codedrop_callrequest';
        parent::__construct();

        $this->_updateButton('save', 'label', Mage::helper('codedrop_callrequest')->__('Save Block'));
        $this->_updateButton('delete', 'label', Mage::helper('codedrop_callrequest')->__('Delete Block'));

        $this->_addButton('saveandcontinue', array(
            'label' => Mage::helper('adminhtml')->__('Save and Continue Edit'),
            'onclick' => 'saveAndContinueEdit()',
            'class' => 'save',
        ), -100);

        $this->_formScripts[] = "
            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    /**
     * Get edit form container header text
     *
     * @return string
     */
    public function getHeaderText()
    {
        if (Mage::registry('codedrop_callrequest_phone')->getId()) {
            return Mage::helper('codedrop_callrequest')->__("Edit Block '%s'",
                $this->escapeHtml(Mage::registry('codedrop_callrequest_phone')->getTitle()));
        } else {
            return Mage::helper('codedrop_callrequest')->__('New Block');
        }
    }

}
