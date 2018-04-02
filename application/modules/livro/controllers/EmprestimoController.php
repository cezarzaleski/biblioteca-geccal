<?php

class Livro_EmprestimoController extends Core_Controller_Action {

    protected $_emprestimoBusiness;
    protected $_evangelizandoTurmaBusiness;
    protected $_evangelizandoBusiness;
    protected $_colaboradorBusiness;
    protected $_livroBusiness;
    protected $_usuarioBusiness;
    protected $_turmaBusiness;

    public function init() {
        $this->_helper->cache(array('listar'), array('listaraction'));
        $this->_helper->cache(array('cadastrar'), array('cadastraraction'));
        $this->_helper->cache(array('editar'), array('editaraction'));
        $this->_emprestimoBusiness = new \Core\Models\Business\EmprestimoBusiness();
        $this->_evangelizandoTurmaBusiness = new \Core\Models\Business\EvangelizandoTurmaBusiness();
        $this->_evangelizandoBusiness = new \Core\Models\Business\EvangelizandoBusiness();
        $this->_colaboradorBusiness = new \Core\Models\Business\ColaboradorBusiness();
        $this->_livroBusiness = new \Core\Models\Business\LivroBusiness();
        $this->_usuarioBusiness = new \Core\Models\Business\UsuarioBusiness();
        $this->_turmaBusiness = new \Core\Models\Business\TurmaBusiness();
        $this->view->criptografia = $this->_helper->Criptografia;
    }

    public function listarAction() {
        $page = $this->_getParam('page', 1);
        $form = new Livro_Form_Emprestimo();
        $opDefault = "evangelizando";
        if ($this->getRequest()->get("opcao")) {
            $form->getElement("opcao")->setValue($this->getRequest()->get("opcao"));
        }

        if ($this->getRequest()->getPost("method") == "findEvangelizando") {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();
            $this->findEvangelizando($this->getRequest()->getPost("idTurma"),"listar");
        } else if ($this->getRequest()->getPost("method") == "findTurma") {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();
            $this->findTurma($this->getRequest()->getPost("nuAno"));
        } else if ($this->getRequest()->get("method") == "findExemplar") {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();
            $this->findExemplar($this->getRequest()->getPost("idLivro"), "all");
        } else if ($this->getRequest()->get("method") == "listar") {
            $opcao = $this->getRequest()->get('opcao');
            $stEmprestimo = $this->getRequest()->get('emprestimo');
            if ($opcao == "evangelizando") {
                $origem = $this->getRequest()->get('origem');
                $idEvangelizando = $this->_helper->Criptografia->descript($this->getRequest()->get("evangelizando"));
                if ($origem) {
                    $voEvangTurma = $this->_evangelizandoTurmaBusiness->find($idEvangelizando);
                    $idEvangelizando = $voEvangTurma->getIdEvangelizando()->getIdEvangelizando();
                }
                $form->getElement('opcao')->setValue("evangelizando");
                $idTurma = $this->_helper->Criptografia->descript($this->getRequest()->get("turma"));
                $nuAno = $this->getRequest()->get("ano");
                $paginator = $this->_helper->Paginator->paginator($this->_emprestimoBusiness->findByEmprestimoEvangelizando($idEvangelizando, $idTurma, $nuAno, $stEmprestimo), $page, 30);
                $this->view->paginatorEvangelizando = $paginator;
            } else if ($opcao == "colaborador") {
                $form->getElement('opcao')->setValue("colaborador");
                $opDefault = "evangelizando";
                $idColaborador = $this->_helper->Criptografia->descript($this->getRequest()->get("colaborador"));
                $nuAno = $this->getRequest()->get("ano");
                $paginator = $this->_helper->Paginator->paginator($this->_emprestimoBusiness->findByEmprestimoColaborador($idColaborador, $nuAno, $stEmprestimo), $page, 30);
                $this->view->paginatorColaborador = $paginator;
            } else if ($opcao == "livro") {
                $form->getElement('opcao')->setValue("livro");
                $opDefault = "evangelizando";
                $idLivro = $this->_helper->Criptografia->descript($this->getRequest()->get("exemplar"));
                $noLivro = $this->getRequest()->get("livro");
                $paginator = $this->_helper->Paginator->paginator($this->_livroBusiness->findByLivroEmprestado($idLivro, $noLivro, $stEmprestimo), $page, 10000);
                $this->view->paginatorLivro = $paginator;
            }
            $this->view->update = $this->_helper->Autorizacao->verificaPermissao('editar');
            $this->view->delete = $this->_helper->Autorizacao->verificaPermissao('excluir');
        }
        $form = $form->newComboEvangelizando($form);
        $this->view->form = $form->stLivro($form, "emprestado");
        $this->view->opcao = $opDefault;
    }

