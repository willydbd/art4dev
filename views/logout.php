<?php
/**
 * @Author
 * Falua Temitope Oyewole.
 * faluatemitopeo@gmail.com
 * Web Developer
 * Date: 4/13/2018
 */

require_once __DIR__ . '/../lib/Helpers/settings.php';
require_once __DIR__ . '/../lib/Classes/Participant.php';

$USER = new Participant();
if($USER->is_logged_in() != "")
{

    $USER->logout();
    redirect('/login');
}
