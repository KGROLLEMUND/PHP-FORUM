<?php
require('actions/database.php'); 

if (isset($_POST['validate'])) {
    if (!empty($_POST['pseudo']) AND !empty($_POST['email']) AND !empty($_POST['password'])) {
        
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_email = htmlspecialchars($_POST['email']);
        $user_password = htmlspecialchars($_POST['password'], PASSWORD_DEFAULT);    

        $checkIfUserExists = $mysqli->prepare('SELECT * FROM users WHERE pseudo = ?');
        $checkIfUserExists->execute(array($user_pseudo));

        if ($checkIfUserExists->rowCount() > 0) {

            $userInfos = $checkIfUserExists->fetch->fetch();
            if (password_verify($user_password, $userInfos['mdp'])) {
                
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $usersInfos['id'];
                $_SESSION['lastname'] = $usersInfos['nom'];
                $_SESSION['firstname'] = $usersInfos['prenom'];
                $_SESSION['pseudo'] = $usersInfos['pseudo'];

                header('Location: index.php');
            }else {
                $errorMsg = "Votre mot de passe est incorect";
            }
        }else {
            $errorMsg = "Votre pseudo est incorect";
        }

    }else {
        $errorMsg = "Veuillez completer tous les champs";
    }
}