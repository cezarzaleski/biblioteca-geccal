<?php

class Livro_EditoraController extends Core_Controller_Action {

    protected $_editoraBusiness;

    public function init() {
        $this->_helper->cache(array('listar'), array('listaraction'));
        $this->_helper->cache(array('cadastrar'), array('cadastraraction'));
        $this->_helper->cache(array('editar'), array('editaraction'));
        $this->_editoraBusiness = new \Core\Models\Business\EditoraBusiness();
    }

    public function listarAction() {
        $page = $this->_getParam('page', 1);
        $voEditora = $this->_editoraBusiness->findAll();
        $paginator = $this->_helper->Paginator->paginator($voEditora, $page,30);
        $this->view->paginator = $paginator;
        $this->view->tabela = $voEditora;
        $this->view->update = $this->_helper->Autorizacao->verificaPermissao('editar');
        $this->view->delete = $this->_helper->Autorizacao->verificaPermissao('excluir');
        $this->view->criptografia = $this->_helper->Criptografia;
    }

    public function cadastrarAction() {
        $form = new Livro_Form_Editora();
        $this->view->form = $form;

        if ($this->getRequest()->getPost("noEditora")) {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();
            if ($this->getRequest()->isPost() && $form->isValid($_POST)) {
                $voEditora = new \Core\Entity\BibliotecaInfantil\Editora();
                $date = new \DateTime('now');

                $voEditora->setNoEditora($this->getRequest()->getPost("noEditora"));
                $voEditora->setStAtivo(1);
                $voEditora->setDtCadastro($date);
                $this->novaEditora($voEditora);
            } else {
                echo 'false';
            }
        }
    }

    public function editarAction() {
        $request = $this->getRequest();
        $id = $request->getParam('id');
        $form = new Livro_Form_Editora();
        if ($id) {
            $voEditora = $this->_editoraBusiness->find($this->_helper->Criptografia->descript($id));
            $this->view->form = $form->editarEditoraForm($voEditora, $form,$id);
        }
        if ($request->getPost('noEditora')) {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();
            if ($this->getRequest()->isPost() && $form->isValid($_POST)) {
                $voEditora = $this->_editoraBusiness->find($this->_helper->Criptografia->descript($this->getRequest()->getPost("idEditora")));
                $voEditora->setNoEditora($this->getRequest()->getPost("noEditora"));
                $this->alterarEditora($voEditora);
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
               $voEditora = $this->_editoraBusiness->find($this->_helper->Criptografia->descript($val));
               $voEditora->setStAtivo(0);
               if ($this->_editoraBusiness->update($voEditora) != NULL) {
                   echo 'false';
                   exit();
               }
           }
           echo 'true';
        }
        
    }

    private function novaEditora(\Core\Entity\BibliotecaInfantil\Editora $valueObject) {
        $this->_helper->viewRenderer->setNoRender(true);
        if ($this->_editoraBusiness->save($valueObject) == NULL) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    private function alterarEditora(\Core\Entity\BibliotecaInfantil\Editora $valueObject) {
        $this->_helper->viewRenderer->setNoRender(true);
        if ($this->_editoraBusiness->update($valueObject) == NULL) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

}
