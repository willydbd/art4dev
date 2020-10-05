<?php
/**
 * @Author
 * Falua Temitope Oyewole.
 * faluatemitopeo@gmail.com
 * Web Developer
 * Date: 6/12/2018
 */
?>
<?
$page = ucfirst(basename($_SERVER['SCRIPT_NAME'], '.php'));
require_once __DIR__ .'/../../lib/Helpers/admin-helper.php';
require_once __DIR__ .'/../../lib/Helpers/include-linkbuilder.php';
if(!$Class->part->is_logged_in()) {
    redirect('/');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= isset($page) ? ucfirst(basename($page)) : 'Admin' ;?> &mdash; Page | Admin</title>
    <!-- Bootstrap core CSS-->
    <link href="<?= LINK_PREFIX. 'assets/resx/vendor/bootstrap/css/bootstrap.min.css' ?>" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="<?= LINK_PREFIX .'assets/resx/vendor/font-awesome/css/font-awesome.min.css' ?>" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="<?= LINK_PREFIX .'assets/resx/vendor/datatables/dataTables.bootstrap4.css'; ?>" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?= LINK_PREFIX .'assets/css/sb-admin.css' ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <link rel="stylesheet" href="<?= LINK_PREFIX.'assets/css/gallery-clean.css' ?>">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!--Icon-->
    <link rel="icon" type="image/png" href="<?= LINK_PREFIX .'assets/images/icons/logo_icon.png' ?>" />
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="">Art4Dev</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="<?= ADMIN_PREFIX .'dashboard' ?>">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Exhibitors">
                <a class="nav-link collapsed" href="<?= ADMIN_PREFIX .'exhibitors'?>">
                    <i class="fa fa-fw fa-user-o"></i>
                    <span class="nav-link-text">Exhibitors</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Donators">
                <a class="nav-link collapsed" href="<?= ADMIN_PREFIX .'donators'; ?>">
                    <i class="fa fa-fw fa-money"></i>
                    <span class="nav-link-text">Donators</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Donators">
                <a class="nav-link collapsed" href="<?= ADMIN_PREFIX .'ex-community'; ?>">
                    <i class="fa fa-fw fa-money"></i>
                    <span class="nav-link-text">Community</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Logout">
                <a class="nav-link collapsed" href="<?= ADMIN_PREFIX. 'logout'; ?>">
                    <i class="fa fa-fw fa-close"></i>
                    <span class="nav-link-text">Logout</span>
                </a>
            </li>

        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal" href="<?= ADMIN_PREFIX. 'logout'; ?>">
                    <i class="fa fa-fw fa-sign-out"></i>Logout</a>
            </li>
        </ul>
    </div>
</nav>