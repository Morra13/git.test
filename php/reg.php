<?php
require($_SERVER['DOCUMENT_ROOT'] . '/header.footer/header.php');

$sFileName = $_SERVER['DOCUMENT_ROOT'] . '/db/user.json';
$sJson = file_get_contents($sFileName);
$arrOldUsers = json_decode($sJson, true);
$arrData = $_POST;
if (isset($arrData['reg'])) {
    $arrError = [];
    if (trim($arrData['login'] == '')) {
        $arrError[] = 'Введите логин!';
    }
    if (trim($arrData['email'] == '')) {
        $arrError[] = 'Введите email!';
    }
    if ($arrData['password'] == '') {
        $arrError[] = 'Введите пароль!';
    }
    if ($arrData['password_2'] != $arrData['password']) {
        $arrError[] = 'Повторный пароль не верный';
    }
    if (isset($arrOldUsers)) {
        foreach ($arrOldUsers as $arrValue) {
            if (trim($arrData['login'] === $arrValue['login'])) {
                $arrError[] = 'Такой логин уже есть!';
            }
            if (trim($arrData['email'] === $arrValue['email'])) {
                $arrError[] = 'Такой email уже есть!';
            }
        }
    }
    $arrNewUser = [
        'login' => $arrData['login'],
        'email' => $arrData['email'],
        'password' => md5($arrData['password'])
    ];
    $arrOldUsers[] = $arrNewUser;
    $sJson = json_encode($arrOldUsers, JSON_UNESCAPED_UNICODE);
    if (empty($arrError) && isset($arrOldUsers)) {
        file_put_contents($sFileName, $sJson);
        echo '<div style="color: green"> Вы зарегистрировались! </div><hr/>';
    } elseif (empty($arrError)) {
        if (file_exists($sFileName)) {
            file_put_contents($sFileName, $sJson, FILE_APPEND);
        }
    } else {
        echo '<div style="color: red">' . array_shift($arrError) . '</div><hr/>';
    }
}

require($_SERVER['DOCUMENT_ROOT'] . '/header.footer/footer.php');