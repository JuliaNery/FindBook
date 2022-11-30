
    <?php

    require_once("../model/conexao.php");
    require_once("../model/biblioteca.php");


    
    $Biblioteca = new Biblioteca();
    
    $Biblioteca->setNomeBiblioteca( $_POST['txtNome']);
    $Biblioteca->setRuaBiblioteca($_POST['txtRua']);
    $Biblioteca->setNumBiblioteca($_POST['txtNum']);
    $Biblioteca->setCompBiblioteca( $_POST['txtComp']);
    $Biblioteca->setCepBiblioteca($_POST['txtCep']);
    $Biblioteca->setBairroBiblioteca($_POST['txtBairro']);
    $Biblioteca->setCidadeBiblioteca( $_POST['txtCidade']);
    $Biblioteca->setEmailBiblioteca($_POST['txtEmail']);
    $Biblioteca->setSenhaBiblioteca($_POST['txtSenha']);

   $Biblioteca->cadastrar($Biblioteca);

   header('Location: ../../loginCadastro/loginBiblioteca.php');

    ?>