<?php

function validarDadosAdd($nome, $login, $senha)
{
    if ($nome == '' || $nome == ' ') {
        $erroAdd = 'Nome não pode ser vazio!';
        return false;
    }
    if ($login == '' || $login == ' ') {
        $erroAdd = 'Email inválido!';
        return false;
    }
    if ($senha == '' || $senha == ' ') {
        $erroAdd = 'Uma senha precisa ser informada!';
        return false;
    }
    return true;
}

class ContasController
{
    public function carregarHome()
    {
        $novoNome = '';
        $novoLogin = '';
        $novaSenha = '';
        $erroAdd = '';
        require("views/home.view.php");
    }
    
    public function validarAdicionar()
    {
        $nome = $_POST['novoNome'];
        $login = $_POST['novoLogin'];
        $senha = $_POST['novaSenha'];
        $erroAdd = '';

        if (validarDadosAdd($nome, $login, $senha)) {
            $bdF = new BDfuncoes();
            $conta = new Conta();
            $conta->nome = $nome;
            $conta->login = $login;
            $conta->senha = $senha;
            $bdF->insertConta($conta);
        } else {
            require("views/contaNew.view.php");
        }
    }
}
