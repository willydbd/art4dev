<?php
/**
 * @Author
 * Falua Temitope Oyewole.
 * faluatemitopeo@gmail.com
 * Web Developer
 * Date: 4/9/2018
 */
require_once __DIR__ . '/settings.php';
require_once __DIR__ . '/../Classes/Admin.php';

$Class = new Admin();

$REGISTER = isset($_GET['register']);

$LOGIN = isset($_GET['admin-login']) && isset($_POST['useremail']);

if($REGISTER) {
    $data = $_POST;
    $error = $Class->validateData($data);
    if(!$error) {
        $result = $Class->registerAdmin($data);
        $SUCCESS = $result === true;
        $ERRMSG = $SUCCESS ? "Registration Successful" : $result;
    }
}

if($LOGIN) {
        $result = $Class->loginAdmin($_POST);
        $SUCCESS = $result === true;

        if ($SUCCESS) {
            redirect('/admin/dashboard');
        }
        else $ERRMSG = $SUCCESS ? "Login Successful": $result;
}

$ACCEPT = isset($_GET['accept']);

if($ACCEPT) {
    $id =  ($page == 'exhibitor') ? $_GET['accept'] : $_GET['id'];
    $result = $Class->activateExhibitor($id);
    $SUCCESS = $result === true;
    $ERRMSG = $SUCCESS ? "Account Activated": $result;

}

$ACCEPT_DONOR = isset($_GET['accept_donor']);

if($ACCEPT_DONOR) {
    $id =  ($page == 'donators') ? $_GET['accept_donor'] : $_GET['id'];
    $result = $Class->activateDonator($id);
    $SUCCESS = $result === true;
    $ERRMSG = $SUCCESS ? "Account Activated": $result;

}
$COUNT = $Class->countExhibitors();

#!--get the total number of donors
$COUNT_D = $Class->countDonators();

$COUNT_C = $Class->countCommunity();

$ADD_TO_COMMUNITY = isset($_GET['community']);

if($ADD_TO_COMMUNITY) {
    $data = $_POST;
    $error = $Class->part->validateForm($data);
    if(!$error) {
        $result = $Class->addToCommunity($data);
        $SUCCESS = $result === true;
        $ERRMSG = $SUCCESS ? "Added Successfully" : $result;
    }
}
