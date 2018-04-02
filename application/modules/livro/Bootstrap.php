<?php
class Livro_Bootstrap extends Zend_Application_Module_Bootstrap
{
protected function _initAutoload()
    {
    
        $autoloader = new Zend_Loader_Autoloader_Resource(array(
            'namespace' => 'Livro',
            'basePath' => APPLICATION_PATH.'/modules/livro/',
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
