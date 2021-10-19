<?php
$selected = checarSelecionado();
function checarSelecionado()
{
    if (!empty($_POST['selected'])) {
        $s = $_POST['selected'];
        return $s;
    }

    return '';
}


require('views/contaEdit.view.php');
