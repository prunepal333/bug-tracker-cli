<?php

require_once "bootstrap.php";

spl_autoload_register(function($class){
    include_once "src/".$class.".php";
});

$productRepository = $entityManager->getRepository('Product');
$products = $productRepository->findAll();
echo "*******PRODUCT REPOSITORY********\n";
foreach($products as $product){
    echo sprintf("\t-%s\n", $product->getName());
}
