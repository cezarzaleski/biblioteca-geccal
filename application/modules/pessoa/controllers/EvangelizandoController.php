<?php

class Pessoa_EvangelizandoController extends Core_Controller_Action {

    protected $_evangelizandoBusiness;
    protected $_evangelizandoTurmaBusiness;
    protected $_turmaBusiness;
    protected $_usuarioBusiness;

    public function init() {
        $this->_helper->cache(array('listar'), array('listaraction'));
        $this->_helper->cache(array('cadastrar'), array('cadastraraction'));
        $this->_helper->cache(array('editar'), array('editaraction'));
        $this->_evangelizandoBusiness = new \Core\Models\Business\EvangelizandoBusiness();
        $this->_evangelizandoTurmaBusiness = new \Core\Models\Business\EvangelizandoTurmaBusiness();
        $this->_turmaBusiness = new \Core\Models\Business\TurmaBusiness();
        $this->_usuarioBusiness = new \Core\Models\Business\UsuarioBusiness();
    }

    public function listarAction() {
        $page = $this->_getParam('page', 1);
        $voEvangelizando = $this->_evangelizandoBusiness->findAll();
        $paginator = $this->_helper->Paginator->paginator($voEvangelizando, $page,15);
        $this->view->paginator = $paginator;
        $this->view->update = $this->_helper->Autorizacao->verificaPermissao('editar');
        $this->view->delete = $this->_helper->Autorizacao->verificaPermissao('excluir');
        $this->view->criptografia = $this->_helper->Criptografia;
        if ($this->getRequest()->get("id")) {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();
            $voEvangelizando = $this->_evangelizandoBusiness->find($this->_helper->Criptografia->descript($this->getRequest()->get("id")));

            echo $this->visualizarEvangelizando($voEvangelizando);
        }
    }

    public function cadastrarAction() {
        $form = new Pessoa_Form_Evangelizando();
        $this->view->form = $form;

        if ($this->getRequest()->getPost("noEvangelizando")) {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();
            if ($this->getRequest()->isPost() && $form->isValid($_POST)) {
                $voEvangelizando = new \Core\Entity\BibliotecaInfantil\Evangelizando();
                $date = new \DateTime('now');
				
				

                $voEvangelizando->setNoEvangelizando($this->getRequest()->getPost("noEvangelizando"));
                $voEvangelizando->setNoPai($this->getRequest()->getPost("noPai"));
                $voEvangelizando->setNoMae($this->getRequest()->getPost("noMae"));
                $voEvangelizando->setNuCep($this->getRequest()->getPost("nuCep"));
                $voEvangelizando->setNoEndereco($this->getRequest()->getPost("noEndereco"));
                $voEvangelizando->setNoBairro($this->getRequest()->getPost("noBairro"));
                $voEvangelizando->setNoCidade($this->getRequest()->getPost("noCidade"));
                $voEvangelizando->setNuFoneRes($this->getRequest()->getPost("nuFoneRes"));
                $voEvangelizando->setNuFoneCel($this->getRequest()->getPost("nuFoneCel"));
                $voEvangelizando->setNoSexo($this->getRequest()->getPost("noSexo"));
                $voEvangelizando->setStAtivo(1);
                $voEvangelizando->setDtCadastro($date);
                $dtNascimento = $this->getRequest()->getPost("dtNascimento");
                if ($dtNascimento) {
                    $dateNasc = new \DateTime();
                    $dtNascimento = explode("/", $dtNascimento);
                    $dateNasc->setDate($dtNascimento[2], $dtNascimento[1], $dtNascimento[0]);
                    $voEvangelizando->setDtNascimento($dateNasc);
                }
                $this->novoEvangelizando($voEvangelizando, $this->_helper->Criptografia->descript($this->getRequest()->getPost("idCiclo")));
            } else {
                echo 'false';
            }
        }
    }

