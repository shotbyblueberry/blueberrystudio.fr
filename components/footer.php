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