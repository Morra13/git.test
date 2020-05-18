<?php
if(isset($_POST['exit'])) {
    setcookie('pass_cookie', 'inf', time() -1, '/');
    header('Location: /registration/auth.php');
}
    if(isset($_COOKIE['pass_cookie'])) {
        $FileJson = 'D:/OSPanel/domains/git.test/test.json';
        $json = file_get_contents($FileJson);
        echo $json . '<br/>';
?>
        <form action="" method="post">
            <input type="submit" name="exit" value="exit">
        </form>
<?php

    } else {
        echo 'Для получения информации Авторизуйтесь:' . '<p><a href="/registration/auth.php">Авторизоваться</a></p>';
        echo 'Если не зарегистрированы то, Зарегистрируйтесь:' . '<p><a href="/registration/reg.php">Регистрация</a></p>';
    }
?>

