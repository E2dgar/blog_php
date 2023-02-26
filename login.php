<?php

$error = null;
if(isset($_POST['identifiant']) && isset($_POST['password'])) {
    if($_POST['identifiant'] === "user" && $_POST['password'] === "password"){
      session_start();
      $_SESSION['connected'] = "connected";
      $error = null;


    } else {
      $error = "Identifiant ou mot de passe incorrect";
    }
    $id = htmlspecialchars($_POST['identifiant']);
    $password = htmlspecialchars(($_POST['password']));

    
}


require_once 'includes/header.php';
require_once ('includes/functions/redirectUser.php');
if(isUserConnected()) {
  redirectUser('articles.php');
}
?>
      <h1>Connexion</h1>

      <?php
        if($error){ ?>
          <p class="error">
            <?= $error ?>
          </p>
        <?php } ?>

      <form method="post" action="">
        <label for="identifiant">Identifiant</label>
        <input id="identifiant" type="text" name="identifiant" required/>

        <label for="password">Mot de passe</label>
        <input id="password" type="password" name="password" required/>
        <input type="submit" value="Se connecter"/>
      </form>

    </main>
  </body>
</html>