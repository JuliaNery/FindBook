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
        public function getBiblioteca(){
            return $this->biblioteca;
        }
        public function setBiblioteca($biblioteca){
            $this->biblioteca = $biblioteca;
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
        
            $querySelect = $conexao->prepare("SELECT numExemplar, idBiblioteca FROM tbExemplar where numExemplar = ? AND idBiblioteca = ?");
            $querySelect ->bindValue(1, $Exemplar->getNumExemplar());
            $querySelect ->bindValue(2, $Exemplar->getBiblioteca()->getIdBiblioteca());

            
            $querySelect->execute();
            
            if($querySelect->rowCount() == 0){
                $stmt = $conexao->prepare("INSERT INTO tbExemplar(numExemplar, idBiblioteca, idLivro) 
                VALUES(?, ?, ?)");
    
                $stmt->bindValue(1, $Exemplar->getNumExemplar());
                $stmt->bindValue(2, $Exemplar->getBiblioteca()->getIdBiblioteca());
                $stmt->bindValue(3, $Exemplar->getIdLivro()->getIdLivro());
                
                $stmt->execute();

                $result = 'Biblioteca Cadastrada com sucesso';
                $_SESSION['cadastroExemplar'] = $result;

                return $_SESSION['cadastroExemplar'];
            }else{
                $result = 'Biblioteca já cadastrado, tente novemente.';
                $_SESSION['cadastroExemplar'] = $result;
                
                return $_SESSION['cadastroExemplar'];
            } 
        }

        public function listar(){
            $conexao = Conexao::conectar();
           
             $stmt = $conexao->prepare("SELECT * FROM vwExemplar where nomeBiblioteca = ? order by nomeLivro");
             $stmt ->bindValue(1, $_SESSION['nomeBiblioteca']);

 
             $stmt->execute();
    
           if($stmt->rowCount() > 0){ 
               $lista = $stmt->fetchAll();
               return $lista;
            }

        }
        public function ultimosAdic(){
            $conexao = Conexao::conectar();
    
                $stmt = $conexao->prepare("SELECT * from vwLivroBiblioteca 
                    where idExemplar > (SELECT MAX(idExemplar) - ?  FROM tbexemplar)  AND idBiblioteca = ? order by idExemplar desc");
                    $stmt ->bindValue(1, $_SESSION['contador']);
                    $stmt ->bindValue(2, $_SESSION['idBiblioteca']);
    
                    $stmt->execute();

                $lista = $stmt->fetchAll();
                return $lista;
          
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