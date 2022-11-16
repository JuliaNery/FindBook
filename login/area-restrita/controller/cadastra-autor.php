<?php
    header("Location: ../view/biblioteca/cadastrarLivro.php");
    require_once("../model/Autor.php");

    $Autor = new Autor();
    $Autor->setNomeAutor( $_POST['txtNomeAutor'] = strtolower($_POST['txtNomeAutor']));

    $Autor->cadastrar($Autor);


?>