<?php
    require_once("conexao.php");
    require_once("livro.php");
    require_once("biblioteca.php");

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
        private $biblioteca;
        private $livro;

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

        //livro for serch
        public function getLivro(){
            return $this->livro;
        }
        public function setLivro($livro){
            $this->Livro = $livro;
        }

        //ID Editora
        public function getBiblioteca(){
            return $this->biblioteca;
        }
        public function setBiblioteca($biblioteca){
            $this->biblioteca = $biblioteca;
        }

        //FUNCTION DE CADASTRAR
        public function cadastrar($Leitor){
            $conexao = Conexao::conectar();

            $querySelect = $conexao->prepare("SELECT emailLeitor FROM tbleitor where emailLeitor = ?");
            $querySelect ->bindValue(1, $Leitor->getEmailLeitor());
            
            $querySelect->execute();
            
            if($querySelect->rowCount() == 0){
                $stmt = $conexao->prepare("CALL spInsertLeitor(?, ?, ?)");

                $stmt->bindValue(1, $Leitor->getNomeLeitor());
                $stmt->bindValue(2, $Leitor->getEmailLeitor());
                $stmt->bindValue(3, $Leitor->getSenhaLeitor());
                
                $stmt->execute();

                session_start();
                $result = 'Usuario Cadastrado com sucesso';
                $_SESSION['cadastro'] = $result;

                return $_SESSION['cadastro'];
            }else{
                session_start();
                $result = 'Email já cadastrado, tente novemente.';
                $_SESSION['cadastro'] = $result;
                
                return $_SESSION['cadastro'];
            }
        }

        public function login($emailLeitor, $senhaLeitor){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("SELECT * FROM tbLeitor WHERE  senhaLeitor = ? AND  emailLeitor = ? or loginLeitor = ?  ");
            $stmt ->bindValue(1, $senhaLeitor);
            $stmt ->bindValue(2, $emailLeitor);
            $stmt ->bindValue(3, $emailLeitor);

            $stmt->execute();

            if($stmt->rowCount() > 0){
                $dado = $stmt->fetch();

                $_SESSION['idLeitor'] = $dado['idLeitor'];
                $_SESSION['nomeLeitor'] = $dado['nomeLeitor'];
                $_SESSION['emailLeitor'] = $dado['emailLeitor'];
                $_SESSION['senhaLeitor'] = $dado['senhaLeitor'];
                $_SESSION['dtNascLeitor'] = $dado['dtNascLeitor'];
                $_SESSION['generoLeitor'] = $dado['generoLeitor'];
                $_SESSION['fotoLeitor'] = $dado['fotoLeitor'];
                $_SESSION['cpfLeitor'] = $dado['cpfLeitor'];
                $_SESSION['rgLeitor'] = $dado['rgLeitor'];
                $_SESSION['loginLeitor'] = $dado['loginLeitor'];

                return true;
            }else{
                return false;
            }
        }

        public function update($Leitor){
            $conexao = Conexao::conectar();
            
                $stmt = $conexao->prepare("UPDATE tbLeitor  
                set nomeLeitor = ?, loginLeitor = ?, emailLeitor =  ?, cpfLeitor = ?, rgLeitor = ?, dtNascLeitor = ?, generoLeitor = ?
                where idLeitor = ?");

                $stmt->bindValue(1, $Leitor->getNomeLeitor());
                $stmt->bindValue(2, $Leitor->getLoginLeitor());
                $stmt->bindValue(3, $Leitor->getEmailLeitor());
                $stmt->bindValue(4, $Leitor->getCpfLeitor());
                $stmt->bindValue(5, $Leitor->getRgLeitor());
                $stmt->bindValue(6, $Leitor->getDtNascLeitor());
                $stmt->bindValue(7, $Leitor->getGeneroLeitor());
                $stmt->bindValue(8, $Leitor->getidLeitor());

                $stmt->execute();

                $_SESSION['nomeLeitor'] = $Leitor->getNomeLeitor();
                $_SESSION['emailLeitor'] = $Leitor->getEmailLeitor();
                $_SESSION['dtNascLeitor'] = $Leitor->getDtNascLeitor();
                $_SESSION['generoLeitor'] = $Leitor->getGeneroLeitor();
                $_SESSION['cpfLeitor'] =  $Leitor->getCpfLeitor();
                $_SESSION['rgLeitor'] = $Leitor->getRgLeitor();
                $_SESSION['loginLeitor'] = $Leitor->getLoginLeitor();

        }
        
        public function updateFoto($Leitor){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("UPDATE tbLeitor
            set fotoLeitor = ?
                where idLeitor = ?");

            $stmt->bindValue(1, $Leitor->getFotoLeitor());
            $stmt->bindValue(2, $Leitor->getIdLeitor());
            $_SESSION['fotoLeitor'] = $Leitor->getFotoLeitor();

            $stmt->execute();
        }

        public function updateSenha($Leitor){
            $conexao = Conexao::conectar();
            
                $stmt = $conexao->prepare("UPDATE tbLeitor SET senhaLeitor = ? where idLeitor = ?");
                $stmt ->bindValue(1, $Leitor->getSenhaLeitor()); 
                $stmt ->bindValue(2, $Leitor->getIdLeitor()); 
    
                $stmt->execute();
           
        }
        public function contador(){
            $conexao = Conexao::conectar();
            $stmt = $conexao->prepare("SELECT COUNT(idLeitor) as qtd FROM tbLeitor");

            $stmt->execute();

            $num = $stmt->fetchAll();
            return $num;
        }


        public function listar(){
                $conexao = Conexao::conectar();
                
       
                $querySelect = "SELECT idLeitor, fotoLeitor, nomeLeitor, emailLeitor, cpfLeitor, rgLeitor,  DATE_FORMAT(dtNascLeitor,'%d/%m/%Y') as dtNascLeitor , generoLeitor, loginLeitor
                 FROM tbleitor";
                $resultado = $conexao->query($querySelect);
                $lista = $resultado->fetchAll();
                return $lista;
        } 


        public function delete($Leitor){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("DELETE FROM tbLeitor where idLeitor = ?");
            $stmt ->bindValue(1, $Leitor->getIdLeitor()); 

            $stmt->execute();
        }
    }   
?>