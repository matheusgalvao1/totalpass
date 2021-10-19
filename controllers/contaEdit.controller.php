<?php

function checarSelecionado()
{
    if (!empty($_POST['selected'])) {
        $s = $_POST['selected'];
        //setcookie('contaSelecionada', $s, time()+60*60*24*30);
        return $s;
    }
    return '';
}

$selected = checarSelecionado();

require('views/contaEdit.view.php');
