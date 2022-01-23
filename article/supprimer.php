<?php
$db = mysqli_connect('localhost', 'root', '', 'php_exam_db');
if(isset($_GET['id']) AND !empty($_GET['id'])) {
   $suppr_id = htmlspecialchars($_GET['id']);
   $suppr = $db->prepare('DELETE FROM article WHERE id = ?');
   $suppr->execute(array($suppr_id));
   header('Location: ../home.php');
}
?>