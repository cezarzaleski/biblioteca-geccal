<?php

class Zend_Controller_Action_Helper_Livro extends Zend_Controller_Action_Helper_Abstract {

    protected $_livroBusiness;

    public function init() {
        $this->_livroBusiness = new Core\Models\Business\LivroBusiness();
    }

    public function countExemplar($noLivro) {

        $return = $this->_livroBusiness->countExemplar($noLivro);

        return $return;
    }

}