<?php
    <?php
    $mysqli = new mysqli("localhost", "root", "root", "php_exam"); // Connexion à la db "php_exam"
    // si vous avez une erreur ici, remplacez le deuxième "root" par une string vide
    
    $result = $mysqli->query("SELECT * FROM users"); // On utilise l'instance créée pour faire une requête bidon
    ?>

    $hello = "World";

?>
<h1>Hello <?php echo $hello ?> !</h1>