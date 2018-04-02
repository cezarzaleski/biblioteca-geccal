<?php

namespace Core\Models\Business;
class AutorBusiness {

    private $_model;

    public function __construct() {
        $this->_model = new \Core\Models\Model\AutorModel();
    }

    public function findAll() {
        return $this->_model->findBy(array("stAtivo" => TRUE),array("noAutor" => "ASC"),10000);
    }

    public function save(\Core\Entity\BibliotecaInfantil\Autor $valueObject) {
        $this->_model->save($valueObject);
    }

    public function update(\Core\Entity\BibliotecaInfantil\Autor $valueObject) {
        $this->_model->update($valueObject);
    }

    public function delete(\Core\Entity\BibliotecaInfantil\Autor $valueObject) {
        $this->_model->delete($valueObject);
    }

    public function find($idAutor) {
        return $this->_model->find($idAutor);
    }
    
}
