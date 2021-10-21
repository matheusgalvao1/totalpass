<?php
    $nome = '';
    $sobrenome = '';
    $email = '';
    $senha = '';
    $senha2 = '';
    $erroNome = 'F';
    $erroSobrenome = 'F';
    $erroEmail = 'F';
    $erroSenha2 = 'F';

    function checarValidade(){
        if (!preg_match("/^[a-zA-Z]*$/", $_POST['inputNome'])){
            $erroNome = 'Nome inválido!';
            return false;
        }
        if (!preg_match("/^[a-zA-Z]*$/", $_POST['inputSobrenome'])){
            $erroSobrenome = 'Sobrenome inválido!';
            return false;
        }
        if (!filter_input(INPUT_POST, 'inputEmail', FILTER_VALIDATE_EMAIL)){
            $erroEmail = 'Email inválido!';
            return false;
        }
        if ($senha != $senha2){
            $erroSenha2 = 'As senhas precisam ser iguais!';
            return false;
        }
        return true;
    }

    if (!empty($_POST['enviarDados'])){
        if (checarValidade()){
            echo 'Tudo válido';
        }
    }

    include("views/cadastrar.view.php");