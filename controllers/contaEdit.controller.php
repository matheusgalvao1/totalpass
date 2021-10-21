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
$items = $_SESSION['contas'];
$loginTemp = $items[$selected]['login'];
$senhaTemp = $items[$selected]['senha'];

// Editar
if (!empty($_POST['editarLogin']) && !empty($_POST['editarSenha'])) {
    $items[$selected]['login'] = $_POST['editarLogin'];
    $items[$selected]['senha'] = $_POST['editarSenha'];
    $loginTemp = $_POST['editarLogin'];
    $senhaTemp = $_POST['editarSenha'];
    $_SESSION['contas'] = $items;
    $_SESSION['contaSelecionada'] = '';
}

// Excluir
/*if(!empty($_POST['excluir'])){
    unset($items[$selected]);
    $_SESSION['contas'] = $items; 
} */

require('views/contaEdit.view.php');
