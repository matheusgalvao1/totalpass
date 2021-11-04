<?php

class BDfuncoes
{




    public function insert($conta)
    {
        $bd = Conexao::get();
        $query = $bd->prepare("INSERT INTO conta(Nome, Login, Senha) VALUES(:nome, :login, :senha)");
        $query->bindParam(':nome', $conta->nome);
        $query->bindParam(':login', $conta->login);
        $query->bindParam(':senha', $conta->senha);
        $query->execute();
    }

    
}
