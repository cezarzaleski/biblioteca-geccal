<?php

class Admin_TurmaController extends Core_Controller_Action {

    protected $_turmaBusiness;
    protected $_colaboradorBusiness;
    protected $_usuarioBusiness;
    protected $_cicloBusiness;
    protected $_colaboradorTurmaBusiness;

    public function init() {
        $this->_helper->cache(array('listar'), array('listaraction'));
        $this->_helper->cache(array('cadastrar'), array('cadastraraction'));
        $this->_helper->cache(array('editar'), array('editaraction'));
        $this->_turmaBusiness = new \Core\Models\Business\TurmaBusiness();
        $this->_colaboradorBusiness = new \Core\Models\Business\ColaboradorBusiness();
        $this->_usuarioBusiness = new \Core\Models\Business\UsuarioBusiness();
        $this->_cicloBusiness = new \Core\Models\Business\CicloBusiness();
        $this->_colaboradorTurmaBusiness = new \Core\Models\Business\ColaboradorTurmaBusiness();
        $this->view->criptografia = $this->_helper->Criptografia;
    }

    public function listarAction() {
        $page = $this->_getParam('page', 1);
        $form = new Admin_Form_Turma();
        
        $nuAno = date("Y");
        if ($this->getRequest()->get("ano")) {
            $nuAno = $this->getRequest()->get("ano");
        }
        $voTurma = $this->_turmaBusiness->findAll($nuAno);
        $this->view->form = $form->carregarAno($form, $nuAno);
        
        $paginator = $this->_helper->Paginator->paginator($voTurma, $page);
        $this->view->paginator = $paginator;
        $this->view->turma = $this->_helper->Turma;
        $this->view->update = $this->_helper->Autorizacao->verificaPermissao('editar');
        $this->view->delete = $this->_helper->Autorizacao->verificaPermissao('excluir');
    }

    public function cadastrarAction() {
        $nuAno = date("Y");
        $form = new Admin_Form_Turma();
        $voColaborador = $this->_colaboradorBusiness->findByColaboradorTurma($nuAno);
        $this->view->form = $form;
        $this->view->colaboradores = $voColaborador;

        if ($this->getRequest()->getPost("idCiclo")) {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();
            if ($this->getRequest()->isPost() && $form->isValid($_POST)) {
                $dtTimeInicio = new DateTime();
                $dtTimeFim = new DateTime();
                $sessionConfig = new Zend_Session_Namespace('config');
                $voTurma = new \Core\Entity\BibliotecaInfantil\Turma();
                $nuAno = date("Y");
                $voCiclo = $this->_cicloBusiness->find($this->_helper->Criptografia->descript($this->getRequest()->getPost("idCiclo")));
                $voUsuario = $this->_usuarioBusiness->find($this->_helper->Criptografia->descript($sessionConfig->idUsuario));

                $dtInicio = $this->getRequest()->getPost("dtInicio");
                $dtFim = $this->getRequest()->getPost("dtFim");
                $dtInicio = explode("/", $dtInicio);
                $dtFim = explode("/", $dtFim);

                $dtTimeInicio->setDate($dtInicio[2], $dtInicio[1], $dtInicio[0]);
                $dtTimeFim->setDate($dtFim[2], $dtFim[1], $dtFim[0]);

                $voTurma->setDtFim($dtTimeFim);
                $voTurma->setDtInicio($dtTimeInicio);
                $voTurma->setStAtivo(1);
                $voTurma->setIdCiclo($voCiclo);
                $voTurma->setIdUsuario($voUsuario);
                $voTurma->setNoObs($this->getRequest()->getPost("noObs"));
                $voTurma->setNuIdadeMaxima($this->getRequest()->getPost("nuIdadeMaxima"));
                $voTurma->setNuIdadeMinima($this->getRequest()->getPost("nuIdadeMinima"));
                $voTurma->setNuAno($nuAno);
                $this->novaTurma($voTurma, $this->getRequest()->getPost("colaboradores"));
            } else {
                echo 'false';
            }
        }
    }

