<?php
require_once(__DIR__."/../PDO.php");
$selectStatement = $pdo->prepare("SELECT * FROM patients, appointments WHERE appointments. idPatients = patients.id;");
$selectStatement-> execute();
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
    <h1> Liste des rendez-vous </h1>
    <table class="table">
        <thead>
            <tr>
                <th style="background-color: green;">Id</th>
                <th style="background-color: green;">Prénom</th>
                <th style="background-color: blue;">Nom</th>
                <th style="background-color: purple;">Voir RDV</th>
                <th style="background-color: yellow;">Modifier</th>
                <th style="background-color: red;">Supprimer</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        
        foreach($selectStatement->fetchAll() as $appointment)
             { 
                
                echo '<tr>';
                echo '<td>' .$appointment['id']. '</td>';
                echo '<td> '.$appointment['lastname']. '</td>';
                echo '<td> '.$appointment['firstname']. '</td>';
                echo '<td> '.'<a href="voirrdv.php?id='. $appointment['id'].'.">👁‍👁</a>'. '</td>';
                echo '<td> '.'<a href="modifier-rdv.php?id='. $appointment['id'].'.">🖊</a>'. '</td>';
                echo '<td> '.'<a href="/Exercice-PDO-2/process/deleterdv.php?id='. $appointment['id'].'.">❌</a>'. '</td>';
                echo '</tr>';
            }
            
            ?>
        </tbody>


    </table>
    <div class="link">
        <a class="button" href="ajouterrdv.php">Créer un nouveau rendez-vous</a>
        <a class="button" href="../index.php">Accueil</a>
    </div>
    
</body>
</html>

