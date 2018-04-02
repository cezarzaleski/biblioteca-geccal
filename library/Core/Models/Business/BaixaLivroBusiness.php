<?php

namespace Core\Models\Business;
class BaixaLivroBusiness {

    private $_model;

    public function __construct() {
        $this->_model = new \Core\Models\Model\BaixaLivroModel();
    }

    public function findAll() {
        return $this->_model->findBy(array("stAtivo" => TRUE),array("idBaixaLivro" => "ASC"));
    }

    public function save(\Core\Entity\BibliotecaInfantil\BaixaLivro $valueObject) {
        $this->_model->save($valueObject);
    }

    public function update(\Core\Entity\BibliotecaInfantil\BaixaLivro $valueObject) {
        $this->_model->update($valueObject);
    }

    public function delete(\Core\Entity\BibliotecaInfantil\BaixaLivro $valueObject) {
        $this->_model->delete($valueObject);
    }

    public function find($idBaixaLivro) {
        return $this->_model->find($idBaixaLivro);
    }
    
}
