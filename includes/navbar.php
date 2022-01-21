<?php
    session_start();
    if (!isset($_SESSION['pseudo'])) {
  	$_SESSION['msg'] = "Vous devez vous connecter";
  	header('location: register/login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['pseudo']);
  	header('location: register/login.php');
  }
?>
<?php if (isset($_SESSION['pseudo'])) :?>
            
    <p><a href="navbar.php?logout='1'" style="color:red">Logout</a></p>
    <?php endif ?>

<nav class="navbar ">
  <div class="container-fluid">
    <a class="Title" >Forum</a>
    <div class="collapse " id="navbarSuppor">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Les questions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="publish-question.php">Publier une question</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="my-questions.php">Mes questions</a>
        </li>
        
        
      </ul>
    </div>
  </div>
</nav>