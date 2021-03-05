<?php

    require_once(__DIR__."/../PDO.php");

    if (empty($_POST["firstName"])) {
        die("Paramètres manquants");
    }

    $insertStatement = $pdo-> prepare ("INSERT INTO patients
(firstName, lastName, birthDate, phone, mail)
VALUES
(?, ?, ? , ?, ?);
");

$insertStatement -> execute ([
    $_POST["firstName"],
    $_POST["lastName"],
    $_POST["birthDate"],
    $_POST["phone"],
    $_POST["mail"]
]);


    header('Location: /Exercice-PDO-2/index.php?message=Votre patient a bien été crée');
