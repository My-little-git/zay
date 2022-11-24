<?php

session_start();

if ($_SESSION['auth']){
  session_destroy();
  header('Location: /index.php');
}


?>