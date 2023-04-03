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
    $lang = "en";
    if (!isset($name)){
      die("Please enter your name");
    }
    if (!isset($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
      die("Please enter your email address");
    }  
    // Ouvrir la connection vers MySQL
    $mysqli = new mysqli($host, $username, $password, $database);
    
    // Erreurs de connection
    if ($mysqli->connect_error) {
      die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }  

    $statement = $mysqli->prepare("INSERT INTO newsletter (name, email, lang) VALUES(?, ?, ?)"); 
    // Bind des paramètres
    $statement->bind_param('ss', $name, $email, $lang); 
    
    if($statement->execute()){
      print "Hi " . $name . "!, your E-mail address is ". $email;
    }else{
      print $mysqli->error; 
    }
  }
?>