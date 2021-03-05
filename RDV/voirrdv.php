<?php
require_once(__DIR__."/../PDO.php");
$selectStatement = $pdo->prepare(
    "SELECT appointments.*, patients.firstname, patients.lastname 
     FROM appointments 
     JOIN patients 
     ON patients.id = appointments.idPatients 
     WHERE appointments.id=?");

$selectStatement-> execute([
    $_GET["id"]
]);

$appointments = $selectStatement->fetch();

?>
   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./custom-l-rdv.css">
    <title>Document</title>
</head>
<body>
<h1> Voir les rendez vous </h1>
    <table class="table">
        <thead>
            <tr>
                <th style="background-color: green;">id</th>
                <th style="background-color: blue;">id du patient</th>
                <th style="background-color: purple;">Nom</th>
                <th style="background-color: purple;">Prenom</th>
                <th style="background-color: purple;">Date et Heure</th>
                <th style="background-color: yellow;">Modifier</th>
            </tr>
        </thead>
        <tbody>
        <?php 
             { 
                echo '<tr>';
                echo '<td>' .$appointments['id']. '</td>';
                echo '<td> '.$appointments['idPatients']. '</td>';
                echo '<td>' .$appointments['lastname']. '</td>';
                echo '<td> '.$appointments['firstname']. '</td>';
                echo '<td> '.$appointments['dateHour']. '</td>';
                echo '<td> '.'<a href="./modifier-rdv.php?id=' .$appointments['id'].'.">🖊</a>'. '</td>';
                echo '</tr>';
            }
            
            ?>
        </tbody>
    </table>
    <a class="button" href="./listerdv.php ">Revenir à la liste des RDV</a><br>
</body>
</html>