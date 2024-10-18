<?php
    require_once 'includes/helper-functions.php';
?>
<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="<?php echo IMAGES_DIR; ?>/favicon.ico" type="image/x-icon">
    <meta name="description" content="<?php page_description(); ?>">
    <meta name="author" content="">
    <meta name="googlebot" content="index, follow, snippet, archive">
    <meta name="robots" content="index, follow">

    <!-- BASIC OG META
    <meta property="og:type" content="website">
    <meta property="og:image" content="<?php echo IMAGES_DIR; ?>/og-image.png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:url" content="">
    <meta property="og:description" content="<?php page_description(); ?>">
    <meta property="og:title" content="<?php page_title(); ?>">
    <meta name="twitter:site" content="">
    <meta name="twitter:card" content="summary_large_image">
    -->

    <title><?php page_title(); ?></title>

    <!-- CSS -->
    <link href="<?php echo STYLES_DIR; ?>/style.css?ver=<?php echo VERSION; ?>" rel="stylesheet">
    
    
    <!-- animation -->
    <style>.gs_reveal{opacity:0;visibility:hidden;will-change:transform,opacity}</style>
    <noscript><style>.gs_reveal{opacity:1;visibility:visible}</style></noscript>


    <!-- FONT-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- TRACKING CODES HERE -->

</head>


<body>


<!-- <div class="playground">
    <span id="ball"></span>
</div> -->

<header class="header" id="header">
    <div class="container">
        <a class="header__logo" href="index">
            <?php icon('logo', '', ''); ?>
        </a>

        <div class="header__actions">
            <nav class="header__nav-secondary">
                <ul>
                    <li><a href="realizace">realizace</a></li>
                    <li><a class="is-active" href="sluzby">služby</a></li>
                    <li><a href="onas">o nás</a></li>
                    <li><a href="kontakt">kontakt</a></li>
                    <li><a href="#" class="lang-switch">english</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>

<!-- Header Mobile -->
<header class="header-mobile" id="header-mobile">
    <div class="container">
        <div class="header-mobile__inner">
            <a class="header-mobile__logo" href="index">
                <?php icon('logo', '', ''); ?>
            </a>
            <div class="header-mobile__actions"></div>
            <button class="header-mobile__expander" id="header-expander" aria-label="Toggle Menu">
                <span class="hamburger">
                    <span class="hamburger__inner"></span>
                </span>
            </button>
        </div>
    </div>

    <nav class="menu-mobile header-mobile__menu">
        <ul class="menu-mobile__secondary">
            <li><a href="realizace">realizace</a></li>
            <li><a class="is-active" href="sluzby">služby</a></li>
            <li><a href="onas">o nás</a></li>
            <li><a href="kontakt">kontakt</a></li>
            <li><a href="#" class="lang-switch">english</a></li>
        </ul>
    </nav>
</header>



<!-- Start content wrapper -->
<div class="content-wrapper" id="content">