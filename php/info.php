<?php

require($_SERVER['DOCUMENT_ROOT'] . '/functions/Auth.php');
require($_SERVER['DOCUMENT_ROOT'] . '/functions/EnumError.php');

$obAuth = new Auth();

if (isset($_POST['exit'])) {
    $obAuth->userExit();
}

require($_SERVER['DOCUMENT_ROOT'] . '/templates/header.php');

if (isset($_COOKIE['pass_cookie'])) {
    $sFileJson = $_SERVER['DOCUMENT_ROOT'] . '/db/info.json';
    $arrJson = file_get_contents($sFileJson);
    echo $arrJson . '<br/>';
} else {
    echo EnumError::ACCESS_ERROR;
}

require($_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php');

