<?php


require_once "bootstrap.php";
require_once "model_autoload.php";

$users = $entityManager
            ->getRepository('User')
            ->findAll();
echo "*******USER REPOSITORY*******\n";
foreach($users as $user){
    echo sprintf("\t-%s\n", $user->getName());
}