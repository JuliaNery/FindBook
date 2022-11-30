<?php
    require_once("../model/biblioteca.php");

    session_start();

   

    $Biblioteca = new Biblioteca(); 

    $Biblioteca->setNomeBiblioteca($_POST['nome']);
    $Biblioteca->setEmailBiblioteca($_POST['email']);
    $Biblioteca->setHorarioAbertura($_POST['abertura']);
    $Biblioteca->setHorarioFechamento($_POST['fechamento']);
    $Biblioteca->setTelBiblioteca($_POST['telefone']);
    $Biblioteca->setIdBiblioteca($_SESSION['idBiblioteca']);

    $Biblioteca->update($Biblioteca);

    header('Location: ../view/biblioteca/perfil.php');
?>