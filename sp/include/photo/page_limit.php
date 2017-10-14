<?php

  require_once('../db_connect.php');

  // 商品表示のための記述(search含む)
  $sql_search = "SELECT * FROM photograph WHERE delete_flag = '0' ";

  $res_search = mysqli_query( $mysqli, $sql_search );

  $count = $res_search->num_rows;
  $max = 15;//1ページあたりの表示数
  $limit = ceil($count/$max);//最大ページ数

  echo $limit;
?>
