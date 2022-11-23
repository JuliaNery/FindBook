<?php
include_once('../../controller/valida-leitor.php');
require_once("../../model/livro.php");

try {
    $Livro = new Livro();

    $listaLivro = $Livro->listarDest();
    $livroRomance = $Livro->listarRomance();
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Book</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <link rel="icon" href="image/logopjt.png">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- MEU CSS  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <!--------------SCROLL TOP------------------------>
    <a href="#" class="scrolltop" id="scroll-top">
        <i class='bx bx-chevrons-up scroll__top__icon'></i>
    </a>

    <!-- HEADER  -->
    <header class="header">

        <!-- HEADER 1 -->
        <div class="header-1">
            <img src="image/logopjt.png">
            <div class="icons">
                <div id="search-btn" class="fas fa-search"></div>
                <div id="login-btn" class="fas fa-logout"><a href="telaInicial.php"> Find Book</a></div>
            </div>
            <span class="divider"></span>
            <p><?php if (!empty($_SESSION['loginLeitor'])) {
                    echo ($_SESSION['loginLeitor']);
                } else {
                    echo $_SESSION['nomeLeitor'];
                } ?></p>
            <div class="profile">
                
				<img src="<?php if (!empty($_SESSION['fotoLeitor'])) {echo "../../../../" . $_SESSION['fotoLeitor'];} else { echo ("https://jamesrmoro.me/wp-content/uploads/2021/02/profile.png");} ?>" alt="">
				<ul class="profile-link">
                    <li><a href="perfilLeitor.php"><i class='bx bxs-user-circle icon' ></i> Perfil</a></li>
                    <li><a href="#" onclick="openModal03()"><i class='bx bx-edit-alt'></i> Alterar senha</a></li>
                    <li><a href="#" onclick="openModal02()"><i class='bx bxs-user-account'></i> Excluir conta</a></li>
                    <li><a href="#" onclick="openModal01()"><i class='bx bxs-log-out-circle' ></i> Sair</a></li>
                  </ul>
			</div>
        </div>
        <!-- HEADER 1 FIM -->

        <!-- HEADER 2 -->
        <div class="header-2">
            <nav class="navbar">
                <form action="" class="search-form">
                    <a href="procurar.php"> <input type="search" name="" placeholder="pesquise aqui..." id="search-box"></a>
                    <label for="search-box" class="fas fa-search"></label>
                </form>
            </nav>
        </div>
        <!-- FIM HEADER 2 -->

    </header>
    <!-- FIM HEADER -->

    <!-- HOME  -->
    <section class="home" id="home">
        <div class="row">
            <div class="content">
                <div data-anime="left" class="column left">
                    <h3>Bem Vindo nome do leitor</h3>
                    <p>Obrigado por se juntar ao Find Book.</p>
                </div>
            </div>
        </div>
    </section>
    <!--FIM HOME -->


    <!-- CARDS GENEROS DESTAQUES -->
    <section class="featured" id="destaques">

        <h1 class="heading"> <span>Destaques</span> </h1>

        <!-- CONTAINER CARDS -->
        <div class="container">

            <!-- CARDS -->
            
            <div class="products-container">
                <?php foreach ($listaLivro as $linhas) {  ?>
                    <div class="product" data-name="<?php echo $linhas['idLivro'] ?>">
                        <img src="../../../../<?php echo $linhas['capaLivro'] ?>" alt="">
                        <h3><?php echo $linhas['nomeLivro'] ?></h3>
                    </div>
                <?php } ?>
            </div>
            <!-- FIM CARDS -->
        </div>
        <!-- FIM CONTAINER CARDS -->

    </section>
    <!-- GENERO DESTAQUES CARDS -->


    <!-- CARDS GENEROS COMÉDIA  -->
    <section class="featured" id="destaques">

        <h1 class="heading"> <span>Comédia</span> </h1>

        <!-- CONTAINER CARDS -->
        <div class="container">

            <!-- CARDS -->
            <div class="products-container">
                <?php foreach ($livroRomance as $linhas) {  ?>
                    <div class="product" data-name="<?php echo $linhas['idLivro'] ?>">
                        <img src="../../../../<?php echo $linhas['capaLivro'] ?>" alt="">
                        <h3><?php echo $linhas['nomeLivro'] ?></h3>
                    </div>
                <?php } ?>
            </div>
            <!-- FIM CARDS -->
        </div>
        <!-- FIM CONTAINER CARDS -->

    </section>
    <!-- COMEDIA CARDS -->


    <!-- CARDS GENEROS ROMANCE -->
    <section class="featured" id="destaques">

        <h1 class="heading"> <span>Romance</span> </h1>

        <!-- CONTAINER CARDS -->
        <div class="container">

            <!-- CARDS -->
            <div class="products-container">
                <?php foreach ($livroRomance as $linhas) {  ?>
                    <div class="product" data-name="<?php echo $linhas['idLivro'] ?>">
                        <img src="../../../../<?php echo $linhas['capaLivro'] ?>" alt="">
                        <h3><?php echo $linhas['nomeLivro'] ?></h3>
                    </div>
                <?php } ?>
            </div>
            <!-- FIM CARDS -->
        </div>
        <!-- FIM CONTAINER CARDS -->

    </section>
    <!-- CARDS ROMANCE FIM  -->


    <!-- CARDS GENEROS  -->
    <section class="featured" id="destaques">

        <h1 class="heading"> <span>Terror</span> </h1>

        <!-- CONTAINER CARDS -->
        <div class="container">

            <!-- CARDS -->
            <div class="products-container">
            <?php foreach ($livroRomance as $linhas) {  ?>
                    <div class="product" data-name="<?php echo $linhas['idLivro'] ?>">
                        <img src="../../../../<?php echo $linhas['capaLivro'] ?>" alt="">
                        <h3><?php echo $linhas['nomeLivro'] ?></h3>
                    </div>
                <?php } ?>
            </div>
            <!-- FIM CARDS -->
        </div>
        <!-- FIM CONTAINER CARDS -->

    </section>
    <!-- SESSÃO CARDS TERROR -->


    <!-- MODAL CARDS -->
    <div class="products-preview">

        <!-- MODAL P1 -->

        <?php foreach ($listaLivro as $linhas) {  ?>
        <div class="preview" data-target="<?php echo $linhas['idLivro'] ?>">

            <!-- CONTEUDO MODAL -->
            <div class="wrapper">
                <i class="fas fa-times"></i>
                <div class="left">
                    <img src="../../../../<?php echo $linhas['capaLivro'] ?>" alt="" width="120">
                    <h4><?php echo $linhas['nomeLivro'] ?></h4>
                    <label style="color:#000;" for="">Genero:</label>
                    <p><?php echo $linhas['nomeGenero'] ?></p>

                    <label style="color:#000;" for="">Autor:</label>
                    <p><?php echo $linhas['nomeAutor'] ?></p>

                    <label style="color:#000;" for="">Editora:</label>
                    <p><?php echo $linhas['nomeEditora'] ?></p>

                    <label style="color:#000;" for="">Lançamento:</label>
                    <p><?php echo $linhas['dtLancamento'] ?></p>
                </div>
                <div class="right">
                    <div class="info">
                        <h3>Sinopse</h3>
                        <p><?php echo $linhas['sinopseLivro'] ?>
                        <p>
                    </div>
                    <div class="buttons">
                        <a href="perfilBiblioteca.php" class="buy"><i class="fas fa-location-arrow"></i> -Localizar</a>
                       <!--  <a href="#" class="buy"> <i class="fas fa-heart"></i> -Favoritar</a> -->
                    </div>
                </div>
            </div>
            <!-- FIM CONTEUDO MODAL -->

        </div>
        <?php } ?>
        <!-- FIM MODAL P1 -->


        <!-- MODAL P2 -->
        
        <?php foreach ($livroRomance as $linhas) {  ?>
       <!--  <div class="preview" data-target="<?php echo $linhas['idLivro'] ?>">

             --CONTEUDO MODAL -
            <div class="wrapper">
                <i class="fas fa-times"></i>
                <div class="left">
                    <img src="../../../../<?php echo $linhas['capaLivro'] ?>" alt="" width="120">
                    <h4><?php echo $linhas['nomeLivro'] ?></h4>
                    <p>Genero</p>
                    <p>Autor</p>
                    <p>Editora</p>
                    <p><?php echo $linhas['dtLancamento'] ?></p>
                </div>
                <div class="right">
                    <div class="info">
                        <h3>Sinopse</h3>
                        <p><?php echo $linhas['sinopseLivro'] ?>
                        <p>
                    </div>
                    <div class="buttons">
                        <a href="perfilBiblioteca.php" class="buy"><i class="fas fa-location-arrow"></i> -Localizar</a>
                        <a href="#" class="buy"> <i class="fas fa-heart"></i> -Favoritar</a>
                    </div>
                </div>
            </div>
            -- FIM CONTEUDO MODAL --

        </div> -->
        <?php } ?>
        <!-- FIM MODAL P2 -->


        <!-- MODAL P3 -->
        <div class="preview" data-target="p-3">
            <!-- CONTEUDO MODAL -->
            <div class="wrapper">
                <i class="fas fa-times"></i>
                <div class="left">
                    <img src="image/livro.jpg" alt="" width="120">
                    <h4>Por lugares incriveis</h4>
                    <p>Genero</p>
                    <p>Autor</p>
                    <p>Editora</p>
                    <p>Data de lançamento</p>
                </div>
                <div class="right">
                    <div class="info">
                        <h3>Sinopse</h3>
                        <p> aaaaaaaaaaaaaaaaa
                            aaaaaaaaaaaaaa aaaaaaaaaaa
                            aaaaaaaaaaaaaaaaaaa aaaaaaa
                            aaaaaaaaaaaaaaaaaaaaaaaaa aaaaa aaaaa aaaa aaa
                            aaaaa aaaa aaaa aaaaaaa aaaaaa aaa aaaaa aaaaa aaaaa aaa
                            aaaa aaaa aaaa aaaaaa aaaaa aaaaaaa aaaaa aaaaa aaaa
                            aaaa aaaa aaaa aaaa aaa aaa aaaa aaaa aaa aa a aaaaaaaa
                        <p>
                    </div>
                    <div class="buttons">
                        <a href="#" class="buy"><i class="fas fa-location-arrow"></i> -Localizar</a>
                        <a href="#" class="buy"> <i class="fas fa-heart"></i> -Favoritar</a>
                    </div>
                </div>
            </div>
            <!-- FIM CONTEUDO MODAL -->
        </div>
        <!-- MODAL P3 FIM -->

        <!-- MODAL P4 -->
        <div class="preview" data-target="p-4">

            <!-- CONTEUDO MODAL -->
            <div class="wrapper">
                <i class="fas fa-times"></i>
                <div class="left">
                    <img src="image/livro.jpg" alt="" width="120">
                    <h4>Por lugares incriveis</h4>
                    <p>Genero</p>
                    <p>Autor</p>
                    <p>Editora</p>
                    <p>Data de lançamento</p>
                </div>
                <div class="right">
                    <div class="info">
                        <h3>Sinopse</h3>
                        <p> aaaaaaaaaaaaaaaaa
                            aaaaaaaaaaaaaa aaaaaaaaaaa
                            aaaaaaaaaaaaaaaaaaa aaaaaaa
                            aaaaaaaaaaaaaaaaaaaaaaaaa aaaaa aaaaa aaaa aaa
                            aaaaa aaaa aaaa aaaaaaa aaaaaa aaa aaaaa aaaaa aaaaa aaa
                            aaaa aaaa aaaa aaaaaa aaaaa aaaaaaa aaaaa aaaaa aaaa
                            aaaa aaaa aaaa aaaa aaa aaa aaaa aaaa aaa aa a aaaaaaaa
                        <p>
                    </div>

                    <div class="buttons">
                        <a href="#" class="buy"><i class="fas fa-location-arrow"></i> -Localizar</a>
                        <a href="#" class="buy"> <i class="fas fa-heart"></i> -Favoritar</a>
                    </div>
                </div>
            </div>
            <!-- FIM CONTEUDO MODAL -->
        </div>
        <!-- FIM MODAL P4 -->
    </div>
    <!-- FIM MODAL CARDS  -->


    <!-- MODAL SAIR -->
    <div class="modal-container01">
        <div class="modal01">
            <h2>Deseja sair?</h2>
            <span>
                Deseja realmente sair?
            </span>
            <div class="btns">
            <a href="../../../logout.php"><button class="btnOK01" onclick="closeModal01()">sair</button></a>
                <button class="btnClose01" onclick="closeModal01()">fechar</button>
            </div>
        </div>
    </div>
    <!-- FIM MODAL SAIR  -->

    <!-- MODAL EXCLUIR CONTA -->
    <div class="modal-container02">
        <div class="modal02">
            <h2>Deseja realmente deletar esta conta?</h2>
            <span>
                Confirmação de exclusão da conta 'EMAIL DO LEITOR'. É impossível reverter essa ação! Todos os seus dados serão deletados do nosso sistema. Deseja continuar e apagar a sua conta?
            </span>
            <div class="btns">
            <a href="../../controller/delete-leitor.php"><button class="btnOK02" onclick="closeModal02()">Sim</button> </a>
                <button class="btnClose02" onclick="closeModal02()">Não</button>
            </div>
        </div>
    </div>
    <!-- FIM MODAL EXCLUIR CONTA  -->

    <!-- MODAL ALTERAR SENHA-->
    <div class="modal-container03">
        <div class="modal03">
            <h2>Alterar senha</h2>
            <hr /><br>
            <form>
                <div class="fields">

                    <div class="input-field">
                        <label> Senha atual:</label>
                        <input type="text" placeholder="Digite aqui">
                    </div>

                    <div class="input-field">
                        <label> Crie uma nova senha:</label>
                        <input type="password" placeholder="Digite aqui">
                    </div>

                    <div class="input-field">
                        <label>Confirme a senha: </label>
                        <input type="password" placeholder="Digite aqui">
                    </div>

                </div>
            </form>
            <div class="btns">
                <button class="btnOK03" onclick="closeModal03()">Alterar</button>
                <button class="btnClose03" onclick="closeModal03()">Voltar</button>
            </div>
        </div>
    </div>
    <!-- FIM MODAL ALTERAR SENHA -->




    <!-- FOOTER -->
    <section class="footer">
        <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
        </div>
    </section>
    <!-- FIM FOOTER -->



    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!-- MEU SCRIPT -->
    <script src="js/script.js"></script>
    <script src="js/modalInicio.js"></script>
    <script src="js/perfilDrop.js"></script>




    <script>
        //Modal sair
        const modal01 = document.querySelector('.modal-container01')

        function openModal01() {
            modal01.classList.add('active01')
        }

        function closeModal01() {
            modal01.classList.remove('active01')
        }
    </script>

    <script>
        //Modal excluir conta
        const modal02 = document.querySelector('.modal-container02')

        function openModal02() {
            modal02.classList.add('active02')
        }

        function closeModal02() {
            modal02.classList.remove('active02')
        }
    </script>
    <!-- modal excluir conta fim -->

    <script>
        //Modal alterar senha
        const modal03 = document.querySelector('.modal-container03')

        function openModal03() {
            modal03.classList.add('active03')
        }

        function closeModal03() {
            modal03.classList.remove('active03')
        }
    </script>
    <!-- modal alterar senha -->


</body>

</html>