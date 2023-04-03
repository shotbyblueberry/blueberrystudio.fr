<?php
  //Verification de session
  session_start();
  if(isset($_SESSION["email"]) && isset($_SESSION["pwd"])){
      $email = $_SESSION["email"];
      $pwd = $_SESSION["pwd"];
      connect($email, $pwd);
  } else {
      echo "Vous n'êtes pas connecté.";
      // Redirection 
      header("Refresh:0; url=./loginAdmin.php");
      exit();
  } 

  function connect($email, $pwd) {   
    $dbHost = "CONTENT_REMOVED_FOR_SECURITY_PURPOSES";
    $dbUser = "CONTENT_REMOVED_FOR_SECURITY_PURPOSES";
    $dbPass = "CONTENT_REMOVED_FOR_SECURITY_PURPOSES";
    $dbName = "CONTENT_REMOVED_FOR_SECURITY_PURPOSES";

    $db = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
      // Redirection 
      header("Refresh:3; url=./loginAdmin.php");
      exit();
    }
    $sql = "SELECT password FROM account WHERE email = '$email'";
    $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if($row["password"] == $pwd) {//identifiants corrects
        } else {
            echo "Mot de passe incorrect.";
            // Redirection 
            header("Refresh:0; url=./loginAdmin.php");
            exit();
        }
    } else {
        echo "Email inconnu.";
        // Redirection 
        header("Refresh:0; url=./loginAdmin.php");
        exit();
    }
    mysqli_close($db);
  }

  // Désactivation du cache
  header("Pragma: no-cache");
  header("Expires: 0");
  header("Cache-Control: no-store, no-cache, must-revalidate");

  require './php/Administration/getNewsletterRegister.php';
  require './php/Administration/getSettingsValue.php';
  require './php/Administration/getVideosValue.php';
  require './php/Administration/getVideos.php';
  require './php/Administration/getArticlesValue.php';
  require './php/Administration/getArticles.php';

  $selected_lang = 'en';  
  //Header
  $home = 'Home';  
  $latestProjects = 'Latest projects';  
  $articles = 'Blog';  
  $contact = 'Contact us'; 

  setHtmlLang();
  translateHeader();

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
?>
<!doctype html>
<!--Développé avec ❤️ par : www.noasecond.com-->
<html lang="<?php echo $selected_lang; ?>">
<head>
  <!--Primary Meta Tags-->
  <meta charset="utf-8">
  <meta name="robots" content="noindex">
  <title>Admin</title>
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
    gtag('config', 'CONTENT_REMOVED_FOR_SECURITY_PURPOSES');
  </script>
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
  <link rel="stylesheet" href="./css/admin.css">
  <link rel="stylesheet" href="./css/responsive/responsive-admin.css">
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
        <a href="./contact.php"><?php echo $contact;?></a>
        <a href="javascript:void(0);" class="icon" onclick="toggleMenu()">
          <i class="fa fa-bars"></i>
        </a>
      </div>
    </header>
    <main>
        <h1>Administration</h1>
        <h2>Général : </h2>
        <section>
            <h3>Maintenance : </h3>
            <form action="./php/Administration/toggleMaintenance.php" method="POST">
              <div>
                <label for="submit">Status de maintenance (On/Off) : </label>
                <input type="submit" value="Changer le status" name="submit">
              </div>
              <a>Status actuel : <b><?php echo getSettingsValue('Maintenance');?></b></a>
            </form>

            <h3>Accès BDD mySQL : </h3>
            <form action="https://mysql5.lwspanel.com/phpmyadmin/" target="_blank">
              <div>
                <label for="submit">phpMyAdmin : </label>
                <input type="submit" value="Accéder à la BDD" name="submit">
              </div>
            </form>

            <h3>Accès LWS panel : </h3>
            <form action="https://panel.lws.fr/frhebergement6-2.php" target="_blank">
              <div>
                <label for="submit">LWS : </label>
                <input type="submit" value="Accéder au panel" name="submit">
              </div>
            </form>
          </section>
            
        <h2>Page d'accueil : </h2>
        <section>
            <h3>Arrière plan de l'accueil : </h3>
            <form action="./php/Administration/replaceBackground.php" method="POST" enctype="multipart/form-data">
              <div>
                <label for="newBackground">Changer de fichier (.webp) : </label>
                <input type="file" name="newBackground" accept=".webp" required>
              </div>
              <input type="submit" value="Mettre à jour" name="submit">
              <div>
                <a>Arrière plan actuel : </a>
                <img alt="background preview" src="./assets/img/index/background.webp" id="bgPrev">
              </div>
            </form> 

            <h3>Titre de l'accueil : </h3>
            <form action="./php/Administration/setTitle.php" method="post">
              <div>
                <label for="titre">Titre :</label>
                <input type="text" id="titre" name="titre" required>
              </div>
              <input type="submit" value="Mettre à jours">
              <div>
                <a>Titre actuel : <b><?php echo getSettingsValue('Titre');?></b></a>
              </div>
            </form> 

            <h3>Artiste de l'accueil : </h3>
            <form action="./php/Administration/setArtist.php" method="post">
              <div>
                <label for="artiste">Artiste :</label>
                <input type="text" id="artiste" name="artiste" required>
              </div>
              <input type="submit" value="Mettre à jours">
              <div>
                <a>Artiste actuel : <b><?php echo getSettingsValue('Artiste');?></b></a>
              </div>
            </form>   

            <h3>URL de la vidéo "VOIR PLUS" : </h3>
            <form action="./php/Administration/setSeeMore.php" method="post">
              <div>
                <label for="seeMoreURL">URL :</label>
                <input type="text" id="seeMoreURL" name="seeMoreURL" required>
              </div>
              <input type="submit" value="Mettre à jours">
              <div>
                <a>URL actuel : <b><?php echo getSettingsValue('seeMoreURL');?></b></a>
              </div>
            </form>           

            <h3>Changer une release : </h3>
            <form action="./php/Administration/replaceRelease.php" method="POST" enctype="multipart/form-data">
              <div>
                <label for="title">Numéro de release (1/2/3) :</label>
                <input type="text" list="relNum" name="releaseNB" required>
                <datalist id=relNum>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                </datalist>
              </div>
              <div>
                <label for="type">Type (ARTICLE/CLIP) :</label>
                <input type=text list=Type name=type required>
                <datalist id=Type>
                  <option>CLIP</option>
                  <option>ARTICLE</option>
                </datalist>
              </div>
              <div>
                <label for="title">ID :</label>
                <input type="text" name="releaseID" required>
              </div>
              <input type="submit" value="Mettre à jours">
            </form> 
         </section>
        <h2>Vidéos :</h2>
        <section>
            <h3>Repositionner une vidéo : </h3>
            <form action="./php/Administration/changePositionVideo.php" method="POST" enctype="multipart/form-data">
              <div>
                <label for="videoID">Id de la vidéo :</label>
                <input type="text" name="videoID" required>
              </div>
              <div>
                <label for="position">Nouvelle position :</label>
                <input type="text" name="position" required>
              </div>
              <input type="submit" value="Mettre à jour" name="submit">
            </form> 
            <h3>Supprimer une vidéo : </h3>
            <form action="./php/Administration/deleteVideo.php" method="POST" enctype="multipart/form-data">
              <div>
                <label for="videoID">Id de la vidéo :</label>
                <input type="text" name="videoID" required>
              </div>
              <input type="submit" value="Supprimer" name="submit">
            </form> 
            <h3>Ajouter une vidéo : </h3>
            <form action="./php/Administration/addVideo.php" method="POST" enctype="multipart/form-data">
              <div>
                <label for="newImage">Image (1280x720 .webp) : </label>
                <input type="file" name="newImage" accept=".webp" required>
              </div>
              <div>
                <label for="ytbURL">Code Youtube de la vidéo (ex : F9lob5NB4rQ) :</label>
                <input type="text" name="ytbURL" required>
              </div>
              <div>
                <label for="spotifyURL">URL Spotify de l'artiste :</label>
                <input type="text" name="spotifyURL" required>
              </div>
              <div>
                <label for="position">Position :</label>
                <input name="position" type="text" id="position" maxlength="99999">
              </div>
              <div>
                <label for="titre">Titre :</label>
                <input type="text" name="titre" required>
              </div>
              <div>
                <label for="artiste">Artiste :</label>
                <input type="text" name="artiste" required>
              </div>
              <div>
                <label for="credits">Crédits :</label>
                <textarea name="credits" id="credit-input" placeholder="Ajoutez des éléments grâce aux boutons..." rows="10" cols="80" required></textarea>
                <button type="button" onclick="addWorker()">Add worker</button>
                <button type="button" onclick="addLineBreak()">Add line break</button>
              </div>
              <div>
                <label for="date">Date :</label>
                <input type="date" id="date" name="date">
              </div>
              <input type="submit" value="Ajouter" name="submit">
            </form> 
            <h3>Vidéos publiées : </h3>
            <form>
              <a><b>ID : Position - Titre - Artiste - Date - Image</b></a><br>
              <?php printVideosList(); ?>
            </form>
        </section>
        <h2>Articles :</h2>
        <section>
            <h3>Repositionner un article : </h3>
            <form action="./php/Administration/changePositionArticle.php" method="POST" enctype="multipart/form-data">
              <div>
                <label for="articleID">Id de l'article :</label>
                <input type="text" name="articleID" required>
              </div>
              <div>
                <label for="position">Nouvelle position :</label>
                <input type="text" name="position" required>
              </div>
              <input type="submit" value="Mettre à jour" name="submit">
            </form> 
            <h3>Ajouter un article : </h3>
            <form action="./php/Administration/addArticle.php" method="POST" enctype="multipart/form-data">
              <div>
                <label for="position">Position :</label>
                <input type="text" name="position" required>
              </div>
              <div>
                <label for="categorie">Categorie :</label>
                <input type="text" name="categorie" required>
              </div>
              <div>
                <label for="titreFR">Titre FR :</label>
                <input type="text" name="titreFR" required>
              </div>
              <div>
                <label for="titreEN">Titre EN :</label>
                <input type="text" name="titreEN" required>
              </div>
              <div>
                <label for="artiste">Auteur :</label>
                <input type="text" name="artiste" required>
              </div>
              <div>
                <label for="resume">Resumé :</label>
                <input type="text" name="resume" required>
              </div>
              <div>
                <label for="newImage">Image (1280x720 .webp) : </label>
                <input type="file" name="newImage" accept=".webp" required>
              </div>
              <div>
                <label for="mainFR">Contenu FR :</label>
                <a>Mettre un texte en gras : &lt;b&gt;Text&lt;/b&gt;</a>
                <a>Mettre un texte en italic : &lt;i&gt;Text&lt;/i&gt;</a>
                <textarea name="mainFR" id="article-inputFR" placeholder="Ajoutez des éléments grâce aux boutons..." rows="10" cols="80" required></textarea>
                <button type="button" onclick="addMainTitleFR()">Add Main Title</button>
                <button type="button" onclick="addSecondaryTitleFR()">Add secondary title</button>
                <button type="button" onclick="addParagraphFR()">Add paragraph</button>
                <button type="button" onclick="addParagraphWithoutIndentFR()">Add paragraph without indent</button>
                <button type="button" onclick="addListFR()">Add list</button>
              </div>
              <div>
                <label for="mainEN">Contenu EN :</label>
                <a>Mettre un texte en gras : &lt;b&gt;Text&lt;/b&gt;</a>
                <a>Mettre un texte en italic : &lt;i&gt;Text&lt;/i&gt;</a>
                <textarea name="mainEN" id="article-inputEN" placeholder="Ajoutez des éléments grâce aux boutons..." rows="10" cols="80" required></textarea>
                <button type="button" onclick="addMainTitleEN()">Add Main Title</button>
                <button type="button" onclick="addSecondaryTitleEN()">Add secondary title</button>
                <button type="button" onclick="addParagraphEN()">Add paragraph</button>
                <button type="button" onclick="addParagraphWithoutIndentEN()">Add paragraph without indent</button>
                <button type="button" onclick="addListEN()">Add list</button>
              </div>
              <input type="submit" value="Ajouter" name="submit">
            </form>
            <h3>Articles publiés : </h3>
            <form>
              <a><b>ID : Position - Categorie - Auteur - TitreEN - Image</b></a><br>
              <?php printArticlesList(); ?>
            </form>
        </section>
        <h2>Inscriptions à la newsletter :</h2>
        <section>
          <?php printNewsletterRegister(); ?>
        </section>
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
      function addWorker() {
        var input = document.getElementById("credit-input");
        input.value += "\n";
        input.value += `<p><a class="job">Gaffer | </a><a class="worker">Michel Dumas</a></p>`;
      }
    </script>
    <script>
      function addLineBreak() {
        var input = document.getElementById("credit-input");
        input.value += "\n";
        input.value += `<p>&nbsp;</p>`;
      }
    </script>
    <script>
      function addMainTitleEN() {
        var input = document.getElementById("article-inputEN");
        input.value += "\n";
        input.value += `<h2>"All I want is for my songs to be heard, why is a music video important then?"</h2>`;
        input.value += "\n";
        input.value += `<h3 id="text2">artist / singer-songwriter point of view</h3>`;
        input.value += "\n";
        input.value += `<hr>`;
      }
    </script>
    <script>
      function addSecondaryTitleEN() {
        var input = document.getElementById("article-inputEN");
        input.value += "\n";
        input.value += `<h5>"L'ouïe est le sens le plus sensible de nos cinq sens"</h5>`;
        input.value += "\n";
        input.value += `<a><i>Victoria, State Government</i></a>`;
      }
    </script>
    <script>
      function addParagraphEN() {
        var input = document.getElementById("article-inputEN");
        input.value += "\n";
        input.value += `<p>`;
        input.value += "\n";
        input.value += `<a>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</a>`;
        input.value += "\n";
        input.value += `</p>`;
      }
    </script>
    <script>
      function addParagraphWithoutIndentEN() {
        var input = document.getElementById("article-inputEN");
        input.value += "\n";
        input.value += `<p class="withoutIndent">`;
        input.value += "\n";
        input.value += `<a>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</a>`;
        input.value += "\n";
        input.value += `</p>`;
      }
    </script>
    <script>
      function addListEN() {
        var input = document.getElementById("article-inputEN");
        input.value += "\n";
        input.value += `<ul>`;
        input.value += "\n";
        input.value += `<li>Element 1</li>`;
        input.value += "\n";
        input.value += `<li>Element 2</li>`;
        input.value += "\n";
        input.value += `<li>Element 3</li>`;
        input.value += "\n";
        input.value += `</ul>`;
      }
    </script>
    <script>
      function addMainTitleFR() {
        var input = document.getElementById("article-inputFR");
        input.value += "\n";
        input.value += `<h2>"All I want is for my songs to be heard, why is a music video important then?"</h2>`;
        input.value += "\n";
        input.value += `<h3 id="text2">artist / singer-songwriter point of view</h3>`;
        input.value += "\n";
        input.value += `<hr>`;
      }
    </script>
    <script>
      function addSecondaryTitleFR() {
        var input = document.getElementById("article-inputFR");
        input.value += "\n";
        input.value += `<h5>"L'ouïe est le sens le plus sensible de nos cinq sens"</h5>`;
        input.value += "\n";
        input.value += `<a><i>Victoria, State Government</i></a>`;
      }
    </script>
    <script>
      function addParagraphFR() {
        var input = document.getElementById("article-inputFR");
        input.value += "\n";
        input.value += `<p>`;
        input.value += "\n";
        input.value += `<a>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</a>`;
        input.value += "\n";
        input.value += `</p>`;
      }
    </script>
    <script>
      function addParagraphWithoutIndentFR() {
        var input = document.getElementById("article-inputFR");
        input.value += "\n";
        input.value += `<p class="withoutIndent">`;
        input.value += "\n";
        input.value += `<a>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</a>`;
        input.value += "\n";
        input.value += `</p>`;
      }
    </script>
    <script>
      function addListFR() {
        var input = document.getElementById("article-inputFR");
        input.value += "\n";
        input.value += `<ul>`;
        input.value += "\n";
        input.value += `<li>Element 1</li>`;
        input.value += "\n";
        input.value += `<li>Element 2</li>`;
        input.value += "\n";
        input.value += `<li>Element 3</li>`;
        input.value += "\n";
        input.value += `</ul>`;
      }
    </script>
  </body>
</html>