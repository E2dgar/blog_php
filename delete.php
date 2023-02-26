<?php
 $title = "Suppression article";
 require_once ('includes/functions/auth.php');
 require_once ('includes/functions/redirectUser.php');
 require_once('includes/header.php');
 
 if( !isUserConnected()) {
   redirectUser('index.php');
 }
 
 $db = new PDO(
   'mysql:host=localhost;dbname=initiationphp;charset=utf8',
   'root',
   'root',
   [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
 );


 if(isset($_POST['id'])) {
  $deleteStatement = $db->prepare('DELETE FROM articles WHERE id= :id');
  $deleteStatement->execute([
    'id' => (int)$_POST['id'],
  ]);

  redirectUser('articles.php');
}

 ?>

 <h1> Voulez-vous supprimer cet article</h1>
 <form method="post" action="">
  <input type="hidden" name="id" value=<?= $_GET['id'] ?>/>

  <input type="submit" value="Confirmer">

 </form>