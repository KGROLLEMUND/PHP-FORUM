
<?php 
    
    session_start();
    if(!isset($_SESSION['auth'])){
        header('Location: register/login.php');
    }

  
  
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['auth']);
  	header('location: register/login.php');
  }
?>
<?php
$db = mysqli_connect('localhost', 'root', '', 'php_exam_db');
$query = "SELECT * FROM article ORDER BY date_publication DESC";
$articles = mysqli_query($db, $query);
$result = mysqli_fetch_array($articles);
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
            <h2>Page d'Accueil</h2>
          </div> 
          <a href="home.php">Accueil</a>
          <a href="article/publish_article.php">Publier mon article</a>
          <a href="register/profil.php">Profil</a>
          <a href="register/login.php?logout='1'" style="color:red">Logout</a>    
        </div>
      </nav>
 </head>
  <body> 
        <ul>
        <?php
        $db = mysqli_connect('localhost', 'root', '', 'php_exam_db');
        $sql = "SELECT id, titre FROM article ORDER BY date_publication DESC ";
        $request = mysqli_query($db,$sql);
        while ($row = mysqli_fetch_array($request))
        {
        ?>
          <li><a href="article/article.php?id=<?= $row["id"]?>"><?= stripslashes($row['titre']) ?></a>| <a href="article/supprimer.php?id=<?= $row['id'] ?>">Supprimer</a></li>
        <?php
        }
        ?>  
    </ul> 
    </div>
  </body>

</html>