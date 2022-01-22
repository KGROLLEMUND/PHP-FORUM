
<?php
$db = mysqli_connect('localhost', 'root', '', 'php_exam_db');
if(isset($_POST['article_titre'], $_POST['article_contenu'])) {
   if(!empty($_POST['article_titre']) AND !empty($_POST['article_contenu'])) {
      
      $article_titre = htmlspecialchars($_POST['article_titre']);
      $article_contenu = htmlspecialchars($_POST['article_contenu']);
      $ins = $db->prepare('INSERT INTO article (titre, contenu, date_publication) VALUES (?, ?, NOW())');
      $ins->execute(array($article_titre, $article_contenu));
      $message = 'Votre article a bien été posté';
   } else {
      $message = 'Veuillez remplir tous les champs';
   }
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
            <h2>Page d'acceuil</h2>
          </div> 
          <a href="home.php">Acceuil</a>
          <a href="article/publier_article.php">Publier mon article</a>
          <a href="article/article.php">article</a>
          <a href="assets/html/contact.html">Contact</a>
        </div>
      </nav>
</head>
<body>
   <form method="POST">
      <input type="text" name="article_titre" placeholder="Titre" /><br />
      <textarea name="article_contenu" placeholder="Contenu de l'article"></textarea><br />
      <input type="submit" value="Publier l'article" />
   </form>
   <br />
   <?php if(isset($message)) { echo $message; } ?>
</body>
</html>