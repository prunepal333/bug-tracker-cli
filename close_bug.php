<?php
//close_bug.php <bug-id>

require_once "bootstrap.php";
require_once "model_autoload.php";

$bugId = (int)$argv[1];

$bug = $entityManager->find("Bug", $bugId);

$bug->close();

$entityManager->persist($bug);
$entityManager->flush();
