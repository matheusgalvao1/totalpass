<?php
  session_start();
  if (empty($_SESSION['logado']) || !$_SESSION['logado']){
    require("views/login.view.php");
  } else{
    require("controllers/home.controller.php");
  }
?>