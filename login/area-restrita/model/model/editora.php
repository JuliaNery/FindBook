<?php
        require_once("conexao.php");

    class Editora{
        private $idEditora;
        private $nomeEditora;

        //ID Editora
        public function getIdEditora(){
            return $this->idEditora;
        }
        public function setIdEditora($idEditora){
            $this->idEditora = $idEditora;
        }

        //Nome Editora
        public function getNomeEditora(){
            return $this->nomeEditora;
        }
        public function setNomeEditora($nomeEditora){
            $this->nomeEditora = $nomeEditora;
        }

        public function cadastrar($Editora){

            $conexao = Conexao::conectar();
            
            $stmt = $conexao->prepare("INSERT INTO tbeditora (nomeeditora) VALUES (?)");
            
            $stmt->bindValue(1, $Editora->getNomeEditora());
            
            $stmt->execute();
        }

        public function listar(){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT idEditora, nomeEditora
             FROM tbEditora";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;
        }
    }
?>