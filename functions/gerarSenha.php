<?php

class GerarSenha {

    public function gerarSenha(){
        $chars = "0123456789abcdefghijklmnopqrstuvwxyz!@#$%^&*ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $l = strlen($chars) - 1;
        $passwordLength = 15;
        $password = "";
        for ($i = 0; $i <= $passwordLength; $i++) {
            $rand = rand(0, $l);
            $password .= $chars[$rand];
        }
        echo $password;
    }
}
