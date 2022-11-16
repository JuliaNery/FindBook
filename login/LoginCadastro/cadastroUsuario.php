<?php
    session_start();
?>
<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />

    

    <link rel="icon" href="img/logopjt.png">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/styleCadUser.css">
     
    <!----===== Iconscout CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Cadastrar Usuário </title> 
</head>
<body>

   
  
<div class="teste">
    <div class="container">
        <div class="findTexto"><h1>Find Book</h1></div>
        <header>Cadastrar Usuário</header>

        <form action="../area-restrita/controller/cadastra-leitor.php" method="post">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Preencha as informações abaixo:</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>  <i class="fas fa-user"></i> Nome usuário:</label>
                            <input type="text" name="txtNome" placeholder="Nome do Usuário" required>
                        </div>


                        <div class="input-field">
                            <label>  <i class="fas fa-envelope"></i> Email: </label>
                            <input type="email" name="txtEmail" placeholder="Email do Usuário" required>
                        </div>

                        <div class="input-field">
                            <label> <i class="fas fa-lock"></i> Senha:</label>
                            <input type="password" name="txtSenha" placeholder="Crie uma senha" required>
                           
                        </div>
                    </div>
                </div>

                
                    <div class="buttons">
                        <button onclick="cadastro()" class="cadastrar">
                            <span class="btnText">Cadastrar</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                      <!-- <a href="">  <i class='bx bx-log-out'></i></a> -->
                        <div class="sign-up-text">Já tem uma conta? <label> <a  href="loginUsuario.php" >Entre agora!</label></a></div>
                    </div>
            </div>
      </form>
    </div>

</div>


    <script>
        function cadastro()
        {
            alert("<?php echo($_SESSION['cadastro']); ?>");
        }

        <?php session_destroy(); ?>
    </script>
    <script src="script.js"></script>
</body>
</html>