<?php

class Creovector_Testimonials_IndexController extends Mage_Core_Controller_Front_Action {

    function createAction() {
        if (!Mage::helper('customer')->isLoggedIn()) {

            Mage::app()->getFrontController()->getResponse()->setRedirect(Mage::getUrl('customer/account'));
        }
        $this->loadLayout();
        $this->renderLayout();
    }

    function saveAction() {
        Mage::log($this->getRequest()->getParams(), null, "wbxtest");
        if (!Mage::helper('customer')->isLoggedIn()) {

            Mage::app()->getFrontController()->getResponse()->setRedirect(Mage::getUrl('customer/account'));
        }

        $date = new DateTime();
        $test = Mage::getModel("wbxtest/wbxtest");
        $values = array("owner" => Mage::getSingleton('customer/session')->getCustomer()->getId(), "date" => $date->format("Y-m-d"));
        foreach (array("name", "description", "value") as $param)
            $values[$param] = $this->getRequest()->getParam($param);
        $test->setData($values);
        $test->save();
        Mage::log($values, null, "wbxtest");
         Mage::app()->getFrontController()->getResponse()->setRedirect(Mage::getUrl('wbxtest/index/list'));
    }

    function listAction() {
        $this->loadLayout();
        $this->renderLayout();
    }

}
