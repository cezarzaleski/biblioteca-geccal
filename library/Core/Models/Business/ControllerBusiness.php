<?php

namespace Core\Models\Business;
class ControllerBusiness {

    private $_model;

    public function __construct() {
        $this->_model = new \Core\Models\Model\ControllerModel();
    }

    public function findAll() {
        return $this->_model->findBy(array("stAtivo" => TRUE),array("noController" => "ASC"));
    }

    public function save(\Core\Entity\BibliotecaInfantil\Controller $valueObject) {
        $this->_model->save($valueObject);
    }

    public function update(\Core\Entity\BibliotecaInfantil\Controller $valueObject) {
        $this->_model->update($valueObject);
    }

    public function delete(\Core\Entity\BibliotecaInfantil\Controller $valueObject) {
        $this->_model->delete($valueObject);
    }

    public function find($idController) {
        return $this->_model->find($idController);
    }
    
    public function findByControllerMod($idModulo) {
        return $this->_model->findBy(array("stAtivo" => TRUE, 'idModulo'=>$idModulo),array("noController" => "ASC"));
    }
    
}
