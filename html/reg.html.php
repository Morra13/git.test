<?php
require($_SERVER['DOCUMENT_ROOT'] . '/header.footer/header.php');
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Регистрация</title>
    </head>
    <body>

    <form action="/php/reg.php" method="post">
        <p>
        <p>Логин</p>
        <input type="text" name="login">
        </p>
        <p>
        <p>Емайл</p>
        <input type="email" name="email">
        </p>
        <p>
        <p>Пароль</p>
        <input type="password" name="password">
        </p>
        <p>
        <p>Повторите пароль</p>
        <input type="password" name="password_2">
        </p>
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
require($_SERVER['DOCUMENT_ROOT'] . '/header.footer/footer.php');
?>