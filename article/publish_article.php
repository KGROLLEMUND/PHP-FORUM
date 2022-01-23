<?php
    session_start();
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
            <a href="../home.php">Acceuil</a>
            <a href="article/publish_article.php">publier mon article</a>
            </div>
        </nav>
    </head>
    <body>
    <div class="container">
        <form method="POST" action="data.php">
            Titre: <br/>
        <input type="text" name="titre" required /><br/>
            Contenu:<br/>
        <textarea name="contenu" required ></textarea><br/>
        <input type="submit" name="submit" value="Publier l'article" />
        </form> 
    
    </div>
    
    </body>
</html>

<body>