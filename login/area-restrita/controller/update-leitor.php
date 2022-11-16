<?php
    require_once("../model/leitor.php");

    session_start();

   

    $Leitor = new Leitor(); 

    var_dump( $_FILES['foto']);

    $valid = $_FILES['foto'];

    if(isset($valid)){
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
        
        $Leitor->setNomeLeitor($_POST['nome']);
        $Leitor->setLoginLeitor($_POST['nick']);
        $Leitor->setEmailLeitor($_POST['email']);
        $Leitor->setCpfLeitor($_POST['cpf']);
        $Leitor->setRgLeitor($_POST['rg']);
        $Leitor->setDtNascLeitor($_POST['dtNasc']);
        $Leitor->setGeneroLeitor($_POST['genero']);
        $Leitor->setFotoLeitor($imagem_dir);
        $Leitor->setIdLeitor($_SESSION['idLeitor']);
    
        $Leitor->update($Leitor);

        echo ("atualizada".$Leitor->setFotoLeitor($imagem_dir));
    }else{
        $Leitor->setNomeLeitor($_POST['nome']);
        $Leitor->setLoginLeitor($_POST['nick']);
        $Leitor->setEmailLeitor($_POST['email']);
        $Leitor->setCpfLeitor($_POST['cpf']);
        $Leitor->setRgLeitor($_POST['rg']);
        $Leitor->setDtNascLeitor($_POST['dtNasc']);
        $Leitor->setGeneroLeitor($_POST['genero']);
        $Leitor->setFotoLeitor($_SESSION['fotoLeitor']);
        $Leitor->setIdLeitor($_SESSION['idLeitor']);
    
        $Leitor->update($Leitor);

        echo ("não foi".$Leitor->setFotoLeitor($_SESSION['fotoLeitor']));
    }

    

/*     header('Location: ../view/leitor/perfilUsuario.php');
 */?>