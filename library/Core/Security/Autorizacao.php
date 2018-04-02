<?php

class Core_Security_Autorizacao extends Zend_Controller_Plugin_Abstract {

    /**
     * @var Zend_Acl
     */
    protected $_acl;
    protected $_session;
    protected $_sessionResource;
    protected $_allResource = array();

    public function __construct() {
        $this->_acl = new Zend_Acl();
        $this->_sessionResource = new Zend_Session_Namespace("resource");
        $this->_session = new Zend_Session_Namespace('config');
        $this->_initialize();
    }

    protected function _initialize() {
        $this->_setupRoles();
        $this->_setupResources();
        $this->_setupPrivileges();
        $this->_saveAcl();
    }

    protected function _setupRoles() {
        if (isset($this->_session->noPerfil)) {
            $this->_acl->addRole(new Zend_Acl_Role($this->_session->noPerfil));
        }
    }

    protected function _setupResources() {

        if (isset($this->_sessionResource->resource1->noModulo)) {
            $this->_acl->addResource(new Zend_Acl_Resource("padrao:index"));
            $this->_acl->addResource(new Zend_Acl_Resource("padrao:error"));
            $this->_acl->addResource(new Zend_Acl_Resource("autenticacao:index"));

            foreach ($this->_sessionResource as $val) {
                $resource = $val->noModulo . ":" . $val->noController;
                if (!in_array($resource,  $this->_allResource)) {
                    $this->_allResource[] = $resource;
                    $this->_acl->addResource(new Zend_Acl_Resource($resource));
                }
                
            }
        }
    }

    protected function _setupPrivileges() {
        if (isset($this->_sessionResource->resource1->noModulo)) {
            $this->_acl->allow($this->_session->noPerfil, 'padrao:index', 'index');
            $this->_acl->allow($this->_session->noPerfil, 'padrao:error', 'forbidden');
            $this->_acl->allow($this->_session->noPerfil, 'autenticacao:index', array('login', 'logout'));

            foreach ($this->_sessionResource as $value) {
                $resource = $value->noModulo . ":" . $value->noController;
                $this->_acl->deny($this->_session->noPerfil, $resource, $value->noAction);
            }

            
            foreach ($this->_session->funcPermission as $val) {
                $resource = $val->noModulo . ":" . $val->noController;
                $this->_acl->allow($this->_session->noPerfil, $resource, $val->noAction);
            }
        }
    }

    protected function _saveAcl() {
        $registry = Zend_Registry::getInstance();
        $registry->set('acl', $this->_acl);
    }

}

