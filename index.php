<?php
  session_start();
  if (empty($_SESSION['logado']) || !$_SESSION['logado']){
    require("controllers/login.controller.php");
  } else{
    require("controllers/home.controller.php");
  }
?>