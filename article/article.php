
<?php

if (isset($_GET["id"]) && !empty($_GET['id'])) {

    $sql = "SELECT * FROM article WHERE id=" . $_GET["id"];
    $db = mysqli_connect('localhost', 'root', '', 'php_exam_db');
    $request = mysqli_prepare($db,$sql);
    $request = mysqli_query($db,$sql);
    $article = mysqli_fetch_array($request);
    if (mysqli_num_rows($request) == 0) {
        header('location: ../home.php');
    }
    
} else {
    header("Location: ../home.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $article["titre"] ?></title>
</head>
<body>
    <a href="../home.php">Liste des articles</a>
    <h1><?= stripslashes($article["titre"]) ?></h1>
    <p><?= stripslashes($article["contenu"]) ?></p>
</body>
</html>