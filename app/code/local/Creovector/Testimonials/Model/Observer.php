<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Observer
 *
 * @author kryuch
 */
class Creovector_Testimonials_Model_Observer {

    //put your code here

    public function addToTopmenu(Varien_Event_Observer $observer) {
        $menu = $observer->getMenu();
        $tree = $menu->getTree();

        $node = new Varien_Data_Tree_Node(array(
            'name' => 'Testimonials',
            'id' => 'testimonials',
            'url' => Mage::getUrl("wbxtest/index/list"), // point somewhere
                ), 'id', $tree, $menu);

        $menu->addChild($node);

    }

}

?>
