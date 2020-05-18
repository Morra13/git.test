<?php
$FileName = 'D:\OSPanel\domains\git.test\registration\user.json';
$json1 = file_get_contents($FileName);
$arrOldUsers = json_decode($json1, true);

$data = $_POST;
if(isset($data['reg'])){

    $errors = [];
    if(trim($data['login'] === $arrOldUsers['login'])){
        $errors[] = 'Такой логин уже есть!';
    }

    if(trim($data['email'] === $arrOldUsers['email'])){
        $errors[] = 'Такой email уже есть!';
    }
    if(trim($data['login'] == '')){
        $errors[] = 'Введите логин!';
    }
    if(trim($data['email'] == '')){
        $errors[] = 'Введите email!';
    }
    if($data['password'] == ''){
        $errors[] = 'Введите password!';
    }

    if($data['password_2'] != $data['password']){
        $errors[] = 'Повторный пароль не верный';
    }

if(empty($errors) && isset($arrOldUsers)){
    $arrUser = [
        'login' => $data['login'],
        'email' => $data['email'],
        'password' => md5($data['password'])
    ];

        $arrNewUser = $arrUser;

        $arrAllUsers = [$arrOldUsers, $arrNewUser];
        $json2 = json_encode($arrAllUsers, JSON_UNESCAPED_UNICODE);

        file_put_contents($FileName, $json2);

}

    elseif(empty($errors)){
        $firstUser[] = [
            'login' => $data['login'],
            'email' => $data['email'],
            'password' => md5($data['password'])
        ];
        $json = json_encode($firstUser, JSON_UNESCAPED_UNICODE);

        if (file_exists($FileName)) {
            file_put_contents($FileName, $json . '
        '  , FILE_APPEND);
        }

        echo '<div style="color: green"> Вы зарегистрировались! </div><hr/>';
    }else{
        echo '<div style="color: red">' . array_shift($errors) . '</div><hr/>';
    }

}

?>

<form action="/registration/reg.php" method="post">
    <p>
    <p>Логин</p>
    <input type="text" name="login" value="<?php //echo @$data['login']?>">
    </p>
    <p>
    <p>Емайл</p>
    <input type="email" name="email" value="<?php //echo @$data['email']?>">
    </p>
    <p>
    <p>Пароль</p>
    <input type="password" name="password" value="<?php //echo @$data['password']?>">
    </p>
    <p>
    <p>Повторите пароль</p>
    <input type="password" name="password_2" value="<?php //echo @$data['password_2']?>">
    </p>

    <p>
        <button type="submit" name="reg">Регистрация</button>
    </p>
</form>