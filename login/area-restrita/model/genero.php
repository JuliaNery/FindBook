<?php
    require_once("conexao.php");

    class Genero{
        private $idGenero;
        private $nomeGenero;

        //ID Genero
        public function getIdGenero(){
            return $this->idGenero;
        }
        public function setIdGenero($idGenero){
            $this->idGenero = $idGenero;
        }

        //Nome Genero
        public function getNomeGenero(){
            return $this->nomeGenero;
        }
        public function setNomeGenero($nomeGenero){
            $this->nomeGenero = $nomeGenero;
        }

        public function cadastrar($Genero){

            $conexao = Conexao::conectar();
            
            $stmt = $conexao->prepare("INSERT INTO tbGenero (nomeGenero) VALUES (?)");
            
            $stmt->bindValue(1, $Genero->getNomeGenero());
            
            $stmt->execute();
        }

        public function listar(){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT idGenero, nomeGenero
             FROM tbGenero";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;
        }
    }
?>