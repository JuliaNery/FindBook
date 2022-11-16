<?php
    header("Location: ../view/biblioteca/cadastrarLivro.php");
    require_once("../model/editora.php");

    $Editora = new Editora();
    $Editora->setNomeEditora( $_POST['txtNomeEditora'] = strtolower($_POST['txtNomeEditora']));

    $Editora->cadastrar($Editora);


?>