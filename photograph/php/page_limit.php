<?php

  require_once('../../include/db_connect.php');

  // 商品表示のための記述(search含む)
  $sql_search = "SELECT * FROM photograph WHERE delete_flag = '0' ";

  if($_POST["keyword"] != ""){
    $sql_search = $sql_search . " AND name LIKE '%" . htmlspecialchars($_POST["keyword"]) . "%' ";
  }

  if($_POST["category"]!=""){
    $sql_search .= " AND category LIKE '%" . htmlspecialchars($_POST["category"]) . "%' ";
  }

  $res_search = mysqli_query( $mysqli, $sql_search );

  $count = $res_search->num_rows;
  $max = 15;//1ページあたりの表示数
  $limit = ceil($count/$max);//最大ページ数

  echo $limit;
?>
