<?php
//呼び出し元からのパスを指定!!
$fp = @fopen("php/indexCounter/data.txt", "r+") or die("total counter Error");

flock($fp, LOCK_EX);

$count = fgets($fp);
$count+=1;

rewind($fp);
fputs($fp, $count);
fclose($fp);

?>
