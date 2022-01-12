<?php

require('actions/database.php');

if (isset($_POST['validate'])) {
    if (!empty($_POST['pseudo']) AND !empty($_POST['lastname']) AND !empty($_POST['firstname']) AND !empty($_POST['email']) AND !empty($_POST['password'])) {
        
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_lastname = htmlspecialchars($_POST['lastname']);
        $user_firstname = htmlspecialchars($_POST['firstname']);
        $user_email = htmlspecialchars($_POST['email']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $checkIfUserAlreadyExists = $mysqli->prepare('SELECT pseudo FROM Users WHERE pseudo = ?');
        $checkIfUserAlreadyExists->execute(array($user_pseudo));

        if ($checkIfUserAlreadyExists->rowCount() == 0) {
            
            $insertUserOnWebsite = $mysqli->prepare('INSERT INTO Users(pseudo, nom, prenom, mdp, email) VALUES(?, ?, ?, ?, ?)');
            $insertUserOnWebsite->execute(array($user_pseudo, $user_lastname, $user_firstname, $user_password, $user_email));
        }else {
            $errorMsg = "l'utilisateur existe déjà";
        }


    }else {
        $errorMsg = "Veuillez completer tous les champs..";
    }
}