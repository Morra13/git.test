<?php
$data = $_POST;
if(isset($data['login'])){

}



?>

<form action="/registration/login.php" method="post">
    <p>
    <p>Логин</p>
    <input type="text" name="login" >
    </p>
    <p>
    <p>Пароль</p>
    <p>
    <input type="password" name="password" >
    </p>

        <button type="submit" name="log">Вход</button>
</form>
