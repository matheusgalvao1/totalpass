<?php
    function validarDadosCadastro($nome, $sobrenome, $email, $senha, $senha2, &$erros){
        $bf = new BDfuncoes();
        if ((!preg_match("/^[a-zA-Z ]*$/", $nome) || $nome == '') || $nome == ' '){
            $erros['erroNome'] = 'Nome inválido!';
            return false;
        }
        if (!preg_match("/^[a-zA-Z]*$/", $sobrenome) || $sobrenome == ''){
            $erros['erroSobrenome'] = 'Sobrenome inválido!';
            return false;
        }
        if (!filter_input(INPUT_POST, 'inputEmail', FILTER_VALIDATE_EMAIL)){
            $erros['erroEmail'] = 'Email inválido!';
            return false;
        }
        if ($bf->buscarPorEmail($email) == false){
            $erros['erroEmail'] = 'Email já cadastrado!';
            return false;
        }
        if ($senha != $senha2){
            $erros['erroSenha'] = 'As senhas precisam ser iguais!';
            return false;
        } else if ($senha == ''){
            $erros['erroSenha'] = 'Uma senha precisa ser informada!';
            return false;
        }
        return true;
    }

    class CadastrarController{
        public function carregarTela(){
            $nome = '';
            $sobrenome = '';
            $email = '';
            $senha = '';
            $senha2 = '';
            $erros = [
                'erroNome' => '',
                'erroSobrenome' =>'',
                'erroEmail' => '',
                'erroSenha' => ''
            ];
            require("views/cadastrar.view.php");
        }

        public function validarCadastro(){
            $nome = $_POST['inputNome'];
            $sobrenome = $_POST['inputSobrenome'];
            $email = $_POST['inputEmail'];
            $senha = $_POST['inputSenha'];
            $senha2 = $_POST['inputSenha2'];
            $erros = [
                'erroNome' => '',
                'erroSobrenome' =>'',
                'erroEmail' => '',
                'erroSenha' => ''
            ];

            if(validarDadosCadastro($nome, $sobrenome, $email, $senha, $senha2, $erros)){
                $user = new Usuario();
                $bdF = new BDfuncoes();
                $user->nome = $nome;
                $user->sobrenome = $sobrenome;
                $user->email = $email;
                $user->senha = password_hash($senha2, PASSWORD_DEFAULT);
                $bdF->insertUsuario($user);
                header('Location: /Login');
            } else{
                require("views/cadastrar.view.php");
            }
        }
    }
