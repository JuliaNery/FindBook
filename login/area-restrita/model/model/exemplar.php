<?php
    require_once("conexao.php");
    require_once("livro.php");
    require_once("biblioteca.php");
    require_once("statusExemplar.php");


    class Exemplar{
        private $idExemplar;
        private $numExemplar;
        private $idLivro;
        private $idBiblioteca;

        /*GETTERS & SETTERS */

        //ID Exemplar
        public function getIdExemplar(){
            return $this->idExemplar;
        }
        public function setIdExemplar($idExemplar){
            $this->idExemplar = $idExemplar;
        }

        //Numero Exemplar
        public function getNumExemplar(){
            return $this->numExemplar;
        }
        public function setNumExemplar($numExemplar){
            $this->numExemplar = $numExemplar;
        }

        //ID Biblioteca
        public function getIdBiblioteca(){
            return $this->idBiblioteca;
        }
        public function setIdBiblioteca($idBiblioteca){
            $this->idBiblioteca = $idBiblioteca;
        }

        //ID Livro
        public function getIdLivro(){
            return $this->idLivro;
        }
        public function setIdLivro($idLivro){
            $this->idLivro = $idLivro;
        }

        public function cadastrar($Exemplar){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("INSERT INTO tbExemplar(numExemplar, idBiblioteca, idLivro) 
            VALUES(?, ?, ?)");

            $stmt->bindValue(1, $Exemplar->getNumExemplar());
            $stmt->bindValue(2, $Exemplar->getIdBiblioteca()->getIdBiblioteca());
            $stmt->bindValue(3, $Exemplar->getIdLivro()->getIdLivro());
            
            $stmt->execute();
        }

        public function listar(){
            $conexao = Conexao::conectar();
           
             $stmt = $conexao->prepare("SELECT * FROM vwExemplar where nomeBiblioteca = ?");
             $stmt ->bindValue(1, $_SESSION['nomeBiblioteca']);

 
             $stmt->execute();
    
           if($stmt->rowCount() > 0){ 
               $lista = $stmt->fetchAll();
               return $lista;
            }

        }
        public function contador(){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("SELECT COUNT(idExemplar) as qtd FROM tbExemplar where idBiblioteca = ?");
            $stmt ->bindValue(1, $_SESSION['idBiblioteca']);

            $stmt->execute();

            $num = $stmt->fetchAll();
            return $num;
        }
        public function contadorAdmin(){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("SELECT COUNT(idExemplar) as qtd FROM tbExemplar ");
            $stmt->execute();

            $num = $stmt->fetchAll();
            return $num;
        }
    }
?>