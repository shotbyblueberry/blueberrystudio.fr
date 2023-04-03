<?php
$dbHost = "CONTENT_REMOVED_FOR_SECURITY_PURPOSES";
$dbUser = "CONTENT_REMOVED_FOR_SECURITY_PURPOSES";
$dbPass = "CONTENT_REMOVED_FOR_SECURITY_PURPOSES";
$dbName = "CONTENT_REMOVED_FOR_SECURITY_PURPOSES";

//Image
$file_name = $_FILES['newImage']['name'];
$file_size = $_FILES['newImage']['size'];
$file_tmp = $_FILES['newImage']['tmp_name'];
$file_type = $_FILES['newImage']['type'];

$ytbURL = $_POST['ytbURL'];
$spotifyURL = $_POST['spotifyURL'];
$position = $_POST['position'];
$titre = $_POST['titre'];
$artiste = $_POST['artiste'];
$credits = $_POST['credits'];
$date = $_POST['date'];
$imageURL = 'assets/img/Videos/'.$file_name;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Vérifiez si l'image a été téléchargée
    if (isset($_FILES['newImage'])) {
      // Appelez la fonction upload_image en lui passant l'image téléchargée en paramètre
      $success = upload_image($_FILES['newImage']);      
      // Vérifiez si l'image a été téléchargée avec succès
      if ($success) {
        echo "L'image a été téléchargée avec succès.";
        addVideo($imageURL, $ytbURL, $spotifyURL, $position, $titre, $artiste, $credits, $date);
      } else {
        echo "Il y a eu une erreur lors du téléchargement de l'image.";
      }
    }
}

function addVideo($imageURL, $ytbURL, $spotifyURL, $position, $titre, $artiste, $credits, $date) {
    global $dbHost;
    global $dbUser;
    global $dbPass;
    global $dbName;

    if (!isset($dbHost) || !isset($dbName) || !isset($dbPass) || !isset($dbUser)) {
        trigger_error('Les variables globales nécessaires à la connexion à la base de données ne sont pas définies.', E_USER_ERROR);
    }
    $db = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
    if (!$db) {
        trigger_error('Impossible de se connecter à la base de données.', E_USER_ERROR);
    }
    $result = mysqli_query($db, "INSERT INTO `videos` (`Id`, `Position`, `Titre`, `Artiste`, `Date`, `Credits`, `URLSpotify`, `URLYoutube`, `URLImage`) VALUES (NULL, '$position', '$titre', '$artiste', '$date', '$credits', '$spotifyURL', '$ytbURL', '$imageURL');");
    if (!$result) {
        trigger_error('Impossible d\'exécuter la requête.', E_USER_ERROR);
    }
    mysqli_close($db);
}
function upload_image($image) {
  // Vérifiez si l'image a été téléchargée sans erreur
  if ($image['error'] == 0) {
    // Définissez le chemin de destination de l'image
    $target = "../../assets/img/Videos/" . basename($image['name']);
    
    // Déplacez l'image téléchargée vers le dossier cible
    if (move_uploaded_file($image['tmp_name'], $target)) {
      return true;
    } else {
      return false;
    }
  }
}
?>