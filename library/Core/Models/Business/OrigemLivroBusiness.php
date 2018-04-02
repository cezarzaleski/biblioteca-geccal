<?php

namespace Core\Models\Business;
class OrigemLivroBusiness {

    private $_model;

    public function __construct() {
        $this->_model = new \Core\Models\Model\OrigemLivroModel();
    }

    public function findAll() {
        return $this->_model->findBy(array("stAtivo" => TRUE),array("noOrigem" => "ASC"));
    }

    public function save(\Core\Entity\BibliotecaInfantil\OrigemLivro $valueObject) {
        $this->_model->save($valueObject);
    }

    public function update(\Core\Entity\BibliotecaInfantil\OrigemLivro $valueObject) {
        $this->_model->update($valueObject);
    }

    public function delete(\Core\Entity\BibliotecaInfantil\OrigemLivro $valueObject) {
        $this->_model->delete($valueObject);
    }

    public function find($idOrigemLivro) {
        return $this->_model->find($idOrigemLivro);
    }
    
}
