<!DOCTYPE html>
<html lang="ja">

<head>
  <?php include("include/header.php"); ?>
  <title>Gallery | CreativeUniverse</title>
  <script src="js/loading2.js"></script>
</head>

<body>

  <?php include('include/loader.php'); ?>

  <?php include('include/navbar.php'); ?>
  <script>
    $("#navbar").removeClass('bottom').addClass('top');
    $("#navbar").css({'bottom': '0', 'top': 0});
  </script>


  <div id="main">

    <div class="dummy"></div>

      <div class="contents">

        <p style="margin-top: 50px;">
          <a href="photo.php" class="gallery_select"><img src="img/photoGallery.jpg" style="width: 90%;"></a>
        </p>

        <p style="margin-top: 50px;">
          <a href="image.php" class="gallery_select"><img src="img/imagesGallery.jpg" style="width: 90%;"></a>
        </p>

        <p style="margin-top: 50px;">
          <a href="movie.php" class="gallery_select"><img src="img/movieGallery.jpg" style="width: 90%;"></a>
        </p>

        <p style="margin-top: 50px;">
          <a href="http://jsdo.it/Kodai/codes" class="gallery_select"><img src="img/app.jpg" style="width: 90%;"></a>
        </p>

      </div>

      <div class="dummy"></div>

    </div>

    <?php include('include/footer.php'); ?>

    <?php include('include/menu.php'); ?>

  </body>

</html>
