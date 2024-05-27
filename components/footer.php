<?php
session_start();

//Language
$language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
$deviceLang = substr($language, 0, 2);
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : $deviceLang;
?>
<a href='www.noasecond.com'><?php getValueFromJson('copyright') ?></a>
<div>
    <a href="personalDatas.php"><?php getValueFromJson('personalDatas') ?></a>
    <a> | </a>
    <a href="legalnotice.php"><?php getValueFromJson('legalNotice') ?></a>
    <a> | </a>
    <a href="sitemap.xml"><?php getValueFromJson('sitemap') ?></a>
</div>
<div>
    <select id="lang">
        <option value="en" <?php if ($_SESSION['lang'] == 'en')
            echo 'selected'; ?>>🇬🇧</option>
        <option value="fr" <?php if ($_SESSION['lang'] == 'fr')
            echo 'selected'; ?>>🇫🇷</option>
    </select>
</div>