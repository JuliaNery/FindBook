<?php
    header("Location: ../view/biblioteca/cadastraLivro.php");
    require_once("../model/livro.php");
    require_once("../model/genero.php");
    require_once("../model/autor.php");
    require_once("../model/editora.php");

    $Livro = new Livro();
    $Autor = new Autor();
    $Editora = new Editora();
    $Genero = new Genero();

    $Livro->setNomelivro($_POST['txtNomeLivro']);
    $Livro->setDtLancamento($_POST['dtLancamento']);
    $Livro->setSinopselivro($_POST['txtSinopseLivro']);
    $Livro->setCapalivro($_POST['imgCapaLivro']);
    $Livro->setFaixaEtaria($_POST['txtFaixaEtaria']);


    $Autor->setIdAutor($_POST['autor']);
    $Livro->setAutor($Autor);

    $Editora->setIdEditora($_POST['editora']);
    $Livro->setEditora($Editora);

    $Genero->setIdGenero($_POST['genero']);
    $Livro->setGenero($Genero);


    $Livro->cadastrar($Livro);

?>