<?php

function checarSelecionado()
{
    if (!empty($_POST['selected'])) {
        $s = $_POST['selected'];
        setcookie('contaSelecionada', $s, time()+60*60*24*30);
        return $s;
    }
    return $_COOKIE['tema'] ?? '';
}

// Editar
if (!empty($_POST['editarLogin']) && !empty($_POST['editarSenha'])) {
    $items[$selected]['login'] = $_POST['editarLogin'];
    $items[$selected]['senha'] = $_POST['editarSenha'];
    $_SESSION['contas'] = $items;
}

// Excluir
if(!empty($_POST['excluir'])){
    unset($items[$selected]);
    $_SESSION['contas'] = $items; 
}

$selected = checarSelecionado();

require('views/contaEdit.view.php');
