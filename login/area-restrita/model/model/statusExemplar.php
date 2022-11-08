<?php
    require_once("conexao.php");
    require_once("exemplar.php");


    Class StatusExemplar{
        private $idStatusExemplar;
        private $statusExemplar;
        private $idExemplar;

        /*GETTERS & SETTERS */

        //ID STATUS EXEMPLAR
        public function getIdStatusExemplar(){
            return $this->idStatusExemplar;
        }
        public function setIdStatusExemplar($idStatusExemplar){
            $this->idStatusExemplar = $idStatusExemplar;
        }

        //STATUS EXEMPLAR
        public function getStatusExemplar(){
            return $this->statusExemplar;
        }
        public function setStatusExemplar($statusExemplar){
            $this->statusExemplar = $statusExemplar;
        }

        //ID Exemplar
        public function getIdExemplar(){
            return $this->idExemplar;
        }
        public function setIdExemplar($idExemplar){
            $this->idExemplar = $idExemplar;
        }

        public function cadastrar($StatusExemplar){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("INSERT INTO tbStatusExemplar(statusExemplar, idExemplar) 
            VALUES(?, (SELECT max(idExemplar) as lastId FROM tbExemplar))");

            $stmt->bindValue(1, 1);
            
            $stmt->execute();
        }  
    }
?>