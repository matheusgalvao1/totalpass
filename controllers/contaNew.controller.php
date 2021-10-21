<?php

$erroNew = '';

// ADD CONTA
include("controllers/redirect.php");
include("./models/contas.model.php");

//$items = $_SESSION['contas'] ?? [];
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
            redirect('index.php?acao=home');
            }
        }
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

require('views/contaNew.view.php');