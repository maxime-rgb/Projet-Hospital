<?php

    require_once(__DIR__."/../PDO.php");

    if (empty($_GET["id"])) {
        die("Paramètres manquants");
    }

    $deleteAppointmentStatement = $pdo->prepare(" DELETE FROM appointments WHERE id = ?");
    $deleteAppointmentStatement -> execute([$_GET["id"]]);


    header('Location: /Exercice-PDO-2/index.php?message=Votre Rendez-vous a bien été supprimé');
