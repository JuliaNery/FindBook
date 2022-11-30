<?php
    require_once("../model/statusExemplar.php");
    require_once("../model/exemplar.php");
    require_once("../model/alugados.php");
   
    $Exemplar = new Exemplar(); 
    $Alugados = new Alugados(); 
    $StatusExemplar = new StatusExemplar(); 
    
    $Exemplar->setIdExemplar($_POST['id']);

    $Alugados->setDataAluguel($_POST['dataAlugado']);
    $Alugados->setDataDevolucao($_POST['dataDevolucao']);
    $Alugados->setIdExemplar($Exemplar);

    $StatusExemplar->setExemplar($Exemplar);
    $StatusExemplar->setStatusExemplar($_POST['os']);

    $StatusExemplar->update($StatusExemplar);
    $Alugados->alugar($Alugados);

    header('Location: ../view/biblioteca/exemplares.php');
?>