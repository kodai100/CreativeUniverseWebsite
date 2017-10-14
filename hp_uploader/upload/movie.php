<?php

  //フォーム入力有無確認
  if(!empty($_POST["name"]) && !empty($_POST["categories"]) && !empty($_FILES["file"]["name"]) && !empty($_POST["link"]) && !empty($_POST["regist"])){
      start($mysqli);
  } else{
    if(isset($_POST["regist"])){
      $txt = "Message : Not Full -> ";
      if(empty($_FILES["file"]["name"])) $txt .= "file, ";
      if(empty($_POST["name"])) $txt .= "name, ";
      if(empty($_POST["link"])) $txt .= "link, ";
      if(empty($_POST["categories"])) $txt .= "category, ";
      echo $txt;
    } else{
      echo "Message : Please fill this form";
    }
  }

  function start($mysqli){

    // 一時アップロードエラーの確認
    try{

      // 未定義である・複数ファイルである・$_FILES Corruption 攻撃を受けた
      // どれかに該当していれば不正なパラメータとして処理する
      if (!isset($_FILES["file"]["error"]) || !is_int($_FILES["file"]["error"])){
          throw new Exception('パラメータが不正です');
      }

      switch ($_FILES["file"]["error"]) {
        case UPLOAD_ERR_OK: // OK
            break;
        case UPLOAD_ERR_NO_FILE:   // ファイル未選択
            throw new Exception('ファイルが選択されていません');
        case UPLOAD_ERR_INI_SIZE:  // php.ini定義の最大サイズ超過
        case UPLOAD_ERR_FORM_SIZE: // フォーム定義の最大サイズ超過 (設定した場合のみ)
            throw new Exception('ファイルサイズが大きすぎます');
        default:
            throw new Exception('その他のエラーが発生しました');
      }


      //SQL処理の確認
      try{

        $sql_add = "INSERT INTO movie( name, link, category, reg_date) ";
        $sql_add .= "VALUES( ";
        $sql_add .= " '".htmlspecialchars($_POST["name"])."', ";
        $sql_add .= " '" . htmlspecialchars($_POST["link"]) ."', ";

        $categorytxt = "";
        foreach( $_POST["categories"] as $category ){
          $categorytxt .=  htmlspecialchars($category) . ",";
        }
        $sql_add .= " '".$categorytxt."', ";

        $sql_add .= " cast(now() as datetime) );";


        if( !mysqli_query( $mysqli, $sql_add ) ){
          throw new Exception("SQLクエリーエラー");
        }


        // Image Processing and Upload
        try{

          $next_id = $mysqli->insert_id;  //直近のクエリで使用した自動生成の ID を返す

          // Image Processing
          if(is_uploaded_file($_FILES["file"]["tmp_name"])) {

            $file = $_FILES["file"]["tmp_name"]; // 元画像ファイル

            $image = @ImageCreateFromJPEG($file); // 元画像ファイル読み込み
            if($image){
              $width = ImageSx($image); // 画像の幅を取得
              $height = ImageSy($image); // 画像の高さを取得
            } else{
              throw new Exception("JPEG画像読み込み失敗");
            }

            $min_width = 400; // 幅の最低サイズ
            $min_height = 400; // 高さの最低サイズ

            if($width >= $min_width || $height >= $min_height){

              if($width > $height) { //横長の場合
                  $new_width = $min_width;
                  $new_height = $height*($min_width/$width);
              } else if($width < $height) { //縦長の場合
                  $new_width = $width*($min_height/$height);
                  $new_height = $min_height;
              }

              //　画像生成
              $out = ImageCreateTrueColor($new_width , $new_height);
              ImageCopyResampled($out, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

              if (!file_exists("../movies/img/thumbnail/" . $next_id . ".jpg")) {
                ImageJPEG($out, "../movies/img/thumbnail/" . $next_id . ".jpg");
              } else{
                throw new Exception("サムネイル : 同名のファイルが存在します。サーバーをチェックしてください。");
              }

              header("Location: http://".$_SERVER["HTTP_HOST"].dirname($_SERVER["SCRIPT_NAME"]));

            } else{
              throw new Exception($min_width." × ".$min_height." 以上の画像を用意してください");
            }

          } else{
            throw new Exception("ファイルがありません : " . $_FILES["upfile"]["error"] );
          }

        } catch(Exception $e){
            //jpegアップロード失敗した際、データベースから消去
            if(mysqli_query( $mysqli, "DELETE FROM movie WHERE id = '" . $next_id . "'" )){
              echo "<div style='color: red;'>". $e->getMessage() . ": <span style='color: blue;'>Recent Insertion was Canceled.</span></div>";
            } else{
              echo "<div style='color: red;'>". $e->getMessage() . ": <span style='color: red;'>Recent Insertion Cancelation Failed.<br>You must check Database.</span></div>";
            }
        }

      } catch(Exception $e){
        //データベース入力失敗
        echo "<div style='color: red;'>" . $e->getMessage() . "</div>";
      }

    } catch(Exception $e){
      //一時アップロード失敗
      echo "<div style='color: red;'>" . $e->getMessage() . "</div>";
    }

  }

?>
