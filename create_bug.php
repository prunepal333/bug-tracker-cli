<?php
//create_bug.php <reporter-id> <engineer-id> <product-ids>

require_once "bootstrap.php";
require_once "model_autoload.php";

if ($argv[1] == "-h"){
    echo "[USAGE]: ". $argv[0] . " <reporter-id> <engineer-id> <product-id> <description>";
    exit(1);
}
if ($argc != 5){
    echo "[USAGE]:". $argv[0] . " <reporter-id> <engineer-id> <product-id> <description>";
    exit(1);
}

$reporterId = $argv[1];
$engineerId = $argv[2];
$productIds = explode(",", $argv[3]);
// if ($argv[4] != "-d" || $argv[4] != "-D"){
//     echo "Usage Error! Try ". $argv[0] . "-h for help";
//     exit(1);
// }
$description = $argv[4];
$reporter = $entityManager->find("User", $reporterId);
$engineer = $entityManager->find("User", $engineerId);

if (!$reporter || !$engineer){
    echo "No reporter and/or engineer found for the given IDs";
    exit(1);
}
$bug = new Bug();
$bug->setDescription($description);
$bug->setCreated(new \DateTime("now"));
$bug->setStatus("OPEN");

foreach($productIds as $productId){
    $product = $entityManager->find("Product", $productId);
    $bug->assignToProduct($product);
}
$bug->setReporter($reporter);
$bug->setEngineer($engineer);

$entityManager->persist($bug);
$entityManager->flush();

echo "Your new Bug Id: " . $bug->getId() . "\n";
