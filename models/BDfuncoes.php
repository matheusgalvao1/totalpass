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
        $query->bindParam(':idusuario', $conta->idUsuario);
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
}