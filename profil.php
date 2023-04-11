
<?php
if($_SERVER["REQUEST_METHOD"] === "POST") {
    $uploadDir = 'uploads/';
    $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    $uploadFile = $uploadDir . uniqid('', false) . "." . $extension;
    $authorizedExtensions = ['jpg', 'png', 'gif', 'webp'];
    $maxFileSize = 1000000;

    if (!in_array($extension, $authorizedExtensions)) {
        $errors[] = "Veuillez sélectionner une image de type jpg, png, gif ou webp";
    }
    if (file_exists($_FILES['avatar']['tmp_name']) && filesize($_FILES['avatar']['tmp_name']) > $maxFileSize) {
        $errors[] = "Votre fichier doit faire moins de 1MO !";
    }
    if (empty($errors)) {

        move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile);
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Profil</h1>

<p> <?= $_POST['firstname'] . ' ' . $_POST['lastname']?> </p>
<p> <?= $_POST['age'] . " ans"?></p>
<img src="<?= $uploadFile; ?>" alt = "photo de profil">
<a href="?delete=<?= $uploadFile; ?>">Supprimer</a>

<?php

if (isset($_GET['delete'])) :
    unlink($_GET['delete']);
    header('Location: form.php');
endif;?>

</body>
</html>