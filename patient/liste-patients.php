<?php
require_once(__DIR__."/../PDO.php");


$nbPatientsParPage = 5;
    if (isset($_GET["page"]) && !empty($_GET["page"]) && $_GET["page"] > 0 && $_GET['page'] < 5) {
            $pageCourante = intval($_GET["page"]);
    } else {
        $pageCourante = 1;
    }
    $depart = ($pageCourante -1)*$nbPatientsParPage;

    $sql1 = 'SELECT * FROM patients LIMIT '.$depart.', '.$nbPatientsParPage;
    $nbPatientsTotalReq = $pdo->prepare($sql1);
    $nbPatientsTotalReq-> execute();
    $pagination = $nbPatientsTotalReq->fetchAll(PDO::FETCH_ASSOC);

if( !empty($_POST)){
    extract($_POST);
    $valid = true;

if (isset($_POST['searchUser'])){
        $searchUser = (string) trim($searchUser);

if(empty($searchUser)){

        $valid = false;
        $message_er = "Mettre une recherche";
}
        
        if($valid){    
            $req_searchStatement = $pdo->prepare(
            
            "SELECT *
            FROM patients
            WHERE lastname 
            LIKE ?
            OR firstname
            LIKE ?"
);

$req_searchStatement->execute([
             $_POST["searchUser"].'%',
             $_POST["searchUser"].'%'
]);   
        
        }    
        
        $req_search = $req_searchStatement->fetchAll(); 
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="customlp.css">
    <title>Document</title>
</head>
<body>

<h1> Zone de recherche </h1>

    <form method="post">
        <div class="form-group">
            <input class="form-control" type="search" name="searchUser"  value="<?php if(isset($searchUser)){ echo $searchUser;}?>"placeholder="Rechercher un patient"/>
            </br>
            <input type="submit" class="btn btn-primary" value="Rechercher" name="search"/>
        </div>
    </form>
    <?php

if( isset($_POST['search'])&& $valid){

    if(count($req_search)==0){
        echo "Aucun resultat";
    }

    foreach($req_search as $rs){ ?>
        <table class="table" border="1">
            <thead>
                <tr>
                <th style="background-color: rgb(255, 205, 205)">Prénom</th>
                <th style="background-color: rgb(209, 255, 245)">Nom</th>
                <th style="background-color: rgb(255, 244, 209)">Date de Naissance</th>
                </tr>
            </thead>
            <tbody>
                <td><?=$rs['firstname']?></td>
                <td><?=$rs['lastname']?></td>
                <td><?=$rs['birthdate']?></td>
            </tbody>

        </table>
<?php }
}
?>

    <h1> Liste des Patients </h1>
    <table class="table">
        <thead>
            <tr>
                <th style="background-color: green;">Prénom</th>
                <th style="background-color: blue;">Nom</th>
                <th style="background-color: purple;">Informations</th>
                <th style="background-color: yellow;">Modifier</th>
                <th style="background-color: red;">Supprimer</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        
        foreach($pdo->query($sql1) as $patient)
             {               
                echo '<tr>';
                echo '<td>' .$patient['lastname']. '</td>';
                echo '<td> '.$patient['firstname']. '</td>';
                echo '<td> '.'<a href="profil-patient.php?id='. $patient['id'].'.">👁‍👁</a>'. '</td>';
                echo '<td> '.'<a href="modifier-patient.php?id='. $patient['id'].'.">🖊</a>'. '</td>';
                echo '<td> '.'<a href="/Exercice-PDO-2/process/deletepatient.php?id='. $patient['id'].'.">❌</a>'. '</td>';
                echo '</tr>';
            }  
        ?>
        </tbody>
    </table>
    
    <div class="link">
        <a class="button" href="ajout-patient.php">Créer un nouveau patient</a>
        <a class="button" href="../index.php">Accueil</a>
    </div><?php 
        echo "Pages ";
            $pagePatients = $pdo -> query('SELECT count(*) FROM patients');
            $pag = $pagePatients->fetch();
                for($i=1;$i<=ceil($pag[0]/$nbPatientsParPage);$i++){
                    echo '<a href="liste-patients.php?totalPatients='.$pag[0].'&page='.$i.'">'.$i.'</a> ';
                }
        ?>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

</body>
</html>