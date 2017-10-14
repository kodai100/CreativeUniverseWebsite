<?php

  require_once('../../include/db_connect.php');

  // 商品表示のための記述(search含む)
  $sql_search = "SELECT * FROM photograph WHERE delete_flag = '0' ";

  if($_POST["keyword"]!=""){
    $sql_search .= " AND name LIKE '%" . htmlspecialchars($_POST["keyword"]) . "%' ";
  }

  if($_POST["category"]!=""){
    $sql_search .= " AND category LIKE '%" . htmlspecialchars($_POST["category"]) . "%' ";
  }

  $page = empty($_POST["page"]) ? 0: $_POST["page"];
  $page_max = (is_numeric($_POST["limit"]) && $_POST["limit"] <= 15) ? $_POST["limit"]: 15;

  $end = $page * 15;

  $sql_search .= "ORDER BY reg_date DESC LIMIT 0, " . $end ."" ;


  if($result = mysqli_query( $mysqli, $sql_search )){
    while($tmp = $result->fetch_assoc()){
      echo '<div class="article">';
      echo '<img class="thumbnail" src="./img/thumbnail/' . $tmp["id"] . '.jpg">';
      echo '<div class="photoCaption">';
      echo '<div class="captionHolder">';
      echo '<a href="./img/large/' . $tmp["id"] . '.jpg" data-lightbox="roadtrip">';
      echo '<img width="70px" src="../img/icons/big.png">';
      echo '</a>';
      echo '<p>' . $tmp["name"] . '</p>';
      echo '</div></div></div>';
    }

    $result->close();

  } else{
    echo "No Hit.";
  }

  echo '<div class="clearfix"></div><div style="margin-top: 20px;" id="pager_loader"><img width="50px" height="50px" src="../../img/loading.gif"></div>';

?>
