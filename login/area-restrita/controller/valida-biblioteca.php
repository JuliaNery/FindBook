<?php
    session_start();

    if(!isset($_SESSION['idBiblioteca']) || !isset($_SESSION['emailBiblioteca']) || !isset($_SESSION['senhaBiblioteca']) || !isset($_SESSION['nomeBiblioteca'])){
        header("Location: ../../../index.php");
    }
?>