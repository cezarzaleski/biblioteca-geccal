<?php

class Padrao_AnoController extends Core_Controller_Action {

    public function init() {
        $this->_helper->cache(array('alterar'), array('aletaraction'));
    }

    public function editarAction() {
        $request = $this->getRequest();
        $form = new Padrao_Form_Ano();
        $this->view->form = $form;
        $sessionConfig = new Zend_Session_Namespace('config');
        
        if($request->getPost('nuAno')){
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();
            $sessionConfig->nuAno = $this->getRequest()->getPost("nuAno");
            echo "true";
        }
    }

}