<?php
  include('include/db_connect.php');
?>

<!DOCTYPE html>
<html lang="ja">

  <head>
    <?php include("include/header.php"); ?>
    <title>Photograph | CreativeUniverse</title>
    <script src="js/loading.js"></script>
    <style>
      .thumbnail{
        width: 100%;
      }
    </style>
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
          <div class="content">

          </div>
      </div>

      <?php
        include('include/photo/pager.php');
      ?>

      <div class="dummy"></div>

    </div>

    <?php include('include/footer.php'); ?>

    <?php include('include/menu.php'); ?>

  </body>

</html>
