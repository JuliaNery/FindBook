<?php
   require_once("../model/leitor.php");
   require_once("../model/conexao.php");
   session_start();


   
   
   $antiga = $_POST['senhaAntiga'];
   
   $nova = $_POST['senhaNova'];
   
   $confirmacao = $_POST['confirmacao'];
   
   echo $antiga." | ".$nova." | ".$confirmacao."|".$_SESSION['nomeLeitor'];
   $senha = $_SESSION['senhaLeitor'];
   if($antiga == $senha){
      if($nova == $confirmacao){
         $Leitor = new Leitor();

         $Leitor->setSenhaLeitor($nova);
         $Leitor->setIdLeitor($_SESSION['idLeitor']);

         $Leitor->updateSenha($Leitor);

         $result = "Senha alterada com sucesso!";
         $_SESSION['alteraSenha'] = $result;

         echo 'foi caraio senha nova'.$nova;

      }else{
         $result = "Confirmação incorreta, verifique os dados e tente novamente.";
                $_SESSION['alteraSenha'] = $result;
                echo 'sem chance veinho verifica a senha nova aí';

      }
   }else{
      $result = "Senha incorreta, verifique os dados e tente novamente.";
                $_SESSION['alteraSenha'] = $result;
                echo 'errou a senha antiga pai vamo tenta dnv';
   }
   header('Location: ../view/leitor/perfilLeitor.php');

?>