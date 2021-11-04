<?php

class Conta{
    private $nome;
    private $login;
    private $senha;
    private $idConta;
    private $idUsuario;

    public function __get($propriedade)
    {
        return $this->$propriedade;
    }

    public function __set($propriedade, $valor)
    {
        $this->$propriedade = $valor;
    }

}