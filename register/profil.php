<?php
session_start();

$db = mysqli_connect('localhost', 'root', '', 'php_exam_db');
 
if (isset($_GET["id"]) && !empty($_GET['id'])) {
    $requser = $db->prepare('SELECT email, pseudo FROM users WHERE id =' . $_GET["id"]);
    $requser= mysqli_query($_GET['id']);
    $userinfo = mysqli_fetch_array($requser);
    
}    

?>
<!DOCTYPE html>
<html>
   <head>
      <title>Profil</title>
      <meta charset="utf-8">
      <nav>
        <div class="navMenu">
          <a href="../home.php">Acceuil</a>
          <a href="../article/publish_article.php">Publier mon article</a>
          <a href="login.php?logout='1'" style="color:red">Logout</a>    
        </div>
      </nav>
   </head>
   <body>
      <div align="center">
        <h2>Profil de <?php echo $_SESSION['pseudo']; ?></h2>
         <br /><br />
         Pseudo : <?php echo $_SESSION['pseudo']; ?>
         <br />
         email : <?php echo $_SESSION['email']; ?>
         <br />
      </div>
   </body>
</html>
