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


$items = $_SESSION['contas'] ?? '';

require('views/contas.view.php');
