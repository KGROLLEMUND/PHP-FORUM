<?php
    session_start();
    

$db = mysqli_connect('localhost', 'root', '', 'php_exam_db');


if(isset($_POST['titre'], $_POST['contenu'])) {
   if(!empty($_POST['titre']) AND !empty($_POST['contenu'])) {
      
      $titre = htmlspecialchars(addslashes($_POST['titre']));
      $contenu = htmlspecialchars(addslashes($_POST['contenu']));
      
   } else {
      $message = 'Veuillez remplir tous les champs';
   }
      $sql = $db->prepare("INSERT INTO article (titre, contenu, date_publication) VALUES (?, ?,  NOW())");
      $sql->execute(array($titre, $contenu));
   
   header('Location: article.php'); 
}
?>

<!DOCTYPE html>
<html>
    <head>
    <title>Publier un article</title>
    <meta charset="utf-8">
    <nav>
            <div class="navMenu">
                <div class="header">
                    <h2>Redaction article</h2>
                </div> 
            <a href="../home.php">Accueil</a>
            <a href="article/publish_article.php">publier mon article</a>
            <a href="../register/profil.php">Profil</a>
            </div>
        </nav>
    </head>
    <body>
    <div class="container">
        <form method="POST">
            Titre: <br/>
        <input type="text" name="titre" placeholder="Titre" /><br/>
            Contenu:<br/>
        <textarea name="contenu" placeholder="Contenu de l'article"></textarea><br />
        <input type="submit" name="submit" value="Publier l'article" />
        </form> 
    
    </div>
    
    </body>
</html>

<body>