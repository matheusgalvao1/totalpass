<?php

class Usuario{
    private $idUsuario;
    private $nome;
    private $sobrenome;
    private $email;
    private $senha;

    public function __get($propriedade)
    {
        return $this->$propriedade;
    }

    public function __set($propriedade, $valor)
    {
        $this->$propriedade = $valor;
    }
}