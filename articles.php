<?php 
  $title = "Articles";
  require_once 'includes/header.php'; 
  require_once 'includes/functions/excerpt.php';

  try {
    $db = new PDO(
      'mysql:host=localhost;dbname=initiationphp;charset=utf8',
      'root',
      'root'
    );
  } catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
  }

  $articleStatement = $db->prepare('SELECT * FROM articles');
  $articleStatement->execute();
  $articles = $articleStatement->fetchAll();

  ?>
    <main>
      <ul class="articles-list">
      <?php
        foreach($articles as $article) { 
          
          $articleId = $article['id'];
          $title = $article['title'];
          $content = $article['content'];
          $imageLink = $article['image'];          ?>

          <li class="article">
            <img src="<?= $imageLink ?>" alt="Illustration image"/>
            <h2><?= ucfirst($title) ?></h2>
            <p><?= getExcerpt($content) ?></p>
            <a href="article.php?id=<?= $articleId ?>">Détails</a>
          </li>

          
        <?php } ?>
        </ul>
    </main>
  </body>

</html>