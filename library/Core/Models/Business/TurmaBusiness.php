<?php

namespace Core\Models\Business;
class TurmaBusiness {

    private $_model;

    public function __construct() {
        $this->_model = new \Core\Models\Model\TurmaModel();
    }

    public function findAll($nuAno) {
        if($nuAno =="all"){
            return $this->_model->findBy(array("stAtivo" => TRUE),array("nuIdadeMinima" => "ASC"));
        }else{
            
            return $this->_model->findBy(array("stAtivo" => TRUE, "nuAno"=>$nuAno),array("nuIdadeMinima" => "ASC"));
        }
        
    }

    public function save(\Core\Entity\BibliotecaInfantil\Turma $valueObject) {
        $this->_model->save($valueObject);
    }

    public function update(\Core\Entity\BibliotecaInfantil\Turma $valueObject) {
        $this->_model->update($valueObject);
    }

    public function delete(\Core\Entity\BibliotecaInfantil\Turma $valueObject) {
        $this->_model->delete($valueObject);
    }

    public function find($idTurma) {
        return $this->_model->find($idTurma);
    }
    
    public function findByTurmaAno($idCiclo, $nuAno) {
        if($idCiclo){
            return $this->_model->findBy(array("idCiclo" => $idCiclo, "nuAno" => $nuAno),array("nuIdadeMinima" => "ASC"));
        }
        return $this->_model->findBy(array("nuAno" => $nuAno,"stAtivo"=>TRUE),array("nuIdadeMinima" => "ASC"));
        
        
    }
    
    public function findByYear() {
        return $this->_model->findBy(array("stAtivo" => TRUE),array("nuAno" => "ASC"));
    }
    
    
    
}
