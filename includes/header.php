<?php
function menuItem(string $lien, string $item): string {
  $className = 'item';
  //Logique de définition de la classe
  if($_SERVER['SCRIPT_NAME'] === $lien) {
    $className .= ' active';
  }

  //On retourne notre élément HTML avec les différentes valeurs
  return '<li class="' . $className . '">
            <a href="' . $lien . '">' . $item . '</a>
          </li>';

  //Il existe une autre syntaxe qui permet une meilleure lisiblité du code dans le cas présent
  /*return <<<HTML
    <li class="$className">
      <a href="$lien">$item</a>
    </li>
HTML;*/
}
?>

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
      <?= menuItem('/blog_php/index.php', 'Home'); ?>
      <?= menuItem('/blog_php/articles.php', 'Articles'); ?>
      <li><a href="#">Connexion</a></li>
    </ul>
  </nav>
</header>

<main>