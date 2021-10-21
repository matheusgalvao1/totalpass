<?php
    require("redirect.php");
    $erro = '';
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    if (!empty($_POST['enviarDados'])){
        $email = $_POST['inputEmail'];
        $senha = $_POST['inputSenha'];

        if (!filter_input(INPUT_POST, 'inputEmail', FILTER_VALIDATE_EMAIL)){
            $erro = "O Email inserido não é válido!";
        }else{
            if ($email == "admin@email.com" && $senha == "admin"){
                $_SESSION['logado'] = true;
                $_SESSION['email'] = "Mairo";
                redirect("index.php");
            } else{
                $erro = "Email ou senha inválida";
            }
        }
    }

    include("views/login.view.php");
?>