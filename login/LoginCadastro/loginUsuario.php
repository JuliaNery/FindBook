

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuário</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />

    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="img/logopjt.png">
    <link rel="stylesheet" href="css/styleLogUser.css">
</head>

<body>

    <!-- <header>
        <img src="img/logopjt.png" alt="">
    </header> -->


    <div class="container2">
        <div class="findTexto">
            <h3>Find Book</h3>
        </div>

        <div class="container">
            <input type="checkbox" id="flip">
            <div class="cover">
                <div class="front">
                    <img src="img/te.png" alt="">
                </div>
                <div class="back">
                    <img class="backImg" src="img/foto2.png" alt="">
                </div>
            </div>
            <form action="valida-login-leitor.php" method="POST">
                <div class="form-content">
                    <div class="login-form">
                        <!--<img src="img/logopjt.png" alt="">-->
                        <div class="title">Login Usuário</div>
                        <div class="input-boxes">
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input type="text" name="email" placeholder="Digite o seu email" required>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="senha" style="margin-left: 2px;" placeholder="Digite o sua senha" minlength="6" required>
                            </div>
                            <div class="text"><a href="recSenha.php">Esqueceu a sua senha?</a></div>
                            <div class="button input-box">

                                <input type="submit" value="Logar">
                            </div>
                            <div class="login-text">Não tem uma conta? <label for="#"><a href="cadastroUsuario.php">Crie uma agora!</label></a> </div><br>
                          <a href="../../index.php"> <i class='bx bx-log-out'></i></a>
                        </div>
                    </div>

                </div>
            </form>
        </div> 

    </div>


</body>

</html>