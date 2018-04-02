<?php
class Autenticacao_Bootstrap extends Zend_Application_Module_Bootstrap
{
protected function _initAutoload()
    {
    
        $autoloader = new Zend_Loader_Autoloader_Resource(array(
            'namespace' => 'Autenticacao',
            'basePath' => APPLICATION_PATH.'/modules/autenticacao/',
            'resourceTypes' => array(
                'form' => array(
                    'path' => 'forms/',
                    'namespace' => 'Form',
                )
            )
        ));
        
        return $autoloader;
    }
    
}
