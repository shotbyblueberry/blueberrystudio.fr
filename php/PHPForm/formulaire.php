<?php                                                            //Développé avec ❤️ par : www.noasecond.com
print_r($_POST);                                                 
session_start();

$lang = $_GET['lang'];	
$firstname = $_POST['firstname'];	                             
$lastname = $_POST['lastname'];		                       
$email = $_POST['email'];	                                   
$phone = $_POST['phone'];	                                        
$service = $_POST['service'];

if($lang === 'fr') {
      $formulaireHTML = file_get_contents("mailCLIENT_fr.html");
} else {
      $formulaireHTML = file_get_contents("mailCLIENT_en.html");
}
$formulaire = str_replace("[firstname]", $_POST['firstname'], $formulaireHTML);

$mailPERSOHTML = file_get_contents("mailPERSO.html");               

$mailPERSO = str_replace("[firstname]", $_POST['firstname'], $mailPERSOHTML);
$mailPERSO = str_replace("[lastname]", $_POST['lastname'], $mailPERSO);
$mailPERSO = str_replace("[email]", $_POST['email'], $mailPERSO);
$mailPERSO = str_replace("[phone]", $_POST['phone'], $mailPERSO);
$mailPERSO = str_replace("[service]", $_POST['service'], $mailPERSO);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
 
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

/*-----MAIL CLIENT-----*/
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Host = 'mail53.lwspanel.com';							            		//Adresse IP ou DNS du serveur SMTP
$mail->Port = 465;														                    //Port TCP du serveur SMTP
$mail->SMTPAuth = true;												                  	//Utiliser l'identification
$mail->CharSet = 'UTF-8';											                  	//Format d'encodage à utiliser pour les caractères
if($mail->SMTPAuth){
   $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;					    	//Protocole de sécurisation des échanges avec le SMTP
   $mail->Username   =  'info@blueberrypictures.fr';			        //Adresse email à utiliser
   $mail->Password   =  '170mmmDONUT!101';		                    //Mot de passe de l'adresse email à utiliser
}

$mail->setFrom('info@blueberrypictures.fr', 'Blueberry Pictures');
$mail->addAddress($_POST['email']);
$mail->Subject = 'Votre demande a bien été envoyée !';
$message =  $formulaire;
$mail->Body = $message;
$mail->AltBody = 'Votre message a été envoyé avec succes !
            Récapitulatif de votre demande : 
            Client :
            Contact :
            Service : ';

if (!$mail->send()) {
      echo $mail->ErrorInfo;
} else{
/*-----MAIL PERSO-----*/
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Host = 'mail53.lwspanel.com';									            //Adresse IP ou DNS du serveur SMTP
$mail->Port = 465;														                    //Port TCP du serveur SMTP
$mail->SMTPAuth = true;													                  //Utiliser l'identification
$mail->CharSet = 'UTF-8';					    					                	//Format d'encodage à utiliser pour les caractères
if($mail->SMTPAuth){
   $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;				    		//Protocole de sécurisation des échanges avec le SMTP
   $mail->Username   =  'info@blueberrypictures.fr';        			//Adresse email à utiliser
   $mail->Password   =  '170mmmDONUT!101';                       	//Mot de passe de l'adresse email à utiliser
}

$mail->setFrom('info@blueberrypictures.fr', 'Blueberry Pictures');
$mail->addAddress('contact@blueberrypictures.fr');
//Ajouter en copie le prestataire en fonction du service
if($service === 'Music video' || $service === 'Clip musical') {
      $mail->addAddress('mateo@blueberrypictures.fr');
} else if ($service === 'Marketing & branding consultation' || $service === 'Consultation marketing & branding') {
      $mail->addAddress('jessica@blueberrypictures.fr');
} else if ($service === 'Social media management' || $service === 'Management réseaux sociaux') {
      //$mail->addAddress('');
} else if ($service === 'Photoshoot' || $service === 'Shooting photo') {
      //$mail->addAddress('');
} else if ($service === 'Album cover design' || $service === 'Création pochette d\'album') {
      //$mail->addAddress('');
} else if ($service === 'Artist website' || $service === 'Site web artiste') {
      $mail->addAddress('contact@noasecond.com');
} else if ($service === 'Press release creation' || $service === 'Rédaction attaché de presse') {
      $mail->addAddress('jessica@blueberrypictures.fr');
}
$mail->Subject = 'Salut chef, nouvelle demande !';
$message =  $mailPERSO;
$mail->Body = $message;
$mail->AltBody = 'Salut chef, nouvelle demande !
            Récapitulatif de votre demande : 
            Client :
            Contact :
            Service : ';



if (!$mail->send()) {
      echo $mail->ErrorInfo;
} else{
      header("location:../../redirection.php");
}
}