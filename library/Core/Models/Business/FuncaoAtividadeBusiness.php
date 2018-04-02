<?php

namespace Core\Models\Business;
class FuncaoAtividadeBusiness {

    private $_model;

    public function __construct() {
        $this->_model = new \Core\Models\Model\FuncaoAtividadeModel();
    }

    public function findAll() {
        return $this->_model->findBy(array("stAtivo" => TRUE),array("noFuncao" => "ASC"));
    }

    public function save(\Core\Entity\BibliotecaInfantil\FuncaoAtividade $valueObject) {
        $this->_model->save($valueObject);
    }

    public function update(\Core\Entity\BibliotecaInfantil\FuncaoAtividade $valueObject) {
        $this->_model->update($valueObject);
    }

    public function delete(\Core\Entity\BibliotecaInfantil\FuncaoAtividade $valueObject) {
        $this->_model->delete($valueObject);
    }

    public function find($idFunc) {
        return $this->_model->find($idFunc);
    }
    
}
