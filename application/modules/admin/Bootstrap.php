<?php
class Admin_Bootstrap extends Zend_Application_Module_Bootstrap
{
protected function _initAutoload()
    {
    
        $autoloader = new Zend_Loader_Autoloader_Resource(array(
            'namespace' => 'Admin',
            'basePath' => APPLICATION_PATH.'/modules/admin/',
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
