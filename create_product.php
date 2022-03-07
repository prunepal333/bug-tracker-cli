<?php
//create_product.php <name>
require_once "bootstrap.php";



//➔ Autoloads the classes from src/ directory
spl_autoload_register(function ($classname){
    include "src/" . $classname . ".php";
});


$newProductName = trim($argv[1]);
$product = new Product();

$product->setName($newProductName);

$entityManager->persist($product);
$entityManager->flush();

echo "Created product with ID " . $product->getId() . "\n";
