<?php
    header("Location: ../view/biblioteca/cadastrarLivro.php");
    require_once("../model/genero.php");

    $Genero = new Genero();
    $Genero->setNomeGenero(  $_POST['txtNomeGenero'] = strtolower($_POST['txtNomeGenero']));
    

    $Genero->cadastrar($Genero);


?>