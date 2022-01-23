<?php include('signupAction.php');?>
<?php include('errors.php');?>
<!DOCTYPE html>
<html>
<head>
    <title> Signup</title>
     <link rel="stylesheet" type="text/css" href="style.css">
</head>

  <body>  
     
    <form method="POST" action="signup.php">
      
      <div class="input-group">
        <label>Pseudo:</label>
         <input type="text" name="pseudo" value="" >
      </div> 
      <div class="input-group">
      	<label>Email:</label>
       <input type="text" name="email" value="" >
      </div>
      <div class="input-group">
       <label>Password:</label>
       <input type="password" name="password">
      </div>
      <div class="input-group">
       <button type="submit" class="btn" name="reg_user">S'inscrire</button>
      </div>
      <p>
         Déjà un compte ? <a href="login.php">Sign In</a>
      </p>
     </form>
  </body>
   
</html>