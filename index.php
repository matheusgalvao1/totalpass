<?php
  require 'vendor/autoload.php';
  use Pecee\SimpleRouter\SimpleRouter as Router;
  /*
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
  */
  Router::get('/', 'IndexController@index');
  Router::get('/Login', 'LoginController@carregarTela');
  Router::get('/Home', 'ContasController@carregarHome');
  Router::get('/Cadastrar', 'CadastrarController@carregarTela');
  Router::post('/enviarLogin', 'LoginController@efetuarLogin');
  Router::post('/adicionarConta', 'ContasController@validarAdicionar');
  Router::post('/enviarCadastro', 'CadastrarController@validarCadastro');
  Router::post('/selecionarConta', 'ContasController@selecionarConta');
  Router::start();
?>