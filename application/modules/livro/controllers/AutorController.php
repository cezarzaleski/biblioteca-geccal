<?php

class Livro_AutorController extends Core_Controller_Action {

    protected $_autorBusiness;

    public function init() {
        $this->_helper->cache(array('listar'), array('listaraction'));
        $this->_helper->cache(array('cadastrar'), array('cadastraraction'));
        $this->_helper->cache(array('editar'), array('editaraction'));
        $this->_autorBusiness = new \Core\Models\Business\AutorBusiness();
        $this->view->criptografia = $this->_helper->Criptografia;
    }

    public function listarAction() {
        $page = $this->_getParam('page', 1);
        $voAutor = $this->_autorBusiness->findAll();
        $paginator = $this->_helper->Paginator->paginator($voAutor, $page, 30);
        $this->view->paginator = $paginator;
        $this->view->tabela = $voEditora;
        $this->view->update = $this->_helper->Autorizacao->verificaPermissao('editar');
        $this->view->delete = $this->_helper->Autorizacao->verificaPermissao('excluir');
        
    }

    public function cadastrarAction() {
        $form = new Livro_Form_Autor();
        $this->view->form = $form;

        if ($this->getRequest()->getPost("noAutor")) {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();
            if ($this->getRequest()->isPost() && $form->isValid($_POST)) {
                $voAutor = new \Core\Entity\BibliotecaInfantil\Autor();
                $date = new \DateTime('now');

                $voAutor->setNoAutor($this->getRequest()->getPost("noAutor"));
                $voAutor->setStAtivo(1);
                $voAutor->setDtCadastro($date);
                $this->novoAutor($voAutor);
            } else {
                echo 'false';
            }
        }
    }

    public function editarAction() {
        $request = $this->getRequest();
        $id = $request->getParam('id');
        $form = new Livro_Form_Autor();
        if ($id) {
            $voAutor = $this->_autorBusiness->find($this->_helper->Criptografia->descript($id));
            $this->view->form = $form->editarAutorForm($voAutor, $form,$id);
        }
        if ($request->getPost('noAutor')) {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();
            if ($this->getRequest()->isPost() && $form->isValid($_POST)) {
                $voAutor = $this->_autorBusiness->find($this->_helper->Criptografia->descript($this->getRequest()->getPost("idAutor")));
                $voAutor->setNoAutor($this->getRequest()->getPost("noAutor"));
                $this->alterarAutor($voAutor);
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
               $voEditora = $this->_autorBusiness->find($this->_helper->Criptografia->descript($val));
               $voEditora->setStAtivo(0);
               if ($this->_autorBusiness->update($voEditora) != NULL) {
                   echo 'false';
                   exit();
               }
           }
           echo 'true';
        }
        
    }

    private function novoAutor(\Core\Entity\BibliotecaInfantil\Autor $valueObject) {
        $this->_helper->viewRenderer->setNoRender(true);
        if ($this->_autorBusiness->save($valueObject) == NULL) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    private function alterarAutor(\Core\Entity\BibliotecaInfantil\Autor $valueObject) {
        $this->_helper->viewRenderer->setNoRender(true);
        if ($this->_autorBusiness->update($valueObject) == NULL) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

}
