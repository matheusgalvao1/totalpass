<?php
    $controle = true;

    require('nav.controller.php');
    include('models/contas.model.php');
    if ($controle)
        require('views/home.view.php');
    else
        require('views/meusDados.view.php');
