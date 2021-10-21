<?php
  session_start();
  $acao = $_POST['acao'] ?? 'erro';
  if (empty($_SESSION['logado']) || !$_SESSION['logado']){
    if ($acao == "cadastrar"){
      require("controllers/cadastrar.controller.php");
    } else{
      require("controllers/login.controller.php");
    }
  } else{
    if ($acao != 'erro'){
      require("controllers/" . $acao . ".controller.php");
    }
    require("controllers/home.controller.php");
  }
?>