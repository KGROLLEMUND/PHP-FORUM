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
	if(count($errors) ==0){
		//inser data into the db
		if (count($errors) ==0) {
		$password = md5($password);  //password encryption

		$query = "INSERT INTO users(pseudo,email,mdp) VALUES('$pseudo', '$email', '$password')";	   
		mysqli_query($db,$query);

		$user_infos = "SELECT id, pseudo, email FROM users WHERE pseudo = '$pseudo' AND email = '$email' ";
		$result = mysqli_query($db,$user_infos);
		$usersInfos = mysqli_fetch_array($result);
		header('location: ../home.php');
			//Authentifier l'utilisateur sur le site et récupérer ses données dans des variables globales sessions
		$_SESSION['auth'] = true;
		$_SESSION['id'] = $usersInfos['id'];
		$_SESSION['email'] = $usersInfos['email'];
		$_SESSION['pseudo'] = $usersInfos['pseudo'];
		
		}
	} else {
		$errorMsg = "L'utilisateur existe déjà sur le site";
	}
   }
