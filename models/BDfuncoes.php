<?php

class BDfuncoes
{
    public function insertConta($conta)
    {
        $bd = Conexao::get();
        $query = $bd->prepare("INSERT INTO conta(nome, login, senha, idusuario) VALUES(:nome, :login, :senha, :idusuario) ");
        $query->bindParam(':nome', $conta->nome);
        $query->bindParam(':login', $conta->login);
        $query->bindParam(':senha', $conta->senha);
        $query->bindParam(':idusuario', $conta->idusuario);
        $query->execute();
    }

    public function insertUsuario($user)
    {
        $bd = Conexao::get();
        $query = $bd->prepare("INSERT INTO usuario(nome, sobrenome, email, senha) VALUES(:nome, :sobrenome, :email, :senha)");
        $query->bindParam(':nome', $user->nome);
        $query->bindParam(':sobrenome', $user->sobrenome);
        $query->bindParam(':email', $user->email);
        $query->bindParam(':senha', $user->senha);
        $query->execute();
    }

    public function buscarPorEmail($email){
        $bd = Conexao::get();
        $query = $bd->prepare("SELECT * FROM usuario WHERE :email = email");
        $query->bindParam(':email', $email);
        $query->execute();
        $user = $query->fetchObject('Usuario');
        return $user;
    }

    public function buscarContas($id){
        $bd = Conexao::get();
        $query = $bd->prepare("SELECT * FROM conta WHERE :idusuario = idusuario");
        $query->bindParam(':idusuario', $id);
        $query->execute();
        $listContas = $query->fetchAll(PDO::FETCH_CLASS, 'Conta');
        return $listContas;
    }

    public function buscarContaNome($nomeConta, $idusuario){
        $bd = Conexao::get();
        $query = $bd->prepare("SELECT * FROM conta WHERE (nome LIKE :nome AND :idusuario = idusuario)");
        $nome = $nomeConta."%";
        $query->bindParam(':nome', $nome);
        $query->bindParam(':idusuario', $idusuario);
        $query->execute();
        $listContas = $query->fetchAll(PDO::FETCH_CLASS, 'Conta');
        return $listContas;
    } 

    public function buscarContaID($idconta){
        $bd = Conexao::get();
        $query = $bd->prepare("SELECT * FROM conta WHERE :idconta = idconta");
        $query->bindParam(':idconta', $idconta);
        $query->execute();
        $conta = $query->fetchObject('Conta');
        return $conta;
    } 

    public function editarConta($idusuario, $login, $senha, $idConta){
        $bd = Conexao::get();
        $query = $bd->prepare("UPDATE conta SET login = :login, senha = :senha WHERE (:idconta = idconta AND :idusuario = idusuario)");
        $query->bindParam(':idusuario', $idusuario);
        $query->bindParam(':idconta', $idConta);
        $query->bindParam(':login', $login);
        $query->bindParam(':senha', $senha);
        $query->execute();
    }
    
    public function excluirConta($idusuario, $idconta){
        $bd = Conexao::get();
        $query = $bd->prepare("DELETE FROM conta WHERE (:idconta = idconta AND :idusuario = idusuario)");
        $query->bindParam(':idconta', $idconta);
        $query->bindParam(':idusuario', $idusuario);
        $query->execute();
    }
}