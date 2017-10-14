<?php

  require_once("include/db_connect.php");

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <script type="text/javascript" src="js/userAgent.js"></script>
        <script type="text/javascript">
          (function () {
              var ua = navigator.userAgent.toUpperCase();
              if (ua.indexOf('IPHONE') != -1 || ua.indexOf('ANDROID') != -1 && ua.indexOf('MOBILE') != -1) {
                  location.href = '/sp/';
              }
          }());
        </script>

        <?php require "php/indexCounter/indexCounter.php" ?>

        <meta charset="utf-8">
        <meta name="keywords" content="creative,universe,web,design,
        java,javascript,html,css,php,jquery,webgl,photograph,photo,after,effects,adobe,
        photohsop,lightroom,illustrator,cinema4d,music,night,kodai,addpico,cg,dtm,作曲,ウェブデザイン,非営利,日本">
        <link rel="shortcut icon" href="img/favicon.ico">
        <title>Home | Creative Universe</title>
        <meta name="description" content="CG, Programming, Web Design...">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Sarpanch' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/init.css" type="text/css">
        <link rel="stylesheet" href="css/common.css" type="text/css">
        <link rel="stylesheet" href="css/index.css" type="text/css">
        <link rel="stylesheet" href="css/ghostButton.css" type="text/css">
        <link rel="stylesheet" href="css/scrollButton.css" type="text/css">
        <link rel="stylesheet" href="css/lightbox.css" type="text/css">
        <link rel="stylesheet" href="js/zoombox/zoombox.css" type="text/css">
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script type="text/javascript" src="js/loading.js"></script>
        <script type="text/javascript" src="js/initIndex.js"></script>
        <script type="text/javascript" src="js/canvas.js"></script>
        <script type="text/javascript" src="js/scrollSmoothly.js"></script>
        <script type="text/javascript" src="js/fade.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.right_content').scrollInTurn();
            });
        </script>
        <script src="js/zoombox/zoombox.js" type="text/javascript"></script>
        <script type="text/javascript">
          $(document).ready(function() {
              $('a.zoombox').zoombox();
          });
        </script>


    </head>
    <body>

        <div id="loading">
            <div id="loader_holder">
                <img src="img/loader/drop2.gif" width="400px" height="400px">
            </div>
        </div>

        <script type="text/javascript">
            var lHeight = $(window).innerHeight();
            var lWidth = document.body.clientWidth;
            $("#loading").css("height", lHeight + "px");
            $("#loading").css("width", lWidth + "px");
        </script>

        <div id="load_complete">

            <div id="bg">
                <canvas id="canvas"></canvas>
            </div>

            <div id="left">
                <div id="logo">
                    <div id="minilogo"></div>
                </div>
                <div id="menu">
                    <ul>
                        <li class="active"><a href="#">Top</a></li>
                        <li><a href="about.php">About CU</a></li>
                        <li><a href="blog">Blog</a></li>
                        <li><a href="photograph/index.php">Photographs</a></li>
                        <li><a href="images/index.php">Images</a></li>
                        <li><a href="movies/index.php">Movies</a></li>
                        <li><a href="apps/index.php">Apps</a></li>
                        <li><a href="downloads/index.php">Downloads</a></li>
                    </ul>
                </div>
                <div id="search">
                  <form name="searchForm" id="searchForm" method="get" action="">
                    <input name="key" id="key" placeholder="Search" type="text">
                    <input type="submit" id="searchBtn" value="">
                  </form>
                </div>
            </div>

            <div id="right">
                <div id="title" class="right_content">
                    <img id="biglogo" src="img/cucc.png" >
                    <div class="scrollButtonHolder">
                        <a class="scrollButton" href="#about"><span></span></a>
                        Click to Scroll
                    </div>
                </div>

                <div id="about" class="right_content">
                  <div id="aboutHolder">
                    <div id="aboutContent" class="target">
                      <p>
                        Welcome to Creative Universe official website.<br>
                        This website shows you my works of<br>
                        App Development, Photographs, Computer Graphics and etc.<br>
                        I hope you enjoy this website !<br>
                        Best regards.<br>
                      </p>
                    </div>
                    <div class="scrollButtonHolder">
                        <a class="scrollButton" href="#blog"><span></span></a>
                        Click to Scroll
                    </div>
                  </div>
                </div>

                <div id="blog" class="right_content">
                    <?php
                        $file=file_get_contents( "http://creativeuniverse.tokyo/blog/index.php/feed/");
                        $xml=preg_replace( '/&(?=[a-z_0-9]+=)/m', '&amp;',$file);
                        $rss=simplexml_load_string($xml);
                        $i=0 ;
                        $rssData=array();
                        foreach ($rss -> channel -> item as $item) {
                            if( $i++ == 3 ) {
                                break;
                            }
                            $tempData = array();
                            $tempData['link'] = $item->link;
                            $tempData['title'] = $item->title;
                            $tempData['date'] = date('Y/m/d', strtotime($item->pubDate));
                            $rssData[] = $tempData;
                        }
                    ?>
                  <div id="blogHolder">
                    <h1 class="target">Recent Posts</h1>
                    <table>
                        <?php foreach ($rssData as $rss) : ?>
                        <tr class="target">
                            <td><?php echo $rss[ 'date']; ?></td>
                            <td class="articleName"><a href="<?php echo $rss['link']; ?>"><?php echo $rss[ 'title']; ?></a></td>
                        </tr>
                        <?php endforeach;?>
                    </table>
                  </div>
                </div>


                <!-- 写真 -->
                <div id="photo" class="right_content">
                  <?php
                    $recent_sql = "SELECT * FROM photograph WHERE delete_flag = '0' ORDER BY reg_date DESC LIMIT 3";
                    $res_recent = mysqli_query( $mysqli, $recent_sql );
                    while($tmp = $res_recent->fetch_assoc()){
                  ?>
                    <div class="article">
                      <img class="thumbnail" src="photograph/img/thumbnail/<?php echo $tmp["id"]; ?>.jpg">
                      <div class="photoCaption">
                          <div class="captionHolder">
                          <a href="photograph/img/large/<?php echo $tmp["id"]; ?>.jpg" data-lightbox="roadtrip">
                            <img width="70px" src="img/icons/big.png">
                          </a>
                          <p><?php echo $tmp["name"]; ?></p>
                        </div>
                      </div>
                    </div>
                  <?php } $res_recent->close();?>

                </div>

                <div class="detailButton right_content">
                  <div class="buttonHolder">
                    <a class="button target" href="photograph/index.php">See more photos</a>
                  </div>
                </div>

                <div id="images" class="right_content">
                  <?php
                    $recent_sql = "SELECT * FROM image WHERE delete_flag = '0' ORDER BY reg_date DESC LIMIT 3";
                    $res_recent = mysqli_query( $mysqli, $recent_sql );
                    while($tmp = $res_recent->fetch_assoc()){
                  ?>
                    <div class="article">
                      <img class="thumbnail" src="images/img/thumbnail/<?php echo $tmp["id"]; ?>.jpg">
                      <div class="imagesCaption">
                          <div class="captionHolder">
                          <a href="images/img/large/<?php echo $tmp["id"]; ?>.jpg" data-lightbox="roadtrip">
                            <img width="70px" src="img/icons/big.png">
                          </a>
                          <p><?php echo $tmp["name"]; ?></p>
                        </div>
                      </div>
                    </div>
                  <?php } $res_recent->close(); ?>
                </div>

                <div class="detailButton right_content">
                  <div class="buttonHolder">
                    <a class="button target" href="images/index.php">See more images</a>
                  </div>
                </div>


                <div id="movies" class="right_content">
                  <?php
                    $recent_sql = "SELECT * FROM movie WHERE delete_flag = '0' ORDER BY reg_date DESC LIMIT 3";
                    $res_recent = mysqli_query( $mysqli, $recent_sql );
                    while($tmp = $res_recent->fetch_assoc()){
                  ?>
                    <div class="article">
                      <img class="thumbnail" src="movies/img/thumbnail/<?php echo $tmp["id"]; ?>.jpg">
                      <div class="moviesCaption">
                          <div class="captionHolder">
                            <a href="<?php echo $tmp["link"]; ?>" class="zoombox">
                            <img width="70px" src="img/icons/big.png">
                          </a>
                          <p><?php echo $tmp["name"]; ?></p>
                        </div>
                      </div>
                    </div>
                  <?php } $res_recent->close(); ?>
                </div>

                <div class="detailButton right_content">
                  <div class="buttonHolder">
                    <a class="button target" href="movies/index.php">See more movies</a>
                  </div>
                </div>

                <?php include("include/footer.php"); ?>

            </div>

            <script type="text/javascript" src="js/lightbox.min.js"></script>

        </div>


    </body>
</html>
