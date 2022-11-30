<?php
include_once('../../controller/valida-leitor.php');
require_once("../../model/livro.php");
require_once("../../model/biblioteca.php");
require_once("../../model/conexao.php");


unset($_SESSION['livros']);
try {
    $Livro = new Livro();
    $biblioteca = new biblioteca();


    $listaLivro = $Livro->listar();
    $listaB = $biblioteca->listar();
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

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/procurar2.css">

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

                <img src="<?php if (!empty($_SESSION['fotoLeitor'])) {
                                echo "../../../../" . $_SESSION['fotoLeitor'];
                            } else {
                                echo ("https://jamesrmoro.me/wp-content/uploads/2021/02/profile.png");
                            } ?>" alt="">
                <ul class="profile-link">
                    <li><a href="perfilLeitor.php"><i class='bx bxs-user-circle icon'></i> Perfil</a></li>
                    <!-- <li><a href="#" onclick="openModal03()"><i class='bx bx-edit-alt'></i> Alterar senha</a></li>
                    <li><a href="#" onclick="openModal02()"><i class='bx bxs-user-account'></i> Excluir conta</a></li> -->
                    <li><a href="#" onclick="openModal01()"><i class='bx bxs-log-out-circle'></i> Sair</a></li>
                </ul>
            </div>
        </div>
        <!-- HEADER 1 FIM -->

        <!-- HEADER 2 -->
        <div class="header-2">
            <nav class="navbar">
                <form action="" method="get" class="search-form">
                    <input type="search" name="pesquisa" <?php if(isset($_GET['pesquisa'])){ echo ('value="'.$_GET['pesquisa'].'"'); }?> placeholder="pesquise aqui..." id="search-box">
                    <label for="search-box" class="fas fa-search"></label>
                </form>
                <button id="cart-btn">
                   <!--  <a>FILTRO</a><i class='bx bx-filter'></i> -->
                </button>
            </nav>
        </div>
        <!-- FIM HEADER 2 -->

    </header>
    <!-- FIM HEADER -->



    <!-- FILTRO -->
    <div id="cart-sidebar" class="cart-sidebar">
        <div class="cart-header-padding">
            <div class="cart-header">
                <p>
                    <span class="title">Filtrar</span> <span class="items"></span>
                </p>
                <button id="close-btn">
                    <i class='bx bx-x'></i>
                </button>
            </div>
        </div>
        <div class="cart-products">

            <!-- FORM FILTRO -->
            <form>
                <div class="fields">

                    <div class="input-field">
                        <label> Faixa etária: </label>
                        <select name="Digite">
                            <option value="0">Selecione</option>
                            <option value="0"><a href="">claudia leite</a> </option>
                        </select>
                    </div>

                    <div class="input-field">
                        <label>Gênero:</label>
                        <input type="text" placeholder="Digite aqui">
                    </div>

                    <div class="input-field">
                        <label>Editora:</label>
                        <input type="text" placeholder="Digite aqui">
                    </div>

                    <div class="input-field">
                        <label>Autor:</label>
                        <input type="text" placeholder="Digite aqui">
                    </div>

                </div>

                <div class="wrapper">
                    <input type="radio" name="select" id="option-1">
                    <input type="radio" name="select" id="option-2">
                    <label for="option-1" class="option option-1">
                        <div class="dot"></div>
                        <span>Livro</span>
                    </label>
                    <br>
                    <label for="option-2" class="option option-2">
                        <div class="dot"></div>
                        <span>Biblioteca</span>
                    </label>
                </div>
        </div>
        <div class="cart-footer">
            <div class="total"></div>
            <a href="#" class="btn2">Filtrar</a>
            <a href="#" class="btn2">Apagar</a>
        </div>
        </form>
        <!-- FIM FORM FILTRO -->
    </div>
    <!-- FIM FILTRO -->


    <!-- BR A SOLUÇÃO DOS SEUS PROBLEMAS -->
    <br><br><br><br><br>

    <!-- CONTAINER CARDS -->
    <div class="container">
        <h1 class="heading"> <span>Resultado</span> </h1>
        <br><br>

        <!-- CARDS -->
        <div class="products-container">
            <?php if (!isset($_GET['pesquisa'])) {
                foreach ($listaLivro as $linhas) { 
                    $_SESSION['livro'] = $linhas['nomeLivro'] ?>
                    
                    <div class="product" style="width: 250px;" data-name="<?php echo $linhas['idLivro'] ?>">
                        <img src="../../../../<?php echo $linhas['capaLivro'] ?>">
                        <h3><?php echo $linhas['nomeLivro'] ?></h3>
                    </div>
                    <?php }
            } else {

                $conexao = Conexao::conectar();
                $busca = '%' . addslashes($_GET['pesquisa']) . '%';
                $stmt = $conexao->prepare("SELECT *,DATE_FORMAT(dtLancamento,'%d/%m/%Y') AS dtLancamento FROM vwLivro
																WHERE 
																nomeLivro like :busca 
																or nomeGenero like :busca 
																or nomeAutor like :busca 
																or nomeEditora like :busca
																or faixaEtaria like :busca  
																
																order by nomeLivro asc");
                $stmt->bindValue(':busca', $busca, PDO::PARAM_STR);

                $stmt->execute();


                if ($stmt->rowCount() == 0) {

                    $conexao = Conexao::conectar();
                    $busca = '%' . addslashes($_GET['pesquisa']) . '%';
                    $query = $conexao->prepare("SELECT * FROM tbBiblioteca
                                                                    WHERE 
                                                                    nomeBiblioteca like :busca 
                                                                    or ruaBiblioteca like :busca 
                                                                    or cepBiblioteca like :busca 
                                                                    or bairroBiblioteca like :busca
                                                                    or cidadeBiblioteca like :busca     
                                                                    
                                                                    order by idBiblioteca asc");
                    $query->bindValue(':busca', $busca, PDO::PARAM_STR);

                    $query->execute();
                    if ($query->rowCount() == 0) {
                    ?>

                        <tr>
                            <td colspan="9">Busca indefinida</td>
                        </tr>
                        <?php   } else {
                        $lista = $query->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($lista as $linhas) { ?>
                            <div class="product" data-name="<?php echo $linhas['idBiblioteca'] ?>">
                                <img src="../../../../<?php echo $linhas['fotoBiblioteca'] ?>" alt="">
                                <h3><?php echo $linhas['nomeBiblioteca'] ?></h3>
                            </div>
                        <?php }
                    }
                } else {
                    $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($lista as $linhas) { 
                        $_SESSION['livro'] = $linhas['nomeLivro'] ?>
                        <div class="product" style="width: 250px;" data-name="<?php echo $linhas['idLivro'] ?>">
                            <img src="../../../../<?php echo $linhas['capaLivro'] ?>">
                            <h3><?php echo $linhas['nomeLivro'] ?></h3>
                        </div>
            <?php }
                }
            } ?>



        </div>
        <!-- FIM CARDS -->
    </div>
    <!-- FIM CONTAINER CARDS -->



    <!-- MODAL CARDS -->
    <div class="products-preview">
        <?php if (!isset($_GET['pesquisa'])) {
            foreach ($listaLivro as $linhas) {  
?>
                <div class="preview" data-target="<?php echo $linhas['idLivro'] ?>">
                    <div class="wrapperModal">
                        <i class="fas fa-times"></i>
                        <div class="left">
                        <img src="../../../../<?php echo $linhas['capaLivro'] ?>" alt="" width="120">
                <h4 style="text-transform: uppercase;"><?php echo $linhas['nomeLivro'] ?></h4><br>
				<p>Genero: </p>
                <p style="text-transform: uppercase;"><?php echo $linhas['nomeGenero'] ?></p><br>
				<p>Autor: </p>
                <p style="text-transform: uppercase;"> <?php echo $linhas['nomeAutor'] ?></p><br>
				<p>Editora: </p>
				<p style="text-transform: uppercase;"> <?php echo $linhas['nomeEditora'] ?></p><br>
				<p>Data de Lançamento: </p>
				<p style="text-transform: uppercase;"> <?php echo $linhas['dtLancamento'] ?></p><br>
                        </div>
                        <div class="right">
                            <div class="info">
                                <h3>Sinopse</h3>
                                <p> <?php echo $linhas['sinopseLivro'] ?>
                                <p>
                            </div>
                            <div class="buttons">
                                <a href="bibliotecas.php" class="buy"><i class="fas fa-location-arrow"></i> -Localizar</a>
<!--                                 <a href="#" class="buy"> <i class="fas fa-heart"></i> -Favoritar</a>
 -->                            </div>
                        </div>
                    </div>
                </div>
                <?php }
        } else {

            $conexao = Conexao::conectar();
            $busca = '%' . addslashes($_GET['pesquisa']) . '%';
            $stmt = $conexao->prepare("SELECT *,DATE_FORMAT(dtLancamento,'%d/%m/%Y') AS dtLancamento FROM vwLivro
																WHERE 
																nomeLivro like :busca 
																or nomeGenero like :busca 
																or nomeAutor like :busca 
																or nomeEditora like :busca
																or faixaEtaria like :busca  
																
																order by nomeLivro asc");
            $stmt->bindValue(':busca', $busca, PDO::PARAM_STR);

            $stmt->execute();


            if ($stmt->rowCount() == 0) {

                $conexao = Conexao::conectar();
                $busca = '%' . addslashes($_GET['pesquisa']) . '%';
                $query = $conexao->prepare("SELECT * FROM tbBiblioteca
                                                                    WHERE 
                                                                    nomeBiblioteca like :busca 
                                                                    or ruaBiblioteca like :busca 
                                                                    or cepBiblioteca like :busca 
                                                                    or bairroBiblioteca like :busca
                                                                    or cidadeBiblioteca like :busca     
                                                                    
                                                                    order by idBiblioteca asc");
                $query->bindValue(':busca', $busca, PDO::PARAM_STR);

                $query->execute();
                if ($query->rowCount() == 0) {
                ?>

                    <tr>
                        <td colspan="9">Busca indefinida</td>
                    </tr>
                    <?php   } else {
                    $lista = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($lista as $linhas) { 
                        $_SESSION['biblioteca'] = $linhas['idBiblioteca']?>
                        <div class="preview" data-target="<?php echo $linhas['idBiblioteca'] ?>">
                            <div class="wrapper2">
                                <i class="fas fa-times"></i>
                                <div class="left">
                                    <img src="../../../../<?php echo $linhas['fotoBiblioteca'] ?>" alt="" width="190">
                                </div>
                                <div class="right">
                                    <div class="info">
                                        <h3><?php echo $linhas['nomeBiblioteca'] ?></h3>
                                        <p>Rua <?php echo $linhas['ruaBiblioteca'].", ". $linhas['numBiblioteca'] ?></p>
                                        <p>Bairro: <?php echo $linhas['bairroBiblioteca'] ?></p>
                                        <p>Cidade: <?php echo $linhas['cidadeBiblioteca'] ?></p>
                                        <p>Telefone: <?php echo $linhas['telBiblioteca'] ?></p>
                                    </div>
                                    <div class="buttons">
                                        <a href="perfilBiblioteca.php"  onclick="perfil()" class="cart"><i class="fas fa-user"></i> Perfil</a>
                                        <!-- <a href="#" class="cart"><i class="fas fa-location-arrow"></i> Localizar</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                }
            } else {
                $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($lista as $linhas) {  
                    ?>
                    <div class="preview" data-target="<?php echo $linhas['idLivro'] ?>">
                    <div class="wrapperModal">
                        <i class="fas fa-times"></i>
                        <div class="left">
                        <img src="../../../../<?php echo $linhas['capaLivro'] ?>" alt="" width="120">
                        <h4 style="text-transform: uppercase;"><?php echo $linhas['nomeLivro'] ?></h4><br>
                        <p>Genero: </p>
                        <p style="text-transform: uppercase;"><?php echo $linhas['nomeGenero'] ?></p><br>
                        <p>Autor: </p>
                        <p style="text-transform: uppercase;"> <?php echo $linhas['nomeAutor'] ?></p><br>
                        <p>Editora: </p>
                        <p style="text-transform: uppercase;"> <?php echo $linhas['nomeEditora'] ?></p><br>
                        <p>Data de Lançamento: </p>
                        <p style="text-transform: uppercase;"> <?php echo $linhas['dtLancamento'] ?></p><br>
                        </div>
                        <div class="right">
                            <div class="info">
                                <h3>Sinopse</h3>
                                <p> <?php echo $linhas['sinopseLivro'] ?>
                                <p>
                            </div>
                            <div class="buttons">
                                <a href="bibliotecas.php" onclick="perfil()" class="buy"><i class="fas fa-location-arrow"></i> -Localizar</a>
                               <!--  <a href="#" class="buy"> <i class="fas fa-heart"></i> -Favoritar</a> -->
                            </div>
                        </div>
                    </div>
                </div>
        <?php }
            }
        } ?>
        <!-- FIM MODAL BIBLIOTECA -->
    </div>
    <!-- FIM MODAL CARDS -->


    <!-- MODAL SAIR -->
    <div class="modal-container01">
        <div class="modal01">
            <h2>Deseja sair?</h2>
            <span>
                Deseja realmente sair?
            </span>
            <div class="btns">
                <a href="../../../logout.php"><button class="btnOK01" onclick="closeModal01()">sair</button></a>
                <button class="btnClose01" onclick="closeModal01()">Não</button>
            </div>
        </div>
    </div>
    <!-- FIM MODAL SAIR  -->

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!-- MEU SCRITP -->
    <script src="js/script.js"></script>
    <script src="js/main2.js"></script>
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
    <!-- modal sair -->

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