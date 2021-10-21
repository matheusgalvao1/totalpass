<?php

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
} else {
    if(empty($_POST['editarLogin']))
        $erroEditar = 'O login não pode ser vazio';
    else if(empty($_POST['editarSenha']))
        $erroEditar = 'A senha não pode ser vazia';
}

// Excluir
if(!empty($_POST['excluir'])){
    unset($items[$selected]);
    $selected = '';
    $_SESSION['contaSelecionada'] = $selected;
    $_SESSION['contas'] = $items;
} 

require('views/contaEdit.view.php');
