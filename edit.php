<?php

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



//On teste notre paramètre passé dans l'URL
if(isset($_GET['id'])) {
  $articleStatement = $db->prepare('SELECT * FROM articles WHERE id= :id');
  $articleStatement->execute([
    'id' => $_GET['id'],
  ]);
  $article = $articleStatement->fetch();
}

$postContent;

if($article) {
  $title = $article['title'];
  $content = $article['content'];
  $image = $article['image']; 
} 


//Update post
if(isset($_POST['title']) && isset($_POST['image']) && isset($_POST['content'])) {
  $updateStatement = $db->prepare('UPDATE articles SET title = :title, image = :image, content= :content WHERE id= :id');
  $updateStatement->execute([
    'id' => $_GET['id'],
    'title' => $_POST['title'],
    'image' => $_POST['image'],
    'content' => $_POST['content']
  ]);

  redirectUser('article.php?id=' . $_GET['id']);
}


?>

<form class="edit-form" method="post" action="">
  <label for="title">Titre</label>
  <input type="text" name="title" id="title" value="<?= $title ?>"/>
  
  <label for="image">Lien image</label>
  <input type="text" name="image" id="image" value="<?= $image ?>"/>
  
  <label for="content">Contenu</label>
  <textarea name="content" id="content" rows=10>
    <?= $content ?>
  </textarea>

  <input type="submit"/>
</form>