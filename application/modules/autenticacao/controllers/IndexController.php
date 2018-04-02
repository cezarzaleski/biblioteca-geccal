<?php
//silenciar warnig referente linha 61, objeto std
error_reporting(0);

class Autenticacao_IndexController extends Core_Controller_Action {

    protected $_usuarioBusiness;
    protected $_perfilBusiness;
    protected $_funcionalidadeBusiness;

    public function init() {
        Zend_Layout::getMvcInstance()->setLayout('login');
        $this->_helper->cache(array('index'), array('indexaction'));
        $this->_helper->cache(array('login'), array('loginaction'));
        $this->_usuarioBusiness = new \Core\Models\Business\UsuarioBusiness();
    }

    public function indexAction() {
        $form = new Autenticacao_Form_Login();
        $this->view->form = $form;
    }

    public function loginAction() {
        $this->_helper->layout()->disableLayout();
        $form = new Autenticacao_Form_Login();
        if ($this->getRequest()->isPost() && $form->isValid($_POST)) {
            $usuarioEntity = new Core\Entity\BibliotecaInfantil\Usuario();
            $usuarioEntity->setNoUsuario($this->getRequest()->getPost("noUsuario"));
            $senha = md5($this->getRequest()->getPost("senha"));
            $usuarioEntity->setNoSenha($senha);

            $valueObject = $this->_usuarioBusiness->login($usuarioEntity);

            if (!empty($valueObject)) {
                $session = new Zend_Session_Namespace('config');
                $sessionResource = new Zend_Session_Namespace("resource");
                $this->_perfilBusiness = new \Core\Models\Business\PerfilBusiness();
                $this->_funcionalidadeBusiness = new \Core\Models\Business\FuncionalidadeBusiness();

                $session->idUsuario = $this->_helper->Criptografia->cripto($valueObject->getIdUsuario());
                $session->noUsuario = $valueObject->getNoUsuario();
                $session->noColaborador = $valueObject->getIdColaborador()->getNoColaborador();
                $session->idPerfil = $valueObject->getIdPerfil()->getIdPerfil();
                $session->noPerfil = $valueObject->getIdPerfil()->getNoPerfil();
                $session->inicioSessao = mktime(date('H:i:s'));
                $session->ano = date('Y');

                if ($valueObject->getDtUltVisita()) {
                    $date = $valueObject->getDtUltVisita();
                } else {
                    $date = new \DateTime('now');
                }
                $session->dtUltVisita = $date->format('d/m/Y H:i:s');


                $this->updateUltVisita($valueObject);
                $voPerfil = $this->_perfilBusiness->findByFuncPerfil($valueObject->getIdPerfil()->getIdPerfil());
                $voFuncionalidade = $this->_funcionalidadeBusiness->findByFuncAutorizacao();

                $cont = 1;
                foreach ($voFuncionalidade as $val) {
                    $nameObj = "resource" . $cont;
                    $sessionResource->$nameObj->idFuncionalidade = $val['idFuncionalidade'];
                    $sessionResource->$nameObj->noModulo = $val['noModulo'];
                    $sessionResource->$nameObj->noController = $val['noController'];
                    $sessionResource->$nameObj->noAction = $val['noTipoFuncionalidade'];
                    $sessionResource->$nameObj->noMenu = $val['noMenu'];
                    $cont++;
                }
                $cont = 1;
                foreach ($voPerfil as $val) {
                    $nameObj = "resourceCad" . $cont;
                    $session->funcPermission->$nameObj->idFuncionalidade = $val['idFuncionalidade'];
                    $session->funcPermission->$nameObj->noModulo = $val['noModulo'];
                    $session->funcPermission->$nameObj->noController = $val['noController'];
                    $session->funcPermission->$nameObj->noAction = $val['noTipoFuncionalidade'];
                    $cont++;
                }
                echo "true";
            } else {
                echo "false";
            }
        } else {
            echo "false";
        }
    }

    private function updateUltVisita(\Core\Entity\BibliotecaInfantil\Usuario $valueObject) {
        $this->_helper->viewRenderer->setNoRender(true);
        $valueObject->setDtUltVisita(new \DateTime('now'));
        $this->_usuarioBusiness->update($valueObject);
    }

    public function logoutAction() {
        session_destroy();
        $this->_redirect('/autenticacao');
    }

}