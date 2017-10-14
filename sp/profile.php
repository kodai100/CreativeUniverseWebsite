<!DOCTYPE html>
<html lang="ja">

  <head>
    <?php include("include/header.php"); ?>
    <title>Profile | CreativeUniverse</title>
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
        <h3>Kodai Takao</h3>
        <img src="img/me.png" style="width: 80%;">
        <p>
          Dept. Digital Media<br>
          Faculty of Computer and Information Science<br>
          Hosei University in Tokyo, Japan.<br>
        </p>
        <p>
          - Upbringing -<br>
          He moved to Tokyo by himself<br>
          when he continue to the university.<br>
          Currently he learning about Computer Graphics,<br>
          Computational Geometry, and System Programming.<br>
        </p>
        <p>
          - Hobby -<br>
          Web Design / Photography / Guitar / Synthesizer/<br>
          Application Development / Bike / CG Design<br>
        </p>
      </div>

      <div class="dummy"></div>

    </div>

    <?php include('include/footer.php'); ?>

    <?php include('include/menu.php'); ?>

</body>

</html>
