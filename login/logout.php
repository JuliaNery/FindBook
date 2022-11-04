<?php
    session_start();
    //admin
    unset($_SESSION['login-session']);
    unset($_SESSION['senha-session']);
    //Biblioteca
    unset($_SESSION['senhaBiblioteca']);
    unset($_SESSION['emailBiblioteca']);
    unset($_SESSION['idBiblioteca']);
    //leitor
    unset($_SESSION['senhaLeitor']);
    unset($_SESSION['emailLeitor']);
    unset($_SESSION['idLeitor']);


    session_destroy();
    header("Location: ../index.php");
?>