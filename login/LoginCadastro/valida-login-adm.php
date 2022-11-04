<?php
    header('Location: ../area-restrita/view/admDashboard.php');
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    if (($login == 'adm') && ($senha == '123456')){
        
        session_start();
        $_SESSION['login-session'] = $login;
        $_SESSION['senha-session'] = $senha;
  /*      echo'concluido';
       echo $login . $senha; */

    }
    else{
        header('Location: loginAdm.php');
       /*  echo'erro';
        echo $login . $senha; */
    }
?>