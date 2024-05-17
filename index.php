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
                <div>
                    <a><?php getValueFromJson('section1.about'); ?></a>
                <img src="https://placehold.co/32x32/white/black" alt="About">
                </div>
                <img class="nextArrow" src="assets/img/icons/scrollDown.svg" alt="Next">
                <div></div>
            </div>
            <img class="backgroundImg" src="https://placehold.co/1280x720/teal/white" alt="Wallpaper">
        </section>
        <!-- Section 2 -->
        <section>
            <div>
                <h1><?php getValueFromJson('section2.title'); ?></h1>
            </div>
            <div>
                <h2><?php getValueFromJson('section2.subtitle'); ?></h2>
                <p><?php getValueFromJson('section2.paragraph'); ?></p>
            </div>
            <div class="arrowWrap">
                <div></div>
                <img class="nextArrow" src="assets/img/icons/scrollDown.svg" alt="Next">
                <div>
                    <a><?php getValueFromJson('section2.more'); ?></a>
                </div>
            </div>
            <img class="backgroundImg" src="assets/img/backgroundSection2.svg" alt="Wallpaper">
        </section>
        <!-- Section 3 -->
        <section>
            <div>
                <h1><?php getValueFromJson('section3.title'); ?></h1>
            </div>
            <div>
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
            <img class="backgroundImg" src="https://placehold.co/1280x720/green/white" alt="Wallpaper">
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
            <form>
                <input type="text" placeholder="<?php getValueFromJson('section4.form.name'); ?>">
                <input type="email" placeholder="<?php getValueFromJson('section4.form.email'); ?>">
                <textarea placeholder="<?php getValueFromJson('section4.form.message'); ?>"></textarea>
                <input type="submit" value="<?php getValueFromJson('section4.form.submit'); ?>">
            </form>
            <img class="backgroundImg" src="https://placehold.co/1280x720/pink/white" alt="Wallpaper">
        </section>
    </main>
    <footer>
        <?php include ('components/footer.php'); ?>
    </footer>
</body>

</html>