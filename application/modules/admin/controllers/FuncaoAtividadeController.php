<?php

class Admin_FuncaoAtividadeController extends Core_Controller_Action {

    protected $_funcaoAtividadeBusiness;

    public function init() {
        $this->_helper->cache(array('listar'), array('listaraction'));
        $this->_helper->cache(array('cadastrar'), array('cadastraraction'));
        $this->_helper->cache(array('editar'), array('editaraction'));
        $this->_funcaoAtividadeBusiness = new \Core\Models\Business\FuncaoAtividadeBusiness();
    }

    public function listarAction() {
        $page = $this->_getParam('page', 1);
        $voEditora = $this->_funcaoAtividadeBusiness->findAll();
        $paginator = $this->_helper->Paginator->paginator($voEditora, $page);
        $this->view->paginator = $paginator;
        $this->view->update = $this->_helper->Autorizacao->verificaPermissao('editar');
        $this->view->delete = $this->_helper->Autorizacao->verificaPermissao('excluir');
        $this->view->criptografia = $this->_helper->Criptografia;
    }

    public function cadastrarAction() {
        $form = new Admin_Form_FuncaoAtividade();
        $this->view->form = $form;

        if ($this->getRequest()->getPost("noFuncao")) {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();
            if ($this->getRequest()->isPost() && $form->isValid($_POST)) {
                $voFuncaoAtividade = new \Core\Entity\BibliotecaInfantil\FuncaoAtividade();
                
                $voFuncaoAtividade->setNoFuncao($this->getRequest()->getPost("noFuncao"));
                $voFuncaoAtividade->setStAtivo(1);
                $this->novaFuncaoAtividade($voFuncaoAtividade);
            } else {
                echo 'false';
            }
        }
    }

    public function editarAction() {
        $request = $this->getRequest();
        $id = $request->getParam('id');
        $form = new Admin_Form_FuncaoAtividade();
        if ($id) {
            $voFuncaoAtividade = $this->_funcaoAtividadeBusiness->find($this->_helper->Criptografia->descript($id));
            $this->view->form = $form->editarEditoraForm($voFuncaoAtividade, $form,$id);
        }
        if ($request->getPost('noFuncao')) {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();
            if ($this->getRequest()->isPost() && $form->isValid($_POST)) {
                $voFuncaoAtividade = $this->_funcaoAtividadeBusiness->find($this->_helper->Criptografia->descript($this->getRequest()->getPost("idFunc")));
                $voFuncaoAtividade->setNoFuncao($this->getRequest()->getPost("noFuncao"));
                $this->alterarFuncaoAtividade($voFuncaoAtividade);
            } else {
                echo 'false';
            }
        }
    }

    public function excluirAction() {
        $this->_helper->viewRenderer->setNoRender(true);
        $this->_helper->layout()->disableLayout();
        
        if($this->getRequest()->isPost()){
           $code = $this->getRequest()->getPost("code");
           foreach ($code as $val){
               $voFuncaoAtividade = $this->_funcaoAtividadeBusiness->find($this->_helper->Criptografia->descript($val));
               $voFuncaoAtividade->setStAtivo(0);
               if ($this->_funcaoAtividadeBusiness->update($voFuncaoAtividade) != NULL) {
                   echo 'false';
                   exit();
               }
           }
           echo 'true';
        }
        
    }

    private function novaFuncaoAtividade(\Core\Entity\BibliotecaInfantil\FuncaoAtividade $valueObject) {
        
        $this->_helper->viewRenderer->setNoRender(true);
        if ($this->_funcaoAtividadeBusiness->save($valueObject) == NULL) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    private function alterarFuncaoAtividade(\Core\Entity\BibliotecaInfantil\FuncaoAtividade $valueObject) {
        $this->_helper->viewRenderer->setNoRender(true);
        if ($this->_funcaoAtividadeBusiness->update($valueObject) == NULL) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

}