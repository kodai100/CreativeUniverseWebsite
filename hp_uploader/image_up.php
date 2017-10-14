<?php
    session_start();

    require_once('include/db_connect.php');
    require_once("upload/image.php");

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>Image uploader</title>
  </head>
  <body>
    <div id="wrap">

      <div id="upload_holder">
        <h1>CU Image Uploader</h1>

        <?php if(isset($_SESSION["login"])){ ?>
            <form method="post" id="regist" enctype="multipart/form-data">
              <table>
                <tr><td>File</td><td><input type="file" name="file"></td></tr>
                <tr><td>Name</td><td><input type="text" name="name"></td></tr>
                <tr>
                  <td>Category</td>
                  <td>
                    <input type="checkbox" name="categories[]" value="Portrait">Portrait
                    <input type="checkbox" name="categories[]" value="Landscape">Landscape
                    <input type="checkbox" name="categories[]" value="Abstract">Abstract
                    <input type="checkbox" name="categories[]" value="Nature">Nature
                    <input type="checkbox" name="categories[]" value="Urban">Urban
                    <input type="checkbox" name="categories[]" value="Conceptual">Conceptual
                  </td>
                </tr>
                <tr><td>Detail</td><td><textarea name="detail" cols="60" rows="6"></textarea></td></tr>
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
