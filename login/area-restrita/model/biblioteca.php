<?php
    require_once("conexao.php");

    class Biblioteca{
        private $idBiblioteca;
        private $nomeBiblioteca;
        private $ruaBiblioteca;
        private $numBiblioteca; //numRua
        private $compBiblioteca;
        private $cepBiblioteca;
        private $bairroBiblioteca;
        private $cidadeBiblioteca;
        private $horarioAbertura;
        private $horarioFechamento;
        private $emailBiblioteca;
        private $senhaBiblioteca;
        private $fotoBiblioteca;
        private $telBiblioteca;



        /*GETTERS & SETTERS */

        //ID BIBLIOTECCA
        public function getIdBiblioteca(){
            return $this->idBiblioteca;
        }
        public function setIdBiblioteca($idBiblioteca){
            $this->idBiblioteca = $idBiblioteca;
        }

         //NOME BIBLIOTECCA
         public function getNomeBiblioteca(){
            return $this->nomeBiblioteca;
        }
        public function setNomeBiblioteca($nomeBiblioteca){
            $this->nomeBiblioteca = $nomeBiblioteca;
        }

         //RUA BIBLIOTECCA
         public function getRuaBiblioteca(){
            return $this->ruaBiblioteca;
        }
        public function setRuaBiblioteca($ruaBiblioteca){
            $this->ruaBiblioteca = $ruaBiblioteca;
        }

         //NUM RUA BIBLIOTECCA
         public function getNumBiblioteca(){
            return $this->numBiblioteca;
        }
        public function setNumBiblioteca($numBiblioteca){
            $this->numBiblioteca = $numBiblioteca;
        }

         //COMPLEMENTO RUA BIBLIOTECCA
         public function getCompBiblioteca(){
            return $this->compBiblioteca;
        } 
        public function setCompBiblioteca($compBiblioteca){
            $this->compBiblioteca = $compBiblioteca;
        }

         //CEP BIBLIOTECCA
         public function getCepBiblioteca(){
            return $this->cepBiblioteca;
        }
        public function setCepBiblioteca($cepBiblioteca){
            $this->cepBiblioteca = $cepBiblioteca;
        }

         //BAIRRO BIBLIOTECCA
         public function getBairroBiblioteca(){
            return $this->bairroBiblioteca;
        }
        public function setBairroBiblioteca($bairroBiblioteca){
            $this->bairroBiblioteca = $bairroBiblioteca;
        }

        //CIDADE BIBLIOTECCA
        public function getCidadeBiblioteca(){
            return $this->cidadeBiblioteca;
        }
        public function setCidadeBiblioteca($cidadeBiblioteca){
            $this->cidadeBiblioteca = $cidadeBiblioteca;
        }

         //HorarioAbertura
         public function getHorarioAbertura(){
            return $this->horarioAbertura;
        }
        public function setHorarioAbertura($horarioAbertura){
            $this->horarioAbertura = $horarioAbertura;
        }

        //HorarioFechamento
        public function getHorarioFechamento(){
            return $this->horarioFechamento;
        }
        public function setHorarioFechamento($horarioFechamento){
            $this->horarioFechamento = $horarioFechamento;
        }

         //EMAIL BIBLIOTECCA
         public function getEmailBiblioteca(){
            return $this->emailBiblioteca;
        }
        public function setEmailBiblioteca($emailBiblioteca){
            $this->emailBiblioteca = $emailBiblioteca;
        }

        //SENHA BIBLIOTECCA
         public function getSenhaBiblioteca(){
            return $this->senhaBiblioteca;
        }
        public function setSenhaBiblioteca($senhaBiblioteca){
            $this->senhaBiblioteca = $senhaBiblioteca;
        }

        //foto BIBLIOTECCA
        public function getFotoBiblioteca(){
            return $this->fotoBiblioteca;
        }
        public function setFotoBiblioteca($fotoBiblioteca){
            $this->fotoBiblioteca = $fotoBiblioteca;
        }

        //tel BIBLIOTECCA
        public function getTelBiblioteca(){
            return $this->telBiblioteca;
        }
        public function setTelBiblioteca($telBiblioteca){
            $this->telBiblioteca = $telBiblioteca;
        }

       
        //Function cadastrar
        public function cadastrar($Biblioteca){

            $conexao = Conexao::conectar();

            $querySelect = $conexao->prepare("SELECT nomeBiblioteca FROM tbBiblioteca where nomeBiblioteca = ?");
            $querySelect ->bindValue(1, $Biblioteca->getNomeBiblioteca());
            
            $querySelect->execute();
            
            if($querySelect->rowCount() == 0){
                $stmt = $conexao->prepare("INSERT INTO tbBiblioteca (nomeBiblioteca, 
                ruaBiblioteca, numBiblioteca, compBiblioteca, cepBiblioteca, bairroBiblioteca, cidadeBiblioteca, emailBiblioteca, senhaBiblioteca) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                
                $stmt->bindValue(1, $Biblioteca->getNomeBiblioteca());
                
                $stmt->bindValue(2, $Biblioteca->getRuaBiblioteca());
                
                $stmt->bindValue(3, $Biblioteca->getNumBiblioteca());
                
                $stmt->bindValue(4, $Biblioteca->getCompBiblioteca());
                
                $stmt->bindValue(5, $Biblioteca->getCepBiblioteca());
                
                $stmt->bindValue(6, $Biblioteca->getBairroBiblioteca());

                $stmt->bindValue(7, $Biblioteca->getCidadeBiblioteca());

                $stmt->bindValue(8, $Biblioteca->getEmailBiblioteca());

                $stmt->bindValue(9, $Biblioteca->getSenhaBiblioteca()); 
                
                $stmt->execute();

                session_start();
                $result = 'Biblioteca Cadastrada com sucesso';
                $_SESSION['cadastro'] = $result;

                return $_SESSION['cadastro'];
            }else{
                session_start();
                $result = 'Biblioteca já cadastrado, tente novemente.';
                $_SESSION['cadastro'] = $result;
                
                return $_SESSION['cadastro'];
            }
            
            
        } 

        
        public function login($emailBiblioteca, $senhaBiblioteca){
            $conexao = Conexao::conectar();
            
            $stmt = $conexao->prepare("SELECT * FROM tbBiblioteca WHERE emailBiblioteca = ? AND senhaBiblioteca = ?");
            $stmt ->bindValue(1, $emailBiblioteca);
            $stmt ->bindValue(2, $senhaBiblioteca);
            
            $stmt->execute();
            
            if($stmt->rowCount() > 0){
                $dado = $stmt->fetch();

                $_SESSION['idBiblioteca'] = $dado['idBiblioteca'];
                $_SESSION['nomeBiblioteca'] = $dado['nomeBiblioteca'];
                $_SESSION['horarioAbertura'] = $dado['horarioAbertura'];
                $_SESSION['horarioFechamento'] = $dado['horarioFechamento'];
                $_SESSION['emailBiblioteca'] = $dado['emailBiblioteca'];
                $_SESSION['senhaBiblioteca'] = $dado['senhaBiblioteca'];
                $_SESSION['ruaBiblioteca'] = $dado['ruaBiblioteca'];
                $_SESSION['numBiblioteca'] = $dado['numBiblioteca'];
                $_SESSION['bairroBiblioteca'] = $dado['bairroBiblioteca'];
                $_SESSION['cidadeBiblioteca'] = $dado['cidadeBiblioteca'];
                $_SESSION['cepBiblioteca'] = $dado['cepBiblioteca'];
                $_SESSION['fotoBiblioteca'] = $dado['fotoBiblioteca'];
                $_SESSION['telBiblioteca'] = $dado['telBiblioteca']; 
                $_SESSION['contador'] = 0;
                
                return true;
            }else{
                return false;
            }
            
        }

        public function update($Biblioteca){
            $conexao = Conexao::conectar();
            
                $stmt = $conexao->prepare("UPDATE tbBiblioteca 
                    set nomeBiblioteca = ?, horarioAbertura = ?, horarioFechamento = ?, emailBiblioteca = ?, telBiblioteca = ?
                        where idBiblioteca = ?");

                $stmt->bindValue(1, $Biblioteca->getNomeBiblioteca());
                $stmt->bindValue(2, $Biblioteca->getHorarioAbertura());
                $stmt->bindValue(3, $Biblioteca->getHorarioFechamento());
                $stmt->bindValue(4, $Biblioteca->getEmailBiblioteca());
                $stmt->bindValue(5, $Biblioteca->getTelBiblioteca());
                $stmt->bindValue(6, $Biblioteca->getIdBiblioteca());

                $stmt->execute();

                $_SESSION['nomeBiblioteca'] = $Biblioteca->getNomeBiblioteca();
                $_SESSION['horarioAbertura'] = $Biblioteca->getHorarioAbertura();
                $_SESSION['horarioFechamento'] = $Biblioteca->getHorarioFechamento();
                $_SESSION['emailBiblioteca'] = $Biblioteca->getEmailBiblioteca();
                $_SESSION['telBiblioteca'] = $Biblioteca->getTelBiblioteca();

        }

        public function updateFoto($Biblioteca){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("UPDATE tbBiblioteca 
            set fotoBiblioteca = ?
                where idBiblioteca = ?");

            $stmt->bindValue(1, $Biblioteca->getFotoBiblioteca());
            $stmt->bindValue(2, $Biblioteca->getIdBiblioteca());
            $_SESSION['fotoBiblioteca'] = $Biblioteca->getFotoBiblioteca();

            $stmt->execute();
        }
        
        public function contador(){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("SELECT COUNT(idBiblioteca) as qtd FROM tbBiblioteca");

            $stmt->execute();

            $num = $stmt->fetchAll();
            return $num;
        }
        public function listar(){
            $conexao = Conexao::conectar();
            
            $querySelect = "SELECT idBiblioteca, fotoBiblioteca, nomeBiblioteca, emailBiblioteca, cepBiblioteca, ruaBiblioteca, numBiblioteca, bairroBiblioteca, cidadeBiblioteca
             FROM tbBiblioteca";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;
        
        }
    }
?>