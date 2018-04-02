<?php

class Zend_Controller_Action_Helper_Strings extends Zend_Controller_Action_Helper_Abstract {

    public function dividirString($string, $qts) {
        $str = "";
        $string = strip_tags($string);
        $string = str_replace("\n", "", $string);
        $divide = explode(" ", $string);
        $total = count($divide);

        if ($qts > $total) {
            $qts = $total;
        }

        for ($i = 0; $i <= $qts; $i++) {
            if ($i == $qts) {
                $str = $str . $divide[$i];
            } else {
                $str = $str . $divide[$i] . " ";
            }
        }
        return $str;
    }

}