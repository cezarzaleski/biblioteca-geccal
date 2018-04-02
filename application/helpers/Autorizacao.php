<?php

class Zend_Controller_Action_Helper_Autorizacao extends Zend_Controller_Action_Helper_Abstract {

    public function verificaPermissao($action, $controller = NULL) {
        $acl = Zend_Registry::get('acl');
        $user = $acl->getRoles();
        if (!$controller) {
            $request = $this->getRequest();
            $controller = $request->getModuleName() . ":" . $request->getControllerName();
        }
        $return = $acl->isAllowed($user[0], $controller, $action);

        return $return;
    }

}