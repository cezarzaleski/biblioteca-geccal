<?php

class Zend_Controller_Action_Helper_Turma extends Zend_Controller_Action_Helper_Abstract {

    protected $_colaboradorTurmaBusiness;

    public function init() {
        $this->_colaboradorTurmaBusiness = new Core\Models\Business\ColaboradorTurmaBusiness();
    }

    public function findByColaboradorTurma($idTurma) {

        $return = $this->_colaboradorTurmaBusiness->findByColaboradorTurma($idTurma);

        return $return;
    }

}