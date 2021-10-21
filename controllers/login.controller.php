<?php
    require("redirect.php");
    require("models/usuarios.model.php");
    $erro = '';
    $email = '';
    $senha = '';
    
    if(!isset($_SESSION)) 
    { 
        session_start();
    }
    if (!isset($_SESSION['usuarios'])){
        $_SESSION['usuarios'] = $usuarios;
    }
    if (!empty($_POST['enviarDados'])){
        $usuarios = $_SESSION['usuarios'] ?? [];
        $email = $_POST['inputEmail'];
        $senha = $_POST['inputSenha'];

        if (!filter_input(INPUT_POST, 'inputEmail', FILTER_VALIDATE_EMAIL)){
            $erro = "O Email inserido não é válido!";
        }else{
            if (isset($usuarios[$email]) && password_verify($senha, $usuarios[$email]['senha'])){
                $_SESSION['logado'] = true;
                $_SESSION['email'] = $usuarios[$email];
                $_SESSION['nome'] = $usuarios[$email]['nome'];
                $_SESSION['sobrenome'] = $usuarios[$email]['sobrenome'];
                redirect("index.php");
            } else{
                $erro = "Email ou senha inválida";
            }
        }
    }

    include("views/login.view.php");
?>