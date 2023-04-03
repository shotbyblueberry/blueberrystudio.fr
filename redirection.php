<?php
  $selected_lang = 'en';  
  //Header
  $home = 'Home';  
  $latestProjects = 'Latest projects';  
  $articles = 'Blog';  
  $contact = 'Contact us'; 
  //Main
  $title = 'YOUR REQUESTS HAS BEEN SENT TO US';
  $text = 'We will get back to you as soon as possible. In the meantime, get out the popcorn and enjoy our latest clips!';
  $btn = 'our creations';

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
    global $title;
    global $field1;
    global $field2;
    global $field3;
    global $field4;
    global $field5;
    global $btn;
    if ($selected_lang == 'fr') {
      $title = 'VOTRE DEMANDE A BIEN ETE PRISE EN COMPTE';
      $text = 'Nous reviendrons vers vous dans les plus brefs délais. En attendant sortez des popcorns et savourez nos derniers clips !';
      $btn = 'nos créations';
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
  <meta name="description" content="BlueberryPictures - Contactez nous">
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
  <meta property="og:description" content="BlueberryPictures - Contactez nous">
  <meta property="og:image" content="./assets/img/MetaTags/metaTagsImg.png">
  <!--Twitter-->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:url" content="https://blueberrypictures.fr/">
  <meta property="twitter:title" content="Blueberry Pictures">
  <meta property="twitter:description" content="BlueberryPictures - Contactez nous">
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
  <link rel="stylesheet" href="./css/redirection.css">
  <link rel="stylesheet" href="./css/responsive/responsive-redirection.css">
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
        <a href="./blog.php"><?php echo $articles;?></a>
        <a class="topnavSeparator">|</a>
        <a href="./contact.php" class="active"><?php echo $contact;?></a>
        <a href="javascript:void(0);" class="icon" onclick="toggleMenu()">
          <i class="fa fa-bars"></i>
        </a>
      </div>
    </header>
    <main>   
      <h1><?php echo $title; ?></h1>
      <h2><?php echo $text; ?></h2>
      <a href="./videos.php" id="btn"><?php echo $btn; ?></a>
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