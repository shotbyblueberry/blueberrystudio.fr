<?php
session_start();
include './lang.php';

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../PHPMailer-6.9.1/src/Exception.php';
require '../PHPMailer-6.9.1/src/PHPMailer.php';
require '../PHPMailer-6.9.1/src/SMTP.php';

/*-----Mail Client-----*/
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Host = 'mail53.lwspanel.com';
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->CharSet = 'UTF-8';
if ($mail->SMTPAuth) {
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Username = 'info@blueberrypictures.fr';
    $mail->Password = '170mmmDONUT!101';
}

$mail->setFrom('info@blueberrypictures.fr', 'Blueberry Pictures');
$mail->addAddress($_POST['email']);
$mail->Subject = getValueFromJson('client.subject', false);
$mail->Body = getValueFromJson('client.sent', false) . '
            ' . getValueFromJson('client.recap', false) . '
            ' . getValueFromJson('client.name', false) . $name . '
            ' . getValueFromJson('client.email', false) . $email . '
            ' . getValueFromJson('client.message', false) . $message;

$mail->AltBody = $mail->Body;

if (!$mail->send()) {
    echo $mail->ErrorInfo;
} else {
    /*-----Mail Perso-----*/
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Host = 'mail53.lwspanel.com';
    $mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail->CharSet = 'UTF-8';
    if ($mail->SMTPAuth) {
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Username = 'info@blueberrypictures.fr';
        $mail->Password = '170mmmDONUT!101';
    }

    $mail->setFrom('info@blueberrypictures.fr', 'Blueberry Pictures');
    $mail->addAddress('contact@blueberrypictures.fr');
    $mail->Subject = getValueFromJson('perso.subject', false);
    $mail->Body = getValueFromJson('perso.received', false) . '
            ' . getValueFromJson('perso.recap', false) . '
            ' . getValueFromJson('perso.name', false) . $name . '
            ' . getValueFromJson('perso.email', false) . $email . '
            ' . getValueFromJson('perso.message', false) . $message . '
            ' . getValueFromJson('perso.lang', false);
    $mail->AltBody = $mail->Body;

    if (!$mail->send()) {
        echo $mail->ErrorInfo;
    } else {
        header('Location: ../index.php');
    }
}