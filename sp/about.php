<!DOCTYPE html>
<html lang="ja">

  <head>
    <?php include("include/header.php"); ?>
    <title>About CU | CreativeUniverse</title>
    <script src="js/loading2.js"></script>
  </head>

  <body>

    <?php include('include/loader.php'); ?>

    <?php include('include/navbar.php'); ?>
    <script>
      $("#navbar").removeClass('bottom').addClass('top');
      $("#navbar").css({'bottom': '', 'top': 0});
    </script>


    <div id="main">

      <div class="dummy"></div>

      <div class="contents">
        <!--<h3>Creative Universe</h3>-->
        <p style="margin-top:10px;">
          Creative Universe was founded in February of 2014 by Kodai as<br>
          a central location where I could share my knoweledge, experiences, and works<br>
          in CG design or Graphic system programming.<br>
          The Creative Universe is all about learning and sharing ideas and experiences<br>
          for creative works.
        </p>
        <p>
          <h2 style="color: lightgreen;margin-top:10px;">- Programming Languages -</h2>
          <p>
            Java / PHP / C / C++ / Python / SQL / HTML5 / CSS3<br>
            JavaScript / jQuery / Ruby on Rails / GLSL<br>
            WebGL / OpenGL / Three.js / Swift<br>
            Has been increasing ...
          </p>
          <h2 style="color: lightgreen; margin-top:10px;">- Software -</h2>
          <p>
            AfterEffects / Photoshop / Illustrator / Lightroom / CINEMA4D
          </p>
        </p>

        <h3 style="margin-top: 40px; margin-top:20px;">About this Website</h3>
        <p>
          This website is written <br>
          in PHP and JavaScript.
        </p>
        <h2 style="color: lightgreen; margin-top:10px;">- JavaScript -</h2>
        <p>
          The background animation is operated by JavaScript canvas API.<br>
          It will be randomly varied when you reload this web page.<br>
          So you can enjoy a variety of animations :)
        </p>
        <h2 style="color: lightgreen; margin-top:10px;">- PHP / MySQL Database -</h2>
        <p>
          Photos, Images, Movies, Applications and Blog pages are operated in PHP.<br>
          Their datas are stored in my MySQL Database system.
        </p>
      </div>

      <div class="dummy"></div>

    </div>

    <?php include('include/footer.php'); ?>

    <?php include('include/menu.php'); ?>

  </body>

</html>
