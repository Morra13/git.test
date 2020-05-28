<?php
require($_SERVER['DOCUMENT_ROOT'] . '/templates/header.php');
require($_SERVER['DOCUMENT_ROOT'] . '/functions/validation.php');

$sFileName = $_SERVER['DOCUMENT_ROOT'] . '/db/user.json';
$sJson = file_get_contents($sFileName);
$arrOldUsers = json_decode($sJson, true);
$arrData = $_POST;
$obValidation = new validation();

if ($obValidation->DataValidation($arrData) !== true) {
    echo $obValidation->DataValidation($arrData);
} else {
    if (isset($arrOldUsers)) {
        $obValidation->UserValidation($arrData, $sFileName, $arrOldUsers);
    } else {
        $obValidation->UserRegistration($arrData, $sFileName);
    }
}

require($_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php');