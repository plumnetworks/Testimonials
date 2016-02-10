<?php

class Creovector_Testimonials_Block_Adminhtml_Wbxtest_Grid extends Mage_Adminhtml_Block_Widget_Grid {

    public function __construct() {
        parent::__construct();
        $this->setId("wbxtest");
        $this->setDefaultSort("id");
        $this->setDefaultDir("ASC");
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection() {
        $collection = Mage::getModel("wbxtest/wbxtest")->getCollection();
/*
$collection->getSelect()->join(
    'customer_entity',
// note this join clause!
    'main_table.owner = customer_entity.entity_id',
    array('email')
);*/
        
          $collection->getSelect()->joinLeft(
            array('cust' => $collection->getTable('customer/entity')),
            'cust.entity_id = main_table.owner');
        
        $this->setCollection($collection->setOrder("`index`", "ASC"));
        return parent::_prepareCollection();
    }

    protected function _prepareColumns() {
        $this->addColumn("id", array(
            "header" => Mage::helper("wbxtest")->__("ID"),
            "align" => "right",
            "width" => "50px",
            "type" => "number",
            "index" => "id",
        ));

        $this->addColumn("name", array(
            "header" => Mage::helper("wbxtest")->__("Title"),
            "index" => "name",
        ));
        $this->addColumn("index", array(
            "header" => Mage::helper("wbxtest")->__("Index"),
            "index" => "index",
        ));

        $this->addColumn("email", array(
            "header" => Mage::helper("wbxtest")->__("Customer"),
            "index" => "email",
        ));

        $this->addColumn("date", array(
            "header" => Mage::helper("wbxtest")->__("Date"),
            "index" => "date",
        ));

        $this->addColumn('action', array(
            'header' => Mage::helper('catalog')->__('Action'),
            'width' => '50px',
            'type' => 'action',
            'getter' => 'getId',
            'actions' => array(
                array(
                    'caption' => Mage::helper('catalog')->__('Remove'),
                    'url' => array(
                        'base' => '*/*/delete',
                        'params' => array('id' => $this->getRequest()->getParam('store'))
                    ),
                    'field' => 'id'
                )
            ),
            'filter' => false,
            'sortable' => false,
            'index' => 'id',
        ));

        return parent::_prepareColumns();
    }

    public function getRowUrl($row) {
        return $this->getUrl("*/*/edit", array("id" => $row->getId()));
    }

}
