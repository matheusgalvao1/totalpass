<?php

function validarDados($nome, $sobrenome, $email, $senha, &$erros)
{
    $bf = new BDfuncoes();
    if ((!preg_match("/^[a-zA-Z ]*$/", $nome) || $nome == '') || $nome == ' ') {
        $erros['erroNome'] = 'Nome inválido!';
        return false;
    }
    if (!preg_match("/^[a-zA-Z]*$/", $sobrenome) || $sobrenome == '') {
        $erros['erroSobrenome'] = 'Sobrenome inválido!';
        return false;
    }
    if (!filter_input(INPUT_POST, 'inputEmail', FILTER_VALIDATE_EMAIL)) {
        $erros['erroEmail'] = 'Email inválido!';
        return false;
    }
    if ($senha == '') {
        $erros['erroSenha'] = 'Uma senha precisa ser informada!';
        return false;
    }
    return true;
}

class MeusDadosController
{

    public function carregarTela()
    {
        $nome = '';
        $sobrenome = '';
        $email = '';
        $senha = '';
        $erros = [
            'erroNome' => '',
            'erroSobrenome' => '',
            'erroEmail' => '',
            'erroSenha' => ''
        ];
        require("views/meusDados.view.php");
    }


    public function validarEdicaoDados(){
        $nome = $_POST['inputNome'];
        $sobrenome = $_POST['inputSobrenome'];
        $email = $_POST['inputEmail'];
        $senha = $_POST['inputSenha'];
        $erros = [
            'erroNome' => '',
            'erroSobrenome' =>'',
            'erroEmail' => '',
            'erroSenha' => ''
        ];

        if(validarDados($nome, $sobrenome, $email, $senha, $erros)){
            if (!isset($_SESSION)) {
                session_start();
            }
            $user = new Usuario();
            $bdF = new BDfuncoes();
            $user->idusuario = $_SESSION['idUsuario'];
            $user->nome = $nome;
            $user->sobrenome = $sobrenome;
            $user->email = $email;
            $user->senha = password_hash($senha, PASSWORD_DEFAULT);
            $bdF->editarMeusDados($user);
            header('Location: /MeusDados');
        } else {
            require("views/meusDados.view.php");
        }
    }

    public function excluirMinhaConta(){
        if (!isset($_SESSION)) {
            session_start();
        }
        $bdF = new BDfuncoes();
        $id = $_SESSION['idUsuario'];
        $bdF->excluirMinhaConta($id);
        // mais alguma coisa acho
        session_destroy();
        header('Location: /');
    }
}
