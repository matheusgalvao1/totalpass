<?php
// ADD CONTA
include("controllers/redirect.php");
$items = $_SESSION['contas'] ?? [];
if (!empty($_POST['novoNome'])) {
    $n = $_POST['novoNome'];
    $l = $_POST['novoLogin'];
    $s = $_POST['novaSenha'];
    $items = array_merge($items, novaConta($n, $l, $s));
    $_SESSION['contas'] = $items;
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

require('views/contaNew.view.php');
