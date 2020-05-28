<?php

if (isset($_POST['exit'])) {
    setcookie('pass_cookie', 'inf', time() - 1, '/');
    header('Location: /html/exit.php');
}
if (isset($_COOKIE['pass_cookie'])) {
    $sFileJson = $_SERVER['DOCUMENT_ROOT'] . '/db/info.json';
    $arrJson = file_get_contents($sFileJson);
    echo $arrJson . '<br/>';
} else {
    header('Location: /html/exit.php');
}

require($_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php');

