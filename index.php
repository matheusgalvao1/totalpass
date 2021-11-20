<?php
  require 'vendor/autoload.php';
  use Pecee\SimpleRouter\SimpleRouter as Router;
  use Pecee\Http\Request;

  Router::error(function(Request $request, \Exception $exception) {
    switch($exception->getCode()) {
      // Page not found
      case 404:
          Router::redirect('/not-found', 'PageController@notFound');
      // Forbidden
      case 403:
          Router::redirect('/forbidden', 'PageController@notFound');
    }
  });

  Router::get('/', 'IndexController@index');
  Router::get('/Login', 'LoginController@carregarTela');
  Router::get('/Home', 'ContasController@carregarHome');
  Router::get('/Cadastrar', 'CadastrarController@carregarTela');
  Router::get('/MeusDados', 'MeusDadosController@carregarTela');
  Router::post('/buscarConta', 'ContasController@buscarConta');
  Router::get('/recarregarContas', 'ContasController@recarregarContas');
  Router::post('/enviarLogin', 'LoginController@efetuarLogin');
  Router::post('/salvarMeusDados', 'MeusDadosController@validarEdicaoDados');
  Router::post('/adicionarConta', 'ContasController@validarAdicionar');
  Router::post('/enviarCadastro', 'CadastrarController@validarCadastro');
  Router::post('/selecionarConta/{id}', 'ContasController@selecionarConta');
  Router::post('/excluirConta', 'ContasController@excluirConta');
  Router::post('/excluirMinhaConta', 'MeusDadosController@excluirMinhaConta');
  Router::post('/confirmarExcluir', 'MeusDadosController@confirmarExcluir');
  Router::post('/editarConta', 'ContasController@editarConta');
  Router::get('/gerarSenha', 'GerarSenha@gerarSenha');
  Router::get('/not-found', 'PageController@notFound');

  Router::start();
?>