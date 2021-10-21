<?php

function checarSelecionado()
{
    if (!empty($_SESSION['contaSelecionada'])) {
        $s = $_SESSION['contaSelecionada'];
        return $s;
    }
    return '';
}
$items = $_SESSION['contas'];
$selected = checarSelecionado();

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

require('views/contaEdit.view.php');
