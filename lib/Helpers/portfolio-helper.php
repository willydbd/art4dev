<?php
/**
 * @Author
 * Falua Temitope Oyewole.
 * faluatemitopeo@gmail.com
 * Web Developer
 * Date: 5/28/2018
 */
require_once __DIR__ . '/../../lib/Classes/Participant.php';

$USER = new Participant();
if (!$USER->is_logged_in()) {
    redirect('/login');
}

$IS_LOGGED = $USER->getLoginSession();

$UPDATE_PWD = isset($_GET['pwd-update']) && isset($_POST['userpass']);

if($UPDATE_PWD) {
    $data = $_POST;
    $error = $USER->validateFormData($data,'update_pass');
    if(!$error) {
        $result = $USER->updatePassword($data);
        $SUCCESS = $result === true;
        $ERRMSG = $SUCCESS ? "Password Changed Successful" : $result;
        $USER->logout();
    }
}

$ADD_ARTWORKS = isset($_GET['add-artworks']);

if($ADD_ARTWORKS) {
    $data = $_POST;
    $error = $USER->validateForm($data,'f-submit');
    if(!$error) {
        $result = $USER->addMoreArtWorks($data);
        var_dump($result);
        $SUCCESS = $result === true;
        $ERRMSG = $SUCCESS ? "Artwork Successfully Updated" : $result;
    }
}