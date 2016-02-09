<?php

class Creovector_Testimonials_Helper_Data extends Mage_Core_Helper_Abstract {

    public function getUplodedFile($field) {
        $img = Mage::app()->getRequest()->getParam($field);
        if (isset($img["delete"]) && $img["delete"] == 1) {
            return " ";
        }
        if (isset($_FILES[$field]['name']) && (file_exists($_FILES[$field]['tmp_name']))) {
            $filename = md5(microtime() . rand(0, 9999)) . ".png";
            try {
                $uploader = new Varien_File_Uploader($field);
                $uploader->setAllowedExtensions(array('jpg', 'jpeg', 'gif', 'png')); // or pdf or anything
                $uploader->setAllowRenameFiles(false);
                $path = Mage::getBaseDir('media');
                $uploader->setFilesDispersion(false);
                $uploader->save($path, $filename);
                return $filename;
            } catch (Exception $e) {
                Mage::log($e->getMessage());
                return false;
            }
            return false;
        }
    }

    public function setUrlRewriteRule($id, $path, $target) {
        $model = Mage::getModel('core/url_rewrite')->loadByIdPath($id)->setIsSystem(0);
        $model->setIdPath($id)->setTargetPath($target)->setRequestPath($path)->save();
    }

}

?>