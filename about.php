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

        <?php require "php/aboutCounter/aboutCounter.php" ?>

        <meta charset="utf-8">
        <meta name="keywords" content="creative,universe,web,design,
        java,javascript,html,css,php,jquery,webgl,photograph,photo,after,effects,adobe,
        photohsop,lightroom,illustrator,cinema4d,music,night,kodai,addpico,cg,dtm,作曲,ウェブデザイン,非営利,日本">
        <link rel="shortcut icon" href="img/favicon.ico">
        <title>About | Creative Universe</title>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Sarpanch' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/init.css" type="text/css">
        <link rel="stylesheet" href="css/common.css" type="text/css">
        <link rel="stylesheet" href="css/about.css" type="text/css">
        <link rel="stylesheet" href="css/scrollButton.css" type="text/css">
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script type="text/javascript" src="js/initAbout.js"></script>
        <script type="text/javascript" src="js/canvas.js"></script>
        <script type="text/javascript" src="js/scrollSmoothly.js"></script>
        <script type="text/javascript" src="js/fade.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.right_content').scrollInTurn();
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
                  <li><a href="index.php">Top</a></li>
                  <li class="active"><a href="#">About CU</a></li>
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

          <div id="about" class="right_content">
            <div id="aboutHolder">
              <div id="aboutContent">
                <h1>About the Creative Universe</h1>
                <p>
                  Creative Universe was founded in February of 2014 by Kodai as<br>
                  a central location where I could share my knoweledge, experiences, and works<br>
                  in CG design or Graphic system programming.<br>
                  The Creative Universe is all about learning and sharing ideas and experiences<br>
                  for creative works.
                </p>
                <h2 style="color: lightgreen;">Available Programming Languages</h2>
                <p>
                  Java / PHP / C / C++ / Python / SQL / HTML5 / CSS3<br>
                  JavaScript / jQuery / Ruby on Rails / GLSL<br>
                  WebGL / OpenGL / Three.js / Swift<br>
                  Has been increasing ...
                </p>
                <h2 style="color: lightgreen;">Software</h2>
                <p>
                  AfterEffects / Photoshop / Illustrator / Lightroom / CINEMA4D
                </p>
              </div>
              <div class="scrollButtonHolder">
                  <a class="scrollButton" href="#aboutWeb"><span></span></a>
                  Profile
              </div>
            </div>
          </div>

          <div id="aboutWeb" class="right_content">
            <div id="aboutWebHolder">
              <div id="aboutWebContent">
                <h1>About this Website</h1>
                <p>
                  This website is written in PHP and JavaScript.<br>
                </p>
                <h2 style="color: lightgreen;">- JavaScript -</h2>
                <p>
                  The background animation is operated by JavaScript canvas API.<br>
                  It will be randomly varied when you reload this web page.<br>
                  So you can enjoy a variety of animations :)
                </p>
                <h2 style="color: lightgreen;">- PHP / MySQL Database -</h2>
                <p>
                  Photos, Images, Movies, Applications and Blog pages are operated in PHP.<br>
                  Their datas are stored in my MySQL Database system.
                </p>
              </div>
              <div class="scrollButtonHolder">
                  <a class="scrollButton" href="#profile"><span></span></a>
                  Profile
              </div>
            </div>
          </div>

            <div id="profile" class="right_content">
                <div id="profileHolder">
                  <div id="photoHolder">
                    <!--Apply background-->
                  </div>
                  <div id="content">
                    <div id="contentHolder">
                      <h1 class="target">Kodai Takao</h1>
                      <p  class="target" style="color: lightgreen;">
                          Dept. Digital Media<br>
                          Faculty of Computer and Information Science<br>
                          Hosei University, Tokyo.
                      </p>
                      <h2 class="target" style="color: lightyellow;">- Upbringing -</h2>
                      <p class="target">
                          I moved to Tokyo by myself<br>
                          when I continue to the university.<br>
                          Currently I learning about Computer Graphics,<br>
                          Computational Geometry, Graphic System Programming,<br>
                          and so on ...<br>
                      </p>
                      <h2 class="target" style="color: lightyellow;">- Hobby -</h2>
                      <p class="target">
                          Web and CG Design / Photo / Guitar and Synthesizer<br>
                          App Development / Bike / Watching PIXAR's movies<br>
                      </p>
                    </div>
                  </div>
                </div>
            </div>

            <?php include("include/footer.php"); ?>

        </div>

        <script type="text/javascript" src="js/lightbox.min.js"></script>
    </body>
</html>
