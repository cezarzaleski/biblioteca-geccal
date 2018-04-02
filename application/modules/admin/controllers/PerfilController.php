<?php

class Admin_PerfilController extends Core_Controller_Action {

    protected $_perfilBusiness;
    protected $_moduloBusiness;
    protected $_funcionalidadeBusiness;

    public function init() {
        $this->_helper->cache(array('listar'), array('listaraction'));
        $this->_helper->cache(array('cadastrar'), array('cadastraraction'));
        $this->_helper->cache(array('editar'), array('editaraction'));
        $this->_perfilBusiness = new \Core\Models\Business\PerfilBusiness();
        $this->_moduloBusiness = new \Core\Models\Business\ModuloBusiness();
        $this->_funcionalidadeBusiness = new \Core\Models\Business\FuncionalidadeBusiness();
        $this->view->criptografia = $this->_helper->Criptografia;
    }

    public function listarAction() {
        $page = $this->_getParam('page', 1);
        $voPerfil = $this->_perfilBusiness->findAll();
        $paginator = $this->_helper->Paginator->paginator($voPerfil, $page);
        $this->view->paginator = $paginator;
        $this->view->update = $this->_helper->Autorizacao->verificaPermissao('editar');
        $this->view->delete = $this->_helper->Autorizacao->verificaPermissao('excluir');
        $this->view->criptografia = $this->_helper->Criptografia;
        if ($this->getRequest()->get("id")) {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();
            $voPerfil = $this->_perfilBusiness->find($this->_helper->Criptografia->descript($this->getRequest()->get("id")));

            echo $this->visualizarPermissoes($voPerfil);
        }
    }

    public function cadastrarAction() {
        $form = new Admin_Form_Perfil();
        $voModulo = $this->_moduloBusiness->findAll();
        $this->view->perfil = $this->_helper->Perfil;
        $this->view->voModulo = $voModulo;
        $this->view->form = $form;

        if ($this->getRequest()->getPost("noPerfil")) {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();
            if ($this->getRequest()->isPost() && $form->isValid($_POST)) {
                $voPerfil = new \Core\Entity\BibliotecaInfantil\Perfil();
                $voPerfil->setNoPerfil($this->getRequest()->getPost("noPerfil"));
                $voPerfil->setStAtivo(1);

                $funcionalidades = $this->getRequest()->getPost("funcionalidades");
                if ($funcionalidades) {
                    foreach ($funcionalidades as $val) {
                        $vofuncionalidade = $this->_funcionalidadeBusiness->find($this->_helper->Criptografia->descript($val));
                        $vofuncionalidade->addPerfil($voPerfil);
                        $voPerfil->addFuncionalidade($vofuncionalidade);
                    }
                }
                $this->novoPerfil($voPerfil);
            } else {
                echo 'false';
            }
        }
    }

    public function editarAction() {
        $request = $this->getRequest();
        $id = $request->getParam('id');
        $form = new Admin_Form_Perfil();
        if ($id) {
            $voPerfil = $this->_perfilBusiness->find($this->_helper->Criptografia->descript($id));
            $this->view->form = $form->editarPerfilForm($voPerfil, $form, $id);
            $voModulo = $this->_moduloBusiness->findAll();
            $this->view->perfil = $this->_helper->Perfil;
            $this->view->voModulo = $voModulo;
            $this->view->idPerfil = $id;
        }
        if ($request->getPost('noPerfil')) {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->_helper->layout()->disableLayout();
            if ($this->getRequest()->isPost() && $form->isValid($_POST)) {
                $voPerfil = $this->_perfilBusiness->find($this->_helper->Criptografia->descript($this->getRequest()->getPost("idPerfil")));

                $funcionalidades = $this->getRequest()->getPost("funcionalidades");
                $voPerfil->setNoPerfil($this->getRequest()->getPost("noPerfil"));
                $this->alterarPerfil($voPerfil, $funcionalidades);
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
                $voPerfil = $this->_perfilBusiness->find($this->_helper->Criptografia->descript($val));
                $voPerfil->setStAtivo(0);
                if ($this->_perfilBusiness->update($voPerfil) != NULL) {
                    echo 'false';
                    exit();
                }
            }
            echo 'true';
        }
    }

    private function novoPerfil(\Core\Entity\BibliotecaInfantil\Perfil $valueObject) {
        $this->_helper->viewRenderer->setNoRender(true);


        if ($this->_perfilBusiness->save($valueObject) == NULL) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    private function alterarPerfil(\Core\Entity\BibliotecaInfantil\Perfil $valueObject, $funcionalidades) {
        $this->_helper->viewRenderer->setNoRender(true);
        if ($valueObject->getIdFuncionalidade()) {

            foreach ($valueObject->getIdFuncionalidade() as $func) {
                $func->getIdPerfil()->removeElement($valueObject);
                $valueObject->getIdFuncionalidade()->removeElement($func);
            }
        }
        if ($funcionalidades) {
            foreach ($funcionalidades as $val) {
                $vofuncionalidade = $this->_funcionalidadeBusiness->find($this->_helper->Criptografia->descript($val));
                $vofuncionalidade->addPerfil($valueObject);
                $valueObject->addFuncionalidade($vofuncionalidade);
            }
        }
        if ($this->_perfilBusiness->update($valueObject) == NULL) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    private function visualizarPermissoes(\Core\Entity\BibliotecaInfantil\Perfil $valueObject) {
        $this->_helper->viewRenderer->setNoRender(true);
        $table = "<table class'tabela'><thead>
            <tr>
                <th>Perfil</th>
                <th>Módulo</th>
                <th>Funcionalidade</th>
            </tr></thead><tbody>";

        $cont = 0;
        $rowspan = count($valueObject->getIdFuncionalidade());
        
        if ($rowspan!=0) {

            foreach ($valueObject->getIdFuncionalidade() as $funcionalidade) {
                $table.= "<tr>";
                if ($cont == 0) {
                    $table.= "<td rowspan='{$rowspan}'>{$valueObject->getNoPerfil()}</td>";
                }
                $table.="<td>{$funcionalidade->getIdController()->getNoSubmodulo()}</td>
                <td>{$funcionalidade->getIdTipoFuncionalidade()->getNoTipofuncionalidade()}</td></tr>";
                $cont++;
            }
        }else{
            $table.="<tr><td colspan='3'>Nenhuma permissão cadastrada</td></tr>";
        }
        $table.="</tbody></table>";

        return $table;
    }

}