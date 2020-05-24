<?php
require($_SERVER['DOCUMENT_ROOT'] . '/header.footer/header.php');

$FileName = $_SERVER['DOCUMENT_ROOT'] . '/db/info.json';
$json1 = file_get_contents($FileName);
$arrOldData = json_decode($json1, true);

$data = [
    'name' => $_POST['user_name'],
    'email' => $_POST['email'],
    'phone' => $_POST['phone'],
    'comment' => $_POST['comment'],
    'avatar' => $_FILES['avatar']['name']
];

if (isset($_FILES['avatar'])) {
    $file_name = $_FILES['avatar']['name'];
    $file_tmp = $_FILES['avatar']['tmp_name'];

    move_uploaded_file($file_tmp, $_SERVER['DOCUMENT_ROOT'] . '/avatars/' . rand(1, 99999) . $file_name);

    if (isset($_POST)) {

        if (isset($arrOldData)) {
            $arrOldData[] = $data;
            $newJson = json_encode($arrOldData, JSON_UNESCAPED_UNICODE);
            file_put_contents($FileName, $newJson);
        } else {
            $arrFirstData[] = $data;
            $firstJson = json_encode($arrFirstData, JSON_UNESCAPED_UNICODE);
            file_put_contents($FileName, $firstJson);
        }
        echo 'Данные отправлены. Вы можете авторизоваться и посмотреть что было отправлено' . '<br/>';
    } else {
        echo 'Данные не удалось отправить';
    }
}

require($_SERVER['DOCUMENT_ROOT'] . '/header.footer/footer.php');





