<?php

    $host = "sddb0040174718.cgidb";	// 接続先ホスト名
    $user = "sddbOTc5OTA5";			// 接続ユーザ名
    $pass = "l\$Vj#E6g";				// 接続パスワード
    $dbname = "sddb0040174718";	// データベース名

    /*$host = "localhost";	// 接続先ホスト名
    $user = "root";			// 接続ユーザ名
    $pass = "";				// 接続パスワード
    $dbname = "hp_uploader";	// データベース名*/

    $mysqli = new mysqli($host, $user, $pass, $dbname) or die( mysqli_connect_error() );

    if ($mysqli->connect_error) {
        echo $mysqli->connect_error;
        exit();
    } else {
        $mysqli->set_charset("utf8");
    }

?>
