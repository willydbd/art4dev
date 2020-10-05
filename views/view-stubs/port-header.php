<?php
/**
 * @Author
 * Falua Temitope Oyewole.
 * faluatemitopeo@gmail.com
 * Web Developer
 * Date: 4/27/2018
 */

session_start();
$title = ucfirst(basename($_SERVER['SCRIPT_NAME'], '.php'));
$title = str_replace(["_", "-"], " ", $title);
if (strtolower($title) == 'portfolio') {
    $title = 'Dashboard';
}
$title = ucwords($title);
require_once __DIR__ . '/../../lib/Helpers/include-linkbuilder.php';
require_once __DIR__ . '/../../lib/Helpers/portfolio-helper.php';

//if ($$IS_LOGGED)
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title . ' &mdash; ' . $IS_LOGGED->contact_name . ' &mdash; Art4Dev' ?> </title>
    <link rel="stylesheet" href="<?= LINK_PREFIX . 'assets/css/w3.css' ?>">
    <link rel="stylesheet" href="<?= LINK_PREFIX . 'assets/css/font-awesome/css/font-awesome.min.css' ?>">
    <link rel="stylesheet" href="<?= LINK_PREFIX . 'assets/css/portfolio.css' ?>">
    <link rel="stylesheet" href="<?= LINK_PREFIX . 'assets/css/animate.css' ?>">
    <link rel="stylesheet" href="<?= LINK_PREFIX . 'assets/css/bootstrap.min.css' ?>">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu|Titillium+Web" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <link rel="stylesheet" href="<?= LINK_PREFIX.'assets/css/gallery-clean.css' ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
    <!-- Optional theme -->
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" />
    <!--Icon-->
    <link rel="icon" type="image/png" href="<?= LINK_PREFIX .'assets/images/icons/logo_icon.png' ?>" />
</head>
<body>
<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left side-bar" style="" id="mySidebar">
    <div class="w3-container profile-menu">
        <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey"
           title="close menu">
            <i class="fa fa-remove"></i>
        </a>
        <div class="w3-center">
            <? if ($IS_LOGGED->photo) { ?>
                <img align="top" class="img-responsive img-circle" src="../../uploads/avatar/<?= $IS_LOGGED->photo ?>">
            <? } else { ?>
                <img align="top" class="img-responsive img-circle"
                     src="<?= LINK_PREFIX . 'assets/images/icons/default.jpg' ?>">
            <? } ?>
            <!--<span class="user-name"><?php /*echo 'Welcome ' . $IS_LOGGED->contact_name; */ ?> </span>-->
        </div>
        <div class="w3-bar-block w3-center wow animated fadeIn" data-wow-delay = ".7s">
            <ul>
                <li><a href="<?= LINK_PREFIX .'portfolio' ?>"><i class="fa fa-dashboard fa-fw"></i> Portfolio</a></li>
                <li><a href="<?= LINK_PREFIX .'portfolio/add-arts' ?>" onclick="w3_close()"><i class="fa fa-image fa-fw"></i> Add Artworks</a></li>
                <li><a href="<?= LINK_PREFIX .'portfolio/visit-my-shop' ?>" onclick="w3_close()"><i class="fa fa-picture-o fa-fw"></i> My Artworks</a></li>
                <li><a href="<?= LINK_PREFIX .'portfolio/update-profile' ?>"><i class="fa fa-edit fa-fw"></i> Update Profile</a></li>
                <li><a href="<?= LINK_PREFIX . 'logout'; ?>" onclick="w3_close()"><i class="fa fa-sign-out fa-fw"></i>
                        Logout</a></li>
            </ul>
        </div>
        <div class="copyright">
            Copyright <?= date('Y'); ?> &copy; Art4Dev.
        </div>
    </div>
</nav>
<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer"
     title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main main-content">
    <!-- Header -->
    <header id="portfolio">
        <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i
                    class="fa fa-bars"></i></span>
        <div class="w3-container dashboard-head">
            <h3>Welcome to your Dashboard, <?= $IS_LOGGED->organization; ?></h3>
            <hr>
        </div>
    </header>

