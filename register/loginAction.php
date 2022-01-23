<?php
   
   
   //Define valiables
   $pseudo = "";
   $email = "";
   $errors = array();
   $db = mysqli_connect('localhost', 'root', '', 'php_exam_db');

   //Check for Login 

   if (isset($_POST['login_user'])) {
    $pseudo = mysqli_real_escape_string($db, $_POST['pseudo']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($pseudo)) {
        array_push($errors, "pseudo requis");
    }

    if (empty($email)) {
        array_push($errors, "email requis");
    }

    if (empty($password)) {
        array_push($errors, "Password requis");
    }

    if (count($errors) == 0) {
        $password = md5($password);

        $query = "SELECT * FROM users WHERE pseudo='$pseudo' AND email='$email' AND mdp='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['auth'] = true;
		    $_SESSION['id'] = $usersInfos['id'];
		    $_SESSION['email'] = $usersInfos['email'];
		    $_SESSION['pseudo'] = $usersInfos['pseudo'];
            header('location: ../home.php');
        } else{
        array_push($errors, "Mauvais pseudo ou Password");
        }
    }
}