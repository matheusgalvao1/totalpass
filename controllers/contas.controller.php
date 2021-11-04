<?php
include("controllers/redirect.php");
include("./models/contas.model.php");
include("controllers/geradorDeSenha.php");
?>

<script type="text/javascript">
    function gerarSenha() {
        var chars = "0123456789abcdefghijklmnopqrstuvwxyz!@#$%^&*ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        var passwordLength = 15;
        var password = "";
        for (var i = 0; i <= passwordLength; i++) {
            var randomNumber = Math.floor(Math.random() * chars.length);
            password += chars.substring(randomNumber, randomNumber + 1);
        }
        return password;
    }

    function change() {
        senha = gerarSenha();
        document.getElementById("senha").value = senha;
    }

    function changeEdit() {
        senha = gerarSenha();
        document.getElementById("senhaEdit").value = senha;
    }
</script>

<?php

$bdFuncoes = new BDfuncoes();


// JA TAVA NO CONTAS ----------------------------------------------------------------------------------------------------------------------------------------------------
function checarBusca()
{
    if (!empty($_GET['busca'])) {
        $b = $_GET['busca'];
        setcookie('busca', $b, time() + 60 * 60 * 24 * 30);
        return $b;
    }
    return $_COOKIE['busca'] ?? 'semBusca';
}
$busca = checarBusca();

if (!empty($_POST['selected'])) {
    $_SESSION['contaSelecionada'] = $_POST['selected'];
}

$items = $_SESSION['contas'] ?? [];

// NEW ----------------------------------------------------------------------------------------------------------------------------------------------------
$n = '';
$l = '';
$s = '';
$erroNew = '';
if (isset($_POST['enviarNova'])) {
    $n = $_POST['novoNome'];
    $l = $_POST['novoLogin'];
    $s = $_POST['novaSenha'];

    if ($n == '' || $n == ' ') {
        $erroNew = 'Nome não pode ser vazio';
    } else if (preg_match('/\s/', $n)) {
        $erroNew = 'Nome não deve conter espaços';
    } else if ($l == '' || $l == ' ') {
        $erroNew = 'Login não pode ser vazio';
    } else if ($s == '' || $s == ' ') {
        $erroNew = 'Senha não pode ser vazia';
    } else {
        $items = array_merge($items, novaConta($n, $l, $s));
        $_SESSION['contas'] = $items;
        // ADD no bd
        /*
        $conta = new Conta();
        $conta->nome = $n;
        $conta->login = $l;
        $conta->senha = $s;
        $bdFuncoes->insert($conta);
        */
        //
        header("Location: /");
    }
}

function novaConta($nomeConta, $loginConta, $senhaConta)
{
    $array = [
        $nomeConta => [
            'login' => $loginConta,
            'senha' => $senhaConta
        ]
    ];
    return $array;
}

// EDIT ----------------------------------------------------------------------------------------------------------------------------------------------------
function checarSelecionado()
{
    if (!empty($_SESSION['contaSelecionada'])) {
        $s = $_SESSION['contaSelecionada'];
        return $s;
    }
    return '';
}

$selected = checarSelecionado();

$items = $_SESSION['contas'] ?? '';
$loginTemp = $items[$selected]['login'] ?? '';
$senhaTemp = $items[$selected]['senha'] ?? '';
$erroEditar = '';

// Editar
if (isset($_POST['enviarEdit'])) {
    $items[$selected]['login'] = $_POST['editarLogin'];
    $items[$selected]['senha'] = $_POST['editarSenha'];
    $loginTemp = $_POST['editarLogin'];
    $senhaTemp = $_POST['editarSenha'];
    if ($loginTemp == '' || $loginTemp == ' ') {
        $erroEditar = 'Login inválido!';
    } else if ($senhaTemp == '' || $senhaTemp == ' ') {
        $erroEditar = 'Senha inválida!';
    } else {
        $_SESSION['contas'] = $items;
        $selected = '';
        $_SESSION['contaSelecionada'] = $selected;
    }
}

// Excluir
if (!empty($_POST['excluir'])) {
    unset($items[$selected]);
    $selected = '';
    $_SESSION['contaSelecionada'] = $selected;
    $_SESSION['contas'] = $items;
} 
//
