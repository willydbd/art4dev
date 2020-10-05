<?php require_once __DIR__ .'/../../lib/Helpers/settings.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Businnes, Portfolio, Corporate">
    <meta name="Author" content="WebThemez">
    <title><?= $title . " | Art4Dev " ?> </title>
    <?php include __DIR__ .'/../../lib/Helpers/css.php'; ?>
    <!--[if lt IE 9]>
        <script src="<?= LINK_PREFIX .'js/html5shiv.min.js' ?>"></script>
        <script src="<?= LINK_PREFIX .'js/respond.min.js' ?>"></script>
        <script type="text/javascript" src="js/selectivizr.js"></script>
    <![endif]-->
</head>

<body>
    <!-- Header End -->
    <header>
        <!-- Navigation Menu start-->
        <nav id="topNav" class="navbar navbar-default main-menu">
            <div class="container">
                <button class="navbar-toggler hidden-md-up pull-right" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
                    ☰
                </button>
                <a class="navbar-brand page-scroll" href="<?= LINK_PREFIX; ?>">
                    <img class="logo" id="logo" src="<?= LINK_PREFIX ; ?>assets/images/logo.png" alt="logo"></a>
                <div class="collapse navbar-toggleable-sm" id="collapsingNavbar">
                    <ul class="nav navbar-nav">
                        <li><a class = "active" href="<?= LINK_PREFIX; ?>">HOME</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">ABOUT</a>
                            <ul class = "dropdown-menu">
                                <li><a class = "dli" href="<?= LINK_PREFIX . 'faqs' ?>">FAQ</a></li>
                                <li><a class = "dli" target = "_new" href="http://www.actionaid.org/what-we-do">About ActionAid</a></li>
                                <li><a class = "dli" href="<?= LINK_PREFIX . '#about' ?>">About the Art4Dev</a></li>
                            </ul>
                        </li>
                        <li><a href="<?= LINK_PREFIX . '#gallery' ?>">GALLERY</a></li>
                        <li><a href="<?= LINK_PREFIX . '#sponsors' ?>">Sponsors</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">ArtWorks</a>
                            <ul class = "dropdown-menu">
                                <li><a class = "dli" href = "<?= LINK_PREFIX . 'exhibitors' ?>">Exhibitors</a></li>
                                <li><a class = "dli" href="<?= LINK_PREFIX . 'community' ?>">Community</a></li>
                            </ul>
                        </li>
                        <!--<li><a href="<?/*= LINK_PREFIX . 'exhibitors' */?>">Exhibitors</a></li>-->
                        <!--<li><a href="<?/*= LINK_PREFIX . 'community' */?>">Community</a></li>-->
                        <li><a href="<?= LINK_PREFIX . 'donation'; ?>">DONATE</a></li>
                        <li><a href="<?= LINK_PREFIX . 'registration'?>">Register</a></li>
                        <li><a href="<?= LINK_PREFIX . 'login'; ?>">Login</a></li>
                        <li><a href="<?= LINK_PREFIX . '#contact' ;?>">CONTACT US</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- Header End -->
