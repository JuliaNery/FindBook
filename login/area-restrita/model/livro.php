<?php
    require_once("conexao.php");
    require_once("genero.php");
    require_once("autor.php");
    require_once("editora.php");



    class Livro{
        private $idLivro;
        private $nomeLivro;
        private $dtLancamento;
        private $sinopseLivro;
        private $capaLivro;
        private $autor;
        private $editora;
        private $genero;
        private $faixaEtaria;
    
        /*GETTERS & SETTERS */

        //ID LIVRO
        public function getIdLivro(){
            return $this->idLivro;
        }
        public function setIdlivro($idLivro){
            $this->idLivro = $idLivro;
        }

        //NOME LIVRO
        public function getNomeLivro(){
            return $this->nomeLivro;
        }
        public function setNomelivro($nomeLivro){
            $this->nomeLivro = $nomeLivro;
        }

        //NOME LIVRO
        public function getSinopseLivro(){
            return $this->sinopseLivro;
        }
        public function setSinopselivro($sinopseLivro){
            $this->sinopseLivro = $sinopseLivro;
        }

        //NOME LIVRO
        public function getCapaLivro(){
            return $this->capaLivro;
        }
        public function setCapalivro($capaLivro){
            $this->capaLivro = $capaLivro;
        }

        //dt lançamento LIVRO
        public function getDtLancamento(){
            return $this->dtLancamento;
        }
        public function setDtLancamento($dtLancamento){
            $this->dtLancamento = $dtLancamento;
        }

        //ID Autor
        public function getAutor(){
            return $this->autor;
        }
        public function setAutor($autor){
            $this->autor = $autor;
        }

        //ID Editora
        public function getEditora(){
            return $this->editora;
        }
        public function setEditora($editora){
            $this->editora = $editora;
        }

        //ID Genero
        public function getGenero(){
            return $this->genero;
        }
        public function setGenero($genero){
            $this->genero = $genero;
        }

        //ID FAIXA ETARIA
        public function getFaixaEtaria(){
            return $this->faixaEtaria;
        }
        public function setFaixaEtaria($faixaEtaria){
            $this->faixaEtaria = $faixaEtaria;
        }
        
        public function cadastrar($Livro){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("INSERT INTO tbLivro(nomeLivro, dtLancamento, sinopseLivro, capaLivro,faixaEtaria, idAutor, idEditora, idgenero) 
            VALUES(?, ?, ?, ?, ?, ?, ?,?)");

            $stmt->bindValue(1, $Livro->getNomeLivro());
            $stmt->bindValue(2, $Livro->getDtLancamento());
            $stmt->bindValue(3, $Livro->getSinopseLivro());
            $stmt->bindValue(4, $Livro->getCapaLivro());
            $stmt->bindValue(5, $Livro->getFaixaEtaria());
            $stmt->bindValue(6, $Livro->getAutor()->getIdAutor());
            $stmt->bindValue(7, $Livro->getEditora()->getIdEditora());
            $stmt->bindValue(8, $Livro->getGenero()->getIdGenero());
            
            $stmt->execute();
        }

        public function listar(){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT * FROM tbLivro";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;
        }

        public function contador(){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("SELECT COUNT(qtd) FROM vwContaLivro  WHERE idbiblioteca = ? Group by tbLivro.nomeLivro");
            $stmt ->bindValue(1, $_SESSION['idBiblioteca']);

            $stmt->execute();

            $num = $stmt->fetchAll();
            return $num;
        }

    }
?>