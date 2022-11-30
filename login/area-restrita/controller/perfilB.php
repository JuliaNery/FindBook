<?php
require_once("../model/conexao.php");
session_start();
try {

  $biblioteca = $_POST['biblioteca'];

  $conexao = Conexao::conectar();
    $busca = $biblioteca ;
    $query = $conexao->prepare("SELECT * FROM tbBiblioteca
                                    WHERE nomeBiblioteca = :id");
    $query->bindValue(':id', $busca);

    $query->execute();

    $dados = $query->fetchAll();

    foreach ($dados as $linhas){
        echo $linhas['idBiblioteca'];
        $_SESSION['biblioteca'] = $linhas['idBiblioteca'];
        echo'sess '. $_SESSION['biblioteca'];
    }

} catch (Exception $e) {
  echo $e->getMessage();
}

header('location: ../view/leitor/perfilBiblioteca.php');
?>
