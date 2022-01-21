<?php
   session_start();
   
   //Define valiables
   $pseudo = "";
   $email = "";
   $errors = array();

   $db = mysqli_connect('localhost', 'root', '', 'php_exam_db');

   if(isset($_POST['reg_user'])){

   	$pseudo = mysqli_real_escape_string($db, $_POST['pseudo']);
   	$email = mysqli_real_escape_string($db, $_POST['email']);
   	$password = mysqli_real_escape_string($db, $_POST['password']);

   	//check if details are filled

   	if (empty($pseudo)) {
   	    array_push($errors, "pseudo requis");
   	}
   	if (empty($email)) {
   	 	array_push($errors, "Email requis");
   	}
   	if (empty($password)) {
   	  	array_push($errors, "Password requis");
   	}
     

   	//Checking if user already exist in the db

   	$user_check = "SELECT * FROM users WHERE pseudo ='$pseudo' OR email ='$email' LIMIT 1";
   	$result = mysqli_query($db,$user_check );
   	$user = mysqli_fetch_assoc($result);

   	if ($user) {
   	    if ($user['pseudo'] === $pseudo) {
   	 		array_push($errors, "Le pseudo existe déjà"); 	 	
   	    }

   	    if ($user['email'] === $email) {
   	 		array_push($errors, "L'Email existe déjà");
   	    }
   	}

   	//inser data into the db
   	if (count($errors) ==0) {
   	$password = md5($password);  //password encryption


   	$query = "INSERT INTO users(pseudo,email,mdp) VALUES('$pseudo', '$email', '$password')";	   
    mysqli_query($db,$query);
    $_SESSION['pseudo'] = $pseudo;
    $_SESSION['success'] ="Vous êtes connecté";
    header('location: ../home.php');
   	}
   }
