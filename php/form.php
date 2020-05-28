<?php
require($_SERVER['DOCUMENT_ROOT'] . '/templates/header.php');

$sFileName = $_SERVER['DOCUMENT_ROOT'] . '/db/info.json';
$sJson = file_get_contents($sFileName);
$arrOldData = json_decode($sJson, true);
$arrData = [
    'name' => $_POST['user_name'],
    'email' => $_POST['email'],
    'phone' => $_POST['phone'],
    'comment' => $_POST['comment'],
    'avatar' => $_FILES['avatar']['name']
];
if (isset($_FILES['avatar'])) {
    $sAvatarName = $_FILES['avatar']['name'];
    $sAvatarTmp = $_FILES['avatar']['tmp_name'];
    move_uploaded_file($sAvatarTmp, $_SERVER['DOCUMENT_ROOT'] . '/avatars/' . time() . $sAvatarName);
    if (isset($_POST)) {
        $arrOldData[] = $arrData;
        $sJson = json_encode($arrOldData, JSON_UNESCAPED_UNICODE);
        if (isset($arrOldData)) {
            file_put_contents($sFileName, $sJson);
        } else {
            file_put_contents($sFileName, $sJson);
        }
        echo 'Данные отправлены. Вы можете авторизоваться и посмотреть что было отправлено' . '<br/>';
    } else {
        echo 'Данные не удалось отправить';
    }
}

require($_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php');





