<?php
  require 'vendor/autoload.php';
  session_start();
  $acao = $_GET['acao'] ?? 'erro';
  if (empty($_SESSION['logado']) || !$_SESSION['logado']){
    if ($acao == 'cadastrar'){
      require("controllers/cadastrar.controller.php");
    } else{
      require("controllers/login.controller.php");
    }
  } else{
    require("controllers/home.controller.php");
  }
?>