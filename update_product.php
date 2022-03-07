<?php

require_once "bootstrap.php";
spl_autoload_register(function($class){
    include_once __DIR__. "/src/".$class.".php";
});
$id = trim($argv[1]);
$newName = trim($argv[2]);
$product = $entityManager->find('Product', $id);
if ($product === null){
    echo "Product $id does not exist\n";
    exit(1);
}

$product->setName($newName);

//Doctrine keeps track of any changes to the model object
//and if has occurred, flushing will make changes to the persistent storage.
$entityManager->flush();
