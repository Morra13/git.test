<?php

$FileName = 'D:\OSPanel\domains\git.test\registration\user.json';
$json1 = file_get_contents($FileName);
$arrOldUsers = json_decode($json1, true);
$data = $_POST;

$errors = [];
if(isset($data['auth'])) {

    foreach ($arrOldUsers as $v) {

        if ($a = (trim($data['email'] === $v['email']) && md5($data['password']) === $v['password'])) {

            if(isset($a)){
                setcookie('pass_cookie','inf', time()+86400, '/');
                header('Location: /inf/info.php');
                exit;
            }
            die();
        } else {
            $errors[] = 'Не верный емейл или пароль';
        }
    }

    if(empty($errors)){
        echo 'Все ок';
    } else {
        echo '<div style="color: red">' . array_shift($errors) . '</div><hr/>';
    }
}
?>
<body>
<h1><b>Авторизация</b></h1>
<form action="/registration/auth.php" method="post">
    <p>
    <p>Email</p>
        <input type="email" name="email" >
    </p>
    <p>
    <p>Пароль</p>
    <p>
        <input type="password" name="password" >
    </p>
    <button type="submit" name="auth">Вход</button>
</form>
</body>