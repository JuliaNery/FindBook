<?php
    require_once("../model/biblioteca.php");

    session_start();

    $nomeImagem = $_FILES['foto'];
        $dir = "image/biblioteca/";
        // Pega a extensão do arquivo enviado pelo Flash e grava na variável "$ext"
        preg_match("/\.(png|jpg|jpeg){1}$/i", $nomeImagem["name"], $ext);
        // Gera o nome único para a imagem
        $imagem_nome = uniqid(time()). "." . $ext[1];
        $imagem_dir = $dir . $imagem_nome;
        // Envia o arquivo para a pasta de destino
        move_uploaded_file($nomeImagem["tmp_name"], '../../../'.$imagem_dir);
        echo($imagem_dir);

    $Biblioteca = new Biblioteca(); 

    $Biblioteca->setNomeBiblioteca($_POST['nome']);
    $Biblioteca->setEmailBiblioteca($_POST['email']);
    $Biblioteca->setHorarioAbertura($_POST['abertura']);
    $Biblioteca->setHorarioFechamento($_POST['fechamento']);
    $Biblioteca->setFotoBiblioteca($imagem_dir);
    $Biblioteca->setTelBiblioteca($_POST['telefone']);
    $Biblioteca->setIdBiblioteca($_SESSION['idBiblioteca']);

    $Biblioteca->update($Biblioteca);

    header('Location: ../view/biblioteca/perfil.php');
?>