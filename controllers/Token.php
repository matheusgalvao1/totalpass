<?php

function gerarToken(){
    $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $l = strlen($chars) - 1;
    $tokenLength = 5;
    $newToken = "";
    for ($i = 0; $i <= $tokenLength; $i++) {
        $rand = rand(0, $l);
        $newToken .= $chars[$rand];
    }
    return $newToken;
}

class Token {
    
    public function getToken(){
        if (!isset($_SESSION)) {
            session_start();
        }
        $bdF = new BDfuncoes();
        $id = $_SESSION['idUsuario'];

        return $bdF->getToken($id);
    }



    public function gerarTokenUnico(){
        $newToken = gerarToken();
        $bdF = new BDfuncoes();
        while($bdF->existeToken($newToken))
        {
            $newToken = gerarToken();
        }
        return $newToken;
    }

    public function novoToken(){
        $newToken = gerarToken();
        if (!isset($_SESSION)) {
            session_start();
        }
        $bdF = new BDfuncoes();
        $id = $_SESSION['idUsuario'];
        while($bdF->existeToken($newToken))
        {
            $newToken = gerarToken();
        }
        $bdF->updateToken($newToken, $id);
        header('Location: /');
    }



    
}