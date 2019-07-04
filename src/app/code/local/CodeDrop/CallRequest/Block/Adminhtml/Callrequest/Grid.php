<?php

class CodeDrop_CallRequest_Block_Adminhtml_Callrequest_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    public function __construct()
    {
        parent::__construct();
        $this->setId('codedrop_callrequest_Phone_Grid');
        $this->setDefaultSort('block_identifier');
        $this->setDefaultDir('ASC');
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('codedrop_callrequest/phone')->getCollection();
        /* @var $collection Mage_Cms_Model_Mysql4_Block_Collection */
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('name', [
            'header' => Mage::helper('codedrop_callrequest')->__('Name'),
            'align' => 'left',
            'index' => 'name',
        ]);

        $this->addColumn('status', [
            'header' => Mage::helper('codedrop_callrequest')->__('Status'),
            'align' => 'left',
            'index' => 'status',
            'type' => 'options',
            'options' => Mage::getModel('codedrop_callrequest/source_status')->toArray()
        ]);

        $this->addColumn('created_at', [
            'header' => Mage::helper('codedrop_callrequest')->__('Created at'),
            'index' => 'created_at',
            'type' => 'date',
            'format' => 'yyyy-MM-dd'
        ]);

        return parent::_prepareColumns();
    }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('id');
        $this->getMassactionBlock()->setIdFieldName('id');
        $this->getMassactionBlock()
            ->addItem('delete', [
                'label' => Mage::helper('codedrop_callrequest')->__('Delete'),
                'url' => $this->getUrl('*/*/massDelete'),
                'confirm' => Mage::helper('codedrop_callrequest')->__('Are you sure?')
            ])
            ->addItem('status', [
                'label' => Mage::helper('codedrop_callrequest')->__('Update status'),
                'url' => $this->getUrl('*/*/massStatus'),
                'confirm' => Mage::helper('codedrop_callrequest')->__('Are you sure?'),
                'additional' => [
                    'block_status' => [
                        'name' => 'block_status',
                        'type' => 'select',
                        'class' => 'required-entry',
                        'label' => Mage::helper('codedrop_callrequest')->__('Status'),
                        'options' => Mage::getModel('codedrop_callrequest/source_status')->toArray()
                    ]
                ]
            ]);

        return $this;
    }

    /**
     * Row click url
     *
     * @param $row Mage_Catalog_Model_Product|Varien_Object
     *
     * @return string
     */
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', ['id' => $row->getId()]);
    }

}
