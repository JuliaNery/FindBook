<?php
    require_once("../model/leitor.php");

    session_start();

    $Leitor = new Leitor(); 


    $Leitor->setNomeLeitor($_POST['nome']);
    $Leitor->setLoginLeitor($_POST['nick']);
    $Leitor->setEmailLeitor($_POST['email']);
    $Leitor->setCpfLeitor($_POST['cpf']);
    $Leitor->setRgLeitor($_POST['rg']);
    $Leitor->setDtNascLeitor($_POST['dtNasc']);
    $Leitor->setGeneroLeitor($_POST['genero']);
    $Leitor->setGeneroLeitor('1');


    $Leitor->update($Leitor);

    header('Location: ../view/index-leitor.php');
?>