<?php

class Livro_LivroController extends Core_Controller_Action {

    protected $_livroBusiness;
    protected $_autorBusiness;
    protected $_origemLivroBusiness;
    protected $_editoraBusiness;
    protected $_usuarioBusiness;

    public function init() {
        $this->_helper->cache(array('listar'), array('listaraction'));
        $this->_helper->cache(array('cadastrar'), array('cadastraraction'));
        $this->_helper->cache(array('editar'), array('editaraction'));
        $this->_helper->cache(array('gerarExemplar'), array('gerarexemplaraction'));
        $this->_livroBusiness = new \Core\Models\Business\LivroBusiness();
        $this->_autorBusiness = new \Core\Models\Business\AutorBusiness();
        $this->_origemLivroBusiness = new \Core\Models\Business\OrigemLivroBusiness();
        $this->_editoraBusiness = new \Core\Models\Business\EditoraBusiness();
        $this->_usuarioBusiness = new \Core\Models\Business\UsuarioBusiness();
        $this->view->criptografia = $this->_helper->Criptografia;
    }

    public function listarAction() {
        $page = $this->_getParam('page', 1);
        $voLivro = $this->_livroBusiness->findAll();
        $paginator = $this->_helper->Paginator->paginator($voLivro, $page, 30);
        $this->view->paginator = $paginator;
        $this->view->tabela = $voLivro;
        $this->view->livro = $this->_helper->Livro;
        $this->view->update = $this->_helper->Autorizacao->verificaPermissao('editar');
        $this->view->delete = $this->_helper->Autorizacao->verificaPermissao('excluir');
        if ($this->getRequest()->get("id")) {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();
            $idLivro = $this->_helper->Criptografia->descript($this->getRequest()->get("id"));
            echo $this->visualizarAutores($idLivro);
        }
    }

    public function cadastrarAction() {
        $form = new Livro_Form_Livro();
        $voAutor = $this->_autorBusiness->findAll();
        $this->view->form = $form;
        $this->view->autores = $voAutor;
        $this->view->cadastrarEditora = $this->_helper->Autorizacao->verificaPermissao('cadastrar', 'livro:editora');
        $this->view->cadastrarAutor = $this->_helper->Autorizacao->verificaPermissao('cadastrar', 'livro:autor');


        if ($this->getRequest()->getPost("method") == "cadastrar") {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();

            if ($this->getRequest()->isPost()) {
                $voLivro = new \Core\Entity\BibliotecaInfantil\Livro();
                $sessionConfig = new Zend_Session_Namespace('config');
                $voOrigemLivro = $this->_origemLivroBusiness->find($this->_helper->Criptografia->descript($this->getRequest()->getPost("idOrigemLivro")));
                $voEditora = $this->_editoraBusiness->find($this->_helper->Criptografia->descript($this->getRequest()->getPost("idEditora")));

                $voUsuario = $this->_usuarioBusiness->find($this->_helper->Criptografia->descript($sessionConfig->idUsuario));
                $date = new \DateTime('now');
                $voLivro->setNoLivro($this->getRequest()->getPost("noLivro"));
                $voLivro->setNuExemplar(1);
                $voLivro->setIdEditora($voEditora);
                $voLivro->setIdOrigemLivro($voOrigemLivro);
                $voLivro->setIdUsuario($voUsuario);
                $voLivro->setStAtivo(1);
                $voLivro->setNuAno($this->getRequest()->getPost("nuAno"));
                $voLivro->setNuEdicao($this->getRequest()->getPost("nuEdicao"));
                $voLivro->setNoObs($this->getRequest()->getPost("noObs"));
                $voLivro->setDtCadastro($date);

                $autores = $this->getRequest()->getPost("autores");

                foreach ($autores as $val) {
                    $voAutores = $this->_autorBusiness->find($this->_helper->Criptografia->descript($val));
                    $voAutores->addLivro($voLivro);
                    $voLivro->addAutor($voAutores);
                }
                $this->novoLivro($voLivro,FALSE);
            } else {
                $this->_helper->viewRenderer->setNoRender(true);
                $this->_helper->layout()->disableLayout();
                echo 'aqui';
            }
        } else if ($this->getRequest()->getPost("method") == "findLivro") {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();
            $livro = $this->findLivro($this->getRequest()->getPost("noLivro"));
            echo $livro;
        } else if ($this->getRequest()->getPost("method") == "gerarExemplar") {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();
            $this->gerarExemplar();
        } else if ($this->getRequest()->getPost("method") == "editora") {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();
            echo $this->carregarEditora();
        } else if ($this->getRequest()->getPost("method") == "autor") {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();
            echo $this->carregarAutor();
        } else if ($this->getRequest()->getPost("method") == "findLivroGerarExemp") {
        	$this->_helper->layout()->disableLayout();
        	echo $this->carregarLivro();
        }
    }

