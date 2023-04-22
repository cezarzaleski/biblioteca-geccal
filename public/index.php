<?php
session_name('biblioteca_inafantil');
error_reporting(E_ALL ^ E_NOTICE);


// Define path to application directory
defined('APPLICATION_PATH')
       || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define path to application directory
defined('APPLICATION_UPLOAD')
       || define('APPLICATION_UPLOAD', realpath(dirname(__FILE__) . '/../data/upload/'));

// Define path to public directory
defined('PUBLIC_PATH')
       || define('PUBLIC_PATH', realpath(dirname(__FILE__) . '/../public'));

// Define path to library directory
defined('LIBRARY_PATH')
       || define('LIBRARY_PATH', realpath(dirname(__FILE__) . '/../library'));

// Define application environment
defined('APPLICATION_ENV')
       || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'development'));

// Ensure library/ is on include_path
/* set_include_path(implode(PATH_SEPARATOR, array(
 LIBRARY_PATH,
 LIBRARY_PATH."/Application/Security",
 APPLICATION_PATH,
 get_include_path(),
 ))); */
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../../../library'), //deixando fora do WWW
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
)));

require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
               APPLICATION_ENV,
               APPLICATION_PATH . '/configs/application.ini'
);
/*
set_include_path('.' . PATH_SEPARATOR . '..' . PATH_SEPARATOR . './library'
. PATH_SEPARATOR .'./application/models/'
. PATH_SEPARATOR
. get_include_path());
*/


try {
    $application->bootstrap()
        ->run();
} catch (Exception $e) {
    var_dump($e);
    exit();
}


