<?php

$filename = "test.json";

if (isset($_POST)) {
    $all = [
        $name = $_POST['user_name'],
        $email = $_POST['email'],
        $phone = $_POST['phone'],
        $comment = $_POST['comment']
    ];
$json = json_encode($all, JSON_UNESCAPED_UNICODE);

    if (file_exists($filename)) {
        file_put_contents($filename, $json . '
        '  , FILE_APPEND);
    }
    echo 'Ваши данные отправлены' . '<br/>';
?>
<form action="form.php" method="post" name="formPhp">
    <p><input type="submit" name="sub" value="Получить информацию из Json"></p>
</form>
<?php

} else {
    echo 'Данные не удалось отправить';
}






