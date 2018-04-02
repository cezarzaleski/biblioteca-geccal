<?php

namespace Core\Models\Business;
class EditoraBusiness {

    private $_model;

    public function __construct() {
        $this->_model = new \Core\Models\Model\EditoraModel();
    }

    public function findAll() {
        return $this->_model->findBy(array("stAtivo" => TRUE),array("noEditora" => "ASC"));
    }

    public function save(\Core\Entity\BibliotecaInfantil\Editora $valueObject) {
        $this->_model->save($valueObject);
    }

    public function update(\Core\Entity\BibliotecaInfantil\Editora $valueObject) {
        $this->_model->update($valueObject);
    }

    public function delete(\Core\Entity\BibliotecaInfantil\Editora $valueObject) {
        $this->_model->delete($valueObject);
    }

    public function find($idEditora) {
        return $this->_model->find($idEditora);
    }
    
}
