<?php

namespace Core\Models\Business;
class EvangelizandoTurmaBusiness {

    private $_model;

    public function __construct() {
        $this->_model = new \Core\Models\Model\EvangelizandoTurmaModel();
    }

    public function findAll() {
        return $this->_model->findBy(array("stAtivo" => TRUE),array("noEvangelizando" => "ASC"));
    }

    public function save(\Core\Entity\BibliotecaInfantil\EvangelizandoTurma $valueObject) {
        $this->_model->save($valueObject);
    }

    public function update(\Core\Entity\BibliotecaInfantil\EvangelizandoTurma $valueObject) {
        $this->_model->update($valueObject);
    }

    public function delete(\Core\Entity\BibliotecaInfantil\EvangelizandoTurma $valueObject) {
        $this->_model->delete($valueObject);
    }

    public function find($idEvaTurma) {
        return $this->_model->find($idEvaTurma);
    }
    
    public function findByEvangelizandoTurma($idTurma) {
        return $this->_model->findBy(array("stAtivo" => TRUE, "idTurma"=>$idTurma),array("dtCadastro" => "ASC"));
    }
    
    public function findByAno($nuAno) {
        return $this->_model->findBy(array("stAtivo" => TRUE, "nuAno"=> $nuAno),array("dtCadastro" => "ASC"));
    }
    
}
