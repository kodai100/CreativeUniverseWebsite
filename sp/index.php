<!DOCTYPE html>
<html lang="ja">

  <head>
    <?php include('include/header.php'); ?>
    <title>Home | CreativeUniverse</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/scrollButton.css">
    <script src="js/loading.js"></script>
    <script src="js/navResize.js"></script>
    <script src="js/initialize.js"></script>
    <script type="text/javascript" src="js/canvas.js"></script>
  </head>

  <body>

    <?php include('include/loader.php'); ?>

    <?php include('include/navbar.php'); ?>

    <canvas id="canvas"></canvas>


    <div id="main">

      <div id="logo">
        <div id="lphoto"><img src="img/culogo3.png" width="300px"></div>
        <div class="scrollButtonHolder">
          <a class="scrollButton" href="#dummy1"><span></span></a>
          Tap to Scroll
        </div>
      </div>

      <div id="dummy1" class="dummy"></div>


      <div id="whatcu" class="fullwindow contents">
        <h3>What's CU?</h3>
        <p>
          Welcome to Creative Universe.<br>
          This website shows you my works like Apps, Photos, CGs, etc...<br>
          I hope you enjoy this website !
        </p>
        <table style="margin-top: 20px;">
          <tr>
            <td><img src="img/icon/ip/movie-film.png"></td>
            <td style="padding: 0px 10px;">×</td>
            <td><img src="img/icon/ip/globe-1.png"></td>
            <td style="padding: 0px 10px;">×</td>
            <td><img src="img/icon/ip/photography-camera.png"></td>
          </tr>
        </table>
        <div style="margin-top: 20px;">
          <div class="scrollButtonHolder">
            <a class="scrollButton" href="#dummy2"><span></span></a>
            Tap to Scroll
          </div>
        </div>
      </div>

      <div id="dummy2" class="dummy"></div>

      <div class="contents">
        <div id="info" class="last-content">
          <div id="info-inside">
            <h3>Recent Posts</h3>
            <?php include('include/blog_feed.php'); ?>
          </div>
        </div>
      </div>

    </div>

    <?php include('include/footer.php'); ?>

    <?php include('include/menu.php'); ?>

  </body>

</html>
