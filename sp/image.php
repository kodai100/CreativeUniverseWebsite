<!DOCTYPE html>
<html lang="ja">

  <head>
    <?php include("include/header.php"); ?>
    <title>Image | CreativeUniverse</title>
    <script src="js/loading.js"></script>
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

        <div class="content">
            <?php
              $path = "../images/img/large/";
              $files = scandir($path);
              $count = count($files);
              for($i = 1; $i < $count-2; $i++){
            ?>
            <img class="thumbnail" src="../images/img/thumbnail/<?php echo ($count-2)-$i; ?>.jpg" style="width: 100%;">
            <?php } ?>
        </div>

        <div class="dummy"></div>

    </div>

    <?php include('include/footer.php'); ?>

    <?php include('include/menu.php'); ?>

  </body>

</html>
