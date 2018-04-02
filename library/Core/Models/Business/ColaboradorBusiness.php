<?php

namespace Core\Models\Business;
class ColaboradorBusiness {

    private $_model;

    public function __construct() {
        $this->_model = new \Core\Models\Model\ColaboradorModel();
    }

    public function findAll() {
        return $this->_model->findBy(array("stAtivo" => TRUE),array("noColaborador" => "ASC"));
    }

    public function save(\Core\Entity\BibliotecaInfantil\Colaborador $valueObject) {
        $this->_model->save($valueObject);
    }

    public function update(\Core\Entity\BibliotecaInfantil\Colaborador $valueObject) {
        $this->_model->update($valueObject);
    }

    public function delete(\Core\Entity\BibliotecaInfantil\Colaborador $valueObject) {
        $this->_model->delete($valueObject);
    }

    public function find($idColaborador) {
        return $this->_model->find($idColaborador);
    }
    public function findByColaboradorNovoUsuario() {
        return $this->_model->findByColaboradorNovoUsuario();
    }
    
    public function findByColaboradorTurma($nuAno) {
        return $this->_model->findByColaboradorTurma($nuAno);
    }
    
}
