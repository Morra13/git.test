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
    if ($obValidation->dataValidation($arrData)) {
        if ($obValidation->fileValidation($arrOldUsers)) {
            if ($obValidation->userValidation($arrData, $arrOldUsers) === true) {
                $obRegistration->userRegistration($arrData, $sFileName, $arrOldUsers);
            }
        } else {
            $obRegistration->userRegistration($arrData, $sFileName, $arrOldUsers);
        }
    }
}

require($_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php');