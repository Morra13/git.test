<?php
require($_SERVER['DOCUMENT_ROOT'] . '/header.footer/header.php');

$FileName = $_SERVER['DOCUMENT_ROOT'] . '/db/user.json';
$json1 = file_get_contents($FileName);
$arrOldUsers = json_decode($json1, true);

$data = $_POST;
if (isset($data['reg'])) {

    $errors = [];
    if (trim($data['login'] == '')) {
        $errors[] = 'Введите логин!';
    }
    if (trim($data['email'] == '')) {
        $errors[] = 'Введите email!';
    }
    if ($data['password'] == '') {
        $errors[] = 'Введите password!';
    }

    if ($data['password_2'] != $data['password']) {
        $errors[] = 'Повторный пароль не верный';
    }
    if (isset($arrOldUsers)) {
        foreach ($arrOldUsers as $v) {
            if (trim($data['login'] === $v['login'])) {
                $errors[] = 'Такой логин уже есть!';
            }
            if (trim($data['email'] === $v['email'])) {
                $errors[] = 'Такой email уже есть!';
            }
        }
    }

    if (empty($errors) && isset($arrOldUsers)) {
        $arrNewUser = [
            'login' => $data['login'],
            'email' => $data['email'],
            'password' => md5($data['password'])
        ];
        $arrOldUsers[] = $arrNewUser;
        $json2 = json_encode($arrOldUsers, JSON_UNESCAPED_UNICODE);
        file_put_contents($FileName, $json2);
        echo '<div style="color: green"> Вы зарегистрировались! </div><hr/>';

    } elseif (empty($errors)) {
        $firstUser[] = [
            'login' => $data['login'],
            'email' => $data['email'],
            'password' => md5($data['password'])
        ];
        $json = json_encode($firstUser, JSON_UNESCAPED_UNICODE);

        if (file_exists($FileName)) {
            file_put_contents($FileName, $json . '
        ', FILE_APPEND);
        }
    } else {
        echo '<div style="color: red">' . array_shift($errors) . '</div><hr/>';
    }
}

require($_SERVER['DOCUMENT_ROOT'] . '/header.footer/footer.php');