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

       
        //Function cadastrar
        public function cadastrar($Biblioteca){

            $conexao = Conexao::conectar();
            
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
        }

        public function update($Biblioteca){
            $conexao = Conexao::conectar();
            
            $stmt = $conexao->prepare("UPDATE tbBiblioteca (nomeBiblioteca, horarioAbertura, horarioFechamento, emailBiblioteca) 
            VALUES (?, ?, ?, ?)");

            $stmt->bindValue(1, $Biblioteca->getNomeBiblioteca());
            $stmt->bindValue(2, $Biblioteca->getHorarioAbertura());
            $stmt->bindValue(3, $Biblioteca->getHorarioFechamento());
            $stmt->bindValue(4, $Biblioteca->getEmailBiblioteca());

            $stmt->execute();
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
               
                return true;
            }else{
                return false;
            }

        }
    }
?>