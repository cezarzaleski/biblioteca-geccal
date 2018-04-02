<?php

namespace Core\Models\Business;
class CicloBusiness {

    private $_model;

    public function __construct() {
        $this->_model = new \Core\Models\Model\CicloModel();
    }

    public function findAll() {
        return $this->_model->findBy(array("stAtivo" => TRUE),array("noCiclo" => "ASC"));
    }

    public function save(\Core\Entity\BibliotecaInfantil\Ciclo $valueObject) {
        $this->_model->save($valueObject);
    }

    public function update(\Core\Entity\BibliotecaInfantil\Ciclo $valueObject) {
        $this->_model->update($valueObject);
    }

    public function delete(\Core\Entity\BibliotecaInfantil\Ciclo $valueObject) {
        $this->_model->delete($valueObject);
    }

    public function find($idCiclo) {
        return $this->_model->find($idCiclo);
    }
    
    public function findByCicloTurma($nuAno, $idCiclo) {
        return $this->_model->findByCicloTurma($nuAno, $idCiclo);
    }
    
    public function findByCicloEvangelizando($nuAno) {
        return $this->_model->findByCicloEvangelizando($nuAno);
    }
    
}
