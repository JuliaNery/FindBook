<?php
    if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha']) ){
        
            require('../area-restrita/model/conexao.php');
            require('../area-restrita/model/biblioteca.php');
            session_start();

            $biblioteca = new Biblioteca();

            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);

            if($biblioteca->login($email, $senha) == true){
                if(isset($_SESSION['idBiblioteca'])){
                    header('Location: ../area-restrita/view/biblioteca/index.php'); 

                }else{
                    header('Location: loginBiblioteca.php');
                }
            }else{
                header('Location: loginBiblioteca.php'); 
            }

    }else{
        header('Location: loginBiblioteca.php');
    }

?>