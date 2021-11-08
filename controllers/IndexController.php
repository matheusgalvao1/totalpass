<?php

class IndexController{

    public function index(){
        session_start();
        if (empty($_SESSION['logado']) || !$_SESSION['logado']){
            header("Location: /Login");
        } else{
            $novoNome = '';
            $novoLogin = '';
            $novaSenha = '';
            $erroAdd = '';
            require("views/home.view.php");
            
        }
    }
}