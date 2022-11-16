<?php
    header("Location: ../view/biblioteca/cadastrarLivro.php");
    require_once("../model/livro.php");
    require_once("../model/genero.php");
    require_once("../model/autor.php");
    require_once("../model/editora.php");

    $nomeImagem = $_FILES['capa'];
    $dir = "image/livro/";
    // Pega a extensão do arquivo enviado pelo Flash e grava na variável "$ext"
    preg_match("/\.(png|jpg|jpeg){1}$/i", $nomeImagem["name"], $ext);
    // Gera o nome único para a imagem
    $imagem_nome = uniqid(time()). "." . $ext[1];
    $imagem_dir = $dir . $imagem_nome;
    // Envia o arquivo para a pasta de destino
    move_uploaded_file($nomeImagem["tmp_name"], '../../../'.$imagem_dir);
    echo($imagem_dir);


    $Livro = new Livro();
    $Autor = new Autor();
    $Editora = new Editora();
    $Genero = new Genero();


    $Livro->setNomelivro($_POST['txtNomeLivro']);
    $Livro->setDtLancamento($_POST['dtLancamento']);
    $Livro->setSinopselivro($_POST['txtSinopseLivro']);
    $Livro->setCapalivro($imagem_dir);
    $Livro->setFaixaEtaria($_POST['txtFaixaEtaria']);


    $Autor->setIdAutor($_POST['autor']);
    $Livro->setAutor($Autor);

    $Editora->setIdEditora($_POST['editora']);
    $Livro->setEditora($Editora);

    $Genero->setIdGenero($_POST['genero']);
    $Livro->setGenero($Genero);


    $Livro->cadastrar($Livro);

?>