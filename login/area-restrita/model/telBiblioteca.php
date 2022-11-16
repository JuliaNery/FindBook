<?php
    require_once("conexao.php");

    class TelBiblioteca{
        private $idTelBiblioteca;
        private $numTelBiblioteca;
        private $numCelBiblioteca;
        private $idBiblioteca;

        /*GETTERS & SETTERS */

        //ID TelBiblioteca
        public function getIdTelBiblioteca(){
            return $this->idTelBiblioteca;
        }
        public function setIdTelBiblioteca($idTelBiblioteca){
            $this->idTelBiblioteca = $idTelBiblioteca;
        }

        //Telefone Biblioteca
        public function getNumTelBiblioteca(){
            return $this->numTelBiblioteca;
        }
        public function setNumTelBiblioteca($numTelBiblioteca){
            $this->NumTelBiblioteca = $numTelBiblioteca;
        }

        //Celular Biblioteca
        public function getNumCelBiblioteca(){
            return $this->numCelBiblioteca;
        }
        public function setNumCelBiblioteca($numCelBiblioteca){
            $this->numCelBiblioteca = $numCelBiblioteca;
        }
        //ID BIBLIOTECCA
        public function getBiblioteca(){
            return $this->biblioteca;
        }
        public function setBiblioteca($biblioteca){
            $this->biblioteca = $biblioteca;
        }

        public function cadastrar($TelBiblioteca){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("INSERT INTO tbTelBiblioteca (numTelBiblioteca, idBiblioteca) 
            VALUES (?, ?)");

            $stmt->bindValue(1, $TelBiblioteca->getNumTelBiblioteca());
            $stmt->bindValue(2, $TelBiblioteca->getBiblioteca()->getIdBiblioteca());

            $stmt->execute();
        }
    }
?>