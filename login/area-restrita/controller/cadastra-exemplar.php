<?php
    require_once("../model/exemplar.php");
    require_once("../model/biblioteca.php");
    require_once("../model/livro.php");

    session_start();


    $Biblioteca = new Biblioteca(); 
    $StatusExemplar = new StatusExemplar(); 


    $Exemplar->setNumExemplar($_POST['txtNumExemplar']);

    $Biblioteca->setIdBiblioteca($_SESSION['idBiblioteca']);
    $Exemplar->setidBiblioteca($Biblioteca);

    $Livro->setIdLivro($_POST['livro']);
    $Exemplar->setidLivro($Livro);

    $Exemplar->cadastrar($Exemplar);

    $StatusExemplar->cadastrar($StatusExemplar);

    header('Location: ../view/biblioteca/exemplares.php');

?>