<?php
    header('Location: ../../loginCadastro/cadastroUsuario.php');
    require_once("../model/conexao.php");
    require_once("../model/leitor.php");

    $Leitor = new Leitor();

    $Leitor -> setNomeLeitor($_POST['txtNome']);
    $Leitor -> setEmailLeitor($_POST['txtEmail']);
    $Leitor -> setSenhaLeitor($_POST['txtSenha']);

    $Leitor ->cadastrar($Leitor);
 
?>