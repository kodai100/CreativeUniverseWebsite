<?php

  if(isset($_POST["login"])){

    $id = "kodai";
    $pass = "kodai462212";

    if( $_POST["id"] == $id && $_POST["pass"] == $pass ){
      $_SESSION["login"] = true;
    } else{
      echo "Login failed.";
    }

  }

?>
