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
        <section>
            <div></div>
            <div></div>
            <div class="arrowWrap">
                <div>
                    <a><?php getValueFromJson('section1.about'); ?></a>
                </div>
                <img class="nextArrow" src="https://placehold.co/64x64/white/black" alt="Next">
                <div></div>
            </div>
            <img class="backgroundImg" src="https://placehold.co/1280x720/teal/white" alt="Wallpaper">
        </section>
        <section>
            <div></div>
            <div></div>
            <div class="arrowWrap">
                <div></div>
                <img class="nextArrow" src="https://placehold.co/64x64/white/black" alt="Next">
                <div></div>
            </div>
            <img class="backgroundImg" src="https://placehold.co/1280x720/orange/white" alt="Wallpaper">
        </section>
        <section>
            <div></div>
            <div></div>
            <div class="arrowWrap">
                <div></div>
                <img class="nextArrow" src="https://placehold.co/64x64/white/black" alt="Next">
                <div></div>
            </div>
            <img class="backgroundImg" src="https://placehold.co/1280x720/green/white" alt="Wallpaper">
        </section>
        <section>
            <img class="backgroundImg" src="https://placehold.co/1280x720/pink/white" alt="Wallpaper">
        </section>
    </main>
    <footer>
        <?php include ('components/footer.php'); ?>
    </footer>
</body>

</html>