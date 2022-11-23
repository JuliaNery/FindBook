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
    <link rel="stylesheet" href="css/styleCad.css">

    <!----===== Iconscout CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Cadastrar biblioteca </title>

    <script>
        function cadastro()
        {
            alert("<?php echo($_SESSION['cadastro']); ?>");
        }

        <?php session_destroy(); ?>
    </script>
    <script type="text/javascript" src="../../js/jquery-1.2.6.pack.js"></script>
    <script type="text/javascript" src="../../js/jquery.maskedinput-1.1.4.pack.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#cep").mask("99999-999");
        });
    </script>
</head>

<body>



    <div class="teste">
        <div class="container">
            <div class="findTexto">
                <h1>Find Book</h1>
            </div>
            <header>Cadastrar Biblioteca</header>

            <form action="../area-restrita/controller/cadastra-biblioteca.php" method="post">
                <div class="form first">
                    <div class="details personal">
                        <span class="title">Preencha as informações abaixo:</span>

                        <div class="fields">
                            <div class="input-field">
                                <label> <i class="fas fa-user"></i> Nome biblioteca:</label>
                                <input type="text" name="txtNome" placeholder="Nome da biblioteca" required>
                            </div>

                            <div class="input-field">
                                <label> <i class='bx bxs-map-pin'></i> Cep: </label>
                                <input type="text" id="cep" name="txtCep" placeholder="cep" maxlength="9" onblur="pesquisacep(this.value);" required>
                            </div>

                            <div class="input-field">
                                <label> <i class="fas fa-envelope"></i> Email: </label>
                                <input type="text" name="txtEmail" placeholder="Email da biblioteca" required>
                            </div>

                            <div class="input-field">

                                <label> <i class="fas fa-location"></i> Endereço: </label>
                                <input type="text" id="rua" name="txtRua" placeholder="seu endereço" required>
                            </div>


                            <div class="input-field">
                                <label> <i class='bx bxs-building-house'></i> Numero:</label>
                                <input type="text" name="txtNum" placeholder="Numero" required>
                            </div>

                            <div class="input-field">
                                <label> <i class="fas fa-house"></i> Complemento: </label>
                                <input type="text" name="txtComp" placeholder="complemento">
                            </div>

                            <div class="input-field">
                                <label> <i class='bx bxs-buildings'></i> Bairro: </label>
                                <input type="text" id="bairro" name="txtBairro" placeholder="bairro" required>
                            </div>

                            <div class="input-field">
                                <label> <i class="fas fa-city"></i> Cidade: </label>
                                <input type="text" id="cidade" name="txtCidade" placeholder="cidade" required>
                            </div>

                            <div class="input-field">
                                <label> <i class="fas fa-lock"></i> Senha:</label>
                                <input type="password" name="txtSenha" placeholder="senha" maxlength="20" minlength="6" required>
                            </div>
                        </div>
                    </div>


                    <div class="buttons">
                        <button onclick="cadastro()" class="cadastrar">
                            <span class="btnText">Cadastrar</span>
                            <i class="uil uil-navigator"></i>
                        </button>

                        <div class="sign-up-text">Já tem uma conta? <label> <a href="loginBiblioteca.php">Entre agora!</label></a></div>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <script src="js/script.js"></script>
    <script src="js/cep-autocomplete.js"></script>
</body>

</html>