<?php
    include 'controllers/redirect.php';
    $nome = '';
    $sobrenome = '';
    $email = '';
    $senha = '';
    $senha2 = '';
    $erroNome = '';
    $erroSobrenome = '';
    $erroEmail = '';
    $erroSenha2 = '';

    if (!empty($_POST['enviarCadastro'])){
        $nome = $_POST['inputNome'];
        $sobrenome = $_POST['inputSobrenome'];
        $email = $_POST['inputEmail'];
        $senha = $_POST['inputSenha'];
        $senha2 = $_POST['inputSenha2'];
        $valido = true;

        if ((!preg_match("/^[a-zA-Z ]*$/", $_POST['inputNome']) || $nome == '') || $nome == ' '){
            $erroNome = 'Nome inválido!';
            $valido = false;
        }
        if (!preg_match("/^[a-zA-Z]*$/", $_POST['inputSobrenome']) || $sobrenome == ''){
            $erroSobrenome = 'Sobrenome inválido!';
            $valido = false;
        }
        if (!filter_input(INPUT_POST, 'inputEmail', FILTER_VALIDATE_EMAIL)){
            $erroEmail = 'Email inválido!';
            $valido = false;
        }
        if ($senha != $senha2){
            $erroSenha2 = 'As senhas precisam ser iguais!';
            $valido = false;
        } else if ($senha == ''){
            $erroSenha2 = 'Uma senha precisa ser informada!';
            $valido = false;
        }

        if ($valido){
            $usuarios = $_SESSION['usuarios'] ?? [];
            $usuarios = array_merge($usuarios, novoUser($nome, $sobrenome, $email, password_hash($senha2, PASSWORD_DEFAULT)));
            $_SESSION['usuarios'] = $usuarios;
            redirect('index.php');
        }
    }

    function novoUser($nome, $sobrenome, $email, $senha){
        $array = [
            $email => [
                'nome' => $nome,
                'sobrenome' => $sobrenome,
                'senha' => $senha
            ]
        ];
        return $array;
    }

    include("views/cadastrar.view.php");