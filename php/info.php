<?php

if (isset($_POST['exit'])) {
    setcookie('pass_cookie', 'inf', time() - 1, '/');
    header('Location: /html/exit.php');
}
if (isset($_COOKIE['pass_cookie'])) {
    $FileJson = $_SERVER['DOCUMENT_ROOT'] . '/db/info.json';
    $json = file_get_contents($FileJson);
    echo $json . '<br/>';
} else {
    header('Location: /html/exit.php');
}

require($_SERVER['DOCUMENT_ROOT'] . '/header.footer/footer.php');

