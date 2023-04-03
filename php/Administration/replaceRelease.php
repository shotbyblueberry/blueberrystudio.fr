<?php
$dbHost = "CONTENT_REMOVED_FOR_SECURITY_PURPOSES";
$dbUser = "CONTENT_REMOVED_FOR_SECURITY_PURPOSES";
$dbPass = "CONTENT_REMOVED_FOR_SECURITY_PURPOSES";
$dbName = "CONTENT_REMOVED_FOR_SECURITY_PURPOSES";

$releaseType = $_POST['type'];
$releaseID = $_POST['releaseID'];
$releaseNB = $_POST['releaseNB'];

setReleaseType();

function setReleaseType() {
    global $dbHost;
    global $dbUser;
    global $dbPass;
    global $dbName;
    global $releaseType;  
    global $releaseID;  
    global $releaseNB; 

    $ReleaseCode = "R".$releaseNB."Type";

    // Connection
    $db = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);  
    // Verifier la connection
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }  
    // Mettre a jour la valeur
    $sql = "UPDATE settings SET Valeur = '$releaseType' WHERE Nom = '$ReleaseCode'";
    if (mysqli_query($db, $sql)) {
        setReleaseID();
    } else {
        echo "Erreur lors de la mise à jour de la release (RType) : " . mysqli_error($db);
        echo "<h1>Redirection dans 5 secondes...</h1>";
        // Redirection 
        header("Refresh:5; url=../../admin.php");
        exit();
    }
    mysqli_close($db);
}    
function setReleaseID() {
    global $dbHost;
    global $dbUser;
    global $dbPass;
    global $dbName;
    global $releaseID;  
    global $releaseNB;  

    $ReleaseCode = "R".$releaseNB."ID";

    // Connection
    $db = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);  
    // Verifier la connection
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }  
    // Mettre a jour la valeur
    $sql = "UPDATE settings SET Valeur = '$releaseID' WHERE Nom = '$ReleaseCode'";
    if (mysqli_query($db, $sql)) {
        // Redirection 
        header("Refresh:0; url=../../admin.php");
        exit();
    } else {
        echo "Erreur lors de la mise à jour de la release (RID) : " . mysqli_error($db);
        echo "<h1>Redirection dans 5 secondes...</h1>";
        // Redirection 
        header("Refresh:5; url=../../admin.php");
        exit();
    }
    mysqli_close($db);
}
?>