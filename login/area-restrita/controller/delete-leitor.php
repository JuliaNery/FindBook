<?php
     require_once("../model/leitor.php");

     session_start();
  
     $Leitor = new Leitor();

     $Leitor->setIdLeitor($_SESSION['idLeitor']);
    
     $Leitor->delete($Leitor);

    unset($_SESSION['senhaLeitor']);
    unset($_SESSION['emailLeitor']);
    unset($_SESSION['idLeitor']);


    session_destroy();
    
     header('Location: ../../../../index.php');
?>