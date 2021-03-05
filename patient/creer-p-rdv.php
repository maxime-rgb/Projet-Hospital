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
    <link rel="stylesheet" href="customapa.css">
    <title>Créer un patient</title>
</head>
    <body>
    <div class="container">
        <div class="form">
            <h1>Ajout de patient</h1>
            <form method="post" action="../process/insertfull.php" >
                <div class="inputBox">
                    <input type="text" name="firstName" placeholder="Maxime">
                </span>
                <span class="line"></span>
                </div>
                <div class="inputBox">
                    <input type="text" name="lastName" required placeholder="THOMAS">
                </span>
                <span class="line"></span>
                </div>
                <div class="inputBox">
                    <input type="date" name="birthDate" required placeholder="20/09/1991">
                </span>
                <span class="line"></span>
                </div>
                <div class="inputBox">
                    <input type="text" name="phone" required placeholder="0650627122">
                </span>
                <span class="line"></span>
                </div>
                <div class="inputBox">
                    <input type="text" name="mail"  required placeholder="xxxxx@gmail.com ">
                </span>
                <span class="line"></span>
                </div>
         
                    <h1>Ajouter un Rendez vous</h1>


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

        
    <div class="links">
        <a class="button" href="/Exercice-PDO-2/patient/liste-patients.php">Acceder à la liste des patients</a> 
        <a class="button" href="../index.php">Acceuil</a>   
    </div>

</body>
</html>
</html>
