<?php
$dbHost = "CONTENT_REMOVED_FOR_SECURITY_PURPOSES";
$dbUser = "CONTENT_REMOVED_FOR_SECURITY_PURPOSES";
$dbPass = "CONTENT_REMOVED_FOR_SECURITY_PURPOSES";
$dbName = "CONTENT_REMOVED_FOR_SECURITY_PURPOSES";

$id = $_POST['videoID'];
$pos = $_POST['position'];

changePosVideo($pos, $id);

function changePosVideo($pos, $id) {
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
    $result = mysqli_query($db, "UPDATE `videos` SET `Position` = $pos WHERE `videos`.`Id` = $id");
    if (!$result) {
        trigger_error('Impossible d\'exécuter la requête.', E_USER_ERROR);
    } else {
        // Redirection 
        header("Refresh:0; url=../../admin.php");
        exit();
    }
    mysqli_close($db);
}
?>