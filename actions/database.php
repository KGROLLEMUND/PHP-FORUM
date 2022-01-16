<?php
try {
    session_start();
    $mysqli = new mysqli("localhost", "root", "", "php_exam_db"); // Connexion à la db "php_exam"
    // si vous avez une erreur ici, remplacez le deuxième "root" par une string vide
    
    $result = $mysqli->query("SELECT * FROM users"); // On utilise l'instance créée pour faire une requête bidon
} catch (Exception $e) {
    die('une erreur a été trouvée : ' . $e->getMessage());
}
    
    