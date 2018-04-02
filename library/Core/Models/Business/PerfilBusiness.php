<?php
namespace Core\Models\Business;
class PerfilBusiness {

    private $_model;

    public function __construct() {
        $this->_model = new \Core\Models\Model\PerfilModel();
    }

    public function findAll() {
        return $this->_model->findBy(array("stAtivo" => TRUE),array("noPerfil" => "ASC"));
    }

    public function save(\Core\Entity\BibliotecaInfantil\Perfil $valueObject) {
        $this->_model->save($valueObject);
    }

    public function update(\Core\Entity\BibliotecaInfantil\Perfil $valueObject) {
        $this->_model->update($valueObject);
    }

    public function delete(\Core\Entity\BibliotecaInfantil\Perfil $valueObject) {
        $this->_model->delete($valueObject);
    }

    public function find($idPerfil) {
        return $this->_model->find($idPerfil);
    }

    public function findByFuncPerfil($idPerfil) {
        return $this->_model->findByFuncPerfil($idPerfil);
    }
    
    public function findByModuloPerfil($idPerfil) {
        return $this->_model->findByModuloPerfil($idPerfil);
    }

}
