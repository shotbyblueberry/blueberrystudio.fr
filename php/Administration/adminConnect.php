<?php
$dbHost = "CONTENT_REMOVED_FOR_SECURITY_PURPOSES";
$dbUser = "CONTENT_REMOVED_FOR_SECURITY_PURPOSES";
$dbPass = "CONTENT_REMOVED_FOR_SECURITY_PURPOSES";
$dbName = "CONTENT_REMOVED_FOR_SECURITY_PURPOSES";

$email = $_POST['email'];
$pwd = $_POST['pwd'];

connect();

function connect() {
    global $dbHost;
    global $dbUser;
    global $dbPass;
    global $dbName;
    global $artiste;

    global $email;
    global $pwd;

    $db = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT password FROM account WHERE email = '$email'";
    $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if($row["password"] == $pwd) {//identifiants corrects
            //Enregistrer les variables en var de Session
            session_start();
            session_set_cookie_params(1800);
            $_SESSION["email"] = $email;
            $_SESSION["pwd"] = $pwd;
            echo "Connecté avec succès.";
            // Redirection 
            header("Refresh:0; url=../../admin.php");
            exit();
        } else {
            echo "Mot de passe incorrect.";
        }
    } else {
        echo "Email inconnu.";
    }
    mysqli_close($db);
}
?>