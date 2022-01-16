<?php require('actions/loginAction.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <form class="container" method="POST">

    <?php if (isset($errorMsg)) {echo '<p>'.$errorMsg.'</p>'; } ?>

        <div class="mb-3">
            <label for="InputPseudo" class="form-label">Pseudo</label>
            <input type="text" class="form-text" name="pseudo">
        </div>
        <br>
        <div class="mb-3">
            <label for="InputEmail" class="form-label">Email</label>
            <input type="text" class="form-text" name="email">
        </div>
        <br>
        <div class="mb-3">
            <label for="InputPassword" class="form-label">Password</label>
            <input type="password" class="form-text" name="password">
        </div>
        <br>
        
        <button type="submit" class="btn btn-primary" name="validate" >Se connecter</button>
        <a href="signup.php"><p>J'ai pas de compte, je m'inscris</p></a>
    </form>
</body>
</html>