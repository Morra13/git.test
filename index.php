<!DOCTYPE html>
<html>
<head>
    <title>Ввод данных</title>
    <meta charset="UTF-8">
</head>
<body>
<h1><b>Введите свои данные</b></h1>
<form action="form.php" method="post" name="form" enctype="multipart/form-data">
    <p>
        <span>*Имя</span>
        <input type="text" name="user_name" placeholder="Введите имя" minlength="3" maxlength="15" required>
    </p>
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
<form action="registration">
    <p>
        <button type="submit"> Переход на Авторизацию/Регистрацию </button>
    </p>
</form>

</body>
</html>