<?php
$sFileName = $_SERVER['DOCUMENT_ROOT'] . '/db/user.json';
$sJson = file_get_contents($sFileName);
$arrUsers = json_decode($sJson, true);
$arrData = $_POST;
$arrError = [];

if (isset($arrData['auth']) && isset($arrUsers)) {
    foreach ($arrUsers as $v) {
        if (trim($arrData['email']) === $v['email'] && md5($arrData['password']) === $v['password']) {
            setcookie('pass_cookie', 'inf', time() + 86400, '/');
            header('Location: /php/info.php');
            exit;
        } else {
            $arrError[] = 'Не верный емейл или пароль';
        }
    }
    if (empty($arrError)) {
        echo 'Все ок';
    } else {
        echo array_shift($arrError) . '</div><hr/>';
        require($_SERVER['DOCUMENT_ROOT'] . '/header.footer/header.php');
    }
} else {
    echo 'Такой email не зарегистрирован';
}

require($_SERVER['DOCUMENT_ROOT'] . '/header.footer/footer.php');
