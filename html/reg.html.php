<?php
require($_SERVER['DOCUMENT_ROOT'] . '/templates/header.php');
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Регистрация</title>
    </head>
    <body>

    <form action="/php/reg.php" method="post">

        <p>Логин</p>
        <input type="text" name="login" placeholder="Введите логин" minlength="1">
        <p>Емайл</p>
        <input type="email" name="email" placeholder="Введите email" minlength="1">
        <p>Пароль</p>
        <input type="password" name="password" placeholder="Введите пароль" minlength="1">
        <p>Повторите пароль</p>
        <input type="password" name="password_2" placeholder="Повторите пароль" minlength="1">
        <p>
            <button type="submit" name="reg">Регистрация</button>
        </p>
    </form>
    <form action="/html/auth.html.php">
        <p>
            <button type="submit">Вход</button>
        </p>
    </form>

    </body>
    </html>

<?php
require($_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php');
?>