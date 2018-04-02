<?php 
use Doctrine\ORM\Tools\EntityGenerator;
ini_set("display_errors", "On");
// Define path to library directory
defined('LIBRARY_PATH')
    || define('LIBRARY_PATH', realpath(dirname(__FILE__) . '/../library'));


// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
		LIBRARY_PATH,
		get_include_path(),
)));

$libPath = __DIR__; // Set this to where you have doctrine2 installed
// autoloaders
require_once $libPath . '/../library/Doctrine/Common/ClassLoader.php';

$classLoader = new \Doctrine\Common\ClassLoader('Doctrine', LIBRARY_PATH);
$classLoader->register();

$classLoader = new \Doctrine\Common\ClassLoader('Entity', LIBRARY_PATH.'/Core/Entity');
$classLoader->register();

$classLoader = new \Doctrine\Common\ClassLoader('Proxies', LIBRARY_PATH.'/Core/Proxies');
$classLoader->register();

// config
$config = new Doctrine\ORM\Configuration();
$config->setMetadataDriverImpl($config->newDefaultAnnotationDriver(LIBRARY_PATH . '/Core/Entity'));
$config->setMetadataCacheImpl(new \Doctrine\Common\Cache\ArrayCache);
$config->setProxyDir(LIBRARY_PATH.'/Core/Proxies');
$config->setProxyNamespace('Proxies');


$connectionParams = array(
    'dbname' => 'biblioteca_infantil_geccal',
		'host' => '127.0.0.1',
		'driver' => 'pdo_mysql',
		'port' => '3306',
		'user' => 'root',
		'password' => '123456',
);

$em = \Doctrine\ORM\EntityManager::create($connectionParams, $config);

// custom datatypes (not mapped for reverse engineering)
$em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('set', 'string');
$em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
$em->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('geometry', 'string');

// fetch metadata
$driver = new \Doctrine\ORM\Mapping\Driver\DatabaseDriver(
    $em->getConnection()->getSchemaManager()
);
$em->getConfiguration()->setMetadataDriverImpl($driver);
$cmf = new \Doctrine\ORM\Tools\DisconnectedClassMetadataFactory($em);
$cmf->setEntityManager($em); 
$classes = $driver->getAllClassNames();
$metadata = $cmf->getAllMetadata(); 
$generator = new EntityGenerator();
$generator->setUpdateEntityIfExists(true);
$generator->setGenerateStubMethods(true);
$generator->setGenerateAnnotations(true);
$generator->generate($metadata, LIBRARY_PATH . '/Core/Entity/TesteDoctrine');
print 'Done!';
?>