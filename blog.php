<!DOCTYPE html>
<html lang="<?php echo isset($_SESSION['lang']) ? $_SESSION['lang'] : 'fr'; ?>">

<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/components/head.php'; ?>
    <link rel="stylesheet" href="/css/blog.css">
    <link rel="stylesheet" href="/css/responsive/blog.css">
    <!-- Schema.org -->
    <script type="application/ld+json">
    {
    "@context": "https://schema.org",
    "@type": "Blog",
    "name": "Actualités de Blueberry Studio",
    "url": "https://www.blueberrystudio.fr/news",
    "description": "Suivez les dernières actualités, projets et collaborations de Blueberry Studio.",
    "blogPost": {
        "@type": "BlogPosting",
        "headline": "Nouveautés et Projets de Blueberry Studio",
        "author": {
        "@type": "Person",
        "name": "Blueberry Studio"
        }
    }
    }
    </script>
    <!-- OpenGraph -->
    <meta property="og:title" content="Actualités - Blueberry Studio" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://www.blueberrystudio.fr/news" />
    <meta property="og:image" content="https://www.blueberrystudio.fr/assets/img/brand/blueberry_white.svg" />
    <meta property="og:description" content="Découvrez les dernières nouvelles, projets et collaborations de Blueberry Studio." />
    <meta property="og:site_name" content="Blueberry Studio" />
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="Actualités - Blueberry Studio" />
    <meta name="twitter:description" content="Suivez les dernières actualités, projets et collaborations de Blueberry Studio." />
    <meta name="twitter:image" content="https://www.blueberrystudio.fr/assets/img/brand/blueberry_white.svg" />
    <meta name="twitter:site" content="@blueberrystudio" />
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/components/header.php'; ?>
    <main>
        
    </main>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/components/footer.php'; ?>
</body>

</html>