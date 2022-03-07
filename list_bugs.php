<?php

require_once "bootstrap.php";

require_once "model_autoload.php";


$dql =  "SELECT b, e, r, p FROM Bug b JOIN b.engineer e JOIN b.reporter r JOIN b.products p ORDER BY b.created DESC";

$bugs = $entityManager
                ->createQuery($dql)
                ->setMaxResults(15)
                ->getResult();

echo "*******BUG REPOSITORY*******\n";
foreach($bugs as $bug){
    echo sprintf("\t-%s\n", $bug->getDescription());
    echo sprintf("\t-Assigned to %s\n", $bug->getEngineer()->getName());
    echo sprintf("\t-Reported by %s\n", $bug->getReporter()->getName());
    echo sprintf("\tProducts affected: \n");
    foreach($bug->getProducts() as $product){
        echo sprintf("\t-%s\n", $product->getName());
    }
    echo "\n\n";
}
