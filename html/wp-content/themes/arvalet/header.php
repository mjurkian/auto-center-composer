<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie10 lt-ie9" lang="en"><![endif]-->
<!--[if IE 9]><html class="no-js lt-ie10" lang="en"><![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="en"><!--<![endif]-->
<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php wp_title(''); ?></title>

    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    
    <!--[if IE]>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
    <![endif]-->
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/dist/icons/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/dist/icons/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/dist/icons/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/dist/icons/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/dist/icons/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <?php wp_head(); ?>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-GTNFDW57LQ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-GTNFDW57LQ');
    </script>
    <?php // end analytics ?>

</head>

<body <?php body_class('doctype-locationlandingpage'); ?> itemscope itemtype="http://schema.org/WebPage">

<ul class="skip-links" role="navigation">
    <li><a href="#main">Skip to content</a></li>
    <li><a href="#mainNavigation" class="link-navigation">Main site navigation</a></li>
    <li><a href="#footer">Footer</a></li>
</ul>

<header class="header" role="banner" itemscope itemtype="http://schema.org/WPHeader" id="navigation-primary">

    <div class="header__container">
        <div class="header__row">
            <div class="navOpen">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>

            <div class="header__logo">
                <a href="/"> 
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/images/Arvalet-Logo.png" alt="Arvalet Logo"> 
                </a>
            </div>

            <div class="header__nav">
                <div class="header__nav--appointment">
                    <a href="/contact/">Make an Appointment</a>
                </div>
                <nav class="nav" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
                    <?php
                        wp_nav_menu( array(
                            'menu' => 'Main Menu'
                        ) );
                    ?>
                </nav>
            </div>
            
        </div>
    </div>
</header>

<section class="top-arrow">
    <a id="ScrollToTop" class="footer__arrow-top smooth-scroll" aria-label="Skip back to the top of the page" title="Back to top" href="#navigation-primary"><i></i></a>
</section>

<main>
<?php include('partials/hero-image.php'); ?>
	<div id="main">
