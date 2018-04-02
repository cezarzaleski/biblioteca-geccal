<?php

class Admin_UsuarioController extends Core_Controller_Action {

    protected $_usuarioBusiness;
    protected $_perfilBusiness;
    protected $_colaboradorBusiness;

    public function init() {
        $this->_helper->cache(array('listar'), array('listaraction'));
        $this->_helper->cache(array('cadastrar'), array('cadastraraction'));
        $this->_helper->cache(array('editar'), array('editaraction'));
        $this->_usuarioBusiness = new \Core\Models\Business\UsuarioBusiness();
        $this->_perfilBusiness = new \Core\Models\Business\PerfilBusiness();
        $this->_colaboradorBusiness = new \Core\Models\Business\ColaboradorBusiness();
        $this->view->criptografia = $this->_helper->Criptografia;
    }

    public function listarAction() {
        $page = $this->_getParam('page', 1);
        $voUsuario = $this->_usuarioBusiness->findAll();
        $paginator = $this->_helper->Paginator->paginator($voUsuario, $page);
        $this->view->paginator = $paginator;
        $this->view->update = $this->_helper->Autorizacao->verificaPermissao('editar');
        $this->view->delete = $this->_helper->Autorizacao->verificaPermissao('excluir');
    }

    public function cadastrarAction() {
        $form = new Admin_Form_Usuario();
        $this->view->form = $form;

        if ($this->getRequest()->getPost("noSenha")) {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();
            if ($this->getRequest()->isPost() && $form->isValid($_POST)) {
                $voUsuario = new \Core\Entity\BibliotecaInfantil\Usuario();
                $voColaborador = $this->_colaboradorBusiness->find($this->_helper->Criptografia->descript($this->getRequest()->getPost("idColaborador")));
                $voPerfil = $this->_perfilBusiness->find($this->_helper->Criptografia->descript($this->getRequest()->getPost("idPerfil")));
                $date = new \DateTime('now');

                $voUsuario->setNoUsuario($this->getRequest()->getPost("noUsuario"));
                $voUsuario->setNoSenha(md5($this->getRequest()->getPost("noSenha")));
                $voUsuario->setNoUsuario($this->getRequest()->getPost("noUsuario"));
                $voUsuario->setIdColaborador($voColaborador);
                $voUsuario->setIdPerfil($voPerfil);
                $voUsuario->setDtCadastro($date);
                $voUsuario->setStAtivo(1);
                $this->novoUsuario($voUsuario);
            } else {
                echo 'false';
            }
        }
        if ($this->getRequest()->getPost("method")) {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();
            $voUsuario = $this->_usuarioBusiness->findByNoUsuario($this->getRequest()->getPost("noUsuario"));

            if ($voUsuario) {
                echo 'true';
            } else {
                echo 'false';
            }
        }
    }

    public function editarAction() {
        $request = $this->getRequest();
        $id = $request->getParam('id');
        $form = new Admin_Form_Usuario();
        if ($id) {
            $voUsuario = $this->_usuarioBusiness->find($this->_helper->Criptografia->descript($id));
            $this->view->form = $form->editarUsuarioForm($voUsuario, $form, $id);
        }
        if ($request->getPost('noUsuario') && !$this->getRequest()->getPost("method")) {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();
            if ($this->getRequest()->isPost()) {
                $voPerfil = $this->_perfilBusiness->find($this->_helper->Criptografia->descript($this->getRequest()->getPost("idPerfil")));
                $voUsuario = $this->_usuarioBusiness->find($this->_helper->Criptografia->descript($this->getRequest()->getPost("idUsuario")));
                $voUsuario->setNoUsuario($this->getRequest()->getPost("noUsuario"));
                $voUsuario->setIdPerfil($voPerfil);
                if ($this->getRequest()->getPost("noSenha")) {
                    $voUsuario->setNoSenha(md5($this->getRequest()->getPost("noSenha")));
                }
                $this->alterarUsuario($voUsuario);
            } else {
                echo 'false';
            }
        }
        if ($this->getRequest()->getPost("method")) {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();
            $voUsuario = $this->_usuarioBusiness->findByNoUsuario($this->getRequest()->getPost("noUsuario"));
            if ($voUsuario) {
                echo 'true';
            } else {
                echo 'false';
            }
        }
    }

    public function excluirAction() {
        $this->_helper->viewRenderer->setNoRender(true);
        $this->_helper->layout()->disableLayout();

        if ($this->getRequest()->isPost()) {
            $code = $this->getRequest()->getPost("code");
            foreach ($code as $val) {
                $voUsuario = $this->_usuarioBusiness->find($this->_helper->Criptografia->descript($val));
                $voUsuario->setStAtivo(0);
                if ($this->_usuarioBusiness->update($voUsuario) != NULL) {
                    echo 'false';
                    exit();
                }
            }
            echo 'true';
        }
    }

    private function novoUsuario(\Core\Entity\BibliotecaInfantil\Usuario $valueObject) {
        $this->_helper->viewRenderer->setNoRender(true);
        if ($this->_usuarioBusiness->save($valueObject) == NULL) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    private function alterarUsuario(\Core\Entity\BibliotecaInfantil\Usuario $valueObject) {
        $this->_helper->viewRenderer->setNoRender(true);
        if ($this->_usuarioBusiness->update($valueObject) == NULL) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

}