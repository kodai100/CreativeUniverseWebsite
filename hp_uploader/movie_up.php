<?php
    session_start();

    require_once('include/db_connect.php');
    require_once("upload/movie.php");

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>Movie uploader</title>
  </head>
  <body>
    <div id="wrap">

      <div id="upload_holder">
        <h1>CU Movie Uploader</h1>

        <?php if(isset($_SESSION["login"])){ ?>
            <form method="post" id="regist" enctype="multipart/form-data">
              <table>
                <tr><td>Thumbnail</td><td><input type="file" name="file"></td></tr>
                <tr><td>Name</td><td><input type="text" name="name"></td></tr>
                <tr><td>Link</td><td><input type="text" name="link"></td></tr>
                <tr>
                  <td>Category</td>
                  <td>
                    <input type="checkbox" name="categories[]" value="3DCG">3DCG
                    <input type="checkbox" name="categories[]" value="2DCG">2DCG
                    <input type="checkbox" name="categories[]" value="Guitar">Guitar
                    <input type="checkbox" name="categories[]" value="Motion">Motion
                    <input type="checkbox" name="categories[]" value="Development">Development
                    <input type="checkbox" name="categories[]" value="Other">Other
                  </td>
                </tr>
              </table>
              <div id="button">
                  <input id="send" type="submit" name="regist" value="Register!">
              </div>
            </form>
        <?php } else{?>
          Access Denied.
        <?php } ?>
      </div>

      <div id="footer">
        Copyright(c) : 2016 Creative Universe All rights reserved.
      </div>

    </div><!-- wrap -->

  </body>
</html>
