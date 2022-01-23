<?php
session_start();
$userinfo = "";
$db = mysqli_connect('localhost', 'root', '', 'php_exam_db');
 
if(isset($_GET['pseudo']) AND $_GET['pseudo'] > 0) {
    $getid = intval($_GET['id']);
    $requser = $bdd->prepare('SELECT * FROM users WHERE id = ?');
    $requser->execute(array($getid));
    $userinfo = mysqli_fetch_array($requser);
    
}   

?>
<!DOCTYPE html>
<html>
   <head>
      <title>Profil</title>
      <meta charset="utf-8">
   </head>
   <body>
      <div align="center">
         <h2>Profil de <?php echo $userinfo['pseudo']; ?></h2>
         <br /><br />
         Pseudo : <?php echo $userinfo['pseudo']; ?>
         <br />
         Mail : <?php echo $userinfo['mail']; ?>
         <br />
      </div>
   </body>
</html>
