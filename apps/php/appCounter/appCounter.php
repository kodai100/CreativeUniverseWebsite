<?php
//呼び出し元からのパスを指定!!
$fp = @fopen("php/appCounter/data.txt", "r+") or die("total counter Error");

flock($fp, LOCK_EX);

$count = fgets($fp);
$count++;

rewind($fp);
fputs($fp, $count);
fclose($fp);

?>
