<?php

$errors = [];
if($_SERVER["REQUEST_METHOD"] === "POST") {

    if(!isset($_POST['firstname']) || trim($_POST['firstname']) === '') {
        $errors[] = "Le prénom est obligatoire";
    }
    if(!isset($_POST['lastname']) || trim($_POST['lastname']) === '') {
        $errors[] = "Le nom est obligatoire";
    }
    if(!isset($_POST['age']) || trim($_POST['age']) === '') {
        $errors[] = "L'age est obligatoire";
    } elseif ($_POST['age'] < 0){
        $errors[] = "L'age ne peut pas être négatif";
    }
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil de Homer</title>

    <style>
        div, button{
            margin: 8px;
            padding : 4px;
        }
        input{
            margin: 8px 0;
        }
    </style>

</head>
    <body>
        <h1>Crée ton profil :</h1>

        <?php
        if ($errors) : ?>
            <ul>
            <?php foreach ($errors as $error) :?>
                <li><?= $error ?></li>
            </ul>
            <?php
            endforeach;
        endif;
        ?>

        <form action="profil.php" method="post" enctype="multipart/form-data">
            <div>
                <label for="firstname">Prénom :</label>
                <br>
                <input type="text" name="firstname" id="firstname">
            </div>
            <div>
                <label for="lastname">Nom :</label>
                <br>
                <input type="text" name="lastname" id="lastname">
            </div>
            <div>
                <label for="age">Age :</label>
                <br>
                <input type="number" name="age" id="age">
            </div>
            <div>
                <label for="imageUpload">Télécharge ta photo de profil :</label>
                <br>
                <input type="file" name="avatar" id="imageUpload">
            </div>
            <button>Envoyer</button>
        </form>
    </body>
</html>