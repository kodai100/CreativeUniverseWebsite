<!DOCTYPE html>
<html lang="ja">

  <head>
    <?php include("include/header.php"); ?>
    <title>Contact | CreativeUniverse</title>
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
          <p>
            <a href="twitter.html"><img src="img/twitter.png" style="width: 250px;"></a>
          </p>

          <p>
            <a href="mailto:kodai462212@gmail.com?subject=ご連絡内容をご記入ください。&amp;body=ご記入ください"><img src="img/mail.png" style="width: 250px;"></a>
          </p>
      </div>

      <div class="dummy"></div>

    </div>

    <?php include('include/footer.php'); ?>

    <?php include('include/menu.php'); ?>

  </body>

</html>
