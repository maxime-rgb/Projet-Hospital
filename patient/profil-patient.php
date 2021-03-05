<?php
    require_once(__DIR__."/../PDO.php");

    $selectStatement =$pdo->prepare("SELECT * FROM patients WHERE id=?");
    $selectStatement-> execute([
        $_GET["id"]
    ]);

    $patient = $selectStatement->fetch();

    $selectRdvStatement = $pdo->prepare(
        "SELECT appointments.*, patients.firstname, patients.lastname 
        FROM appointments 
        JOIN patients 
        ON patients.id = appointments.idPatients 
        WHERE patients.id=?");
    $selectRdvStatement-> execute([
            $_GET["id"]
        ]);

        
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="customlpa.css">
        <title>Document</title>
    </head>
<body>
<h1> Details de la fiche patient </h1> 
    <table class="table">
        <thead>
            <tr>
                <th style="background-color: green;">Prénom</th>
                <th style="background-color: blue;">Nom</th>
                <th style="background-color: purple;">Date de naissance</th>
                <th style="background-color: purple;">Telephone</th>
                <th style="background-color: purple;">E-Mail</th>
            </tr>
        </thead>
    <tbody>
        <?php 
                echo '<tr>';
                echo '<td>' .$patient['lastname']. '</td>';
                echo '<td> '.$patient['firstname']. '</td>';
                echo '<td> '.$patient['birthdate']. '</td>';
                echo '<td> '.$patient['phone']. '</td>';
                echo '<td> '.$patient['mail']. '</td>';
                echo '</tr>';
        ?>
    </tbody>

    </table>

    <h1> Liste des rendez-vous </h1>
    <table class="table">
            <thead>
                <tr>

                    <th style="background-color: purple;">RDV</th>

                </tr>
            </thead>
        <tbody>
            <?php 
                foreach($selectRdvStatement->fetchAll() as $appointment){
                    echo '<tr>';
                    echo '<td> '.$appointment['dateHour']. '</td>';
                    echo '</tr>';
                }
            ?>
        </tbody>
    </table>
        <a class="button" href="./liste-patients.php ">Revenir à la liste des patients</a><br>

</body>
</html>