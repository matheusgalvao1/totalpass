<?php
  include('controllers/redirect.php');
  session_start();
  if (empty($_SESSION['logado']) || !$_SESSION['logado']){
    //redirect('views/login.view.php');
    require("views/login.view.php");
  } else{
    require("controllers/home.controller.php");
  }
?>