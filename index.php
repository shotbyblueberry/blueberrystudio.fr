<?php
  require './php/Administration/getSettingsValue.php';
  require './php/Administration/getVideosValue.php';
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
  $Sect1text1 = 'Music video release';
  $Sect1learnMore = 'Learn more';
  $Sect2title = 'Latest news & releases';
  $Sect2getKnowUs = 'Get to know us !';
  $Sect2R1Type = getSettingsValue('R1Type');
  $Sect2R2Type = getSettingsValue('R2Type');
  $Sect2R3Type = getSettingsValue('R3Type');
  $Sect2R1ID = getSettingsValue('R1ID');
  $Sect2R2ID = getSettingsValue('R2ID');
  $Sect2R3ID = getSettingsValue('R3ID');

  $titreLang = 'Titre'.strtoupper($selected_lang);

  if($Sect2R1Type == 'CLIP') {
    $Sect2R1URL = "viewer.php?videoID=".$Sect2R1ID;
    $Sect2R1Image = getVideosValue('URLImage', $Sect2R1ID);
    $Sect2R1Title = getVideosValue('Titre', $Sect2R1ID);
  } else {
    $Sect2R1URL = "article.php?articleID=".$Sect2R1ID;
    $Sect2R1Image = getArticlesValue('URLImage', $Sect2R1ID);
    $Sect2R1Title = getArticlesValue($titreLang, $Sect2R1ID);
  }
  if($Sect2R2Type == 'CLIP') {
    $Sect2R2URL = "viewer.php?videoID=".$Sect2R2ID;
    $Sect2R2Image = getVideosValue('URLImage', $Sect2R2ID);
    $Sect2R2Title = getVideosValue('Titre', $Sect2R2ID);
  } else {
    $Sect2R2URL = "article.php?articleID=".$Sect2R2ID;
    $Sect2R2Image = getArticlesValue('URLImage', $Sect2R2ID);
    $Sect2R2Title = getArticlesValue($titreLang, $Sect2R2ID);
  }
  if($Sect2R3Type == 'CLIP') {
    $Sect2R3URL = "viewer.php?videoID=".$Sect2R3ID;
    $Sect2R3Image = getVideosValue('URLImage', $Sect2R3ID);
    $Sect2R3Title = getVideosValue('Titre', $Sect2R3ID);
  } else {
    $Sect2R3URL = "article.php?articleID=".$Sect2R3ID;
    $Sect2R3Image = getArticlesValue('URLImage', $Sect2R3ID);
    $Sect2R3Title = getArticlesValue($titreLang, $Sect2R3ID);
  }

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
    global $Sect1text1;
    global $Sect1learnMore;
    global $Sect2title;
    global $Sect2getKnowUs;
    global $Sect2R1Type;
    global $Sect2R2Type;
    global $Sect2R3Type;
    if ($selected_lang == 'fr') {
      $Sect1text1 = 'Nouveau clip disponible';
      $Sect1learnMore = 'Voir plus';
      $Sect2title = 'Nos dernières créations';
      $Sect2getKnowUs = 'En savoir plus sur nous';
      if ($Sect2R1Type == 'CLIP') {
        $Sect2R1Type = 'NOUVEAU CLIP';
      }else {
        $Sect2R1Type = 'NOUVEL ARTICLE';
      }
      if ($Sect2R2Type == 'CLIP') {
        $Sect2R2Type = 'NOUVEAU CLIP';
      }else {
        $Sect2R2Type = 'NOUVEL ARTICLE';
      }
      if ($Sect2R3Type == 'CLIP') {
        $Sect2R3Type = 'NOUVEAU CLIP';
      }else {
        $Sect2R3Type = 'NOUVEL ARTICLE';
      }
    }else {
      if ($Sect2R1Type == 'CLIP') {
        $Sect2R1Type = 'MUSIC VIDEO RELEASE';
      }else {
        $Sect2R1Type = 'NEW ARTICLE';
      }
      if ($Sect2R2Type == 'CLIP') {
        $Sect2R2Type = 'MUSIC VIDEO RELEASE';
      }else {
        $Sect2R2Type = 'NEW ARTICLE';
      }
      if ($Sect2R3Type == 'CLIP') {
        $Sect2R3Type = 'MUSIC VIDEO RELEASE';
      }else {
        $Sect2R3Type = 'NEW ARTICLE';
      }
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
  <meta name="description" content="BlueberryPictures - Production de clips musicaux">
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
  <meta property="og:description" content="BlueberryPictures - Production de clips musicaux">
  <meta property="og:image" content="./assets/img/MetaTags/metaTagsImg.png">
  <!--Twitter-->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:url" content="https://blueberrypictures.fr/">
  <meta property="twitter:title" content="Blueberry Pictures">
  <meta property="twitter:description" content="BlueberryPictures - Production de clips musicaux">
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
  <link rel="stylesheet" href="./css/index.css">
  <link rel="stylesheet" href="./css/responsive/responsive-index.css">
  </head>
  <body>
    <header id="header">      
      <a href="./index.php" id="topnavLogoWrap">
        <img id="topnavLogoImg" src="./assets/img/Branding/Full Logo (color light).svg" alt="BluberryPictures Logo">
      </a>
      <div class="topnav" id="menuTopnav">
        <a href="./index.php" class="active"><?php echo $home;?></a>
        <a class="topnavSeparator">|</a>
        <a href="./videos.php"><?php echo $latestProjects;?></a>
        <a class="topnavSeparator">|</a>
        <a href="./blog.php"><?php echo $articles;?></a>
        <a class="topnavSeparator">|</a>
        <a href="./contact.php"><?php echo $contact;?></a>
        <a href="javascript:void(0);" class="icon" onclick="toggleMenu()">
          <i class="fa fa-bars"></i>
        </a>
      </div>
    </header>
    <main>      
      <section>
        <div id="overlaySection1">
          <div>            
            <a id="text1"><?php echo $Sect1text1;?></a>           
            <h1 id="text2"><?php echo getSettingsValue('Titre');?></h1>         
            <a id="text3"><?php echo getSettingsValue('Artiste');?></a>
          </div>
          <div>
            <a href="#latestNewsAndReleases" id="ArrowWrap">
              <img src="./assets/img/Others/down-arrow.svg" class="downarrow" alt="Down Arrow">
            </a>
            <a href="<?php echo getSettingsValue('seeMoreURL');?>" id="learnmore"><?php echo $Sect1learnMore;?></a>
          </div>
        </div>
        <img id="backgroundImg" src="./assets/img/index/background.webp" alt="Background image">
      </section>
      <section id="latestNewsAndReleases">
        <h2><?php echo $Sect2title;?></h2>        
        <div id="releaseWrap">    
          <div class="release" onclick="window.open('<?php echo $Sect2R1URL; ?>','_self')">
            <img src="<?php echo $Sect2R1Image; ?>" class="releaseImg" alt="Release Image">
            <div>
                <a class="releaseType"><?php echo $Sect2R1Type; ?></a>
                <a class="releaseTitle"><?php echo $Sect2R1Title; ?></a>
            </div>
          </div>

          <div class="release" onclick="window.open('<?php echo $Sect2R2URL; ?>','_self')">
            <img src="<?php echo $Sect2R2Image; ?>" class="releaseImg" alt="Release Image">
            <div>
                <a class="releaseType"><?php echo $Sect2R2Type; ?></a>
                <a class="releaseTitle"><?php echo $Sect2R2Title; ?></a>
            </div>
          </div>
          
          <div class="release" onclick="window.open('<?php echo $Sect2R3URL; ?>','_self')">
            <img src="<?php echo $Sect2R3Image; ?>" class="releaseImg" alt="Release Image">
            <div>
                <a class="releaseType"><?php echo $Sect2R3Type; ?></a>
                <a class="releaseTitle"><?php echo $Sect2R3Title; ?></a>
            </div>
          </div>
        </div>
        <div id="savoirPlusWrap">
          <a id="savoirPlus"><?php echo $Sect2getKnowUs;?></a>        
          <a href="#presentation">
            <img src="./assets/img/Others/down-arrow.svg" class="downarrow" alt="Down Arrow">
          </a>
        </div>
      </section>
      <section id="presentation"></section>      
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
    <script>
      var header = document.getElementById("header");
      window.addEventListener("scroll", function() {
        if (window.pageYOffset > 0) {
          header.classList.add("headerScroll");
        } else {
          header.classList.remove("headerScroll");
        }
      });
    </script>
  </body>
</html>