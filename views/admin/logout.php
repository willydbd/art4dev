<?php
/**
 * @Author
 * Falua Temitope Oyewole.
 * faluatemitopeo@gmail.com
 * Web Developer
 * Date: 4/9/2018
 */


require_once __DIR__ . '/../../lib/Helpers/settings.php';
require_once __DIR__ . '/../../lib/Classes/Admin.php';

$USER = new Admin();

if($USER->part->is_logged_in() != "")
{
    $USER->part->logout();
}

redirect("/admin");
