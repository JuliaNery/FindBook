<?php
    require_once("conexao.php");

    class Autor{
        private $idAutor;
        private $nomeAutor;

        //ID Autor
        public function getIdAutor(){
            return $this->idAutor;
        }
        public function setIdAutor($idAutor){
            $this->idAutor = $idAutor;
        }

        //Nome Autor
        public function getNomeAutor(){
            return $this->nomeAutor;
        }
        public function setNomeAutor($nomeAutor){
            $this->nomeAutor = $nomeAutor;
        }

        public function cadastrar($Autor){

            $conexao = Conexao::conectar();
            
            $stmt = $conexao->prepare("INSERT INTO tbAutor (nomeAutor) VALUES (?)");
            
            $stmt->bindValue(1, $Autor->getNomeAutor());
            
            $stmt->execute();
        }

        public function listar(){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT idAutor, nomeAutor
             FROM tbAutor";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;
        }
    }
?>