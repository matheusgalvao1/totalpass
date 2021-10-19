<?php
function checarBusca()
{
    if (!empty($_GET['busca'])) {
        $b = $_GET['busca'];
        return $b;
    }
    return '';
}
$busca = checarBusca();

require('views/contas.view.php');
