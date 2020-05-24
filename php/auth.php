<?php
//require($_SERVER['DOCUMENT_ROOT'].'/header.footer/header.php');

$FileName = $_SERVER['DOCUMENT_ROOT'] . '/db/user.json';
$json1 = file_get_contents($FileName);
$arrOldUsers = json_decode($json1, true);
$data = $_POST;

$errors = [];
if (isset($data['auth'])) {

    foreach ($arrOldUsers as $v) {

        if ($a = (trim($data['email'] === $v['email']) && md5($data['password']) === $v['password'])) {

            if (isset($a)) {
                setcookie('pass_cookie', 'inf', time() + 86400, '/');
                header('Location: /php/info.php');
                exit;
            }
            die();
        } else {
            $errors[] = 'Не верный емейл или пароль';
        }
    }

    if (empty($errors)) {
        echo 'Все ок';
    } else {
        echo array_shift($errors) . '</div><hr/>';
        require($_SERVER['DOCUMENT_ROOT'].'/header.footer/header.php');
    }
}
require($_SERVER['DOCUMENT_ROOT'].'/header.footer/footer.php');
