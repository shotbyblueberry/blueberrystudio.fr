<!DOCTYPE html>
<html lang="<?php echo isset($_SESSION['lang']) ? $_SESSION['lang'] : 'fr'; ?>">

<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/components/head.php'; ?>
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/responsive/index.css">
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/components/header.php'; ?>
    <main>
        <section id="section1">
            <div>
                <div id="socialWrapper">
                    <a href="https://instagram.com/shotbyblueberry">
                        <img src="/assets/img/icons/instagram_Light.svg" alt="Instagram">
                    </a>
                    <a href="https://www.facebook.com/shotbyblueberrystudio">
                        <img src="/assets/img/icons/facebook_Light.svg" alt="Facebook">
                    </a>
                    <a href="https://x.com/ShotByBlueberry">
                        <img src="/assets/img/icons/x_Light.svg" alt="X">
                    </a>
                    <a href="https://www.linkedin.com/company/shotbyblueberry/">
                        <img src="/assets/img/icons/linkedin_Light.svg" alt="LinkedIn">
                    </a>
                </div>
                <div id="services">
                    <h2><?php getValueFromJson('sections.1.services.1'); ?></h2>
                    <h2><?php getValueFromJson('sections.1.services.2'); ?></h2>
                    <h2><?php getValueFromJson('sections.1.services.3'); ?></h2>
                    <h2><?php getValueFromJson('sections.1.services.4'); ?></h2>
                </div>
            </div>
            <a href="#section2"><img id="arrow" src="/assets/img/icons/down_arrow.svg" alt="Arrow"></a>
            <img id="showreel" src="/assets/img/showreel.jpg" alt="Showreel">
        </section>
        <section id="section2">
            <h1><?php getValueFromJson('sections.2.title'); ?></h1>
            <div id="newsWrapper">
                <?php
                $type = 'blog';
                $title = 'Omg this is a blog';
                $date = '2021-10-10';
                $link = 'https://www.google.com';
                include $_SERVER['DOCUMENT_ROOT'] . '/components/news.php';
                ?>
                <?php
                $type = 'event';
                $title = 'Omg this is an event';
                $date = '2021-10-10';
                $link = 'https://www.google.com';
                include $_SERVER['DOCUMENT_ROOT'] . '/components/news.php';
                ?>
                <?php
                $type = 'release';
                $title = 'Omg this is a release';
                $date = '2021-10-10';
                $link = 'https://www.google.com';
                include $_SERVER['DOCUMENT_ROOT'] . '/components/news.php';
                ?>
            </div>
        </section>
        <section>
            <h1><?php getValueFromJson('sections.3.title'); ?></h1>
            <img id="latestRelease" src="/assets/img/showreel.jpg" alt="Placeholder">
        </section>
        <section>
            <h1><?php getValueFromJson('sections.4.title'); ?></h1>
        </section>
    </main>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/components/footer.php'; ?>
</body>

</html>