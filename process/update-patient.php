<?php

    require_once(__DIR__."/../PDO.php");

    if (empty($_POST["firstName"])) {
        die("Paramètres manquants");
    }

    $sql= 'UPDATE patients SET firstName = ?, lastName = ?, birthDate = ?, phone = ?, mail= ? WHERE id = ?';
    $result = $pdo-> prepare ($sql);

$result -> execute(array(
    $_POST["firstName"],
    $_POST["lastName"],
    $_POST["birthDate"],
    $_POST["phone"],
    $_POST["mail"],
    $_GET['id']
));

header('Location: /Exercice-PDO-2/index.php?message=Votre patient a bien été modifié');
