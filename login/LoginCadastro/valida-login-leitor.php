<?php
    if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha']) ){
        
            require('../area-restrita/model/conexao.php');
            require('../area-restrita/model/leitor.php');

            $leitor = new Leitor();

            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);

            if($leitor->login($email, $senha) == true){
                if(isset($_SESSION['idLeitor'])){
                    header('Location: ../area-restrita/view/index-leitor.php'); 

                }else{
                    header('Location: loginUsuario.php');
                }
            }else{
                header('Location: loginUsuario.php'); 
            }

    }else{
        header('Location: loginUsuario.php');
    }

?>