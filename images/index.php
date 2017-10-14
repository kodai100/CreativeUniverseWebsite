<?php

  require_once("../include/db_connect.php");

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <script type="text/javascript" src="js/userAgent.js"></script>
        <script type="text/javascript">
          (function () {
              var ua = navigator.userAgent.toUpperCase();
              if (ua.indexOf('IPHONE') != -1 || (ua.indexOf('ANDROID') != -1 && ua.indexOf('MOBILE') != -1)) {
                  location.href = '/sp/';
              }
          }());
        </script>

        <?php require "php/imageCounter/imageCounter.php" ?>

        <meta charset="utf-8">
        <meta name="keywords" content="creative,universe,web,design,
        java,javascript,html,css,php,jquery,webgl,photograph,photo,after,effects,adobe,
        photohsop,lightroom,illustrator,cinema4d,music,night,kodai,addpico,cg,dtm,作曲,ウェブデザイン,非営利,日本">
        <link rel="shortcut icon" href="../img/favicon.ico">
        <title>Images | Creative Universe</title>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Sarpanch' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../css/init.css" type="text/css">
        <link rel="stylesheet" href="../css/common.css" type="text/css">
        <link rel="stylesheet" href="css/images.css" type="text/css">
        <link rel="stylesheet" href="../css/lightbox.css" type="text/css">
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script type="text/javascript" src="../js/loading.js"></script>
        <script type="text/javascript" src="js/initImages.js"></script>
        <script type="text/javascript" src="../js/canvas.js"></script>
    </head>
    <body>

        <div id="loading">
            <div id="loader_holder">
                <img src="../img/loader/drop2.gif" width="400px" height="400px">
            </div>
        </div>

        <script type="text/javascript">
            var lHeight = $(window).innerHeight();
            var lWidth = document.body.clientWidth;
            $("#loading").css("height", lHeight + "px");
            $("#loading").css("width", lWidth + "px");
        </script>

        <div id="load_complete">
            <div id="left">
                <div id="logo">
                    <div id="minilogo"></div>
                </div>
                <div id="menu">
                    <ul>
                      <li><a href="../index.php">Top</a></li>
                      <li><a href="../about.php">About CU</a></li>
                      <li><a href="../blog">Blog</a></li>
                      <li><a href="../photograph/index.php">Photographs</a></li>
                      <li class="active"><a href="#">Images</a></li>
                      <li><a href="../movies/index.php">Movies</a></li>
                      <li><a href="../apps/index.php">Apps</a></li>
                      <li><a href="../downloads/index.php">Downloads</a></li>
                    </ul>
                </div>
                <div id="search">
                  <form name="searchForm" id="searchForm" method="get" action="">
                    <input name="key" id="key" placeholder="Search" type="text">
                    <input type="submit" id="searchBtn" value="">
                  </form>
                </div>
            </div>

            <div id="main">
              <div id="contents" class="right_content">
                <?php
                  $image_sql = "SELECT * FROM image WHERE delete_flag = '0' ORDER BY reg_date DESC";
                  if(isset($_REQUEST["category"])){
                    $image_sql .= " AND category LIKE '%" . htmlspecialchars($_REQUEST["category"]) . "%' ";
                  }
                  if($res_image = mysqli_query( $mysqli, $image_sql )){
                    while($tmp = $res_image->fetch_assoc()){
                ?>
                <div class="article">
                  <img class="thumbnail" src="<?php echo "./img/thumbnail/" . $tmp["id"]; ?>.jpg">
                  <div class="photoCaption">
                      <div class="captionHolder">
                      <a href="<?php echo "./img/large/" . $tmp["id"]; ?>.jpg" data-lightbox="roadtrip">
                        <img width="70px" src="../img/icons/big.png">
                      </a>
                      <p><?php echo $tmp["name"]; ?></p>
                    </div>
                  </div>
                </div>
                <?php } $res_image->close();?>
                <?php } else{ echo "No Hit."; } ?>

              </div>
            </div>

            <div id="right">
              <div id="title">
                <h1>Images</h1>
                <section id="pbw">- Programmed by Kodai</section>
              </div>
              <div id="recent_posts">
                <h2>- Recent Posts -</h2>
                <ul>
                  <?php
                    $recent_sql = "SELECT * FROM image WHERE delete_flag = '0' ORDER BY reg_date DESC LIMIT 5";
                    $res_recent = mysqli_query( $mysqli, $recent_sql );
                    while($tmp = $res_recent->fetch_assoc()){
                  ?>
                    <li><a href="<?php echo "./img/large/" . $tmp["id"] . ".jpg";?>" data-lightbox="roadtrip"><?php echo $tmp["name"]; ?></a></li>
                  <?php } ?>
                  <?php $res_recent->close(); ?>
                </ul>
              </div>
              <!--<div id="archive">
                <h2>Archive</h2>
                <ul>
                  <li><a href="">aaaaaaaaaaaaaa</a></li>
                </ul>
              </div>-->
              <div id="category">
                <h2>- Category -</h2>
                <ul>
                  <li><a href="index.php?category=Portrait">Portrait</a></li>
                  <li><a href="index.php?category=Landscape">Landscape</a></li>
                  <li><a href="index.php?category=Abstract">Abstract</a></li>
                  <li><a href="index.php?category=Nature">Nature</a></li>
                  <li><a href="index.php?category=Urban">Urban</a></li>
                  <li><a href="index.php?category=Conceptual">Conceptual</a></li>
                </ul>
              </div>
            </div>

            <div id="contact" class="right_content">
                <div id="contactHolder">
                  <a href="https://twitter.com/kodai_cu" target="_blank"><img width="20px" src="../img/icons/24/social-003_twitter.png"></a>
                  <a href="https://www.facebook.com/profile.php?id=100000879429808" target="_blank"><img width="20px" src="../img/icons/24/social-006_facebook.png"></a>
                  <a href="http://www.slideshare.net/kodai100" target="_blank"><img width="20px" src="../img/icons/24/social-011_linkedin.png"></a>
                  <a href="https://plus.google.com/b/107544045679370174268/107544045679370174268/videos" target="_blank"><img width="20px" src="../img/icons/24/social-009_google.png"></a>
                  <a href="https://www.youtube.com/channel/UCzYsKlfL5JkDS4bLHVSZNvQ" target="_blank"><img width="20px" src="../img/icons/24/social-018_youtube.png"></a>
                </div>
            </div>
            <div id="footer" class="right_content">
                &copy;Copyright 2016 Creative Universe Creative Computing | All Rights Reserved.
            </div>


            <script type="text/javascript" src="../js/lightbox.min.js"></script>
        </div>
    </body>
</html>
