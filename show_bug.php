<?php

require_once "bootstrap.php";
require_once "model_autoload.php";

$bugId = (int) $argv[1];

$bug = $entityManager->find('Bug', $bugId);

if ($bug === null){
    echo "No bug found with the ID ". $bugId . "\n";
    exit(1);
}

echo $bug->getId() . " - " . $bug->getDescription() . "\n";
