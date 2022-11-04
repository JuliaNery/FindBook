<?php
    require_once("conexao.php");

    class Leitor{
        private $idLeitor;
        private $nomeLeitor;
        private $emailLeitor;
        private $cpfLeitor;
        private $rgLeitor;
        private $dtNascLeitor;
        private $generoLeitor;
        private $fotoLeitor;
        private $loginLeitor;
        private $senhaLeitor;

        //ID LEITOR
        public function getIdLeitor(){
            return $this->idLeitor;
        }
        public function setIdLeitor($idLeitor){
            $this->idLeitor = $idLeitor;
        }

        //Nome LEITOR
        public function getNomeLeitor(){
            return $this->nomeLeitor;
        }
        public function setNomeLeitor($nomeLeitor){
            $this->nomeLeitor = $nomeLeitor;
        }

        //EMAIL LEITOR
        public function getEmailLeitor(){
            return $this->emailLeitor;
        }
        public function setEmailLeitor($emailLeitor){
            $this->emailLeitor = $emailLeitor;
        }

        //CPF LEITOR
        public function getCpfLeitor(){
            return $this->cpfLeitor;
        }
        public function setCpfLeitor($cpfLeitor){
            $this->cpfLeitor = $cpfLeitor;
        }

        //RG LEITOR
        public function getRgLeitor(){
            return $this->rgLeitor;
        }
        public function setRgLeitor($rgLeitor){
            $this->rgLeitor = $rgLeitor;
        }

        //DATA NASCIMENTO LEITOR
        public function getDtNascLeitor(){
            return $this->dtNascLeitor;
        }
        public function setDtNascLeitor($dtNascLeitor){
            $this->dtNascLeitor = $dtNascLeitor;
        }

          //GENERO LEITOR
          public function getGeneroLeitor(){
            return $this->generoLeitor;
        }
        public function setGeneroLeitor($generoLeitor){
            $this->generoLeitor = $generoLeitor;
        }

        //FOTO LEITOR
        public function getFotoLeitor(){
            return $this->fotoLeitor;
        }
        public function setFotoLeitor($fotoLeitor){
            $this->fotoLeitor = $fotoLeitor;
        }
        //login LEITOR
        public function getLoginLeitor(){
            return $this->loginLeitor;
        }
        public function setLoginLeitor($loginLeitor){
            $this->loginLeitor = $loginLeitor;
        }
        //senha LEITOR
        public function getSenhaLeitor(){
            return $this->senhaLeitor;
        }
        public function setSenhaLeitor($senhaLeitor){
            $this->senhaLeitor = $senhaLeitor;
        }

        //FUNCTION DE CADASTRAR
        public function cadastrar($Leitor){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("INSERT INTO tbLeitor(nomeLeitor, EmailLeitor, senhaLeitor) 
            VALUES(?, ?, ?)");

            $stmt->bindValue(1, $Leitor->getNomeLeitor());
            $stmt->bindValue(2, $Leitor->getEmailLeitor());
            $stmt->bindValue(3, $Leitor->getSenhaLeitor());
            
            $stmt->execute();
        }

        public function login($emailLeitor, $senhaLeitor){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("SELECT * FROM tbLeitor WHERE emailLeitor = ? AND senhaLeitor = ?");
            $stmt ->bindValue(1, $emailLeitor);
            $stmt ->bindValue(2, $senhaLeitor);

            $stmt->execute();

            if($stmt->rowCount() > 0){
                $dado = $stmt->fetch();

                $_SESSION['idLeitor'] = $dado['idLeitor'];
                $_SESSION['nomeLeitor'] = $dado['nomeLeitor'];
                $_SESSION['emailLeitor'] = $dado['emailLeitor'];
                $_SESSION['senhaLeitor'] = $dado['senhaLeitor'];

                return true;
            }else{
                return false;
            }
        }
/*         public function valida(){
            if(!isset($_SESSION['idLeitor']) || !isset($_SESSION['emailLeitor']) || !isset($_SESSION['senhaLeitor']) || !isset($_SESSION['nomeLeitor'])){
                header("Location: ../../../index.php");
            }
        } */

        public function listar(){
                $conexao = Conexao::conectar();
                
                $querySelect = "SELECT idLeitor, fotoleitor, nomeLeitor, emailleito, cpfleitor, rgleitor, dtnascleitor, generoleitor, loginleitor
                 FROM tbleitor";
                $resultado = $conexao->query($querySelect);
                $lista = $resultado->fetchAll();
                return $lista;
        } 
    }   
?>