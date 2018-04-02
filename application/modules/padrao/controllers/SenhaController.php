<?php

class Padrao_SenhaController extends Core_Controller_Action {

    protected $_usuarioBusiness;

    public function init() {
        $this->_helper->cache(array('editar'), array('editaraction'));
        $this->_usuarioBusiness = new \Core\Models\Business\UsuarioBusiness();
    }

    public function editarAction() {
        $request = $this->getRequest();
        $form = new Padrao_Form_Senha();
        if ($request->getPost('noSenha')) {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();
            if ($this->getRequest()->isPost()&& $form->isValid($_POST)) {
                $voUsuario = $this->_usuarioBusiness->find($this->_helper->Criptografia->descript($this->getRequest()->getPost("idUsuario")));
                $voUsuario->setNoSenha(md5($this->getRequest()->getPost("noSenha")));
                $this->alterarSenha($voUsuario);
            } else {
                echo 'false';
            }
        } else {
            $sessionConfig = new Zend_Session_Namespace('config');
            $voUsuario = $this->_usuarioBusiness->find($this->_helper->Criptografia->descript($sessionConfig->idUsuario));
            $this->view->form = $form->editarSenhaForm($voUsuario, $form);
        }
    }

    private function alterarSenha(\Core\Entity\BibliotecaInfantil\Usuario $valueObject) {
        $this->_helper->viewRenderer->setNoRender(true);
        if ($this->_usuarioBusiness->update($valueObject) == NULL) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

}