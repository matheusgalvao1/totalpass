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

function avaliarTempoAdd(&$novoNome, &$novoLogin, &$novaSenha)
{
    if (isset($_SESSION['limiteAdd'])) {
        if (time() + 5 <= $_SESSION['limiteAdd']) {
            $novoNome = $_SESSION['novoNome'];
            $novoLogin = $_SESSION['novoLogin'];
            $novaSenha = $_SESSION['novaSenha'];
        } else {
            unset($_SESSION['novoNome']);
            unset($_SESSION['novoLogin']);
            unset($_SESSION['novaSenha']);
        }
    }
}

function avaliarTempoEdit(&$contaSelecionada)
{
    if (isset($_SESSION['limiteEdit'])) {
        if (time() + 5 <= $_SESSION['limiteEdit']) {
            $contaSelecionada->login = $_SESSION['editLogin'];
            $contaSelecionada->senha = $_SESSION['editSenha'];
        } else {
            unset($_SESSION['editLogin']);
            unset($_SESSION['editSenha']);
        }
    }
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
        try {
            $busca = $_SESSION['buscaAtual'] ?? '';
            $contas = ($busca == '') ? $bdF->buscarContas($_SESSION['idUsuario']) : $bdF->buscarContaNome($busca, $_SESSION['idUsuario']);
            // Add conta
            $contaSelecionada = empty($_SESSION['contaSelecionada']) ? '' : $bdF->buscarContaID($_SESSION['contaSelecionada']);
            $novoNome = '';
            $novoLogin = '';
            $novaSenha = '';
            avaliarTempoAdd($novoNome, $novoLogin, $novaSenha);
            $erroAdd = $_COOKIE['erroAdd'] ?? '';
            // Edit conta
            $erroEditar = $_COOKIE['erroEdit'] ?? '';
            avaliarTempoEdit($contaSelecionada);
            $tokenClass = new Token();
            $token = $tokenClass->getToken();
        } catch (Exception $e) {
            $_SESSION['tituloPop'] = 'Erro';
            $_SESSION['textPop'] = $e->getMessage();
            $_SESSION['icon'] = 'success';
        }
        require("views/home.view.php");
    }

    public function validarAdicionar()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $novoNome = $_POST['novoNome'];
        $novoLogin = $_POST['novoLogin'];
        $novaSenha = $_POST['novaSenha'];
        $erroAdd = '';

        if (validarDadosAdd($novoNome, $novoLogin, $novaSenha, $erroAdd)) {
            try {
                $bdF = new BDfuncoes();
                $conta = new Conta();
                $conta->nome = $novoNome;
                $conta->login = $novoLogin;
                $conta->senha = $novaSenha;
                $conta->idusuario = $_SESSION['idUsuario'];
                $bdF->insertConta($conta);
                $_SESSION['textPop'] = 'Conta adicionada com sucesso!';
                $_SESSION['icon'] = 'success';
            } catch (Exception $e) {
                $_SESSION['textPop'] = $e->getMessage();
                $_SESSION['icon'] = 'error';
            }
            $_SESSION['tituloPop'] = 'Adição de conta';
            header('Location: /Home');
        } else {
            $_SESSION['novoNome'] = $novoNome;
            $_SESSION['novoLogin'] = $novoLogin;
            $_SESSION['novaSenha'] = $novaSenha;
            $_SESSION['limiteAdd'] = time() + 5;
            setcookie('erroAdd', $erroAdd, time() + 3);
            header('Location: /Home');
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
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['buscaAtual'] = '';
        $_SESSION['contaSelecionada'] = '';
        header('Location: /Home');
    }

    function editarConta()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        try {
            $login = $_POST['editarLogin'] ?? '';
            $senha = $_POST['editarSenha'] ?? '';
            if (!(($login == '' || $login == ' ') || ($senha == '' || $senha == ' '))) {
                $bdF = new BDfuncoes();
                $bdF->editarConta($_SESSION['idUsuario'], $login, $senha, $_SESSION['contaSelecionada']);
                $_SESSION['textPop'] = 'Conta editada com sucesso!';
                $_SESSION['icon'] = 'success';
                $_SESSION['contaSelecionada'] = '';
            } else {
                setcookie('erroEdit', 'Campo vazio!', time() + 3);
                $_SESSION['limiteEdit'] = time() + 5;
                $_SESSION['editLogin'] = $login;
                $_SESSION['editSenha'] = $senha;
            }
        } catch (Exception $e) {
            $_SESSION['textPop'] = $e->getMessage();
            $_SESSION['icon'] = 'error';
        }
        $_SESSION['tituloPop'] = 'Editar conta';
        header('Location: /Home');
    }

    function excluirConta()
    {
        $bdF = new BDfuncoes();
        if (!isset($_SESSION)) {
            session_start();
        }
        try {
            $bdF->excluirConta($_SESSION['idUsuario'], $_SESSION['contaSelecionada']);
            $_SESSION['textPop'] = 'Conta excluida com sucesso!';
            $_SESSION['icon'] = 'success';
        } catch (Exception $e) {
            $_SESSION['textPop'] = $e->getMessage();
            $_SESSION['icon'] = 'error';
        }
        $_SESSION['tituloPop'] = 'Excluir conta';
        $_SESSION['contaSelecionada'] = '';
        header('Location: /Home');
    }

    function buscarConta()
    {
        $busca = $_POST['inputBusca'] ?? '';
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['buscaAtual'] = $busca;
        header('Location: /Home');
    }
}