    public function editarAction() {
        $request = $this->getRequest();
        $id = $request->getParam('id');
        $form = new Admin_Form_Turma();
        if ($id) {
            $voTurma = $this->_turmaBusiness->find($this->_helper->Criptografia->descript($id));
            $this->view->form = $form->editarTurmaForm($voTurma, $form, $id);
            $nuAno = date("Y");
            $this->view->colaboradores = $this->_colaboradorBusiness->findByColaboradorTurma($nuAno);
            $this->view->colaboradorTurma = $this->_colaboradorTurmaBusiness->findByColaboradorTurma($this->_helper->Criptografia->descript($id));
        }
        if ($request->getPost('idTurma')) {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();
            if ($this->getRequest()->isPost()) {
                $voTurma = $this->_turmaBusiness->find($this->_helper->Criptografia->descript($this->getRequest()->getPost("idTurma")));
                $voCiclo = $this->_cicloBusiness->find($this->_helper->Criptografia->descript($this->getRequest()->getPost("idCiclo")));
                $dtTimeInicio = new DateTime();
                $dtTimeFim = new DateTime();

                $dtInicio = $this->getRequest()->getPost("dtInicio");
                $dtFim = $this->getRequest()->getPost("dtFim");
                $dtInicio = explode("/", $dtInicio);
                $dtFim = explode("/", $dtFim);

                $dtTimeInicio->setDate($dtInicio[2], $dtInicio[1], $dtInicio[0]);
                $dtTimeFim->setDate($dtFim[2], $dtFim[1], $dtFim[0]);

                $voTurma->setDtFim($dtTimeFim);
                $voTurma->setDtInicio($dtTimeInicio);
                $voTurma->setIdCiclo($voCiclo);
                $voTurma->setNoObs($this->getRequest()->getPost("noObs"));
                $voTurma->setNuIdadeMaxima($this->getRequest()->getPost("nuIdadeMaxima"));
                $voTurma->setNuIdadeMinima($this->getRequest()->getPost("nuIdadeMinima"));

                $this->alterarTurma($voTurma, $this->getRequest()->getPost("colaboradores"));
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
                $voTurma = $this->_turmaBusiness->find($this->_helper->Criptografia->descript($val));
                $voTurma->setStAtivo(0);
                
                if ($this->_turmaBusiness->update($voTurma) != NULL) {
                    echo 'false';
                    exit();
                }
                foreach ($this->_colaboradorTurmaBusiness->findByColaboradorTurma($voTurma->getIdTurma()) as $val) {
                    $voColTurma = $this->_colaboradorTurmaBusiness->find($val->getIdColaboradorTurma());
                    $voColTurma->setStAtivo(0);
                    if ($this->_colaboradorTurmaBusiness->update($voColTurma) != NULL) {
                        echo 'false';
                        exit();
                    }
                }
            }
            echo 'true';
        }
    }

    private function novaTurma(\Core\Entity\BibliotecaInfantil\Turma $valueObject, $colaboradores) {
        $this->_helper->viewRenderer->setNoRender(true);
        if ($this->_turmaBusiness->save($valueObject) == NULL) {
            $turma = $this->_turmaBusiness->findByTurmaAno($valueObject->getIdCiclo()->getIdCiclo(), $valueObject->getNuAno());
            foreach ($colaboradores as $val) {
                $voColaboradorTurma = new \Core\Entity\BibliotecaInfantil\ColaboradorTurma();
                $voColaborador = $this->_colaboradorBusiness->find($this->_helper->Criptografia->descript($val));

                $date = new \DateTime('now');
                $voColaboradorTurma->setDataCadastro($date);
                $voColaboradorTurma->setIdColaborador($voColaborador);
                $voColaboradorTurma->setIdTurma($turma[0]);
                $voColaboradorTurma->setIdUsuario($valueObject->getIdUsuario());
                $voColaboradorTurma->setStAtivo(1);
                if ($this->_colaboradorTurmaBusiness->save($voColaboradorTurma) != NULL) {
                    echo "false";
                    exit();
                }
            }
            echo 'true';
        } else {
            echo 'false';
        }
    }

    private function alterarTurma(\Core\Entity\BibliotecaInfantil\Turma $valueObject, $colaboradores) {
        $this->_helper->viewRenderer->setNoRender(true);
        if ($this->_turmaBusiness->update($valueObject) == NULL) {
            $colAtual = $this->_colaboradorTurmaBusiness->findByColaboradorTurma($valueObject->getIdTurma());
            foreach ($colAtual as $val) {
                $voColaTurma = $this->_colaboradorTurmaBusiness->find($val->getIdColaboradorTurma());
                if ($this->_colaboradorTurmaBusiness->delete($voColaTurma) != NULL) {
                    echo "false";
                    exit();
                }
            }
            foreach ($colaboradores as $val) {
                $voColaboradorTurma = new \Core\Entity\BibliotecaInfantil\ColaboradorTurma();
                $voColaborador = $this->_colaboradorBusiness->find($this->_helper->Criptografia->descript($val));

                $date = new \DateTime('now');
                $voColaboradorTurma->setDataCadastro($date);
                $voColaboradorTurma->setIdColaborador($voColaborador);
                $voColaboradorTurma->setIdTurma($valueObject);
                $voColaboradorTurma->setIdUsuario($valueObject->getIdUsuario());
                $voColaboradorTurma->setStAtivo(1);
                if ($this->_colaboradorTurmaBusiness->save($voColaboradorTurma) != NULL) {
                    echo "false";
                    exit();
                }
            }
            echo "true";
        } else {
            echo 'false';
        }
    }

}