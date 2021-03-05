<?php

/* ALLER CHERCHER FICHIER PDO avec CHEMIN ABSOLUT ONCE = appeler 1 seule fois */

require_once(__DIR__."/../PDO.php");


$sql1 = 'SELECT * FROM patients';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../patient/customlp.css">
    <title>Document</title>
</head>
<body>

    <div class="container">
            <div class="row">
                <div id="form3">

                    <h1>Ajouter un Rendez vous !</h1>
                        <form method="post" action="../process/insertrdv.php">

                            <div class="rowTab3"> 
                                <div class="labels3">
                                    <label>* ID patient:</label>
                                    <select class="select" name="idPatients">
                                        <option></option>
                                        <?php foreach($pdo->query($sql1) as $patient) { ?>
                                            <option value="<?=$patient["id"]?>"><?=$patient["firstname"]?> <?=$patient["lastname"]?> </opion>
                                        <?php } ?>
                                    </select>
                                </div>     
                            </div>

                            <div class="rowTab3"> 
                                <div class="labels3">
                                    <label>* Choisir une date et une heure :</label>
                                </div>
                                <div class="rightTab3">
                                    <input type="date" name="jour" class="input-field" required>
                                    <input type="time" name="heure" min="09:00" max="18:00" required>
                                </div>     
                            </div>
                            <button class="action-button animate red">Soumettre</button>
                        </form>
                </div>
            </div>
        </div>
        
    <div class="link">
        <a class="button" href="/Exercice-PDO-2/patient/liste-patients.php">Acceder à la liste des patients</a> 
        <a class="button" href="../index.php">Acceuil</a>   
    </div>

    
</body>
</html>
</html>