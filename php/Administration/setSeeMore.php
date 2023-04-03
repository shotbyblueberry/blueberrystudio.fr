<?php
$dbHost = "CONTENT_REMOVED_FOR_SECURITY_PURPOSES";
$dbUser = "CONTENT_REMOVED_FOR_SECURITY_PURPOSES";
$dbPass = "CONTENT_REMOVED_FOR_SECURITY_PURPOSES";
$dbName = "CONTENT_REMOVED_FOR_SECURITY_PURPOSES";

$seeMoreURL = $_POST['seeMoreURL'];

setSeeMoreURL();

function setSeeMoreURL() {
  global $dbHost;
  global $dbUser;
  global $dbPass;
  global $dbName;
  global $seeMoreURL;

  // Connection
  $db = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

  // Verifier la connection
  if (!$db) {
      die("Connection failed: " . mysqli_connect_error());
  }

  // Mettre a jour la valeur de Titre
  $sql = "UPDATE settings SET Valeur = '$seeMoreURL' WHERE Nom = 'seeMoreURL'";
  if (mysqli_query($db, $sql)) {
    echo "<script>alert('Succès lors du changement d\'URL.')</script>";
    // Redirection 
    header("Refresh:0; url=../../admin.php");
    exit();
  } else {
      echo "Erreur lors de la mise à jour d\'URL : " . mysqli_error($db);
      echo "<h1>Redirection dans 5 secondes...</h1>";
      // Redirection 
      header("Refresh:5; url=../../admin.php");
      exit();
  }
  mysqli_close($db);
}
?>