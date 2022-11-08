<?php
    require_once("conexao.php");

    class Alugados{
        private $idLivroAlugado;
        private $dataAluguel;
        private $dataDevolucao;
        private $idExemplar;
        private $idLeitor;

        /*Getters & Setters */

        //ID LivroAlugado
        public function getIdLivroAlugado(){
            return $this->idLivroAlugado;
        }
        public function setIdLivroAlugado($idLivroAlugado){
            $this->idLivroAlugado = $idLivroAlugado;
        }

        //DATA ALUGUEL
        public function getDataAluguel(){
            return $this->dataAluguel;
        }
        public function setDataAluguel($dataAluguel){
            $this->dataAluguel = $dataAluguel;
        }

        //DATA DEVOLUÇÃO
        public function getDataDevolucao(){
            return $this->dataDevolucao;
        }
        public function setDataDevolucao($dataDevolucao){
            $this->dataDevolucao = $dataDevolucao;
        }

        //ID Leitor
        public function getIdLeitor(){
            return $this->idLeitor;
        }
        public function setIdLeitor($idLeitor){
            $this->idLeitor = $idLeitor;
        }

        //ID Exemplar
        public function getIdExemplar(){
            return $this->idExemplar;
        }
        public function setIdExemplar($idExemplar){
            $this->idExemplar = $idExemplar;
        }
    }
?>