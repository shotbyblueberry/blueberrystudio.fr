<?php
  require './php/Administration/getSettingsValue.php';
  require './php/Administration/getVideosValue.php';

  //Maintenance
  if (getSettingsValue('Maintenance') == 'On') {
    // Redirection 
    header("Refresh:0; url=./error/maintenance.html");
    exit();
  }
  
  $videoID = $_GET['videoID'];

  $selected_lang = 'en';  
  //Header
  $home = 'Home';  
  $latestProjects = 'Latest projects';  
  $articles = 'Blog';  
  $contact = 'Contact us'; 
  //Main
  $spotifyText1 = 'Listen to';
  $spotifyText2 = 'on Spotify';

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
    global $spotifyText1;
    global $spotifyText2;
    if ($selected_lang == 'fr') {
        $spotifyText1 = "Écouter";
        $spotifyText2 = "sur Spotify";
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
  <meta name="description" content="BlueberryPictures - Viewer">
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
  <meta property="og:description" content="BlueberryPictures - Viewer">
  <meta property="og:image" content="./assets/img/MetaTags/metaTagsImg.png">
  <!--Twitter-->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:url" content="https://blueberrypictures.fr/">
  <meta property="twitter:title" content="Blueberry Pictures">
  <meta property="twitter:description" content="BlueberryPictures - Viewer">
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
  <link rel="stylesheet" href="./css/viewer.css">
  <link rel="stylesheet" href="./css/responsive/responsive-viewer.css">
  </head>
  <body>
    <header>      
      <a href="./index.php" id="topnavLogoWrap">
        <img id="topnavLogoImg" src="./assets/img/Branding/Full Logo (color light).svg" alt="BluberryPictures Logo">
      </a>
      <div class="topnav" id="menuTopnav">
        <a href="./index.php"><?php echo $home;?></a>
        <a class="topnavSeparator">|</a>
        <a href="./videos.php" class="active"><?php echo $latestProjects;?></a>
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
    <div id="viewerWrap">
          <div id="title">        
            <a class="title"><?php echo getVideosValue('Titre', $videoID); ?></a>
          </div>
        <div id="viewerYT">
          <iframe id="iframeViewer" src="https://www.youtube.com/embed/<?php echo getVideosValue('URLYoutube', $videoID); ?>" title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
        </div>        
        <div id="titleAndSpotifyWrap">
          <div id="title">        
            <p><a class="artist"><?php echo getVideosValue('Artiste', $videoID); ?> -</a>&nbsp;<a id="description"><?php echo strftime("%B %Y", strtotime(getVideosValue('Date', $videoID))); ?></a></p>
          </div>
          <a id="spotifyMobileWrap" href="<?php echo getVideosValue('URLSpotify', $videoID); ?>" target="_blank">
            <img src="./assets/img/Icons/spotify.svg" id="spotifyImgMobile">
          </a>
        </div>
        <div id="viewerInfo">
          <div id="credit">
            <p class="computerTitle"><a class="title"><?php echo getVideosValue('Titre', $videoID); ?></a></p>
            <p class="computerTitle"><a class="artist"><?php echo getVideosValue('Artiste', $videoID); ?> -</a>&nbsp;<a id="description"><?php echo strftime("%B %Y", strtotime(getVideosValue('Date', $videoID))); ?></a></p>
            <a id="creditTitle">Credits</a>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <?php echo getVideosValue('Credits', $videoID); ?>
          </div>
          <div>
            <div id="spotify">
              <a href="<?php echo getVideosValue('URLSpotify', $videoID); ?>" target="_blank">
                <img src="./assets/img/Icons/spotify.svg" id="spotifyImg">
              </a>
              <div id="spotifyTxtWrap">
                <a class="worker spotifyTxt" href="<?php echo getVideosValue('URLSpotify', $videoID); ?>" target="_blank"><?php echo $spotifyText1.getVideosValue('Artiste', $videoID); ?></a>
                <br>
                <a class="worker spotifyTxt" href="<?php echo getVideosValue('URLSpotify', $videoID); ?>" target="_blank"><?php echo $spotifyText2; ?></a>
              </div>
            </div>
          </div>
        </div>
      </div>
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