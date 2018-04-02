<?php

class Zend_Controller_Action_Helper_Perfil extends Zend_Controller_Action_Helper_Abstract
{
    protected $_funcionalidadeBusiness;
    protected $_controllerBusines;
    
    
    
    public function init() {
        $this->_funcionalidadeBusiness = new Core\Models\Business\FuncionalidadeBusiness();
        $this->_controllerBusines = new Core\Models\Business\ControllerBusiness();
        $this->_perfilBusiness = new Core\Models\Business\PerfilBusiness();
    }
    
    public function findByFuncController($idController) {
        
        $return = $this->_funcionalidadeBusiness->findByFuncController($idController);
        
        return $return;
    }
    
    public function findByControllerMod($idModulo) {
        
        $return = $this->_controllerBusines->findByControllerMod($idModulo);
        
        return $return;
    }
    
    public function findByFuncPerfil($idController,$idPerfil) {
        
        $return = $this->_funcionalidadeBusiness->findByFuncController($idController, $idPerfil);
        
        return $return;
    }
    
}