    public function editarAction() {
        $request = $this->getRequest();
        $id = $request->getParam('id');
        $form = new Pessoa_Form_Evangelizando();
        if ($id) {
            $voEvangelizando = $this->_evangelizandoBusiness->find($this->_helper->Criptografia->descript($id));
            $this->view->form = $form->editarEvangelizandoForm($voEvangelizando, $form, $id);
        }
        if ($request->getPost('idEvangelizando')) {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();
            if ($this->getRequest()->isPost() && $form->isValid($_POST)) {
                $voEvangelizando = $this->_evangelizandoBusiness->find($this->_helper->Criptografia->descript($this->getRequest()->getPost("idEvangelizando")));

                $voEvangelizando->setNoEvangelizando($this->getRequest()->getPost("noEvangelizando"));
                $voEvangelizando->setNoPai($this->getRequest()->getPost("noPai"));
                $voEvangelizando->setNoMae($this->getRequest()->getPost("noMae"));
                $voEvangelizando->setNuCep($this->getRequest()->getPost("nuCep"));
                $voEvangelizando->setNoEndereco($this->getRequest()->getPost("noEndereco"));
                $voEvangelizando->setNoBairro($this->getRequest()->getPost("noBairro"));
                $voEvangelizando->setNoCidade($this->getRequest()->getPost("noCidade"));
                $voEvangelizando->setNuFoneRes($this->getRequest()->getPost("nuFoneRes"));
                $voEvangelizando->setNuFoneCel($this->getRequest()->getPost("nuFoneCel"));
                $voEvangelizando->setNoSexo($this->getRequest()->getPost("noSexo"));

                $dtNascimento = $this->getRequest()->getPost("dtNascimento");
                if ($dtNascimento) {
                    $dateNasc = new \DateTime();
                    $dtNascimento = explode("/", $dtNascimento);
                    $dateNasc->setDate($dtNascimento[2], $dtNascimento[1], $dtNascimento[0]);
                    $voEvangelizando->setDtNascimento($dateNasc);
                }

                $this->alterarEvangelizando($voEvangelizando);
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
                $voEvangelizando = $this->_evangelizandoBusiness->find($this->_helper->Criptografia->descript($val));
                $voEvangelizando->setStAtivo(0);
                if ($this->_evangelizandoBusiness->update($voEvangelizando) != NULL) {
                    echo 'false';
                    exit();
                }
            }
            echo 'true';
        }
    }

    private function novoEvangelizando(\Core\Entity\BibliotecaInfantil\Evangelizando $valueObject, $idCiclo) {
        $this->_helper->viewRenderer->setNoRender(true);
        if ($this->_evangelizandoBusiness->save($valueObject) == NULL) {
            if ($idCiclo) {
                $voEvangelizando = $this->_evangelizandoBusiness->findByUltEvangelizando();
                $voEvanTurma = new \Core\Entity\BibliotecaInfantil\EvangelizandoTurma();
                $voTurma = $this->_turmaBusiness->find($idCiclo);
                $date = new \DateTime('now');
                $sessionConfig = new Zend_Session_Namespace('config');
                $voUsuario = $this->_usuarioBusiness->find($this->_helper->Criptografia->descript($sessionConfig->idUsuario));

                $voEvanTurma->setIdEvangelizando($voEvangelizando[0]);
                $voEvanTurma->setDtCadastro($date);
                $voEvanTurma->setIdTurma($voTurma);
                $voEvanTurma->setIdUsuario($voUsuario);
                $voEvanTurma->setStAtivo(1);
                if ($this->_evangelizandoTurmaBusiness->save($voEvanTurma) == NULL) {
                    echo 'true';
                } else {
                    echo 'false';
                }
            } else {
                echo "true";
            }
        } else {
            echo 'false';
        }
    }

    private function alterarEvangelizando(\Core\Entity\BibliotecaInfantil\Evangelizando $valueObject) {
        $this->_helper->viewRenderer->setNoRender(true);
        if ($this->_evangelizandoBusiness->update($valueObject) == NULL) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    private function visualizarEvangelizando(\Core\Entity\BibliotecaInfantil\Evangelizando $valueObject) {
        $this->_helper->viewRenderer->setNoRender(true);
        $table = "<table class'tabela'><tbody>";
        $dataNascimento = "";
        if ($valueObject->getDtNascimento()) {
            $dataNascimento = $valueObject->getDtNascimento()->format("d/m/Y");
        }
        $table .= "
			<tr><td>Nome</td><td>{$valueObject->getNoEvangelizando()}</td></tr>
                    	<tr><td>Nome Pai</td><td>{$valueObject->getNoPai()}</td></tr>
			<tr><td>Nome Mãe</td><td>{$valueObject->getNoMae()}</td></tr>
                        <tr><td>Endereço</td><td>{$valueObject->getNoEndereco()}</td></tr>
			<tr><td>Bairro</td><td>{$valueObject->getNoBairro()}</td></tr>
			<tr><td>CEP</td><td>{$valueObject->getNuCep()}</td></tr>
			<tr><td>Cidade</td><td>{$valueObject->getNoCidade()}</td></tr>
			<tr><td>Telefone</td><td>{$valueObject->getNuFoneRes()}</td></tr>
			<tr><td>Telefone 2</td><td>{$valueObject->getNuFoneCel()}</td></tr>
			<tr><td>Sexo</td><td>{$valueObject->getNoSexo()}</td></tr>
                        <tr><td>Data Nascimento</td><td>{$dataNascimento}</td></tr></tbody></table>";
        return $table;
    }

}