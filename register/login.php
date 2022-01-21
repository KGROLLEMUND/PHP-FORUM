<?php require('loginAction.php');?>
<!DOCTYPE html>
<html>
   <head>
     <title> Responsive Registration Form in PHP</title>
     <link rel="stylesheet" type="text/css" href="style.css">
      </head>

      <body>
        <div class="header">
       <h2>Login User</h2>
        </div>
       
        <form method="post" action="login.php">
          <?php require('errors.php');?>
          <div class="input-group">
              <label>pseudo:</label>
              <input type="text" name="pseudo" >
          </div>
          <div class="input-group">
              <label>Email:</label>
              <input type="email" name="email" >
          </div>
          <div class="input-group">
              <label>Password:</label>
              <input type="password" name="password" >
          </div>

          <div class="input-group">
            <button type="submit" class="btn" name="login_user">Login</button>
          </div>

          <p>
          Pas de compte ? <a href="signup.php">Sign Up</a>
          </p>
        </form>
      </body>
</html>