<?php
    class Cliente{
        public $ra, $nome;

        function __construct($ra, $nome){
            $this->ra = $ra;
            $this->nome = $nome;

        }

        function getRa(){
            return $this->ra;
        }
        function getNome(){
            return $this->nome;
        }

    }
    class ClienteCadastro extends Cliente {
        private $tipo, $senha;
        
        function __construct($ra, $nome, $tipo, $senha){
            $this->ra = $ra;
            $this->nome = $nome;
            $this->tipo = $tipo;
            $this->senha = $senha;
        }

        function getSenha(){
            return $this->senha;
        }
        function getTipo(){
            return $this->tipo;
        }

        function getRa(){
            return $this->ra;
        }
        function getNome(){
            return $this->nome;
        }
        function setSenha($senha){
            $this->senha = $senha;
        }
    }

?>
