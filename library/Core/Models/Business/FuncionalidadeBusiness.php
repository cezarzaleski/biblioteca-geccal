<?php
namespace Core\Models\Business;
class FuncionalidadeBusiness {

    private $_model;

    public function __construct() {
        $this->_model = new \Core\Models\Model\FuncionalidadeModel();
    }

    public function findAll() {
        return $this->_model->findBy(array("stAtivo" => TRUE),array("idFuncionalidade" => "ASC"));
    }

    public function save(\Core\Entity\BibliotecaInfantil\Funcionalidade $valueObject) {
        $this->_model->save($valueObject);
    }

    public function update(\Core\Entity\BibliotecaInfantil\Funcionalidade $valueObject) {
        $this->_model->update($valueObject);
    }

    public function delete(\Core\Entity\BibliotecaInfantil\Funcionalidade $valueObject) {
        $this->_model->delete($valueObject);
    }

    public function find($idFuncionalidade) {
        return $this->_model->find($idFuncionalidade);
    }
            
    public function findByFuncAutorizacao() {
        return $this->_model->findByFuncAutorizacao();
                
    }
    
    public function findByFuncModulo($idModulo, $noMenuFunc, $idPerfil) {
        $return = $this->_model->findByFuncModulo($idModulo, $noMenuFunc, $idPerfil);
        
        return $return;
    }
    
    public function findByFuncController($idController, $idPerfil) {
        $return = $this->_model->findByFuncController($idController, $idPerfil);
        
        return $return;
    }
    
    

}
