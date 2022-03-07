<?php

require_once "bootstrap.php";
require_once "model_autoload.php";

$productBugs = $entityManager->getRepository('Bug')->getProductsBugs();

foreach($productBugs as $productBug){
    echo $productBug['name'] . " has " . $productBug['openBugs'] . " open bugs.\n";
}