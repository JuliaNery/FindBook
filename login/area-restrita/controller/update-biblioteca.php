<?php
    require_once("../model/biblioteca.php");
    require_once("../model/telBiblioteca.php");

    session_start();

    $Biblioteca = new Biblioteca(); 
    $TelBiblioteca = new TelBiblioteca(); 


    $Biblioteca->setNomeBiblioteca($_POST['nome']);
    $Biblioteca->setEmailBiblioteca($_POST['email']);
    $Biblioteca->setHorarioAbertura($_POST['abertura']);
    $Biblioteca->setHorarioFechamento($_POST['fechamento']);

    $Biblioteca->update($Biblioteca);

    $TelBiblioteca->setNumTelBiblioteca($_POST['telefone']);
    $TelBiblioteca->setNumCelBiblioteca($_POST['celular']);

    $Biblioteca->setIdBiblioteca($_SESSION['idBiblioteca']);
    $TelBiblioteca->setidBiblioteca($Biblioteca);

    $TelBiblioteca->cadastrar($TelBiblioteca);

    header('Location: ../view/biblioteca/perfil.php');
?>