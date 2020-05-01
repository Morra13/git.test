<?php

$filename = "test.txt";

$all = [
    $name = $_POST['name'],
    $email = $_POST['email'],
    $phone = $_POST['phone'],
    $comment = $_POST['comment']
];

if (file_exists($filename)) {
    file_put_contents($filename, $all, FILE_APPEND );
}