    public function editarAction() {
        $request = $this->getRequest();
        $id = $request->getParam('id');
        $form = new Livro_Form_Livro();

        if ($id) {
            $voAutor = $this->_autorBusiness->findAll();
            $autores = $this->_livroBusiness->findByAutorLivro($this->_helper->Criptografia->descript($id));
            $voLivro = $this->_livroBusiness->find($this->_helper->Criptografia->descript($id));
            $this->view->form = $form->editarLivroForm($voLivro, $form, $id);
            $this->view->autores = $voAutor;
            $this->view->autorLivro = $autores;
            $this->view->cadastrarEditora = $this->_helper->Autorizacao->verificaPermissao('cadastrar', 'livro:editora');
            $this->view->cadastrarAutor = $this->_helper->Autorizacao->verificaPermissao('cadastrar', 'livro:autor');
        }
        if ($request->getPost('noLivro')) {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();
            if ($this->getRequest()->isPost()) {
                $voLivro = $this->_livroBusiness->find($this->_helper->Criptografia->descript($this->getRequest()->getPost("idLivro")));
                $voOrigemLivro = $this->_origemLivroBusiness->find($this->_helper->Criptografia->descript($this->getRequest()->getPost("idOrigemLivro")));
                $voEditora = $this->_editoraBusiness->find($this->_helper->Criptografia->descript($this->getRequest()->getPost("idEditora")));
                $titulo = $voLivro->getNoLivro();

                $voLivro->setNoLivro($this->getRequest()->getPost("noLivro"));
                $voLivro->setIdEditora($voEditora);
                $voLivro->setIdOrigemLivro($voOrigemLivro);
                $voLivro->setStAtivo(1);
                $voLivro->setNuAno($this->getRequest()->getPost("nuAno"));
                $voLivro->setNuEdicao($this->getRequest()->getPost("nuEdicao"));
                $voLivro->setNoObs($this->getRequest()->getPost("noObs"));
                $autores = $this->getRequest()->getPost("autores");
                $this->alterarLivro($voLivro, $autores, $titulo);
            } else {
                echo 'false';
            }
        }
        if ($this->getRequest()->getPost("method") == "editora") {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();
            echo $this->carregarEditora();
        } else if ($this->getRequest()->getPost("method") == "autor") {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();
            echo $this->carregarAutor();
        }
        
    }

