<?php
require($_SERVER['DOCUMENT_ROOT'] . '/templates/header.php');
require($_SERVER['DOCUMENT_ROOT'] . '/functions/EnumAnswer.php');

echo EnumAnswer::QUIT;

require($_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php');