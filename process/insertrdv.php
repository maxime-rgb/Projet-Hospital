<?php

require_once(__DIR__."/../PDO.php");

if (empty($_POST["idPatients"])){
    die("paramètres manquants");
}


$insertStatement = $pdo->prepare(" INSERT INTO appointments (idPatients, dateHour) 
VALUES (?, ?);");

$insertStatement-> execute ([
    $_POST["idPatients"],
    $_POST ["jour"]." ".$_POST["heure"],
]);

header('Location: /Exercice-PDO-2/index.php?message=Votre rdv a bien été crée');

