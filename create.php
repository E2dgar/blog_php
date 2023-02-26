<?php
$title = "Nouvel article";
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


//Update post
if(isset($_POST['title']) && isset($_POST['image']) && isset($_POST['content'])) {
  $updateStatement = $db->prepare('INSERT articles SET title = :title, image = :image, content= :content');
  $updateStatement->execute([
    'title' => $_POST['title'],
    'image' => $_POST['image'],
    'content' => $_POST['content']
  ]);

  redirectUser('articles.php');
}


?>

<form class="edit-form" method="post" action="">
  <label for="title">Titre</label>
  <input type="text" name="title" id="title"/>
  
  <label for="image">Lien image</label>
  <input type="text" name="image" id="image"/>
  
  <label for="content">Contenu</label>
  <textarea name="content" id="content" rows=10>
  </textarea>

  <input type="submit"/>
</form>