<?php

    function checarBusca()
    {
        if (!empty($_POST['busca'])) {
            $b = $_POST['busca'];
            return $b;
        }
        return '';
    }
    $busca = checarBusca();

    require('views/contas.view.php');