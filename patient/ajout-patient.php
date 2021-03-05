<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="customap.css">
    <title>Créer un patient</title>
</head>
    <body>
    <div class="container">
        <div class="form">
            <h2>Ajout de patient</h2>
            <form method="post" action="../process/insert.php" >
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
                <div class="inputBox">
                    <button>Valider</button>
                </div>
            </form>

            <div class="link">
                <a class="button" href="../index.php">Acceuil</a>
            </div>
            
        </div>
    </div>
</body>
</html>
</html>
