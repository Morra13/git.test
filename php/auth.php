<?php
require($_SERVER['DOCUMENT_ROOT'] . '/functions/Validation.php');
require($_SERVER['DOCUMENT_ROOT'] . '/functions/Auth.php');

$sFileName = $_SERVER['DOCUMENT_ROOT'] . '/db/user.json';
$sJson = file_get_contents($sFileName);
$arrUsers = json_decode($sJson, true);
$arrData = $_POST;
$arrError = [];
$obValidation = new Validation();
$obAuth = new Auth();

if (isset($_POST['auth'])) {
    if ($obValidation->AuthValidation($arrData, $arrUsers) === true) {
        $obAuth->UserAuth();
    };
}

require($_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php');


