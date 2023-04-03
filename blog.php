<?php
  require './php/Administration/getSettingsValue.php';
  require './php/Administration/getArticlesValue.php';
  
  //Maintenance
  if (getSettingsValue('Maintenance') == 'On') {
    // Redirection 
    header("Refresh:0; url=./error/maintenance.html");
    exit();
  }
  
  $selected_lang = 'en';  
  //Header
  $home = 'Home';  
  $latestProjects = 'Latest projects';  
  $articles = 'Blog';  
  $contact = 'Contact us'; 
  //Main

  setHtmlLang();
  translateHeader();
  translateMain();

  function setHtmlLang() {
    global $selected_lang;
    if (!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
      if ((substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2)) == "fr") {
          $selected_lang = 'fr';
      }
    }
  }
  function translateHeader() {
    global $selected_lang;
    global $home;
    global $latestProjects;
    global $articles;
    global $contact;
    if ($selected_lang == 'fr') {
      $home = 'Accueil';  
      $latestProjects = 'Projets recents';  
      $articles = 'Blog';  
      $contact = 'Contactez nous';
    }
  }  
  function translateMain() {
    global $selected_lang;5;
    global $btn;
    if ($selected_lang == 'fr') {
    }
  }  
  function listIdsByPosition() {
    $pdo = new PDO('mysql:host=CONTENT_REMOVED_FOR_SECURITY_PURPOSES;dbname=CONTENT_REMOVED_FOR_SECURITY_PURPOSES', 'CONTENT_REMOVED_FOR_SECURITY_PURPOSES', 'CONTENT_REMOVED_FOR_SECURITY_PURPOSES');
    $sql = "SELECT Id, Position FROM articles ORDER BY Position ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $positionsAndIds = [];
    foreach ($results as $row) {
      $positionsAndIds[] = [
        'position' => $row['Position'],
        'id' => $row['Id']
      ];
    }
    return $positionsAndIds;
  }  
  function displayArticleById($id) {   
    global $selected_lang;
    $titreLang = 'Titre'.strtoupper($selected_lang);
    echo '<div class="article" onclick="window.open(\'article.php?articleID='.$id.'\',\'_self\')">';
    echo '  <a id="newArticle">NEW ●</a>';
    echo '  <h3>'. getArticlesValue('Categorie', $id) .'</h3>';
    echo '  <h2>'. getArticlesValue($titreLang, $id) .'</h2>';
    echo '  <a class="resume">'. getArticlesValue('Resume', $id) .'</a>';
    echo '</div>';
    echo '<hr>';
  } 
  function displaySortedArticles() {
    $sortedIds = listIdsByPosition();
    echo '<div id="articlesWrap">';
    foreach ($sortedIds as $articleId) {
      echo displayArticleById($articleId['id']);
    }
    echo '</div>';
  }
?>
<!doctype html>
<!--Développé avec ❤️ par : www.noasecond.com-->
<html lang="<?php echo $selected_lang; ?>">
<head>
  <!--Primary Meta Tags-->
  <meta charset="utf-8">
  <meta name="robots" content="follow">
  <title>Blueberry Pictures</title>
  <meta name="title" content="Blueberry Pictures">
  <meta name="description" content="BlueberryPictures - Articles">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Google tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-W16R895XFE">
  </script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-W16R895XFE');
  </script>
  <!--Open Graph / Facebook-->
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://blueberrypictures.fr/">
  <meta property="og:title" content="Blueberry Pictures">
  <meta property="og:description" content="BlueberryPictures - Articles">
  <meta property="og:image" content="./assets/img/MetaTags/metaTagsImg.png">
  <!--Twitter-->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:url" content="https://blueberrypictures.fr/">
  <meta property="twitter:title" content="Blueberry Pictures">
  <meta property="twitter:description" content="BlueberryPictures - Articles">
  <meta property="twitter:image" content="./assets/img/MetaTags/metaTagsImg.png">
  <!--FONT-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./css/font.css">
  <!--Favicon-->
  <link rel="apple-touch-icon" sizes="180x180" href="./assets/img/Favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="./assets/img/Favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="./assets/img/Favicon/favicon-16x16.png">
  <link rel="manifest" href="./assets/img/Favicon/site.webmanifest">
  <!--CSS-->
  <link rel="stylesheet" href="./css/stylesheet.css">
  <link rel="stylesheet" href="./css/responsive/responsive-stylesheet.css">
  <link rel="stylesheet" href="./css/articles.css">
  <link rel="stylesheet" href="./css/responsive/responsive-articles.css">
  </head>
  <body>
    <header>      
      <a href="./index.php" id="topnavLogoWrap">
        <img id="topnavLogoImg" src="./assets/img/Branding/Full Logo (color light).svg" alt="BluberryPictures Logo">
      </a>
      <div class="topnav" id="menuTopnav">
        <a href="./index.php"><?php echo $home;?></a>
        <a class="topnavSeparator">|</a>
        <a href="./videos.php"><?php echo $latestProjects;?></a>
        <a class="topnavSeparator">|</a>
        <a href="./blog.php" class="active"><?php echo $articles;?></a>
        <a class="topnavSeparator">|</a>
        <a href="./contact.php"><?php echo $contact;?></a>
        <a href="javascript:void(0);" class="icon" onclick="toggleMenu()">
          <i class="fa fa-bars"></i>
        </a>
      </div>
    </header>
    <main>   
      <?php displaySortedArticles(); ?>
      <img id="berry1" src="./assets/img/Branding/Blueberry2.svg" alt="Berry1">
      <img id="berry2" src="./assets/img/Branding/Blueberry.svg" alt="Berry2">
    </main>
    <footer>
      <div id="webmaster">
        <a href="https://web.noasecond.com" target="_blank">website created by Noa Second</a>
        <a href="https://web.noasecond.com" target="_blank">www.noasecond.com</a>
      </div>
      <a>mentions légales</a>
      <div id="socialMedia">          
        <a href="https://www.instagram.com/shotbyblueberry/" target="_blank">
          <img src="./assets/img/Icons/instagram.svg" alt="Instagram">
        </a>
        <a href="https://www.facebook.com/shotbyblueberry" target="_blank">
          <img src="./assets/img/Icons/facebook.svg" alt="Facebook">
        </a>
        <a href="https://api.whatsapp.com/send?phone=33749644589" target="_blank">
          <img src="./assets/img/Icons/whatsapp.svg" alt="Whatsapp">
        </a>
        <a href="https://twitter.com/ShotByBlueberry" target="_blank">
          <img src="./assets/img/Icons/twitter.svg" alt="Twitter">
        </a>
        <a href="https://www.linkedin.com/company/blueberrypictures/" target="_blank">
          <img src="./assets/img/Icons/linkedin.svg" alt="Linkedin">
        </a>
        <a href="https://www.tiktok.com/@shotbyblueberry" target="_blank">
          <img src="./assets/img/Icons/tiktok.svg" alt="Tiktok">
        </a>
      </div>
    </footer>
    <script>
      function toggleMenu() {
        var x = document.getElementById("menuTopnav");
        if (x.className === "topnav") {
          x.className += " responsive";
        } else {
          x.className = "topnav";
        }
      }
    </script>
  </body>
</html>