    public function cadastrarAction() {
        $form = new Livro_Form_Emprestimo();
        $this->view->form = $form;
        $form->getElement("opcao")->removeMultiOPtion("livro");

        if ($this->getRequest()->getPost("method") == "findEvangelizando") {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();
            $this->findEvangelizando($this->getRequest()->getPost("idTurma"),"cadastrar");
        } else if ($this->getRequest()->getPost("method") == "findExemplar") {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();
            $this->findExemplar($this->getRequest()->getPost("noLivro"), "emprestar");
        } else if ($this->getRequest()->getPost("method") == "findPendencia") {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();
            $opcao = $this->getRequest()->getPost("opcao");
            $id = $this->_helper->Criptografia->descript($this->getRequest()->getPost("id"));

            if ($opcao == "evangelizando") {
                $voEvangelizando = $this->_evangelizandoTurmaBusiness->find($id);
                $voEmprestimo = $this->_emprestimoBusiness->findByPendencia($voEvangelizando->getIdEvangelizando(), $opcao);
            } else {
                $voEmprestimo = $this->_emprestimoBusiness->findByPendencia($id, $opcao);
            }
            
            $contEmprestimo = count($voEmprestimo);
            foreach ($voEmprestimo as $val) {
            	if($val['nuAno'] != date("Y")){
            		$contEmprestimo = -1;
            	}
            }
            echo $contEmprestimo;
        } else if ($this->getRequest()->getPost("method") == "save") {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();

            if ($this->getRequest()->isPost()) {
                $dtEmprestimo = new DateTime();
                $dtPrevDevolucao = new DateTime();
                $opcao = $this->getRequest()->getPost("opcao");
                $sessionConfig = new Zend_Session_Namespace('config');
                $voLivro = $this->_livroBusiness->find($this->_helper->Criptografia->descript($this->getRequest()->getPost("nuExemplar")));
                $voUsuario = $this->_usuarioBusiness->find($this->_helper->Criptografia->descript($sessionConfig->idUsuario));
                $dtEmp = $this->getRequest()->getPost("dtEmprestimo");
/*var_dump($this->getRequest()->getPost());
exit;*/
                $dtPrevEmp = $this->getRequest()->getPost("dtPrevDevolucao");
                $dtEmp = explode("/", $dtEmp);
                $dtPrevEmp = explode("/", $dtPrevEmp);
                $dtEmprestimo->setDate($dtEmp[2], $dtEmp[1], $dtEmp[0]);
                $dtPrevDevolucao->setDate($dtPrevEmp[2], $dtPrevEmp[1], $dtPrevEmp[0]);



                $voEmprestimo = new \Core\Entity\BibliotecaInfantil\Emprestimo();
                $voEmprestimo->setStAtivo(1);
                $voEmprestimo->setIdUsuario($voUsuario);
                $voEmprestimo->setDtEmprestimo($dtEmprestimo);
                $voEmprestimo->setDtPrevDevolucao($dtPrevDevolucao);
                $voEmprestimo->setIdLivro($voLivro);
                $voEmprestimo->setNuAno($dtEmp[2]);

                if ($opcao == "evangelizando") {
                    $voEvangelizandoTurma = $this->_evangelizandoTurmaBusiness->find($this->_helper->Criptografia->descript($this->getRequest()->getPost("noEvangelizando")));
                    $voEmprestimo->setIdEvangelizandoTurma($voEvangelizandoTurma);
                } elseif ($opcao == "colaborador") {
                    $voColaborador = $this->_colaboradorBusiness->find($this->_helper->Criptografia->descript($this->getRequest()->getPost("idColaborador")));
                    $voEmprestimo->setIdColaborador($voColaborador);
                }
                if ($this->_emprestimoBusiness->save($voEmprestimo) == NULL) {
                    echo 'true';
                } else {
                    echo 'false';
                }
            } else {
                echo 'false';
            }
        }
    }

