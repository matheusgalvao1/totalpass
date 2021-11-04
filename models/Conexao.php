<?php

class Conexao{
    private static $instancia;

    public static function get(){
        try{
            if(!isset(self::$instancia)){
                self::$instancia = new PDO('mysql:host=localhost;dbname=Totalpass', 'root', '');
            }
            return self::$instancia;
        } catch(Exception $e){
            throw new Exception("Falha no banco!");
        }
    }
}