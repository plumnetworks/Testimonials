<?php

class Creovector_Testimonials_Block_Adminhtml_Wbxtest_Edit_Form extends Mage_Adminhtml_Block_Widget_Form {

    protected function _prepareForm() {
        $form = new Varien_Data_Form(array(
            "id" => "edit_form",
            "action" => $this->getUrl("*/*/save", array("id" => $this->getRequest()->getParam("id"))),
            "method" => "post",
            "enctype" => "multipart/form-data",
                )
        );
        $this->setForm($form);
        $form->setUseContainer(true);
        $fieldset = $form->addFieldset("wbxtest_form", array("legend" => Mage::helper("wbxtest")->__("Parameters")));

        $fieldset->addField("name", "text", array(
            "label" => Mage::helper("wbxtest")->__("Name"),
            "class" => "required-entry",
            "required" => true,
            "name" => "name",
        ));

        $fieldset->addField('date', 'date', array(
            'name' => 'date',
            'label' => Mage::helper('wbxtest')->__('Date'),
            'tabindex' => 1,
            "required" => true,
            'image' => $this->getSkinUrl('images/grid-cal.gif'),
            'format' => Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT),
            'value' => date(Mage::app()->getLocale()->getDateStrFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT), strtotime('today'))
        ));

        $fieldset->addField("index", "hidden", array(
            "name" => "index",
        ));


        $fieldset->addField("value", "text", array(
            "label" => Mage::helper("wbxtest")->__("Rating"),
            "class" => "required-entry",
            "required" => true,
            "name" => "value",
        ));

        $fieldset->addField("description", "editor", array(
            "label" => Mage::helper("wbxtest")->__("Description"),
            "title" => Mage::helper("wbxtest")->__("Description"),
            'style' => 'height:36em;',
            'config' => Mage::getSingleton('cms/wysiwyg_config')->getConfig(),
            "name" => "description",
        ));


        if (Mage::registry("wbxtest_data")) {

            $data = Mage::registry("wbxtest_data")->getData();
            $form->setValues($data);
        }
        return parent::_prepareForm();
    }

    protected function _prepareLayout() {
        $return = parent::_prepareLayout();
        if (Mage::getSingleton('cms/wysiwyg_config')->isEnabled()) {
            $this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
        }
        return $return;
    }

}

?>