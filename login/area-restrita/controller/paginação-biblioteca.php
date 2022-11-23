<?php
    require_once("../model/conexao.php");
    require_once("../model/exemplar.php");
    session_start();

    $_SESSION['contador'] = $_SESSION['contador'] + 2;
    echo $_SESSION['contador'];

    header('Location: ../view/biblioteca/perfil.php');


?>