<?php
require($_SERVER['DOCUMENT_ROOT'] . '/templates/header.php');
require($_SERVER['DOCUMENT_ROOT'] . '/functions/Validation.php');
require($_SERVER['DOCUMENT_ROOT'] . '/functions/RegFunc.php');

$sFileName = $_SERVER['DOCUMENT_ROOT'] . '/db/user.json';
$sJson = file_get_contents($sFileName);
$arrOldUsers = json_decode($sJson, true);
$arrData = $_POST;
$obValidation = new Validation();
$obRegistration = new RegFunc();

if (isset($_POST['reg'])) {
    if ($obValidation->DataValidation($arrData)) {
        if ($obValidation->FileValidation($arrOldUsers)) {
            if ($obValidation->UserValidation($arrData, $arrOldUsers) === true) {
                $obRegistration->UserRegistration($arrData, $sFileName, $arrOldUsers);
            }
        } else {
            $obRegistration->FirstUserRegistration($arrData, $sFileName);
        }
    }
}

require($_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php');