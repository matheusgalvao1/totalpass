<?php
    class LoginController{

        public function carregarTela(){
            //Inicia a tela com campos vazios
            $erro = '';
            $email = '';
            $senha = '';
            require("views/login.view.php");
        }

        public function efetuarLogin(){
            //Faz chamada no banco para buscar usuario cadastrado no email, valida entrada e salva o id na sessao caso sucesso
            $bf = new BDfuncoes();
            if(!isset($_SESSION)) 
            { 
                session_start();
            }
            $email = $_POST['inputEmail'];
            $senha = $_POST['inputSenha'];

            if (!filter_input(INPUT_POST, 'inputEmail', FILTER_VALIDATE_EMAIL)){
                $erro = "O Email inserido não é válido!";
            }else{
                $user = $bf->buscarPorEmail($email);
                if($user){
                    if(password_verify($senha, $user->senha)){
                        $_SESSION['idUsuario'] = $user->idUsuario;
                        $_SESSION['logado'] = true;
                        header('Location: /');
                    } 
                } 
                $erro = "Email ou senha inválida";
            }
            require("views/login.view.php");
        }
    }
?>