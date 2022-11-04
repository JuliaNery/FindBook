<?php
    session_start();
    if(($_SESSION['login-session'] != 'adm') || ($_SESSION['senha-session'] != '123456')){
        header("Location: ../../../../index.php");
    }
?>  