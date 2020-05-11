<?php


if(isset($_FILES['avatar'])) {

    $file_name = $_FILES['avatar']['name'];
    $file_tmp = $_FILES['avatar']['tmp_name'];

    move_uploaded_file($file_tmp, 'D:/OSPanel/domains/git.test/avatars/' . rand(1, 99999) . $file_name);

$filename = "test.json";

if (isset($_POST)) {
    $all = [
        'name' => $_POST['user_name'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'comment' => $_POST['comment'],
        'avatar' => $_FILES['avatar']['name']
    ];

    if (!isset($all)){
        setcookie('cook', 'cookie', time() +86400);
        echo 'есть куки :' . $_COOKIE['cook'] . '<br/>';
    } else {
        echo 'нет куки' . '<br/>';
    }

    $json = json_encode($all, JSON_UNESCAPED_UNICODE);


    if (file_exists($filename)) {
        file_put_contents($filename, $json . '
        '  , FILE_APPEND);
    }
    echo 'Ваши данные отправлены' . '<br/>';
?>
<form action="inf/info.php" method="post" name="formPhp">
    <p><input type="submit" name="sub" value="Получить информацию из Json"></p>
</form>
<?php

} else {
    echo 'Данные не удалось отправить';
}



}
?>





