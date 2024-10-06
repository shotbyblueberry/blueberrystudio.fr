<footer>
    <div id="left"></div>
    <div id="center">
        <a href="/legal-notice"><?php getValueFromJson('legalNotice'); ?></a>
        <a href="/privacy-policy"><?php getValueFromJson('privacyPolicy'); ?></a>
        <a href="/sitemap"><?php getValueFromJson('sitemap'); ?></a>
    </div>
    <select id="langSelect">
        <option value="en" <?php if ($_SESSION['lang'] == 'en')
            echo 'selected'; ?>>🇬🇧</option>
        <option value="fr" <?php if ($_SESSION['lang'] == 'fr')
            echo 'selected'; ?>>🇫🇷</option>
    </select>
</footer>