<?php
     require_once("../model/biblioteca.php");

     session_start();
  
     $Biblioteca = new Biblioteca();

     $Biblioteca->setIdBiblioteca($_SESSION['idBiblioteca']);
    
     $Biblioteca->delete($Biblioteca);

    unset($_SESSION['senhaBiblioteca']);
    unset($_SESSION['emailBiblioteca']);
    unset($_SESSION['idBiblioteca']);


    session_destroy();
    
     header('Location: ../../../../index.php');
?>