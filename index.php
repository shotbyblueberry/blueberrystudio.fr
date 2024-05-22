<?php
include_once 'scripts/lang.php';
session_start();
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'en';
?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">

<head>
    <title><?php getValueFromJson('tabTitle'); ?></title>
    <?php include 'components/head.php'; ?>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/responsive/index.css">
</head>

<body>
    <header>
        <?php include ('components/header.php'); ?>
    </header>
    <main>
        <!-- Section 1 -->
        <section>
            <div>
                <h1><?php getValueFromJson('section1.title'); ?></h1>
            </div>
            <div>
                <a><?php getValueFromJson('section1.text') ?></a>
            </div>
            <div class="arrowWrap">
                <div id="aboutThisImage">
                    <a><?php getValueFromJson('section1.about'); ?></a>
                    <img src="assets/img/icons/about.svg" alt="About">
                </div>
                <img class="nextArrow" src="assets/img/icons/scrollDown.svg" alt="Next">
                <div></div>
            </div>
            <img class="backgroundImg" src="assets/img/backgroundSection1.webp" alt="Wallpaper">
        </section>
        <!-- Section 2 -->
        <section>
            <div>
                <img src="assets/img/icons/openQuote.svg" alt="Quote Mark">
                <a>
                    <?php getValueFromJson('section2.djebrilOpinion'); ?>
                    <img src="assets/img/icons/closeQuote.svg" alt="Quote Mark">
                </a>
            </div>
            <div>
                <h1><?php getValueFromJson('section3.title'); ?></h1>
                <h2><?php getValueFromJson('section3.subtitle'); ?></h2>
                <p><?php getValueFromJson('section3.paragraph1'); ?></p>
                <p><?php getValueFromJson('section3.paragraph2'); ?></p>
                <p><?php getValueFromJson('section3.paragraph3'); ?></p>
                <p><?php getValueFromJson('section3.paragraph4'); ?></p>
            </div>
            <div class="arrowWrap">
                <div></div>
                <img class="nextArrow" src="assets/img/icons/scrollDown.svg" alt="Next">
                <div></div>
            </div>
            <img class="backgroundImg" src="assets/img/backgroundSection2.svg" alt="Wallpaper">
        </section>
        <!-- Section 3 -->
        <section>
            <div>
                <h1><?php getValueFromJson('section2.title'); ?></h1>
            </div>
            <div id="youtubeWrap">
                <iframe src="https://www.youtube.com/embed/9x2ivqttlLI?si=0U2y8ZG2hTxfrWdv&amp;controls=0"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
            <div>
                <h2><?php getValueFromJson('section2.subtitle'); ?></h2>
                <p><?php getValueFromJson('section2.paragraph'); ?></p>
            </div>
            <div class="arrowWrap">
                <div></div>
                <img class="nextArrow" src="assets/img/icons/scrollDown.svg" alt="Next">
                <div>
                    <a
                        href="https://www.youtube.com/watch?v=9x2ivqttlLI"><?php getValueFromJson('section2.more'); ?></a>
                </div>
            </div>
            <img class="backgroundImg" src="assets/img/backgroundSection3.webp" alt="Wallpaper">
        </section>
        <!-- Section 4 -->
        <section>
            <div>
                <h1><?php getValueFromJson('section4.title'); ?></h1>
            </div>
            <div>
                <h2><?php getValueFromJson('section4.subtitle'); ?></h2>
                <a><?php getValueFromJson('section4.text1'); ?></a>
                <a><?php getValueFromJson('section4.text2'); ?></a>
                <a><?php getValueFromJson('section4.text3'); ?></a>
            </div>
            <form action="scripts/contactForm.php" method="POST">
                <input type="text" name="name" placeholder="<?php getValueFromJson('section4.form.name'); ?>">
                <input type="email" name="email" placeholder="<?php getValueFromJson('section4.form.email'); ?>">
                <textarea name="message" placeholder="<?php getValueFromJson('section4.form.message'); ?>"></textarea>
                <input type="submit" value="<?php getValueFromJson('section4.form.submit'); ?>">
            </form>
        </section>
    </main>
    <footer>
        <?php include ('components/footer.php'); ?>
    </footer>
</body>

</html>