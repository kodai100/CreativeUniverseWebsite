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

        <?php require "php/footageCounter/footageCounter.php" ?>

        <meta charset="utf-8">
        <meta name="keywords" content="creative,universe,web,design,
        java,javascript,html,css,php,jquery,webgl,photograph,photo,after,effects,adobe,
        photohsop,lightroom,illustrator,cinema4d,music,night,kodai,addpico,cg,dtm,作曲,ウェブデザイン,非営利,日本">
        <link rel="shortcut icon" href="../img/favicon.ico">
        <title>Downloads | Creative Universe</title>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Sarpanch' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../css/init.css" type="text/css">
        <link rel="stylesheet" href="../css/common.css" type="text/css">
        <link rel="stylesheet" href="css/downloads.css" type="text/css">
        <link rel="stylesheet" href="../css/ghostButton.css" type="text/css">
        <link rel="stylesheet" href="../css/lightbox.css" type="text/css">
        <link rel="stylesheet" href="../js/zoombox/zoombox.css" type="text/css">
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script type="text/javascript" src="js/initDownloads.js"></script>
        <script type="text/javascript" src="../js/canvas.js"></script>
        <script type="text/javascript" src="../js/scrollSmoothly.js"></script>
        <script type="text/javascript" src="../js/fade.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.right_content').scrollInTurn();
            });
        </script>
        <script src="../js/zoombox/zoombox.js" type="text/javascript"></script>
        <script type="text/javascript">
          $(document).ready(function() {
              $('a.zoombox').zoombox();
          });
        </script>


    </head>
    <body>

        <div id="bg">
            <canvas id="canvas"></canvas>
        </div>


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
                  <li><a href="../images/index.php">Images</a></li>
                  <li><a href="../movies/index.php">Movies</a></li>
                  <li><a href="../apps/index.php">Apps</a></li>
                  <li class="active"><a href="#">Downloads</a></li>
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

          <div id="total" class="right_content">
            <script type="text/javascript" src="php/footageCounter-Detail/footageCounter.php?dsp_count=1"></script>
          </div>

          <div id="wrapper" class="right_content">

            <div class="article first">
              <div class="articleHolder">
                <div class="thumbnailHolder">
                  <a href="https://www.youtube.com/watch?v=PS0aJli-8ic" class="zoombox"><img src="img/lpv1.jpg"></a>
                </div>
                <div class="caption">
                  <div class="captionHolder">
                    <h2>- Luminance Pack V1 -</h2>
                    <p>
                      This is a Luminance key matte for AfterEffects use.
                    </p>
                    <div class="dlb">
                      <a href="php/footageCounter-Detail/footageCounter.php?download=1"><img src="img/dlbutton.png"></a>
                    </div>
                  </div>
                </div>
                <div class="fix"></div>
              </div>
            </div>
              
            <div class="article">
              <div class="articleHolder">
                <div class="thumbnailHolder">
                  <img src="img/cg_word.png">
                </div>
                <div class="caption">
                  <div class="captionHolder">
                    <h2>- CG Glossary -</h2>
                    <p>
                      This is a Glossary of<br>
                        Computer Graphics.
                    </p>
                    <div class="dlb">
                      <a href="php/footageCounter-Detail/footageCounter.php?download=2"><img src="img/dlbutton.png"></a>
                    </div>
                  </div>
                </div>
                <div class="fix"></div>
              </div>
            </div>
              
            <div class="article">
              <div class="articleHolder">
                <div class="thumbnailHolder">
                  <img src="img/cgl1.jpg">
                </div>
                <div class="caption">
                  <div class="captionHolder">
                    <h2>- Lecture 1 -</h2>
                    <p>
                      Computer Graphics from<br>
                        the Mathematical Aspects
                    </p>
                    <div class="dlb">
                      <a href="php/footageCounter-Detail/footageCounter.php?download=3"><img src="img/dlbutton.png"></a>
                    </div>
                  </div>
                </div>
                <div class="fix"></div>
              </div>
            </div>


          </div>

          <div id="loginButton" class="right_content">
            <a id="lb" href="php/footageCounter-Detail/footageCounter.php"><img src="img/login.png" width="150px"></a>
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
        </div>

        <script type="text/javascript" src="js/lightbox.min.js"></script>
    </body>
</html>
