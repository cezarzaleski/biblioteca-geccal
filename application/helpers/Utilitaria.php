<?php

class Zend_Controller_Action_Helper_Utilitaria extends Zend_Controller_Action_Helper_Abstract {

    public function objectToArray($object) {
        $arr = array();
        for ($i = 0; $i < count($object); $i++) {
            $arr[] = get_object_vars($object[$i]);
        }
        return $arr;
    }

}