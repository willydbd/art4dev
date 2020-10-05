<?php
/**
 * @Author
 * Falua Temitope Oyewole.
 * faluatemitopeo@gmail.com
 * Web Developer
 * Date: 4/13/2018
 */
require_once __DIR__.'/../../lib/Classes/Participant.php';

$Cl = new Participant();

#!-- controls the registration of a participant
$PARTICIPANT = isset($_GET['participant']);

if($PARTICIPANT) {
    $data = $_POST;
    $error = $Cl->validateForm($data);
    if(!$error) {
        $result = $Cl->addParticipant($data);
        $SUCCESS = $result === true;
        $ERRMSG = $SUCCESS ? "Registration Successful" : $result;
    }
}

#!-- controls the registration of an exhibitor
$EXHIBITOR = isset($_GET['exhibitor']);

if($EXHIBITOR) {
    $data = $_POST;
    $error = $Cl->validateForm($data);
    if(!$error) {
        $result = $Cl->signUpExhibitor($data);
        $SUCCESS = $result === true;
        $ERRMSG = $SUCCESS ? "Registration Successful" : $result;
    }
}


#! --controls the registration of a donor
$DONATE = isset($_GET['donate']);

if($DONATE) {
    $data = $_POST;
    $error = $Cl->validateForm($data);
    if(!$error) {
        $result = $Cl->signUpDonator($data);
        $SUCCESS = $result === true;
        $ERRMSG = $SUCCESS ? "Registration Successful" : $result;
    }
}

$E_LOGIN = isset($_GET['login']) && isset($_POST['username']);

if($E_LOGIN) {
    $data = $_POST;
    $uname = $_POST['username'];
    $password = $_POST['userpass'];
    //$error = $Cl->validateForm($data);
    $result = $Cl->login($uname, $password);
    $SUCCESS = $result === true;
    $ERRMSG = $SUCCESS ? "Login Successful" : $result;

}

$FEEDBACK = isset($_GET['feedback']);

/*if($FEEDBACK) {
    $data = $_POST;
    $error = $Cl->($data);
    if(!$error) {
        $result = $Cl->signUpDonator($data);
        $SUCCESS = $result === true;
        $ERRMSG = $SUCCESS ? "Registration Successful" : $result;
    }
}
*/?>