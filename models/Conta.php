<?php

class Conta{
    private $nome;
    private $login;
    private $senha;
    private $idconta;
    private $idusuario;

    public function __get($propriedade)
    {
        return $this->$propriedade;
    }

    public function __set($propriedade, $valor)
    {
        $this->$propriedade = $valor;
    }

}