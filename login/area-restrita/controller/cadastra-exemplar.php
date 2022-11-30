<?php
    require_once("../model/conexao.php");
    require_once("../model/exemplar.php");
    require_once("../model/biblioteca.php");
    require_once("../model/livro.php");

    session_start();
        
    header('Location: ../view/biblioteca/exemplares.php');
try{

    $Biblioteca = new Biblioteca(); 
    $StatusExemplar = new StatusExemplar(); 
    $Exemplar = new Exemplar();
    $Livro = new Livro();


    $Exemplar->setNumExemplar($_POST['txtNumExemplar']);

    $Biblioteca->setIdBiblioteca(  $_SESSION['idBiblioteca']);
    $Exemplar->setBiblioteca($Biblioteca);

    $Livro->setIdLivro($_POST['livro']);
    $Exemplar->setidLivro($Livro);

    $Exemplar->cadastrar($Exemplar);


    $StatusExemplar->cadastrar();
 
    $result = 'Exemplar cadastrado.';
    $_SESSION['cadastroExemplar'] = $result;
}catch (Exception $e){
    

}

?>