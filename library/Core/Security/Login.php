<?php

class Core_Security_Login extends Zend_Controller_Plugin_Abstract {

    protected $_session = null;
    protected $_tempoSession = 1800;
    protected $_acl = null;
    protected $_notLoggedRoute = array(
        'controller' => 'index',
        'action' => 'index',
        'module' => 'autenticacao'
    );
    protected $_forbiddenRoute = array(
        'controller' => 'error',
        'action' => 'forbidden',
        'module' => 'padrao'
    );

    public function __construct() {
        $this->_url = Zend_Registry::get('config')->system->auth;
        $this->_acl = Zend_Registry::get('acl');
        $this->_session = new Zend_Session_Namespace('config');
    }

    public function preDispatch(Zend_Controller_Request_Abstract $request) {
        $controller = "";
        $action = "";
        $module = "";
        $excession = $request->getModuleName() . "-" . $request->getControllerName() . "-" . $request->getActionName();


        if ($this->_session->noPerfil) {
            $agora = mktime(date('H:i:s'));
            $segundos = $agora - $this->_session->inicioSessao;
        }

        if (!$this->_session->noPerfil && $excession != "autenticacao-index-login") {
            $controller = $this->_notLoggedRoute['controller'];
            $action = $this->_notLoggedRoute['action'];
            $module = $this->_notLoggedRoute['module'];
        } else if ($segundos > $this->_tempoSession) {
            session_destroy();
            $controller = $this->_notLoggedRoute['controller'];
            $action = $this->_notLoggedRoute['action'];
            $module = $this->_notLoggedRoute['module'];
        } else if (!$this->_isAuthorized($request->getModuleName() . ":" . $request->getControllerName(), $request->getActionName()) && $excession != "autenticacao-index-login") {
            $controller = $this->_forbiddenRoute['controller'];
            $action = $this->_forbiddenRoute['action'];
            $module = $this->_forbiddenRoute['module'];
        } else {
            $this->_session->inicioSessao = mktime(date('H:i:s'));
            $controller = $request->getControllerName();
            $action = $request->getActionName();
            $module = $request->getModuleName();
        }
        $request->setControllerName($controller);
        $request->setActionName($action);
        $request->setModuleName($module);
    }

    protected function _isAuthorized($controller, $action) {
        $this->_acl = Zend_Registry::get('acl');
        $user = $this->_session->noPerfil;

        if (!$this->_acl->has($controller) || !$this->_acl->isAllowed($user, $controller, $action)) {
            return false;
        } else {
            return true;
        }
    }

}
