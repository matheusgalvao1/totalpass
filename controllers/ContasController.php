<?php
function validarDadosAdd($nome, $login, $senha, &$erroAdd)
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
        $bdF = new BDfuncoes();
        if(!isset($_SESSION)) 
        { 
            session_start();
        }
        // Add conta
        $novoNome = '';
        $novoLogin = '';
        $novaSenha = '';
        $erroAdd = '';
        // Edit conta

        // Buscar contas
        $contas = $bdF->buscarContas($_SESSION['idUsuario']) ?? [];
        require("views/home.view.php");
    }
    
    public function validarAdicionar()
    {
        $nome = $_POST['novoNome'];
        $login = $_POST['novoLogin'];
        $senha = $_POST['novaSenha'];
        $erroAdd = '';

        if (validarDadosAdd($nome, $login, $senha, $erroAdd)) {
            if(!isset($_SESSION)) 
            { 
                session_start();
            }
            $bdF = new BDfuncoes();
            $conta = new Conta();
            $conta->nome = $nome;
            $conta->login = $login;
            $conta->senha = $senha;
            $conta->idusuario = $_SESSION['idUsuario'];
            $bdF->insertConta($conta);
            header('Location: /');
        } 
        require("views/contaNew.view.php");
        
    }

    public function buscarContas() {

    }
}
