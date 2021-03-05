<?php
require_once(__DIR__."/../PDO.php");
$userId = $_GET['id'];
$sql1 = 'SELECT * FROM patients WHERE id = '. $userId;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="customlpa.css">
    <title>Modifier un patient</title>
</head>
    <body>
    <div class="container">
        <div class="form">

            <h2>Modification de patient</h2>

            <form method="post" action="../process/update-patient.php?id=<?=$userId?>">

                <div class="inputBox">
                    <input type="text" name="firstName" placeholder="Firstname" >
                </span>
                <span class="line"></span>
                </div>
                <div class="inputBox">
                    <input type="text" name="lastName" placeholder="Lastname">
                </span>
                <span class="line"></span>
                </div>
                <div class="inputBox">
                    <input type="date" name="birthDate" placeholder="Date of birth">
                </span>
                <span class="line"></span>
                </div>
                <div class="inputBox">
                    <input type="text" name="phone" placeholder="Phone number">
                </span>
                <span class="line"></span>
                </div>
                <div class="inputBox">
                    <input type="text" name="mail" placeholder="Your Email">
                </span>
                <span class="line"></span>
                </div>
                <div class="inputBox">
                    <button>Modifier</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
</html>
