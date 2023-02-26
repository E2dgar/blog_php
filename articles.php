<?php 
  require_once 'includes/functions/auth.php';
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
      <?php if(isUserConnected()) { ?>
          <a class="create-post" href="create.php">Créer un nouvel article</a>
      <?php } ?>

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

            <?php if(isUserConnected()) { ?>
              <nav class="admin-nav">
                <ul>
                  <li><a class="edit-link" href="edit.php?id=<?= $articleId ?>">Editer</a></li>
                  <li><a class="delete-link" href="delete.php?id=<?= $articleId ?>">Supprimer</a></li>
                  <li><a class="more" href="article.php?id=<?= $articleId ?>">Détails</a></li>
                </ul>
              </nav>
              
            <?php } else { ?>
              <a class="more" href="article.php?id=<?= $articleId ?>">Détails</a>
            <?php } ?>


          </li>

          
        <?php } ?>
        </ul>
    </main>
  </body>
</html>