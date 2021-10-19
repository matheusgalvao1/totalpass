<?php

    $selected = checarSelecionado();
    function checarSelecionado()
    {
        if (!empty($_POST['selected'])) {
            $selected = $_POST['selected'];
            return $selected;
        }
        
        return '';
    }


    $controle = true;

    require('nav.controller.php');
    include('models/contas.model.php');
    if ($controle)
        require('views/home.view.php');
    else
        require('views/meusDados.view.php');
