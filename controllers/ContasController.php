<?php
function validarDadosAdd($nome, $login, $senha, &$erroAdd)
{
    if ($nome == '' || $nome == ' ') {
        $erroAdd = 'Nome não pode ser vazio!';
        return false;
    }
    if ($login == '' || $login == ' ') {
        $erroAdd = 'Login inválido!';
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
        if (!isset($_SESSION)) {
            session_start();
        }
        // Buscar contas
        $busca = '';
        $contas = empty($_SESSION['busca']) ? $bdF->buscarContas($_SESSION['idUsuario']) : $bdF->buscarContaNome($busca, $_SESSION['idUsuario']);
        // Add conta
        $contaSelecionada = empty($_SESSION['contaSelecionada']) ? '' : $bdF->buscarContaID($_SESSION['contaSelecionada']);
        $novoNome = '';
        $novoLogin = '';
        $novaSenha = '';
        $erroAdd = '';
        // Edit conta
        $editNome = '';
        $editLogin = '';
        $editSenha = '';
        $erroEditar = '';
        require("views/home.view.php");
    }

    public function validarAdicionar()
    {
        $novoNome = $_POST['novoNome'];
        $novoLogin = $_POST['novoLogin'];
        $novaSenha = $_POST['novaSenha'];
        $erroAdd = '';

        if (validarDadosAdd($novoNome, $novoLogin, $novaSenha, $erroAdd)) {
            if (!isset($_SESSION)) {
                session_start();
            }
            $bdF = new BDfuncoes();
            $conta = new Conta();
            $conta->nome = $novoNome;
            $conta->login = $novoLogin;
            $conta->senha = $novaSenha;
            $conta->idusuario = $_SESSION['idUsuario'];
            $bdF->insertConta($conta);
            header('Location: /Home');
        } else {
            require("views/home.view.php");
        }
    }

    function selecionarConta($id)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['contaSelecionada'] = $id;
        header('Location: /Home');
    }

    function recarregarContas()
    {
        $bdF = new BDfuncoes();
        if (!isset($_SESSION)) {
            session_start();
        }
        $contas = $bdF->buscarContas($_SESSION['idUsuario']);
        header('Location: /Home');
    }

    function setarBusca()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        header('Location: /Home');
    }
}
