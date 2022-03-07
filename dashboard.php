<?php
//dashboard.php <user-id>

require_once "bootstrap.php";
require_once "model_autoload.php";

$userId = (int)$argv[1];

$dql = "SELECT b, e, r FROM Bug b JOIN b.engineer e JOIN b.reporter r WHERE b.status = 'OPEN' AND (e.id = ?1 OR r.id = ?1) ORDER BY b.created DESC";

$userBugs = $entityManager
                    ->createQuery($dql)
                    ->setParameter(1, $userId)
                    ->setMaxResults(15)
                    ->getResult();

echo "There are ". count($userBugs) . " bug(s) associated with this user.\n";
foreach($userBugs as $bug){
    echo $bug->getId() . " - " .$bug->getDescription() . "\n"; 
}