    public function excluirAction() {
        $this->_helper->viewRenderer->setNoRender(true);
        $this->_helper->layout()->disableLayout();
        if ($this->getRequest()->getPost("noMotivoExclusao")) {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();
            $code = $this->getRequest()->getPost("code");
            $baixaLivroBusiness = new \Core\Models\Business\BaixaLivroBusiness();
            $sessionConfig = new Zend_Session_Namespace('config');
            $voUsuario = $this->_usuarioBusiness->find($this->_helper->Criptografia->descript($sessionConfig->idUsuario));
            $date = new \DateTime('now');
            
            foreach ($code as $val) {
                $voLivro = $this->_livroBusiness->find($this->_helper->Criptografia->descript($val));
                $voLivro->setStAtivo(0);
                if ($this->_livroBusiness->update($voLivro) == NULL) {
                    $voBaixaLivro = new \Core\Entity\BibliotecaInfantil\BaixaLivro();
                    $voBaixaLivro->setIdLivro($voLivro);
                    $voBaixaLivro->setDtBaixa($date);
                    $voBaixaLivro->setNoMotivoBaixa($this->getRequest()->getPost("noMotivoExclusao"));
                    $voBaixaLivro->setStAtivo(1);
                    $voBaixaLivro->setIdUsuario($voUsuario);

                    if ($baixaLivroBusiness->save($voBaixaLivro) != NULL) {
                        echo 'false';
                        exit();
                    }
                    
                } else {
                    echo 'false';
                    exit();
                }
            }
            echo 'true';
        }
    }

    private function novoLivro(\Core\Entity\BibliotecaInfantil\Livro $valueObject, $gerarExemplar) {
        $this->_helper->viewRenderer->setNoRender(true);
        if ($this->_livroBusiness->save($valueObject) == NULL) {
        	if($gerarExemplar){
        		$st['st']= "true";
        		foreach ($this->_livroBusiness->countExemplar($valueObject->getNoLivro()) as  $val){
        			$st['nuExemplar'] = $val['qntExemplar'];
        		}
        		$json = Zend_Json::encode($st);
        		echo $json;
        	}else{
        		echo 'true';
        	}
        } else {
        	if($gerarExemplar){
        		$st['st']="false";
        		$json = Zend_Json::encode($st);
        		echo $json;
        		}else{
        			echo 'false';
        		}
            
        }
    }

    private function alterarLivro(\Core\Entity\BibliotecaInfantil\Livro $valueObject, $autores, $titulo) {
        $this->_helper->viewRenderer->setNoRender(true);
        if ($valueObject->getIdAutor()) {
            foreach ($valueObject->getIdAutor() as $autor) {
                $autor->getIdLivro()->removeElement($valueObject);
                $valueObject->getIdAutor()->removeElement($autor);
            }
        }
        if ($autores) {
            foreach ($autores as $val) {
                $voAutor = $this->_autorBusiness->find($this->_helper->Criptografia->descript($val));
                $voAutor->addLivro($valueObject);
                $valueObject->addAutor($voAutor);
            }
        }
        if ($this->_livroBusiness->update($valueObject) == NULL) {
            $exemplares = $this->_livroBusiness->findByTituloExemplar($titulo, $valueObject->getNuExemplar());
            $return="";
            if ($exemplares) {
                foreach ($exemplares as $exe) {
                    $livro = $this->_livroBusiness->findByLivroExemplar($exe['noLivro'], $exe['nuExemplar']);
                    $livro->setNoLivro($valueObject->getNoLivro());
                    foreach ($livro->getIdAutor() as $rmAutor) {
                        $rmAutor->getIdLivro()->removeElement($livro);
                        $livro->getIdAutor()->removeElement($rmAutor);
                    }
                    foreach ($valueObject->getIdAutor() as $autor) {
                        $autor->addLivro($livro);
                        $livro->addAutor($autor);
                    }
                    if ($this->_livroBusiness->update($livro) == NULL) {
                        $return = "true";
                    } else {
                        echo 'false';
                        exit();
                    }
                }
            } else {
                echo "true";
            }
            echo $return;
        } else {
            echo 'false';
        }
    }

