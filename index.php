<?php
require($_SERVER['DOCUMENT_ROOT'] . '/header.footer/header.php');
?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Главная страница</title>
        <meta charset="UTF-8">
    </head>
    <body>

    <h1><b>Введите свои данные</b></h1>
    <form action="/php/form.php" method="post" name="form" enctype="multipart/form-data">
        <p>
            <span>*Имя</span>
            <input type="text" name="user_name" placeholder="Введите имя" minlength="3" maxlength="15" required>
        </p>
        <p>
        <span>*Емайл</span>
        <input type="email" name="email" placeholder="Введите емайл" required>
        </p>
        <p>
            <span>*Телефон</span>
            <input type="tel" name="phone" placeholder="Введите телефон" minlength="13" maxlength="13" required>
        </p>
        <p>
            <span>Комент</span>
            <textarea name="comment" placeholder="Напишите коментарий" minlength="5"></textarea>
        </p>
        <p>
            <label>Ваш аватар:
                <input type="file" name="avatar"></label>
        </p>
        <p>
            <input type="submit" id="submit" value="Отправить">
        </p>
    </form>

    </body>
    </html>

<?php
require($_SERVER['DOCUMENT_ROOT'] . '/header.footer/footer.php');
?>