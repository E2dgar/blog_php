<?php 
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

    $postContent = <<<HTML
    <h1>$title</h1>
    <div class="article-content">
      <img src=$image alt='Illustration' . $title/>
      <p>$content</p>
    </div>
HTML;

  } else { 
    $postContent = '<h2>Désolé, une erreur est survenue</h2>';
  }

  require_once 'includes/header.php';
  echo $postContent; ?>

    </main>
  </body>
</html>
 