    private function findLivro($noLivro) {
        $voLivro = $this->_livroBusiness->findByLivro($noLivro);
        $livro = "nuEdicao-" . $voLivro[0]->getNuEdicao() . "-
        nuAno-" . $voLivro[0]->getNuAno() . "-
        idOrigemLivro-" . $this->_helper->Criptografia->cripto($voLivro[0]->getIdOrigemLivro()->getIdOrigemLivro()) . "-
        noObs-" . $voLivro[0]->getNoObs() . "-
        nuExemplar-" . $voLivro[0]->getNuExemplar() . "-
        idEditora-" . $this->_helper->Criptografia->cripto($voLivro[0]->getIdEditora()->getIdEditora());
        foreach ($voLivro[0]->getIdAutor() as $val) {
            $livro.="-" . $this->_helper->Criptografia->cripto($val->getIdAutor());
        }
        echo $livro;
    }

    private function gerarExemplar() {
    	$voLivro = new \Core\Entity\BibliotecaInfantil\Livro();
        $sessionConfig = new Zend_Session_Namespace('config');
        $voOrigemLivro = $this->_origemLivroBusiness->find($this->_helper->Criptografia->descript($this->getRequest()->getPost("idOrigemLivro")));
        $voEditora = $this->_editoraBusiness->find($this->_helper->Criptografia->descript($this->getRequest()->getPost("idEditora")));


        $voUsuario = $this->_usuarioBusiness->find($this->_helper->Criptografia->descript($sessionConfig->idUsuario));
        $date = new \DateTime('now');
        $voLivro->setNoLivro($this->getRequest()->getPost("noLivro"));
        $voLivro->setNuExemplar(($this->getRequest()->getPost("nuExemplar") + 1));
        $voLivro->setIdEditora($voEditora);
        $voLivro->setIdOrigemLivro($voOrigemLivro);
        $voLivro->setIdUsuario($voUsuario);
        $voLivro->setStAtivo(1);
        $nuAno = $this->getRequest()->getPost("nuAno");
        if ($nuAno) {
            $voLivro->setNuAno($nuAno);
        }
        $voLivro->setNuEdicao($this->getRequest()->getPost("nuEdicao"));
        $voLivro->setNoObs($this->getRequest()->getPost("noObs"));
        $voLivro->setDtCadastro($date);

        $autores = $this->getRequest()->getPost("autores");
        $autor = explode("-", $autores);

        foreach ($autor as $val) {
            $voAutores = $this->_autorBusiness->find($this->_helper->Criptografia->descript($val));
            $voAutores->addLivro($voLivro);
            $voLivro->addAutor($voAutores);
        }
        $this->novoLivro($voLivro,TRUE);
    }

    private function visualizarAutores($idLivro) {
        $this->_helper->viewRenderer->setNoRender(true);
        $autores = $this->_livroBusiness->findByAutorLivro($idLivro);
        $table = "<table class'tabela'><tbody>";

        foreach ($autores as $val) {
            $table .= "<tr><td>Autor: </td><td>{$val['noAutor']}</td></tr>";
        }
        $table.="</tbody></table>";

        return $table;
    }

    private function carregarEditora() {
        $this->_helper->viewRenderer->setNoRender(true);
        $voEditora = $this->_editoraBusiness->findAll();
        $campo = '<option value="">Selecione...</option>';
        foreach ($voEditora as $val) {
            $campo .= "<option value='{$this->_helper->Criptografia->cripto($val->getIdEditora())}'>{$val->getNoEditora()}</option>";
        }
        return $campo;
    }

    private function carregarAutor() {
        $this->_helper->viewRenderer->setNoRender(true);
        $voEditora = $this->_autorBusiness->findAll();
        foreach ($voEditora as $val) {
            $campo .= "<option value='{$this->_helper->Criptografia->cripto($val->getIdAutor())}'>{$val->getNoAutor()}</option>";
        }
        return $campo;
    }
    
    private function carregarLivro() {
    	$this->_helper->viewRenderer->setNoRender(true);
    	$voLivro = $this->_livroBusiness->findByLivroGerarExemplar();
    	$campo .= "<option value=''>Selecione...</option>";
    	foreach ($voLivro as $val) {
    		$campo .= "<option value='{$val['noLivro']}'>{$val['noLivro']}</option>";
    	}
    	return $campo;
    }

}