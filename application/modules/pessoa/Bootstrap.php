<?php
class Pessoa_Bootstrap extends Zend_Application_Module_Bootstrap
{
protected function _initAutoload()
    {
    
        $autoloader = new Zend_Loader_Autoloader_Resource(array(
            'namespace' => 'Pessoa',
            'basePath' => APPLICATION_PATH.'/modules/pessoa/',
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
