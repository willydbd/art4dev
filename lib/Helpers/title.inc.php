<?php

if (!session_id()) session_start();

$title = ucfirst(basename($_SERVER['SCRIPT_NAME'], '.php'));
$title = str_replace(["_", "-"], " ", $title);
if (strtolower($title) == 'index') {
    $title = 'Home';
}
$title = ucwords($title);

function redirect($url) {
    echo "<script>location = '$url'</script>";
    die();
}