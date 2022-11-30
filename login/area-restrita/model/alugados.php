<?php
    require_once("conexao.php");
    require_once("exemplar.php");


    class Alugados{
        private $idLivroAlugado;
        private $dataAluguel;
        private $dataDevolucao;
        private $idExemplar;
/*         private $idLeitor;
 */
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
      /*   public function getIdLeitor(){
            return $this->idLeitor;
        }
        public function setIdLeitor($idLeitor){
            $this->idLeitor = $idLeitor;
        } */

        //ID Exemplar
        public function getIdExemplar(){
            return $this->idExemplar;
        }
        public function setIdExemplar($idExemplar){
            $this->idExemplar = $idExemplar;
        }

        public function alugar($Alugados){
            $conexao = Conexao::conectar();

            try{
                $stmt = $conexao->prepare("INSERT INTO tbLivroAlugado (idExemplar, dataAluguel, dataDevolucao) 
                VALUES(?, ?, ?)");
    
                $stmt ->bindValue(1, $Alugados->getIdExemplar()->getIdExemplar()); 
                $stmt ->bindValue(2, $Alugados->getDataAluguel()); 
                $stmt ->bindValue(3, $Alugados->getDataDevolucao()); 
    
                $stmt->execute();
            } catch (Exception $e) {
                echo $e->getMessage();
            }

        }
    }
?>