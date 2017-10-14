<?php
//呼び出し元からのパスを指定!!
$fp = @fopen("data.txt", "r+") or die("total counter Error");

flock($fp, LOCK_EX);
$countLast = fgets($fp);
fclose($fp);

$countNew = 0;
//index
$fpIndex = @fopen("../indexCounter/data.txt", "r+") or die("index counter Error");
flock($fpIndex, LOCK_EX);
$countNew += fgets($fpIndex);
fclose($fpIndex);
//about
$fpAbout = @fopen("../aboutCounter/data.txt", "r+") or die("about counter Error");
flock($fpAbout, LOCK_EX);
$countNew += fgets($fpAbout);
fclose($fpAbout);

//photo
$fpPhoto = @fopen("../../photograph/php/photoCounter/data.txt", "r+") or die("Photo counter Error");
flock($fpPhoto, LOCK_EX);
$countNew += fgets($fpPhoto);
fclose($fpPhoto);

//image
$fpImage = @fopen("../../images/php/imageCounter/data.txt", "r+") or die("Image counter Error");
flock($fpImage, LOCK_EX);
$countNew += fgets($fpImage);
fclose($fpImage);

//movie
$fpMovie = @fopen("../../movies/php/movieCounter/data.txt", "r+") or die("Movie counter Error");
flock($fpMovie, LOCK_EX);
$countNew += fgets($fpMovie);
fclose($fpMovie);

//footage
$fpFootage = @fopen("../../downloads/php/footageCounter/data.txt", "r+") or die("Footage counter Error");
flock($fpFootage, LOCK_EX);
$countNew += fgets($fpFootage);
fclose($fpFootage);

//app
$fpApp = @fopen("../../apps/php/appCounter/data.txt", "r+") or die("App counter Error");
flock($fpApp, LOCK_EX);
$countNew += fgets($fpApp);
fclose($fpApp);


echo $countLast+$countNew;
?>
