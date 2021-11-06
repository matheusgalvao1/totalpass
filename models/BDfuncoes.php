<?php

class BDfuncoes
{
    public function insertConta($conta)
    {
        $bd = Conexao::get();
        $query = $bd->prepare("INSERT INTO conta(nome, login, senha) VALUES(:nome, :login, :senha)");
        $query->bindParam(':nome', $conta->nome);
        $query->bindParam(':login', $conta->login);
        $query->bindParam(':senha', $conta->senha);
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
        if ($query->rowCount() > 0){
            return $query->fetchObject('Usuario');
        }
        return false;
    }
}