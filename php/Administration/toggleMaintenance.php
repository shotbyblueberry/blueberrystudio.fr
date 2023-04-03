<?php
$dbHost = "CONTENT_REMOVED_FOR_SECURITY_PURPOSES";
$dbUser = "CONTENT_REMOVED_FOR_SECURITY_PURPOSES";
$dbPass = "CONTENT_REMOVED_FOR_SECURITY_PURPOSES";
$dbName = "CONTENT_REMOVED_FOR_SECURITY_PURPOSES";

toggleMaintenance();

function toggleMaintenance() {
  global $dbHost;
  global $dbUser;
  global $dbPass;
  global $dbName;

  $db = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
  $result = mysqli_query($db, "SELECT Valeur FROM settings WHERE Nom='Maintenance'");
  $row = mysqli_fetch_assoc($result);
  $current_status = $row['Valeur'];
  if ($current_status == "On") {
    $new_status = "Off";
  } else {
    $new_status = "On";
  }
  $update_query = "UPDATE settings SET Valeur='$new_status' WHERE Nom='Maintenance'";
  $update_result = mysqli_query($db, $update_query);
  // Vérifier si la mise à jour a réussi
  if ($update_result) {
    echo "<script>alert('Succès lors du changement de status de maintenance.')</script>";
    // Redirection 
    header("Refresh:0; url=../../admin.php");
    exit();
  } else {
    echo "<script>alert('Erreur lors du changement de status de maintenance.')</script>";
    echo "<h1>Redirection dans 5 secondes...</h1>";
    // Redirection 
    header("Refresh:5; url=../../admin.php");
    exit();
  }
  mysqli_close($db);
}
?>