<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

if (!isset($_SESSION)) {
    session_start();
}

// Language
include_once $_SERVER['DOCUMENT_ROOT'].'/scripts/lang.php';
$language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
$deviceLang = substr($language, 0, 2);
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : $deviceLang;
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = $deviceLang;
}
?>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Blueberry Studio</title>
<!-- Favicon -->
<link rel="apple-touch-icon" sizes="180x180" href="/assets/img/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/assets/img/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/assets/img/favicon/favicon-16x16.png">
<!-- CSS -->
<link rel="stylesheet" href="/css/stylesheet.css">
<link rel="stylesheet" href="/css/responsive/stylesheet.css">
<link rel="stylesheet" href="/css/footer.css">
<link rel="stylesheet" href="/css/responsive/footer.css">
<link rel="stylesheet" href="/css/header.css">
<link rel="stylesheet" href="/css/responsive/header.css">
<!-- JS -->
<script src="/js/viewportHeight.js"></script>
<script src="/js/lang.js" defer></script>
<script src="/js/dynamicTitle.js" defer></script>
<script src="/js/rightClick.js" defer></script>
<!-- Ajax -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Fonts -->
<link rel="stylesheet" href="https://use.typekit.net/xko3brk.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">