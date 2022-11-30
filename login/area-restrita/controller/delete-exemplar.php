<?php
     require_once("../model/exemplar.php");
     require_once("../model/statusExemplar.php");


     session_start();
  
     $Exemplar = new Exemplar();
     $StatusExemplar = new StatusExemplar();

     $Exemplar->setIdExemplar($_POST['id']);
     $StatusExemplar->setExemplar($Exemplar);
     
    
     $Exemplar->delete($Exemplar);
     $StatusExemplar->delete($StatusExemplar);

    
     header('Location: ../view/biblioteca/exemplares.php');
?>