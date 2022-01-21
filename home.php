<?php require('includes/navbar.php'); ?>
<?php 
  session_start();

  if (!isset($_SESSION['pseudo'])) {
  	$_SESSION['msg'] = "Vous devez vous connecter";
  	header('location: register/login.php');
  }
  

?>

<!DOCTYPE html>
<html>
 <head>
     <title> Home</title>
     <link rel="stylesheet" type="text/css" href="style.css">
 </head>
  <body>
   <div class="header">
    <h2>Page d'acceuil</h2>

    </div>    
     <div class="content">
       <?php 
       if (isset($_SESSION['succcess'])) :?> 
        <div class="error success"></div>
       <?php endif ?>
       
        
    </div>
  </body>

</html>