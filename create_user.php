<?php

require_once "bootstrap.php";
require_once "model_autoload.php";

$newUsername = $argv[1];

$user = new User();

$user->setName($newUsername);

$entityManager->persist($user);

$entityManager->flush();

echo "Created user with ID " . $user->getId() . "\n";
