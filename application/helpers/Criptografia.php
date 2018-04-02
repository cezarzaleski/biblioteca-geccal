<?php

class Zend_Controller_Action_Helper_Criptografia extends Zend_Controller_Action_Helper_Abstract {

    private function gerarChave() {

        $chave = date("j", (time()) + 86400);
        return $chave;
    }

    private function criptografiaNumero($num, $key = false) {

        if ($key != false) {
            $chave = $key;
        } else {
            $chave = $this->gerarChave();
        }

        $result = ($chave * $num) + 99999;
        return $result;
    }

    private function descriptografiaNumero($num, $key = false) {

        if ($key != false) {
            $chave = $key;
        } else {
            $chave = $this->gerarChave();
        }
        $result = ($num - 99999) / $chave;

        return $result;
    }

    private function descriptografiaString($str) {

        $rs = "";
        $size = strlen($str);
        $i = 0;

        while ($i < $size) {
            $rs .= $str[$i];
            $i += 4;
        }

        return $rs;
    }

    private function criptografiaString($str) {

        $rs = "";
        $size = strlen($str);
        $alfaNum = array("A", "b", "C", "d", "E", "f", "G", "h", "I", "J", "l", "M", "n", "O", "p", "Q", "r", "S", "t", "u", "V", "X", "z", "1", "3", "5", "7", "9");

        for ($i = 0; $i < $size; $i++) {
            $rs .= $str[$i] . $alfaNum[array_rand($alfaNum)] . $alfaNum[array_rand($alfaNum)] . $alfaNum[array_rand($alfaNum)];
        }

        return $rs;
    }

    public function cripto($dado, $chave = false) {

        if (is_numeric($dado)) {
            if ($chave != false) {
                $result = $this->criptografiaNumero($dado, $chave);
            } else {
                $result = $this->criptografiaNumero($dado);
            }
        } else {
            $result = $this->criptografiaString($dado);
        }

        return $result;
    }

    public function descript($dado, $chave = false) {

        if (is_numeric($dado)) {
            if ($chave != false) {
                $result = $this->descriptografiaNumero($dado, $chave);
            } else {
                $result = $this->descriptografiaNumero($dado);
            }
        } else {
            $result = $this->descriptografiaString($dado);
        }

        return $result;
    }

}