<?php
$dbHost = "CONTENT_REMOVED_FOR_SECURITY_PURPOSES";
$dbUser = "CONTENT_REMOVED_FOR_SECURITY_PURPOSES";
$dbPass = "CONTENT_REMOVED_FOR_SECURITY_PURPOSES";
$dbName = "CONTENT_REMOVED_FOR_SECURITY_PURPOSES";

$artiste = $_POST['artiste'];

setArtist();

function setArtist() {
  global $dbHost;
  global $dbUser;
  global $dbPass;
  global $dbName;
  global $artiste;

  // Connection
  $db = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

  // Verifier la connection
  if (!$db) {
      die("Connection failed: " . mysqli_connect_error());
  }

  // Mettre a jour la valeur de l'Artiste
  $sql = "UPDATE settings SET Valeur = '$artiste' WHERE Nom = 'Artiste'";
  if (mysqli_query($db, $sql)) {
    echo "<script>alert('Succès lors du changement d\'artiste.')</script>";
    // Redirection 
    header("Refresh:0; url=../../admin.php");
    exit();
  } else {
    echo "Erreur lors de la mise à jour d'artiste : " . mysqli_error($db);
    echo "<h1>Redirection dans 5 secondes...</h1>";
    // Redirection 
    header("Refresh:5; url=../../admin.php");
    exit();
  }
  mysqli_close($db);
}
?>