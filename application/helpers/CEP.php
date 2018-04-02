<?php
class Zend_Controller_Action_Helper_CEP extends Zend_Controller_Action_Helper_Abstract
{
    public function consulta($cep) {
        $cep= explode('-', $cep);
        $cep= $cep[0].$cep[1];
        $resultado = @file_get_contents('http://republicavirtual.com.br/web_cep.php?cep='.urlencode($cep).'&formato=json');  
    if(!$resultado){  
        $resultado = "&resultado=0&resultado_txt=erro+ao+buscar+cep";  
    }  

    return $resultado;  
    }
    
}