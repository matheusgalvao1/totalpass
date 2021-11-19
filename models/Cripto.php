<?php

class Cripto{
    private $chave;
    private $iv;

    function __constructor(){
        $this->chave = "16428adnsadk123";
        $this->iv = "lkSaHAfnCanmLKfeiifja29481";
    }

    function encrypt($mensagem){
        $resultado = openssl_encrypt($mensagem, "AES-256-CBC", $this->chave, OPENSSL_RAW_DATA, $this->iv);
        $resultado = base64_encode($resultado);
        return $resultado;
    }

    function decrypt($mensagem){
        $resultado = base64_decode($mensagem);
        $resultado = openssl_encrypt($resultado, "AES-256-CBC", $this->chave, OPENSSL_RAW_DATA, $this->iv);
        return $resultado;
    }
}