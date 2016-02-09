<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Creovector_Testimonials_Adminhtml_TestinomialsController extends Mage_Adminhtml_Controller_Action {

    public function indexAction() {
        $this->loadLayout();
        $this->_setActiveMenu('wbxtest');
        $this->_addContent($this->getLayout()->createBlock('wbxtest/adminhtml_wbxtest'));
        $this->renderLayout();
    }

    public function newAction() {
        $this->loadLayout();
        $this->_setActiveMenu('wbxcareer');
        $data = Mage::getModel("wbxcareer/stories");
        Mage::register("wbxcareer_data", $data);

        $this->_addContent($this->getLayout()->createBlock('wbxcareer/adminhtml_stories_edit'));
        $this->renderLayout();
    }

    public function saveAction() {
        $model = Mage::getModel('wbxtest/wbxtest')->load($this->getRequest()->getParam('id'));

        foreach (array('name', 'index', 'description', 'value', 'date') as $field)
            $model->setData($field, $this->getRequest()->getPost($field));
        $model->save();
        if ($this->getRequest()->getParam("back")) {
            $this->_redirect("*/*/edit", array("id" => $model->getId()));
            return;
        }
        $this->_redirect("*/*/");
    }

    public function editAction() {
        $onlorder = Mage::getModel("wbxtest/wbxtest")->load($this->getRequest()->getParam("id"));
        if ($onlorder->getId()) {
            Mage::register("wbxtest_data", $onlorder);
            $this->loadLayout();
            $this->_addContent($this->getLayout()->createBlock('wbxtest/adminhtml_wbxtest_edit'));
            $this->renderLayout();
        } else {
            Mage::getSingleton("adminhtml/session")->addError(Mage::helper("wbxtest")->__("Item does not exist."));
            $this->_redirect("*/*/");
        }
    }

    public function deleteAction() {
        Mage::getModel("wbxtest/wbxtest")->load($this->getRequest()->getParam("id"))->delete();
        $this->_redirect("*/*/");
    }

}
