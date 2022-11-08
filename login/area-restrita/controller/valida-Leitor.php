<?php
    session_start();


    if(!isset($_SESSION['idLeitor']) || !isset($_SESSION['emailLeitor']) || !isset($_SESSION['senhaLeitor']) || !isset($_SESSION['nomeLeitor'])){
        header("Location: ../../../../index.php");
    }
?>