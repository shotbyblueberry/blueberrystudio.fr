<?php
  require './php/Administration/getSettingsValue.php';
  require './php/Administration/getArticlesValue.php';

  //Maintenance
  if (getSettingsValue('Maintenance') == 'On') {
    // Redirection 
    header("Refresh:0; url=./error/maintenance.html");
    exit();
  }
  
  $articleID = $_GET['articleID'];

  $selected_lang = 'en';  
  //Header
  $home = 'Home';  
  $latestProjects = 'Latest projects';  
  $articles = 'Blog';  
  $contact = 'Contact us'; 
  //Main
  $byAutor = 'By';
  $titreLang = 'TitreEN';

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
    global $selected_lang;
    global $byAutor;
    global $articleID;
    global $titreLang;
    if ($selected_lang == 'fr') {
      $byAutor = 'par';
      $title = getArticlesValue('TitreFR', $articleID);
      $titreLang = 'TitreFR';
    }
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
  <meta name="description" content="BlueberryPictures - Article">
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
  <meta property="og:description" content="BlueberryPictures - Article">
  <meta property="og:image" content="./assets/img/MetaTags/metaTagsImg.png">
  <!--Twitter-->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:url" content="https://blueberrypictures.fr/">
  <meta property="twitter:title" content="Blueberry Pictures">
  <meta property="twitter:description" content="BlueberryPictures - Article">
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
  <link rel="stylesheet" href="./css/article.css">
  <link rel="stylesheet" href="./css/responsive/responsive-article.css">
  </head>
  <body>
    <img src="./<?php echo getArticlesValue('URLImage', $articleID); ?>" alt="Header Background Image" id="headerImg">
    <header>
      <a href="./blog.php" id="ArrowWrap">
        <img src="./assets/img/Others/down-arrow.svg" class="downarrow" alt="Down Arrow">
      </a>
      <div id="headerWrap">
        <h1><?php echo getArticlesValue($titreLang, $articleID); ?></h1>
        <h4 id="headerAutor"><?php echo $byAutor.' '.getArticlesValue('Auteur', $articleID); ?></h4>
      </div>
    </header>
    <main>
      <?php echo getArticleMainContent($selected_lang, $articleID); ?>
    </main>
    <footer>
      <h6>About the author</h6>
      <div id="footerContent">
        <div id="footerText">
          <p class="withoutIndent" id="profilTextWrap">
            <a id="profilText">Jessica Dralet is a Brighton-based (UK) artist manager. Alongside of her managing releases, gigs and artists,
              she is also an artist herself by the name of Rose Thorn, blues rock singer songwriter. She is also a business
              and artist development consultant for artists in Blueberry pictures and she offers a range of services for
              instance: marketing, branding and artist development. Furthermore, she writes biographies for a living whether
              they are for events or press releases. Indeed, press releases are a service Blueberry pictures can offer for
              artists who want a professional template for their promotion: for radio, blogs and magazines. All services and
              consultations are online.</a>
          </p>
        </div>
      <img id="profil" src="./assets/img/Articles/Jessica.webp" alt="Profil">
      </div>
      <div id="buttonWrap">
        <a href="./contact.php" id="button">book a session</a>
      </div>
    </footer>
    <img id="berry" src="./assets/img/Branding/Blueberry3.svg" alt="berry">
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