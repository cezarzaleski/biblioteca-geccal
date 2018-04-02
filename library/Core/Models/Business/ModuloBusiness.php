<?php

namespace Core\Models\Business;
class ModuloBusiness {

    private $_model;

    public function __construct() {
        $this->_model = new \Core\Models\Model\ModuloModel();
    }

    public function findAll() {
        return $this->_model->findBy(array("stAtivo" => TRUE),array("noModulo" => "ASC"));
    }

    public function save(\Core\Entity\BibliotecaInfantil\Modulo $valueObject) {
        $this->_model->save($valueObject);
    }

    public function update(\Core\Entity\BibliotecaInfantil\Modulo $valueObject) {
        $this->_model->update($valueObject);
    }

    public function delete(\Core\Entity\BibliotecaInfantil\Modulo $valueObject) {
        $this->_model->delete($valueObject);
    }

    public function find($idModulo) {
        return $this->_model->find($idModulo);
    }
    
}
