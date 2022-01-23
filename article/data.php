<?php

$db = mysqli_connect('localhost', 'root', '', 'php_exam_db');
if(isset($_POST['titre'], $_POST['contenu'])) {
   if(!empty($_POST['titre']) AND !empty($_POST['contenu'])) {
      
      $titre = htmlspecialchars(addslashes($_POST['titre']));
      $contenu = htmlspecialchars(addslashes($_POST['contenu']));
      

      
      $sql = $db->prepare("INSERT INTO article (titre, contenu, date_publication) VALUES (?, ?,  NOW())");
      $sql->execute(array($titre, $contenu));
   }
   header('Location: article.php'); 
}
?>
   