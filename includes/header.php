<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="reset.css">
  <link rel="stylesheet" href="style.css">
  <title>
    <?php 
     //On va ici définir le titre en fonction d'une variable  
        if(!isset($title)){
          echo 'Blog PHP';
        } else {
          echo $title;
        } ?>
  </title>
</head>

<body>
<header>
  <nav>
    <ul class="menu">
      <!-- Utilisation de la super variable $_SERVER -->
      <li class="<?php if($_SERVER['SCRIPT_NAME'] === '/blog_php/index.php') { echo 'active';}?>"><a href="index.php">Home</a></li>
      <li class= "<?php if($_SERVER['SCRIPT_NAME'] == '/blog_php/articles.php') { echo 'active';}?>"><a href="articles.php">Articles</a></li>
      <li><a href="#">Connexion</a></li>
    </ul>
  </nav>
</header>