
<?php
if(isset($_POST['sub'])){

$FileJson = 'test.json';
$json = file_get_contents($FileJson);
echo $json;
}