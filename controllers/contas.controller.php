<?php
include("controllers/redirect.php");
include("./models/contas.model.php");
include("controllers/geradorDeSenha.php");
?>

<script type="text/javascript">
    function gerarSenha(length) {
        return 'sdsadaafads'
    }

    function change() {
        senha = gerarSenha(15);
        document.getElementById("senha").value = senha;
    }
</script>

<?php
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
$erroNew = '';

if (!empty($_POST['novoNome'])) {
    if (preg_match('/\s/', $_POST['novoNome'])) {
        $erroNew = 'Nome não deve conter espaços';
    } else {
        if (empty($_POST['novoLogin'])) {
            $erroNew = 'Login não pode ser vazio';
        } else {
            if (empty($_POST['novaSenha'])) {
                $erroNew = 'Senha não pode ser vazia';
            } else {
                $n = $_POST['novoNome'];
                $l = $_POST['novoLogin'];
                $s = $_POST['novaSenha'];
                $items = array_merge($items, novaConta($n, $l, $s));
                $_SESSION['contas'] = $items;
                header("Location: /");
            }
        }
    }
} else if (empty($_POST['novoNome']) && (!empty($_POST['novoLogin']) | !empty($_POST['novaSenha']))) {
    $erroNew = 'Nome não pode ser vazio';
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
if (!empty($_POST['editarLogin']) && !empty($_POST['editarSenha'])) {
    $items[$selected]['login'] = $_POST['editarLogin'];
    $items[$selected]['senha'] = $_POST['editarSenha'];
    $loginTemp = $_POST['editarLogin'];
    $senhaTemp = $_POST['editarSenha'];
    $_SESSION['contas'] = $items;
    $selected = '';
    $_SESSION['contaSelecionada'] = $selected;
}

// Excluir
if (!empty($_POST['excluir'])) {
    unset($items[$selected]);
    $selected = '';
    $_SESSION['contaSelecionada'] = $selected;
    $_SESSION['contas'] = $items;
} 
//
