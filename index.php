<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

</head>

<body>
<form action="form.php" method="post" name="form" enctype="multipart/form-data">

    <p>
        <span>*Имя</span>
        <input type="text" name="user_name" placeholder="Введите имя" required>
    </p>
        <span>*Емайл</span>
        <input type="email" name="email" placeholder="Введите емайл" required>
    </p>

    <p>
        <span>*Телефон</span>
        <input type="tel" name="phone" placeholder="Введите телефон" required>
    </p>

    <p>
        <span>Комент</span>
        <textarea name="comment" placeholder="Напишите коментарий"></textarea>
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