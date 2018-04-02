<?php

class Pessoa_MatriculaController extends Core_Controller_Action {

    protected $_turmaBusiness;
    protected $_evangelizandoBusiness;
    protected $_usuarioBusiness;
    protected $_evangelizandoTurmaBusiness;

    public function init() {
        $this->_helper->cache(array('listar'), array('listaraction'));
        $this->_helper->cache(array('cadastrar'), array('cadastraraction'));
        $this->_helper->cache(array('editar'), array('editaraction'));
        $this->_turmaBusiness = new \Core\Models\Business\TurmaBusiness();
        $this->_evangelizandoBusiness = new \Core\Models\Business\EvangelizandoBusiness();
        $this->_usuarioBusiness = new \Core\Models\Business\UsuarioBusiness();
        $this->_evangelizandoTurmaBusiness = new \Core\Models\Business\EvangelizandoTurmaBusiness();
        $this->view->criptografia = $this->_helper->Criptografia;
        $this->view->update = $this->_helper->Autorizacao->verificaPermissao('editar');
        $this->view->delete = $this->_helper->Autorizacao->verificaPermissao('excluir');
    }

    public function listarAction() {
        $page = $this->_getParam('page', 1);
        $form = new Pessoa_Form_Matricula();
        $nuAno = date("Y");
        $turma = "";
        if ($this->getRequest()->get("ano")) {
            $nuAno = $this->getRequest()->get("ano");
        }
        if ($this->getRequest()->get("turma")) {
            $turma = $this->getRequest()->get("turma");
        }
        $this->view->form = $form->carregarAno($form, $nuAno,$turma);

        if ($this->getRequest()->get("turma") || $nuAno == "all") {
            if($this->getRequest()->get("turma")){
                $voEvangelizandoTurma = $this->_evangelizandoTurmaBusiness->findByEvangelizandoTurma($this->_helper->Criptografia->descript($this->getRequest()->get("turma")));
            }else if($nuAno == "all"){
                $voEvangelizandoTurma = $this->_evangelizandoTurmaBusiness->findAll();
            }
            
            $paginator = $this->_helper->Paginator->paginator($voEvangelizandoTurma, $page,20);
            $this->view->paginator = $paginator;
        }
    }

    public function cadastrarAction() {
        if ($this->getRequest()->getPost("method") == "turma") {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();
            $voTurma = $this->_turmaBusiness->findAll(date("Y"));
            if ($voTurma) {
                $form = '<form class="form" id="matricular">
                         <fieldset>
                         <label>Turma</label>
                         <select name="turma" id="turma">
                         <option value="">Selecione...</option>';
                foreach ($voTurma as $val) {
                    $form.='<option value="' . $this->_helper->Criptografia->cripto($val->getIdTurma()) . '">' . $val->getIdCiclo()->getNoCiclo() . '</option>';
                }
                $form.="</select></fieldset></form>";
                echo $form;
            } else {
                echo "Por favor, cadastre turmas para o ano de " . date("Y");
            }
        }if ($this->getRequest()->getPost("method") == "matricular") {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();
            $code = $this->getRequest()->getPost("code");
            $idTurma = $this->getRequest()->getPost("idTurma");
            echo $this->novaMatricula($code, $idTurma);
        } else {
            $page = $this->_getParam('page', 1);
            $voEvangelizando = $this->_evangelizandoBusiness->findByEvangelizandoTurma(NULL, NULL, date("Y"));
//             $voEvangelizando = $this->_evangelizandoBusiness->findByEvangelizandoTurma(NULL, NULL, 2012);
            $paginator = $this->_helper->Paginator->paginator($voEvangelizando, $page, 50);
            $this->view->paginator = $paginator;
        }
    }

    public function editarAction() {
        $request = $this->getRequest();
        $id = $request->getParam('id');
        $form = new Pessoa_Form_Matricula();
        if ($id) {
            $voEvanTurma = $this->_evangelizandoTurmaBusiness->find($this->_helper->Criptografia->descript($id));
            $this->view->form = $form->editarMatriculaForm($voEvanTurma, $form, $id);
        }
        if ($request->getPost('idEvangTurma')) {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();
            if ($this->getRequest()->isPost()) {
                $voEvanTurma = $this->_evangelizandoTurmaBusiness->find($this->_helper->Criptografia->descript($this->getRequest()->getPost("idEvangTurma")));
                $voTurma = $this->_turmaBusiness->find($this->_helper->Criptografia->descript($this->getRequest()->getPost("idTurma")));
                $voEvanTurma->setIdTurma($voTurma);

                $this->alterarMatricula($voEvanTurma);
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
                $voEvanTurma = $this->_evangelizandoTurmaBusiness->find($this->_helper->Criptografia->descript($val));
                $voEvanTurma->setStAtivo(0);
                if ($this->_evangelizandoTurmaBusiness->update($voEvanTurma) != NULL) {
                    echo 'false';
                    exit();
                }
            }
            echo 'true';
        }
    }

    private function novaMatricula($code, $idTurma) {
        $this->_helper->viewRenderer->setNoRender(true);

        if ($code) {
            foreach ($code as $val) {
                $voEvaTurma = new \Core\Entity\BibliotecaInfantil\EvangelizandoTurma();
                $sessionConfig = new Zend_Session_Namespace('config');
                $voTurma = $this->_turmaBusiness->find($this->_helper->Criptografia->descript($idTurma));
                $voEvangelizando = $this->_evangelizandoBusiness->find($this->_helper->Criptografia->descript($val));
                $voUsuario = $this->_usuarioBusiness->find($this->_helper->Criptografia->descript($sessionConfig->idUsuario));
                $date = new \DateTime('now');

                $voEvaTurma->setStAtivo(1);
                $voEvaTurma->setDtCadastro($date);
                $voEvaTurma->setIdTurma($voTurma);
                $voEvaTurma->setIdEvangelizando($voEvangelizando);
                $voEvaTurma->setIdUsuario($voUsuario);

                if ($this->_evangelizandoTurmaBusiness->save($voEvaTurma) != NULL) {
                    echo 'false';
                    exit();
                }
            }
            echo "true";
        } else {
            echo "false";
        }
    }

    private function alterarMatricula(\Core\Entity\BibliotecaInfantil\EvangelizandoTurma $valueObject) {
        $this->_helper->viewRenderer->setNoRender(true);
        if ($this->_evangelizandoTurmaBusiness->update($valueObject) == NULL) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    private function carregarEvangelizando($idTurma, $nuAno, $idade) {
        $voTurma = $this->_turmaBusiness->find($idTurma);
        if ($idade) {
            $idadeMinima = $voTurma->getNuIdadeMinima();
            $idadeMaxima = $voTurma->getNuIdadeMaxima();
            $dtIdadeMinima = ($nuAno - $idadeMinima) . "-12-31'";
            $dtIdadeMaxima = ($nuAno - $idadeMaxima) . "-12-31";
            $voEvangelizando = $this->_evangelizandoBusiness->findByEvangelizandoTurma($dtIdadeMinima, $dtIdadeMaxima, $nuAno);
        } else {
            $voEvangelizando = $this->_evangelizandoBusiness->findByEvangelizandoTurma(FALSE, FALSE, $nuAno);
        }
        $option = "<option selected value=''>Selecione...</option>";

        if ($voEvangelizando) {

            foreach ($voEvangelizando as $val) {
                echo $val['idEvangelizando'];
                $option.="<option value='{$this->_helper->Criptografia->cripto($val['idEvangelizando'])}'>{$val['noEvangelizando']}</option>";
            }
        }
        echo $option;
    }

}
