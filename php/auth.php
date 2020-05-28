<?php
require($_SERVER['DOCUMENT_ROOT'] . '/functions/Validation.php');

$sFileName = $_SERVER['DOCUMENT_ROOT'] . '/db/user.json';
$sJson = file_get_contents($sFileName);
$arrUsers = json_decode($sJson, true);
$arrData = $_POST;
$arrError = [];
$obValidation = new Validation();

if (isset($arrUsers)) {
    if (isset($arrData['auth']) && isset($arrUsers)) {
        $obValidation->AuthValidation($arrData, $arrUsers);
    }
} else {
    echo 'Не верный емейл или пароль';
    require($_SERVER['DOCUMENT_ROOT'] . '/templates/header.php');
}

require($_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php');


