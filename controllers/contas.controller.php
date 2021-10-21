<?php
function checarBusca()
{
    if (!empty($_GET['busca'])) {
        $b = $_GET['busca'];
        setcookie('busca', $b, time()+60*60*24*30);
        return $b;
    }
    return $_COOKIE['busca'] ?? 'semBusca';
}
$busca = checarBusca();

if (!empty($_POST['selected'])){
    $_SESSION['contaSelecionada'] = $_POST['selected'];
}

$items = $_SESSION['contas'] ?? '';

require('views/contas.view.php');
