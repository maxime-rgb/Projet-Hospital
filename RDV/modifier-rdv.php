<?php

require_once(__DIR__."/../PDO.php");

$sql1 = 'SELECT * FROM `appointments`
WHERE `id` = ?';

$selectStatement = $pdo->prepare($sql1);
$selectStatement ->execute([$_GET ['id']]);

$profile = $selectStatement -> fetch();
$dateTime = explode(" ",$profile['dateHour']);
$date = $dateTime[0];
$heure = $dateTime[1];

if(isset($_GET["message"])){
    echo "<div style='padding: 10px; background-color: green; color: white'>".$_GET['message']."</div>";

}

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

    <div class="container">
            <div class="row">
                <div id="form3">

                    <h1>Modifier un Rendez vous</h1>
                        <form method="post" action="../process/updaterdv.php?id=<?=$_GET['id']?>">


                            <div class="rowTab3"> 
                                <div class="labels3">
                                    <label>* Choisir une date et une heure :</label>
                                </div>
                                <div class="rightTab3">
                                    <input type="date" name="jour" class="input-field" required value="<?=$date?>">
                                    <input type="time" name="heure" min="09:00" max="18:00" required value="<?=$heure?>">
                                </div>     
                            </div>
                            <button class="action-button animate red">Soumettre</button>
                        </form>
                </div>
            </div>
        </div>

    <div class="link">
        <a class="button" href="ajouterrdv.php">Créer un nouveau rendez-vous</a>
        <a class="button" href="../index.php">Acceuil</a>
    </div>
        
</body>
</html>
</html>