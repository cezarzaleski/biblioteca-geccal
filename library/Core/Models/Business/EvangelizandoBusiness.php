<?php

namespace Core\Models\Business;
class EvangelizandoBusiness {

    private $_model;

    public function __construct() {
        $this->_model = new \Core\Models\Model\EvangelizandoModel();
    }

    public function findAll() {
        return $this->_model->findBy(array("stAtivo" => TRUE),array("noEvangelizando" => "ASC"));
    }

    public function save(\Core\Entity\BibliotecaInfantil\Evangelizando $valueObject) {
        $this->_model->save($valueObject);
    }

    public function update(\Core\Entity\BibliotecaInfantil\Evangelizando $valueObject) {
        $this->_model->update($valueObject);
    }

    public function delete(\Core\Entity\BibliotecaInfantil\Evangelizando $valueObject) {
        $this->_model->delete($valueObject);
    }

    public function find($idAutor) {
        return $this->_model->find($idAutor);
    }
    
    public function findByUltEvangelizando() {
        return $this->_model->findBy(array("stAtivo" => TRUE),array("idEvangelizando" => "DESC"), 1);
    }
    
    public function findByEvangelizandoTurma($idadeMinima, $idadeMaxima, $nuAno) {
        return $this->_model->findByEvangelizandoTurma($idadeMinima, $idadeMaxima, $nuAno);
    }
}
