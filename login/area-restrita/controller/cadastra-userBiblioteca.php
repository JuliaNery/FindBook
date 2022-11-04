<?php
        require_once("../model/userBiblioteca.php");
    //cadLogin
    $conexao = Conexao::conectar();
     var_dump($conexao->lastInsertId()); 
    $idBiblioteca = $conexao->lastInsertId(); 

    $UserBiblioteca = new UserBiblioteca();

    $UserBiblioteca->setSenhaUserBiblioteca($_POST['txtSenha']);
    $UserBiblioteca->setLoginUserBiblioteca($_POST['txtUser']);
    $UserBiblioteca->setIdBiblioteca($idBiblioteca); 

    echo 'user cadastrado';
?>


