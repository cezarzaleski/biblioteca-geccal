<?php

class Padrao_IndexController extends Core_Controller_Action {

    protected $_usuarioBusiness;

    public function init() {
        $this->_helper->cache(array('index'), array('indexaction'));
    }

    public function indexAction() {
        
    }

}