<?php

class Pessoa_ColaboradorController extends Core_Controller_Action {

    protected $_colaboradorBusiness;
    protected $_funcaoAtividadeBusiness;

    public function init() {
        $this->_helper->cache(array('listar'), array('listaraction'));
        $this->_helper->cache(array('cadastrar'), array('cadastraraction'));
        $this->_helper->cache(array('editar'), array('editaraction'));
        $this->_colaboradorBusiness = new \Core\Models\Business\ColaboradorBusiness();
        $this->_funcaoAtividadeBusiness = new \Core\Models\Business\FuncaoAtividadeBusiness();
    }

    public function listarAction() {
        $page = $this->_getParam('page', 1);
        $voEditora = $this->_colaboradorBusiness->findAll();
        $paginator = $this->_helper->Paginator->paginator($voEditora, $page);
        $this->view->paginator = $paginator;
        $this->view->tabela = $voEditora;
        $this->view->update = $this->_helper->Autorizacao->verificaPermissao('editar');
        $this->view->delete = $this->_helper->Autorizacao->verificaPermissao('excluir');
        $this->view->criptografia = $this->_helper->Criptografia;
        if ($this->getRequest()->get("id")) {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();
            $voColaborador = $this->_colaboradorBusiness->find($this->_helper->Criptografia->descript($this->getRequest()->get("id")));

            echo $this->visualizarColaborador($voColaborador);
        }
    }

    public function cadastrarAction() {
        $form = new Pessoa_Form_Colaborador();
        $this->view->form = $form;

        if ($this->getRequest()->getPost("noColaborador")) {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();
            if ($this->getRequest()->isPost() && $form->isValid($_POST)) {
                $voColaborador = new \Core\Entity\BibliotecaInfantil\Colaborador();
                $voFuncaoAtividade = $this->_funcaoAtividadeBusiness->find($this->_helper->Criptografia->descript($this->getRequest()->getPost("idFuncionalidade")));

                $date = new \DateTime('now');

                $voColaborador->setNoColaborador($this->getRequest()->getPost("noColaborador"));
                $voColaborador->setNoEmail($this->getRequest()->getPost("noEmail"));
                $voColaborador->setNuCep($this->getRequest()->getPost("nuCep"));
                $voColaborador->setNoEndereco($this->getRequest()->getPost("endereco"));
                $voColaborador->setNoBairro($this->getRequest()->getPost("bairro"));
                $voColaborador->setNoCidade($this->getRequest()->getPost("cidade"));
                $voColaborador->setNuFoneRes($this->getRequest()->getPost("nuFoneRes"));
                $voColaborador->setNuFoneCel($this->getRequest()->getPost("nuFoneCel"));
                $voColaborador->setNoSexo($this->getRequest()->getPost("noSexo"));
                $voColaborador->setIdFunc($voFuncaoAtividade);
                $voColaborador->setStAtivo(1);
                $voColaborador->setDtCadastro($date);
                $this->novoColaborador($voColaborador);
            } else {
                echo 'false';
            }
        }
    }

    public function editarAction() {
        $request = $this->getRequest();
        $id = $request->getParam('id');
        $form = new Pessoa_Form_Colaborador();
        if ($id) {
            $voColaborador = $this->_colaboradorBusiness->find($this->_helper->Criptografia->descript($id));
            $this->view->form = $form->editarColaboradorForm($voColaborador, $form, $id);
        }
        if ($request->getPost('noColaborador')) {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();
            if ($this->getRequest()->isPost() && $form->isValid($_POST)) {
                $voFuncaoAtividade = $this->_funcaoAtividadeBusiness->find($this->_helper->Criptografia->descript($this->getRequest()->getPost("idFuncionalidade")));

                $voColaborador = $this->_colaboradorBusiness->find($this->_helper->Criptografia->descript($this->getRequest()->getPost("idColaborador")));
                $voColaborador->setNoColaborador($this->getRequest()->getPost("noColaborador"));
                $voColaborador->setNoEmail($this->getRequest()->getPost("noEmail"));
                $voColaborador->setNuCep($this->getRequest()->getPost("nuCep"));
                $voColaborador->setNoEndereco($this->getRequest()->getPost("noEndereco"));
                $voColaborador->setNoBairro($this->getRequest()->getPost("noBairro"));
                $voColaborador->setNoCidade($this->getRequest()->getPost("noCidade"));
                $voColaborador->setNuFoneRes($this->getRequest()->getPost("nuFoneRes"));
                $voColaborador->setNuFoneCel($this->getRequest()->getPost("nuFoneCel"));
                $voColaborador->setNoSexo($this->getRequest()->getPost("noSexo"));
                $voColaborador->setIdFunc($voFuncaoAtividade);
                $this->alterarColaborador($voColaborador);
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
                $voColaborador = $this->_colaboradorBusiness->find($this->_helper->Criptografia->descript($val));
                $voColaborador->setStAtivo(0);
                if ($this->_colaboradorBusiness->update($voColaborador) != NULL) {
                    echo 'false';
                    exit();
                }
            }
            echo 'true';
        }
    }

    private function novoColaborador(\Core\Entity\BibliotecaInfantil\Colaborador $valueObject) {
        $this->_helper->viewRenderer->setNoRender(true);
        if ($this->_colaboradorBusiness->save($valueObject) == NULL) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    private function alterarColaborador(\Core\Entity\BibliotecaInfantil\Colaborador $valueObject) {
        $this->_helper->viewRenderer->setNoRender(true);
        if ($this->_colaboradorBusiness->update($valueObject) == NULL) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    private function visualizarColaborador(\Core\Entity\BibliotecaInfantil\Colaborador $valueObject) {
        $this->_helper->viewRenderer->setNoRender(true);
        $table = "<table class'tabela'><tbody>";

        $table .= "
			<tr><td class='label'>Nome: </td><td>{$valueObject->getNoColaborador()}</td></tr>
                    	<tr><td class='label'>Email: </td><td>{$valueObject->getNoEmail()}</td></tr>
			<tr><td class='label'>Endereço: </td><td>{$valueObject->getNoEndereco()}</td></tr>
			<tr><td class='label'>Bairro: </td><td>{$valueObject->getNoBairro()}</td></tr>
			<tr><td class='label'>CEP: </td><td>{$valueObject->getNuCep()}</td></tr>
			<tr><td class='label'>Cidade: </td><td>{$valueObject->getNoCidade()}</td></tr>
			<tr><td class='label'>Telefone: </td><td>{$valueObject->getNuFoneRes()}</td></tr>
			<tr><td class='label'>Celular: </td><td>{$valueObject->getNuFoneCel()}</td></tr>
			<tr><td class='label'>Sexo: </td><td>{$valueObject->getNoSexo()}</td></tr>
			<tr><td class='label'>Função: </td><td>{$valueObject->getIdFunc()->getNoFuncao()}</td></tr></tbody></table>";


        return $table;
    }

}