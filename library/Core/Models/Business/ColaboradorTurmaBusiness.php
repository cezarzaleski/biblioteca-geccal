<?php

namespace Core\Models\Business;
class ColaboradorTurmaBusiness {

    private $_model;

    public function __construct() {
        $this->_model = new \Core\Models\Model\ColaboradorTurmaModel();
    }

    public function findAll() {
        return $this->_model->findBy(array("stAtivo" => TRUE),array("dataCadastro" => "ASC"));
    }

    public function save(\Core\Entity\BibliotecaInfantil\ColaboradorTurma $valueObject) {
        $this->_model->save($valueObject);
    }

    public function update(\Core\Entity\BibliotecaInfantil\ColaboradorTurma $valueObject) {
        $this->_model->update($valueObject);
    }

    public function delete(\Core\Entity\BibliotecaInfantil\ColaboradorTurma $valueObject) {
        $this->_model->delete($valueObject);
    }

    public function find($idColaboradorTurma) {
        return $this->_model->find($idColaboradorTurma);
    }
    
    public function findByColaboradorTurma($idTurma) {
        return $this->_model->findBy(array("stAtivo" => TRUE, "idTurma" => $idTurma),array("dataCadastro" => "ASC"));
    }
    
}
