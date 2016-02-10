<?php

class Creovector_Testimonials_Block_Adminhtml_Wbxtest extends Mage_Adminhtml_Block_Widget_Grid_Container {

    public function __construct() {

        $this->_controller = "adminhtml_wbxtest";
        $this->_blockGroup = "wbxtest";
        $this->_headerText = "Testimonials";
        parent::__construct();
        $this->_removeButton('add');
    }

}
