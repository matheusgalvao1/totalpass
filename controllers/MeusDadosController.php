<?php
    class MeusDadosController{

        public function carregarTela(){
            //Inicia a tela com campos vazios
            $erro = '';
            $email = '';
            $senha = '';
            require("views/meusDados.view.php");
        }

     
    }
?>