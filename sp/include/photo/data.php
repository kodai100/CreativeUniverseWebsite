<?php

  require_once('../db_connect.php');

  // 商品表示のための記述(search含む)
  $sql_search = "SELECT * FROM photograph WHERE delete_flag = '0' ";

  $page = empty($_POST["page"]) ? 0: $_POST["page"];
  $page_max = (is_numeric($_POST["limit"]) && $_POST["limit"] <= 8) ? $_POST["limit"]: 8;

  $end = $page * 8;

  $sql_search .= "ORDER BY reg_date DESC LIMIT 0, " . $end ."" ;

  if($result = mysqli_query( $mysqli, $sql_search )){
    while($tmp = $result->fetch_assoc()){
      echo '<div class="article">';
      echo '<a href="../../../photograph/img/large/' . $tmp["id"] . '.jpg" data-lightbox="roadtrip">';
      echo '<img class="thumbnail" src="../../../photograph/img/thumbnail/' . $tmp["id"] . '.jpg">';
      echo '</a>';
      echo '</div>';
    }

    $result->close();

  } else{
    echo "No Hit.";
  }

  echo '<div class="clearfix"></div><div style="margin-top: 20px;" id="pager_loader"><img width="50px" height="50px" src="../../img/loading.gif"></div>';

?>
