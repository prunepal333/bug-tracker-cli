<?php
// show_product.php <id>
require_once "bootstrap.php";

spl_autoload_register(function($class){
    include_once __DIR__."/src/".$class.".php";
});

$id =  $argv[1];
$product = $entityManager->getRepository('Product')
                        ->find($id);
if($product === null){
    echo "No product found.\n";
    exit(1);
}

echo sprintf("-%s\n", $product->getName());
