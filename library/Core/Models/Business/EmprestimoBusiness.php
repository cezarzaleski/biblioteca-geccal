<?php

namespace Core\Models\Business;
class EmprestimoBusiness {

    private $_model;

    public function __construct() {
        $this->_model = new \Core\Models\Model\EmprestimoModel();
    }

    public function findAll() {
        return $this->_model->findBy(array("stAtivo" => TRUE),array("idEmprestimo" => "ASC"));
    }

    public function save(\Core\Entity\BibliotecaInfantil\Emprestimo $valueObject) {
        $this->_model->save($valueObject);
    }

    public function update(\Core\Entity\BibliotecaInfantil\Emprestimo $valueObject) {
        $this->_model->update($valueObject);
    }

    public function delete(\Core\Entity\BibliotecaInfantil\Emprestimo $valueObject) {
        $this->_model->delete($valueObject);
    }

    public function find($idEmprestimo) {
        return $this->_model->find($idEmprestimo);
    }
    
    public function findByPendencia($id,$opcao) {
        return $this->_model->findByPendencia($id, $opcao);
    }
    
    public function findByEmprestimoEvangelizando($idEvangelizando, $idTurma, $nuAno, $stEmprestimo) {
        return $this->_model->findByEmprestimoEvangelizando($idEvangelizando, $idTurma, $nuAno, $stEmprestimo);
    }
    
    public function findByEmprestimoColaborador($idColaborador, $nuAno, $stEmprestimo) {
        return $this->_model->findByEmprestimoColaborador($idColaborador, $nuAno, $stEmprestimo);
    }
    
    public function findByYear($opcao) {
        return $this->_model->findByYear($opcao);
    }
    
}
