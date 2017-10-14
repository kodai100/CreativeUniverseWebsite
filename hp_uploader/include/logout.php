<?php

  if(isset($_POST["logout"])){
    if(isset($_SESSION["login"])){
      $_SESSION = array();
      if (isset($_COOKIE["PHPSESSID"])) {
        setcookie("PHPSESSID", '', time() - 1800, '/');
      }
      session_destroy();
    }
  }

?>
