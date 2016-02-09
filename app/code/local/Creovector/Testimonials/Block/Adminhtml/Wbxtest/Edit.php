<?php

class Creovector_Testimonials_Block_Adminhtml_Wbxtest_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {

    public function __construct() {

        parent::__construct();
        $this->_objectId = "category_id";
        $this->_blockGroup = "wbxtest";
        $this->_controller = "adminhtml_wbxtest";

        $this->_updateButton("save", "label", Mage::helper("slider")->__("Save Item"));

        $this->_addButton("saveandcontinue", array(
            "label" => Mage::helper("slider")->__("Save And Continue Edit"),
            "onclick" => "saveAndContinueEdit()",
            "class" => "save",
                ), -100);

        $this->_formScripts[] = "function saveAndContinueEdit(){ editForm.submit($('edit_form').action+'back/edit/'); } ";
    }

    function getHeaderText() {
        return "Testimiials item";
    }

}
