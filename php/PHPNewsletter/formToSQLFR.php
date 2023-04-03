<?php
  // Check if request comes from a form
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mysql credentials
    $host = "CONTENT_REMOVED_FOR_SECURITY_PURPOSES";
    $username = "CONTENT_REMOVED_FOR_SECURITY_PURPOSES";
    $password = "CONTENT_REMOVED_FOR_SECURITY_PURPOSES";
    $database = "CONTENT_REMOVED_FOR_SECURITY_PURPOSES";
    
    $name = $_POST["name"]; 
    $email = $_POST["email"];
    $lang = "fr";
    if (!isset($name)){
      die("Merci de saisir votre nom.");
    }
    if (!isset($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
      die("Merci de saisir une adresse E-mail.");
    }  
    // Ouvrir la connection vers MySQL
    $mysqli = new mysqli($host, $username, $password, $database);
    
    // Erreurs de connection
    if ($mysqli->connect_error) {
      die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }  
    
    $statement = $mysqli->prepare("INSERT INTO newsletter (name, email) VALUES(?, ?)"); 
    // Bind des paramètres
    $statement->bind_param('ss', $name, $email); 
    
    if($statement->execute()){
      print "Bonjour " . $name . "!, ton E-mail est ". $email;
    }else{
      print $mysqli->error; 
    }
  }
?>