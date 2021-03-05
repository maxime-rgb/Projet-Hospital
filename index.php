<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./custom1.css">
        <title>Patients et RDV</title>
    </head>
<body>

    <?php if (isset($_GET["message"])):?>

    <div style="padding:10px;background:green;color:#fff;">
        <?=$_GET["message"]?>
    </div>

    <?php endif; ?>

    <div class="containerlink">
        <!--<a class="link" href="./patient/ajout-patient.php">Créer un patient</a><br>!-->
        <a class="link" href="./patient/liste-patients.php">Liste des patients</a><br>
        <!--<a class="link" href="./RDV/ajouterrdv.php">Ajouter un RDV</a><br>!-->
        <a class="link" href="./RDV/listerdv.php">Liste des Rendez-vous</a><br>
        <a class="link" href="./patient/creer-p-rdv.php">Créer un patient et un rendez-vous</a>
    </div>

</body>
</html>