    public function editarAction() {
        $request = $this->getRequest();
        $id = $request->getParam('id');
        $form = new Livro_Form_Emprestimo();
        if ($id) {
            $voEmprestimo = $this->_emprestimoBusiness->find($this->_helper->Criptografia->descript($id));
            $this->view->form = $form->editarEmprestimoForm($voEmprestimo, $form, $id);
        }

        if ($request->getPost('method') == "findExemplar") {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();
            $this->findExemplar($this->getRequest()->getPost("noLivro"), "emprestar");
        }
        if ($request->getPost('method') == "devolucao") {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();
            $opcao = $request->getPost('opcao');
            $code = $this->getRequest()->getPost("code");
            $dtDevolucao = $this->getRequest()->getPost("dtDevolucao");
            $dtDevolucao = explode("/", $dtDevolucao);
            $date = new \DateTime();
            $date->setDate($dtDevolucao[2], $dtDevolucao[1], $dtDevolucao[0]);

            foreach ($code as $val) {
                $voEmpprestimo = $this->_emprestimoBusiness->find($this->_helper->Criptografia->descript($val));
                $voEmpprestimo->setDtDevolucao($date);
                if ($this->_emprestimoBusiness->update($voEmpprestimo) != NULL) {
                    echo 'false';
                    exit();
                }
            }
            echo "true";
        } else if ($request->getPost('opcao')) {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();
            $opcao = $request->getPost('opcao');
            $voLivro = $this->_livroBusiness->find($this->_helper->Criptografia->descript($request->getPost("nuExemplar")));
            $dtPrevEmp = $this->getRequest()->getPost("dtPrevDevolucao");
            $dtEmp = $this->getRequest()->getPost("dtEmprestimo");
            $dtPrevEmp = explode("/", $dtPrevEmp);
            $dtEmp = explode("/", $dtEmp);
            $dtPrevDevolucao = new DateTime();
            $dtEmprestimo = new DateTime();
            $dtPrevDevolucao->setDate($dtPrevEmp[2], $dtPrevEmp[1], $dtPrevEmp[0]);
            $dtEmprestimo->setDate($dtEmp[2], $dtEmp[1], $dtEmp[0]);

            $voEmprestimo = $this->_emprestimoBusiness->find($this->_helper->Criptografia->descript($request->getPost("idEmprestimo")));
            if ($voLivro) {
                $voEmprestimo->setIdLivro($voLivro);
            }
            $voEmprestimo->setDtPrevDevolucao($dtPrevDevolucao);
            $voEmprestimo->setDtEmprestimo($dtEmprestimo);
            $this->alterarEmprestimo($voEmprestimo);
        }
    }

    public function excluirAction() {
        $this->_helper->viewRenderer->setNoRender(true);
        $this->_helper->layout()->disableLayout();

        if ($this->getRequest()->isPost()) {
            $code = $this->getRequest()->getPost("code");
            foreach ($code as $val) {
                $voEmprestimo = $this->_emprestimoBusiness->find($this->_helper->Criptografia->descript($val));
                $voEmprestimo->setStAtivo(0);
                if ($this->_emprestimoBusiness->update($voEmprestimo) != NULL) {
                    echo 'false';
                    exit();
                }
            }
            echo 'true';
        }
    }

    private function alterarEmprestimo(\Core\Entity\BibliotecaInfantil\Emprestimo $valueObject) {
        $this->_helper->viewRenderer->setNoRender(true);
        if ($this->_emprestimoBusiness->update($valueObject) == NULL) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    private function findEvangelizando($idTurma, $origem) {
        if ($idTurma) {
            $voEvangelizando = $this->_evangelizandoTurmaBusiness->findByEvangelizandoTurma($this->_helper->Criptografia->descript($idTurma));
        } else {
            $voEvangelizando = $this->_evangelizandoTurmaBusiness->findAll();
        }

        $return = "<option value=''>Selecione...</option>";
        foreach ($voEvangelizando as $val) {
            if ($origem == "cadastrar") {
                $return.="<option value='{$this->_helper->Criptografia->cripto($val->getIdEvangelizandoTurma())}'>{$val->getIdEvangelizando()->getNoEvangelizando()}</option>";
            } else if ($origem == "listar") {
                $return.="<option value='{$this->_helper->Criptografia->cripto($val->getIdEvangelizando()->getIdEvangelizando())}'>{$val->getIdEvangelizando()->getNoEvangelizando()}</option>";
            }
        }
        echo $return;
    }

    private function findTurma($nuAno) {
        $voTurma = $this->_turmaBusiness->findByTurmaAno(NULL, $nuAno);
        $return = "<option value=''>Selecione...</option>";
        foreach ($voTurma as $val) {
            $return.="<option value='{$this->_helper->Criptografia->cripto($val->getIdTurma())}'>{$val->getIdCiclo()->getNoCiclo()}</option>";
        }
        echo $return;
    }

    private function findExemplar($noLivro, $st) {
        $return = "<option value=''>Selecione...</option>";
        $voLivro = $this->_livroBusiness->findByExemplar($noLivro, $st);
        $obj = FALSE;
        if ($st == "all") {
            $obj = TRUE;
        }
        foreach ($voLivro as $val) {
            if ($obj) {
                $return.="<option value='{$this->_helper->Criptografia->cripto($val->getIdLivro())}'>{$val->getNuExemplar()}</option>";
            } else {
                $return.="<option value='{$this->_helper->Criptografia->cripto($val['idLivro'])}'>{$val['nuExemplar']}</option>";
            }
        }
        echo $return;
    }

}
