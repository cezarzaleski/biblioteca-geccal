<?php
namespace Core\Models\Business;
class UsuarioBusiness {

    private $_model;

    public function __construct() {
        $this->_model = new \Core\Models\Model\UsuarioModel();
    }

    public function findAll() {
        return $this->_model->findBy(array("stAtivo" => TRUE));
    }

    public function save(\Core\Entity\BibliotecaInfantil\Usuario $valueObject) {
        $this->_model->save($valueObject);
    }

    public function update(\Core\Entity\BibliotecaInfantil\Usuario $valueObject) {
        $this->_model->update($valueObject);
    }

    public function delete(\Core\Entity\BibliotecaInfantil\Usuario $valueObject) {
        $this->_model->delete($valueObject);
    }

    public function find($idUsuario) {
        return $this->_model->find($idUsuario);
    }

    public function login(\Core\Entity\BibliotecaInfantil\Usuario $valueObject) {
        $return = $this->_model->findBy(array("stAtivo" => TRUE, "noUsuario" => $valueObject->getNoUsuario(),
            "noSenha" => $valueObject->getNoSenha()));

        return $return[0];
    }
    
    public function findByNoUsuario($noUsuario) {
        return $this->_model->findBy(array('noUsuario'=> $noUsuario));
    }

}
