<?php

    //$host = "sddb0040179327.cgidb";	// 接続先ホスト名
    //$user = "sddbNzA0OTgx";			// 接続ユーザ名
    //$pass = "8ZS\$iE\$d";				// 接続パスワード
    //$dbname = "sddb0040179327";	// データベース名

    $host = "localhost";	// 接続先ホスト名
    $user = "root";			// 接続ユーザ名
    $pass = "";				// 接続パスワード
    $dbname = "hp_uploader";	// データベース名

    $mysqli = new mysqli($host, $user, $pass, $dbname) or die( mysqli_connect_error() );

    if ($mysqli->connect_error) {
        echo $mysqli->connect_error;
        exit();
    } else {
        $mysqli->set_charset("utf8");
    }

?>
