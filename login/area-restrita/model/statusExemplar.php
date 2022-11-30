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
        public function getExemplar(){
            return $this->exemplar;
        }
        public function setExemplar($exemplar){
            $this->exemplar = $exemplar;
        }

        public function cadastrar(){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("INSERT INTO tbStatusExemplar(statusExemplar, idExemplar) 
            VALUES(?, (SELECT max(idExemplar) as lastId FROM tbExemplar))");

            $stmt->bindValue(1, 1);
            
            $stmt->execute();
        }  

        public function update($StatusExemplar){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("UPDATE tbStatusExemplar
            SET statusExemplar = ?
            WHERE idExemplar = ? ");

            $stmt->bindValue(1, $StatusExemplar->getStatusExemplar());
            $stmt->bindValue(2, $StatusExemplar->getExemplar()->getIdExemplar());

            
            $stmt->execute();
        } 
        
        public function delete($StatusExemplar){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("DELETE FROM tbStatusExemplar where idExemplar = ?");
            $stmt ->bindValue(1, $StatusExemplar->getExemplar()->getIdExemplar()); 

            $stmt->execute();
        }

        public function status(){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("SELECT * FROM tbStatusExemplar");

            $result = $stmt->fetchAll();

            if($result['statusExemplar'] = 1){
                $result['statusExemplar'] = 'Disponivel';

                return $result;
            }else{
                $result['statusExemplar'] = 'Indisponivel';
                return $result;
            }
        }
    }
?>