<?php
    require_once("../model/leitor.php");

    session_start();

   

    $Leitor = new Leitor(); 

    $nomeImagem = $_FILES['foto'];
    $dir = "image/leitor/";
    // Pega a extensão do arquivo enviado pelo Flash e grava na variável "$ext"
    preg_match("/\.(png|jpg|jpeg){1}$/i", $nomeImagem["name"], $ext);
    // Gera o nome único para a imagem
    $imagem_nome = uniqid(time()). "." . $ext[1];
    $imagem_dir = $dir . $imagem_nome;
    // Envia o arquivo para a pasta de destino
    move_uploaded_file($nomeImagem["tmp_name"], '../../../'.$imagem_dir);
    echo($imagem_dir);

    $Leitor->setFotoLeitor($imagem_dir);
    $Leitor->setIdLeitor($_SESSION['idLeitor']);

    $Leitor->updateFoto($Leitor);
    header('Location: ../view/leitor/perfilLeitor.php');
?>