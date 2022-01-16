<?php require('actions/securityAction.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php include '/includeshead.html'; ?>
<body>
    <form class="container" method="POST">

    <?php if (isset($errorMsg)) {echo '<p>'.$errorMsg.'</p>'; } ?>

        <div class="mb-3">
            <label for="InputPseudo" class="form-label">Titre de l'article</label>
            <input type="text" class="form-text" name="titre">
        </div>
        <br>
        <div class="mb-3">
            <label for="InputNom" class="form-label">Description de l'article</label>
            <textarea class="form-control" class="form-text" name="Description"></textarea>
        </div>
        <br>
        <div class="mb-3">
            <label for="InputPrenom" class="form-label">Contenue de l'article</label>
            <textarea class="form-control"type="text" class="form-text" name="Content"></textarea>
        </div>
        <br>
       

        <button type="submit" class="btn btn-primary" name="validate" >S'inscrire</button>

        <a href="login.php"><p>J'ai déja un compte, je me connecte</p></a>
    </form>

</body>
</html>