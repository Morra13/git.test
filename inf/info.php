
<?php
if(isset($_POST['sub'])){

$FileJson = 'D:/OSPanel/domains/git.test/test.json';
$json = file_get_contents($FileJson);
echo $json;
echo '<br/>' . 'hi';
}