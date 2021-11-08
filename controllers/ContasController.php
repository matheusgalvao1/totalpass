<script type="text/javascript">
    function gerarSenha() {
        var chars = "0123456789abcdefghijklmnopqrstuvwxyz!@#$%^&*ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        var passwordLength = 15;
        var password = "";
        for (var i = 0; i <= passwordLength; i++) {
            var randomNumber = Math.floor(Math.random() * chars.length);
            password += chars.substring(randomNumber, randomNumber + 1);
        }
        return password;
    }

    function change() {
        senha = gerarSenha();
        document.getElementById("senha").value = senha;
    }

    function changeEdit() {
        senha = gerarSenha();
        document.getElementById("senhaEdit").value = senha;
    }
</script>

<?php
function validarDadosAdd($nome, $login, $senha)
{
    if ($nome == '' || $nome == ' ') {
        $erroAdd = 'Nome não pode ser vazio!';
        return false;
    }
    if ($login == '' || $login == ' ') {
        $erroAdd = 'Email inválido!';
        return false;
    }
    if ($senha == '' || $senha == ' ') {
        $erroAdd = 'Uma senha precisa ser informada!';
        return false;
    }
    return true;
}

class ContasController
{
    public function carregarHome()
    {
        $novoNome = '';
        $novoLogin = '';
        $novaSenha = '';
        $erroAdd = '';
        require("views/home.view.php");
    }
    
    public function validarAdicionar()
    {
        $nome = $_POST['novoNome'];
        $login = $_POST['novoLogin'];
        $senha = $_POST['novaSenha'];
        $erroAdd = '';

        if (validarDadosAdd($nome, $login, $senha)) {
            if(!isset($_SESSION)) 
            { 
                session_start();
            }
            $bdF = new BDfuncoes();
            $conta = new Conta();
            $conta->nome = $nome;
            $conta->login = $login;
            $conta->senha = $senha;
            $conta->idUsuario = $_SESSION['idUsuario'];
            $bdF->insertConta($conta);
            header('Location: /');
        } else {
            require("views/contaNew.view.php");
        }
    }

    public function buscarContas() {

    }
}
