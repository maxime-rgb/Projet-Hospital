<?php

    require_once(__DIR__."/../PDO.php");

    if (empty($_GET["id"])) {
        die("Paramètres manquants");
    }

    $deleteAppointmentStatement = $pdo->prepare(" DELETE FROM appointments WHERE idPatients = ?");
    $deleteAppointmentStatement -> execute([$_GET["id"]]);

    $deleteStatement = $pdo->prepare("DELETE FROM patients WHERE id=?");
    $deleteStatement -> execute([$_GET["id"]]);

    header('Location: /Exercice-PDO-2/index.php?message=Votre patient a bien été supprimé');
