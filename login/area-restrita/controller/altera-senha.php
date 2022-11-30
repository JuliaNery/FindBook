<?php
    require_once("../model/leitor.php");

    session_start();

    $Leitor = new Leitor();

    $Leitor->setIdLeitor($_SESSION['idLeitor']);
?>