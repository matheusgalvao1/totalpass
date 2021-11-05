<?php
    class LoginController{

        public function carregarTela(){
            $erro = '';
            $email = '';
            $senha = '';
            require("views/login.view.php");
        }

        public function efetuarLogin(){
            $usuarios = [
                "admin@email.com" => [
                    'nome' => 'Administrador',
                    'sobrenome' => 'ADM',
                    'senha' => '$2y$10$2w0RRrkodKQ5EvQIP4UzouFhhO52lYI8tFAm/GuPK9k/WqmZEitOe'
                ],
                "carlos@email.com" => [
                    'nome' => 'Carlos',
                    'sobrenome' => 'Ferreira',
                    'senha' => '$2y$10$opycO6O/YgqN8W7UqhNUMOCI71XtKK5qkrXFvzBpoSF6OFFzDPaca'
                ]
            ];
            if(!isset($_SESSION)) 
            { 
                session_start();
            }
            if (!isset($_SESSION['usuarios'])){
                $_SESSION['usuarios'] = $usuarios;
            }
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
                    header('Location: /');
                } else{
                    $erro = "Email ou senha inválida";
                }
            }
            require("views/login.view.php");
        }
    }
?>