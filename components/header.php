<?php
$currentPage = basename($_SERVER['PHP_SELF'], ".php");
?>

<header>
    <a href="/index.php"><img id="logo" src="/assets/img/brand/blueberry_white.svg" alt="Logo"></a>
    <div id="menuWrapper">
        <a href="/index.php" <?php if ($currentPage == 'index') echo 'id="active"'; ?>><?php getValueFromJson('home'); ?></a>
        <a href="/blog.php" <?php if ($currentPage == 'blog') echo 'id="active"'; ?>><?php getValueFromJson('blog'); ?></a>
        <a href="https://www.youtube.com/@shotbyblueberrystudio/videos" target="_blank"><?php getValueFromJson('gallery'); ?></a>
        <a href="/contact.php" <?php if ($currentPage == 'contact') echo 'id="active"'; ?>><?php getValueFromJson('contact'); ?></a>
    </div>
</header>