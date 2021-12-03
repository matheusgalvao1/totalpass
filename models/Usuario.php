<?php

class Usuario{
    private $idusuario;
    private $nome;
    private $sobrenome;
    private $email;
    private $senha;
    private $token;

    public function __get($propriedade)
    {
        return $this->$propriedade;
    }

    public function __set($propriedade, $valor)
    {
        $this->$propriedade = $valor;
    }
}