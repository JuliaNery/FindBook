<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Adm</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />

    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="img/logopjt.png">

    <link rel="stylesheet" href="css/styleLogAdm.css">
</head>
<body>

    <div class="container2">
        <div class="findTexto"> <h3>Find Book</h3></div>
    <div class="container">
        <input type="checkbox" id="flip">
       <div class="cover"> 
       <div class="front">
        <img src="img/te.png" alt="">
       </div>
       </div>
        <form action="valida-login-adm.php" method="POST">
            <div class="form-content">
                <div class="login-form">
                    <div class="title">Login Adm</div>
                    <div class="input-boxes">
                        <div class="input-box">
                            <i class="fas fa-user"></i>
                            <input type="text" placeholder="Digite o seu username" name="login" required>
                        </div>
                        <div class="input-box">
                            <i class="fas fa-lock"></i>
                            <input type="password" placeholder="Digite a sua senha" name="senha" required>
                        </div>
                        <div class="text"><a href="#">Esqueceu a sua senha?</a></div>
                        <div class="button input-box">
                           
                            <input type="submit" value="Logar">
                        </div>
                        
                        <!--<div class="login-text">Não tem uma conta? <label for=""><a href="" >Crie uma agora!</a></label></div>-->
                    </div>
                   <a href="../../index.php"> <i class='bx bx-log-out'></i> </a>
                </div>
            </div>
        </form>
    </div>
    </div>
    
</body>
</html>