<?php

class BDfuncoes
{

    public function insertConta($conta)
    {
        $cripto = new Cripto();
        $conta->login = $cripto->encrypt($conta->login);
        $conta->senha = $cripto->encrypt($conta->senha);
        try{
            $bd = Conexao::get();
            $query = $bd->prepare("INSERT INTO conta(nome, login, senha, idusuario) VALUES(:nome, :login, :senha, :idusuario) ");
            $query->bindParam(':nome', $conta->nome);
            $query->bindParam(':login', $conta->login);
            $query->bindParam(':senha', $conta->senha);
            $query->bindParam(':idusuario', $conta->idusuario);
            $query->execute();
        } catch(Exception $e){
            throw new Exception('Falha ao adicionar conta!');
        }
    }

    public function insertUsuario($user)
    {
        $cripto = new Cripto();
        $user->nome = $cripto->encrypt($user->nome);
        $user->sobrenome = $cripto->encrypt($user->sobrenome);
        $bd = Conexao::get();
        $query = $bd->prepare("INSERT INTO usuario(nome, sobrenome, email, senha, token) VALUES(:nome, :sobrenome, :email, :senha, :token)");
        $query->bindParam(':nome', $user->nome);
        $query->bindParam(':sobrenome', $user->sobrenome);
        $query->bindParam(':email', $user->email);
        $query->bindParam(':senha', $user->senha);
        $query->bindParam(':token', $user->token);
        $query->execute();
    }

    public function buscarUserPorId($id){
        $bd = Conexao::get();
        $cripto = new Cripto();
        $query = $bd->prepare("SELECT * FROM usuario WHERE :idusuario = idusuario");
        $query->bindParam(':idusuario', $id);
        $query->execute();
        $user = $query->fetchObject('Usuario');
        $user->nome = $cripto->decrypt($user->nome);
        $user->sobrenome = $cripto->decrypt($user->sobrenome);
        return $user;
    }

    public function buscarPorEmail($email, $controlador){ //0-Ver se existe 1-Buscar pelo email
        $bd = Conexao::get();
        if ($controlador == 1){
            $query = $bd->prepare("SELECT * FROM usuario WHERE :email = email");
            $query->bindParam(':email', $email);
            $query->execute();
            $user = $query->fetchObject('Usuario');
            return $user;
        } else if($controlador == 0){
            $query = $bd->prepare("SELECT idusuario FROM usuario WHERE email = :email");
            $query->bindParam(':email', $email);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
            if(!$result){
                return true;
            } else
                return false;
        }
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
        $cripto = new Cripto();
        $bd = Conexao::get();
        $query = $bd->prepare("SELECT * FROM conta WHERE :idconta = idconta");
        $query->bindParam(':idconta', $idconta);
        $query->execute();
        $conta = $query->fetchObject('Conta');
        $conta->login = $cripto->decrypt($conta->login);
        $conta->senha = $cripto->decrypt($conta->senha);
        return $conta;
    } 

    public function editarConta($idusuario, $login, $senha, $idConta){
        $cripto = new Cripto();
        $login = $cripto->encrypt($login);
        $senha = $cripto->encrypt($senha);
        try{
            $bd = Conexao::get();
            $query = $bd->prepare("UPDATE conta SET login = :login, senha = :senha WHERE (:idconta = idconta AND :idusuario = idusuario)");
            $query->bindParam(':idusuario', $idusuario);
            $query->bindParam(':idconta', $idConta);
            $query->bindParam(':login', $login);
            $query->bindParam(':senha', $senha);
            $query->execute();
        } catch (Exception $e){
            throw new Exception('Falha ao editar conta: Problema no banco!');
        }
    }
    
    public function excluirConta($idusuario, $idconta){
        try{
            $bd = Conexao::get();
            $query = $bd->prepare("DELETE FROM conta WHERE (:idconta = idconta AND :idusuario = idusuario)");
            $query->bindParam(':idconta', $idconta);
            $query->bindParam(':idusuario', $idusuario);
            $query->execute();
        } catch (Exception $e){
            throw new Exception('Falha ao excluir conta: Problema no banco!');
        }
    }

    public function editarMeusDados($user){
        $cripto = new Cripto();
        $user->nome = $cripto->encrypt($user->nome);
        $user->sobrenome = $cripto->encrypt($user->sobrenome);
        try{
            $bd = Conexao::get();
            $query = $bd->prepare("UPDATE usuario SET nome = :nome, sobrenome = :sobrenome, email = :email, senha = :senha WHERE :idusuario = idusuario");
            $query->bindParam(':idusuario', $user->idusuario);
            $query->bindParam(':nome', $user->nome);
            $query->bindParam(':sobrenome', $user->sobrenome);
            $query->bindParam(':email', $user->email);
            $query->bindParam(':senha', $user->senha);
            $query->execute();
        } catch (Exception $e){
            throw new Exception('Falha ao editar dados de usuario: Problema no banco!');
        }
    }

    public function excluirMinhaConta($id){
        try{
            $bd = Conexao::get();
            $query = $bd->prepare("DELETE FROM usuario WHERE idusuario = :idusuario");
            $query->bindParam(':idusuario', $id);
            $query->execute();
        } catch (Exception $e){
            throw new Exception('Falha ao excluir conta de usuário: Problema no banco!');
        }
    }

    public function getToken($id){
        try{
            $bd = Conexao::get();
            $query = $bd->prepare("SELECT token FROM usuario WHERE idusuario = :idusuario");
            $query->bindParam(':idusuario', $id);
            $query->execute();
            $token = $query->fetchColumn();
            return $token;
        } catch (Exception $e){
            throw new Exception('Falha ao resgatar token!');
        }
    }

    public function existeToken($token){
        $bd = Conexao::get();
        $query = $bd->prepare("SELECT token FROM usuario WHERE token = :token");
        $query->bindParam(':token', $token);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if($result){
            return true;
        } else
            return false;
    }

    public function updateToken($token, $id){
        $bd = Conexao::get();
        $query = $bd->prepare("UPDATE usuario SET token = :token WHERE idusuario = :idusuario");
        $query->bindParam(':token', $token);
        $query->bindParam(':idusuario', $id);
        $query->execute();
    }
}