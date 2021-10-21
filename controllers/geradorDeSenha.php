<?php

function gerarSenha(){
    //Definir tamanho da senha
    $tamanho = rand(15, 20);
    $senha = '';
    for ($i = 0; $i < $tamanho; $i++){
        //Definir tipo, 70% de chance LETRA, 30% NUMERO
        $tipo = rand(1, 100);
        if ($tipo < 70){
        //Caso de ser LETRA
            //Decide se é UPPER ou LOWER
            $cap = rand(1, 5);
            if ($cap <= 3){
                $senha = $senha . chr(rand(97,122));
            } else{
                $senha = $senha . chr(rand(65,90));
            }
        } else if ($tipo < 95){
        //Caso de ser NUMERO
            $senha = $senha . rand(0, 9);
        } else{
        //Caso de ser Caracter especial
            $especial = rand(1, 3);
            if ($especial == 1){
                $senha = $senha . '$';
            } else if ($especial == 2){
                $senha = $senha . '#';
            } else{
                $senha = $senha . '&';
            }
        }
    }

    return $senha;
}