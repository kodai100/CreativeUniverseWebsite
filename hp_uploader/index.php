<?php
    session_start();

    require_once('include/db_connect.php');
    require_once('include/login.php');
    require_once('include/logout.php');
?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>Photograph uploader</title>
  </head>
  <body>
    <div id="wrap">

      <div id="upload_holder">
        <h1>CU Uploader List</h1>

        <?php if(!isset($_SESSION["login"])){ ?>
          <form method="post" id="login">
            <table>
              <tr><td>User</td><td><input type="text" name="id"></td></tr>
              <tr><td>Password</td><td><input type="password" name="pass"></td></tr>
            </table>
            <div id="button">
              <input id="send" type="submit" name="login" value="Login">
            </div>
          </form>
        <?php } else{?>
          <ul>
            <li><a href="photo_up.php">Photograph</a></li>
            <li><a href="image_up.php">Image</a></li>
            <li><a href="movie_up.php">Video</a></li>
            <li><a href="app_up.php">Application</a></li>
          </ul>

          <form method="post" id="logout">
            <div id="button">
              <input id="send" type="submit" name="logout" value="Logout">
            </div>
          </form>
        <?php } ?>
      </div>

      <div id="footer">
        Copyright(c) : 2016 Creative Universe All rights reserved.
      </div>

    </div><!-- wrap -->

  </body>
</html>
