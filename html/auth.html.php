<?php
require($_SERVER['DOCUMENT_ROOT'] . '/header.footer/header.php');
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Авторизация</title>
    </head>
    <body>
    <h1><b>Авторизация</b></h1>
    <form action="/php/auth.php" method="post">
        <p>
        <p>Email</p>
        <input type="email" name="email">
        </p>
        <p>
        <p>Пароль</p>
        <p>
            <input type="password" name="password">
        </p>
        <button type="submit" name="auth">Вход</button>
    </form>
    </body>
    </html>

<?php
require($_SERVER['DOCUMENT_ROOT'] . '/header.footer/footer.php');
?>