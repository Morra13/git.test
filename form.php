<?php

$FileName = "test.json";
$json1 = file_get_contents($FileName);
$arrOldData = json_decode($json1, true);

$data = [
    'name' => $_POST['user_name'],
    'email' => $_POST['email'],
    'phone' => $_POST['phone'],
    'comment' => $_POST['comment'],
    'avatar' => $_FILES['avatar']['name']
];

if(isset($_FILES['avatar'])) {
    $file_name = $_FILES['avatar']['name'];
    $file_tmp = $_FILES['avatar']['tmp_name'];

    move_uploaded_file($file_tmp, 'D:/OSPanel/domains/git.test/avatars/' . rand(1, 99999) . $file_name);

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
        echo 'Данные отправлены' . '<br/>';
    } else {
        echo 'Данные не удалось отправить';
    }
}
?>
<form action="inf/info.php" method="post" name="formPhp">
    <p><input type="submit" name="sub" value="Получить информацию из Json"></p>
</form>




