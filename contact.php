<!DOCTYPE html>
<html lang="<?php echo isset($_SESSION['lang']) ? $_SESSION['lang'] : 'fr'; ?>">

<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/components/head.php'; ?>
    <link rel="stylesheet" href="/css/contact.css">
    <link rel="stylesheet" href="/css/responsive/contact.css">
    <!-- Schema.org -->
    <script type="application/ld+json">
    {
    "@context": "https://schema.org",
    "@type": "ContactPage",
    "url": "https://www.blueberrystudio.fr/contact",
    "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "+33-749644589",
        "contactType": "Customer Support",
        "email": "info@blueberrystudio.fr",
        "availableLanguage": "French"
    }
    }
    </script>
    <!-- OpenGraph -->
    <meta property="og:title" content="Contactez-nous - Blueberry Studio" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://www.blueberrystudio.fr/contact" />
    <meta property="og:image" content="https://www.blueberrystudio.fr/assets/img/brand/blueberry_white.svg" />
    <meta property="og:description" content="Contactez Blueberry Studio pour toute demande de collaboration ou information." />
    <meta property="og:site_name" content="Blueberry Studio" />
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="Contactez-nous - Blueberry Studio" />
    <meta name="twitter:description" content="Pour toute demande, contactez-nous via notre page de contact." />
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