
<?php 
  session_start();

  if (!isset($_SESSION['pseudo'])) {
  	$_SESSION['msg'] = "You must login first";
  	header('location: register/login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['pseudo']);
  	header('location: register/login.php');
  }
?>
<?php
$db = mysqli_connect('localhost', 'root', '', 'php_exam_db');
$query = "SELECT * FROM article ORDER BY date_publication DESC";
$articles = mysqli_query($db, $query);
$result = mysqli_fetch_assoc($articles);
?>

<!DOCTYPE html>
<html>
 <head>
     <title> Home</title>
     <meta charset="utf-8">
     <link rel="stylesheet" type="text/css" href="style.css">
     <nav>
        <div class="navMenu">
          <div class="header">
            <h2>Page d'acceuil</h2>
          </div> 
          <a href="home.php">Acceuil</a>
          <a href="article/publier_article.php">Publier mon article</a>
          <a href="assets/html/team.html">L'équipe</a>
          <a href="assets/html/contact.html">Contact</a>
        </div>
      </nav>
 </head>
  <body>
   <div class="header">
    <h2>Page d'acceuil</h2>
    </div>    
     <div class="content">
      <?php if (isset($_SESSION['succcess'])) :?>   
      <div class="error success">
        <h3>
        <?php  
        echo $_SESSION['success'];
        unset($_SESSION['success']);
        ?>
        </h3>
      </div>
      <?php endif ?>
        <?php if (isset($_SESSION['pseudo'])) :?>
        <p> Welcome! <strong><?php echo $_SESSION['pseudo'];?></strong></p>
        
        <?php endif ?>

      <ul>
        <?php while($a = $result) { ?>
        <li><a href="article/article.php?id=<?= $a['id'] ?>"><?= $a['titre'] ?></a></li>
        <?php } ?>
      <ul>
    </div>
  </body>

</html>