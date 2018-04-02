<?php

namespace Core\Models\Business;

class LivroBusiness {

    private $_model;

    public function __construct() {
        $this->_model = new \Core\Models\Model\LivroModel();
    }

    public function findAll() {
        return $this->_model->findBy(array("stAtivo" => TRUE), array("noLivro" => "ASC", "nuExemplar" => "ASC"));
    }

    public function save(\Core\Entity\BibliotecaInfantil\Livro $valueObject) {
        $this->_model->save($valueObject);
    }

    public function update(\Core\Entity\BibliotecaInfantil\Livro $valueObject) {
        $this->_model->update($valueObject);
    }

    public function delete(\Core\Entity\BibliotecaInfantil\Livro $valueObject) {
        $this->_model->delete($valueObject);
    }

    public function find($idLivro) {
        return $this->_model->find($idLivro);
    }

    public function findByLivroGerarExemplar() {
        return $this->_model->findByLivroGerarExemplar();
    }

    public function findByLivro($noLivro) {
        return $this->_model->findBy(array("noLivro" => $noLivro), array("nuExemplar" => "DESC"), 1);
    }

    public function countExemplar($noLivro) {
        return $this->_model->countExemplar($noLivro);
    }

    public function findByAutorLivro($idLivro) {
        return $this->_model->findByAutorLivro($idLivro);
    }

    public function findByTituloExemplar($titulo, $nuExemplar) {
        return $this->_model->findByTituloExemplar($titulo, $nuExemplar);
    }

    public function findByLivroExemplar($noLivro, $nuExemplar) {
        $return = $this->_model->findBy(array("noLivro" => $noLivro, "nuExemplar" => $nuExemplar));
        return $return[0];
    }

    public function findByEmprestimo($st) {
        return $this->_model->findByEmprestimo($st);
    }

    public function findByExemplar($noLivro, $st) {
        if($st=="all"){
            return $this->_model->findBy(array("noLivro" => $noLivro));
        }
        return $this->_model->findByExemplar($noLivro, $st);
    }
    
    public function findByLivroEmprestado($idLivro, $noLivro,$stEmprestimo) {
        return $this->_model->findByLivroEmprestado($idLivro, $noLivro,$stEmprestimo);
    }

}
