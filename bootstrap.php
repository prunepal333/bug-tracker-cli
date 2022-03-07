<?php
//➔ Obtaining the entity manager
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

require_once __DIR__."/vendor/autoload.php";

//create a simple "default" DOCTRINE ORM configuration.

$isDevMode = true;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;

$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);

//if your preference is XML
// $config = ORMSetup::createXMLMetadataConfiguration( array(__DIR__."/config/xml"), $isDevMode);

//database configuration parameters
$conn = array(
    'driver' => 'pdo_sqlite',
    'path' => __DIR__."/db.sqlite"
);

//➔ obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);