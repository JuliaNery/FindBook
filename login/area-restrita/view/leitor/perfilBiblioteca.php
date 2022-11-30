<?php
include_once('../../controller/valida-leitor.php');
require_once("../../model/exemplar.php");
require_once("../../model/biblioteca.php");


try {
  $Exemplar = new Exemplar();
  $Biblioteca = new Biblioteca();

  $dados = $Biblioteca->perfil();
  $listaExemplar = $Exemplar->listarPerfil();
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

  <!-- MEU CSS -->
  <link rel="stylesheet" href="css/perfilBiblioteca.css">

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
        <form action="" class="search-form">
          <input type="search" name="pesquisa" <?php if (isset($_GET['pesquisa'])) {
                                                  echo ('value="' . $_GET['pesquisa'] . '"');
                                                } ?> placeholder="pesquise aqui..." id="search-box">
          <label for="search-box" class="fas fa-search"></label>
        </form>
      </nav>
    </div>
    <!-- FIM HEADER 2 -->

  </header>
  <!-- FIM HEADER -->


  <!-- PERFIL LEITOR -->
  <div class="header__wrapper">
    <?php foreach ($dados as $linhas) { ?>
      <div class="cols__container">
        <div class="left__col">
          <div class="img__container">
            <img src="../../../../<?php echo $linhas['fotoBiblioteca'] ?>" alt="Anna Smith" />
            <span></span>
          </div>
          <h2>Biblioteca <?php echo $linhas['nomeBiblioteca'] ?></h2>
          <p>Email: <?php echo $linhas['emailBiblioteca'] ?></p>
          <p>Numero: <?php echo $linhas['telBiblioteca'] ?></p>
          <p>Horario de Atendimento: </p>
          <p><?php echo $linhas['horarioAbertura'] . " - " . $linhas['horarioFechamento'] ?></p>
          <p>Localização: <?php echo $linhas['ruaBiblioteca'] . ", " . $linhas['numBiblioteca'] . ", " . $linhas['bairroBiblioteca'] ?></p>
        </div>
        <div class="right__col">
          <nav>
            <h2>Acervo <h2>
                <a href="telaInicial.php"> <button> sair do perfil</button></a>

          </nav>


          <!-- CONTAINER CARDS DIVISÃO -->
          <div class="photos">

            <!-- CONTAINER CARDS -->
            <div class="products-container">
              <?php if (empty($_GET['pesquisa'])) {
                foreach ($listaExemplar as $linhas) {  ?>

                  <div class="product" data-name="<?php echo $linhas['idExemplar'] ?>">
                    <img src="../../../../<?php echo $linhas['capaLivro'] ?>" alt="">
                    <h3><?php echo $linhas['nomeLivro'] ?></h3>
                  </div>

                <?php }
              } else {

                $conexao = Conexao::conectar();
                if ($_GET['pesquisa'] == 'disponivel') {
                  $busca = '%1%';
                } elseif ($_GET['pesquisa'] == 'indisponivel') {
                  $busca = '%0%';
                } else {
                  $busca = '%' . addslashes($_GET['pesquisa']) . '%';
                }
                $stmt = $conexao->prepare("SELECT * FROM vwExemplar
															WHERE idBiblioteca = :id
															and statusExemplar like :busca
                              or nomeLivro like :busca 
															or nomeAutor like :busca 
															or nomeEditora like :busca 
															or nomeGenero like :busca 
															or numExemplar like :busca
                              
															
															order by nomeLivro asc");
                $stmt->bindValue(':busca', $busca, PDO::PARAM_STR);
                $stmt->bindValue(':id', $_SESSION['biblioteca']);

                $stmt->execute();


                if ($stmt->rowCount() == 0) { ?>
                  <tr>
                    <td colspan="9">Busca indefinida</td>
                  </tr>
                  <?php  } else {
                  $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
                  foreach ($lista as $linhas) {  ?>
                    <div class="product" data-name="<?php echo $linhas['idExemplar'] ?>">
                      <img src="../../../../<?php echo $linhas['capaLivro'] ?>" alt="">
                      <h3><?php echo $linhas['nomeLivro'] ?></h3>
                    </div>
              <?php }
                }
              } ?>



              <!-- FIM CARDS -->

            </div>
            <!-- FIM CONTAINER CARDS -->

          </div>
          <!-- FIM CONTAINER DIVISAO CARDS -->
        </div>
      </div>
    <?php } ?>
  </div>



  <!-- MODAL CARDS -->

  <div class="products-preview">
    <?php if (empty($_GET['pesquisa'])) {
      foreach ($listaExemplar as $linhas) {  ?>

<div class="preview" data-target="<?php echo $linhas['idExemplar'] ?>">
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
                  <p> <?php echo $linhas['sinopseLivro'] ?><p>
                </div>
                <div class="buttons">
                  <a href="#" class="buy"  style="font-size: 15px;"><?php if($linhas['statusExemplar'] == 1){echo "Disponivel";}else{echo "Indisponivel";} ?></a>
                </div>
              </div>
            </div>
          </div>

      <?php }
    } else {

      $conexao = Conexao::conectar();
      if ($_GET['pesquisa'] == 'disponivel') {
        $busca = '%1%';
      } elseif ($_GET['pesquisa'] == 'indisponivel') {
        $busca = '%0%';
      } else {
        $busca = '%' . addslashes($_GET['pesquisa']) . '%';
      }
      $stmt = $conexao->prepare("SELECT * FROM vwExemplar
															WHERE idBiblioteca = :id
															and nomeLivro like :busca 
															or nomeAutor like :busca 
															or nomeEditora like :busca 
															or nomeGenero like :busca 
															or numExemplar like :busca
                              or statusExemplar like :busca
															
															order by nomeLivro asc");
      $stmt->bindValue(':busca', $busca, PDO::PARAM_STR);
      $stmt->bindValue(':id', $_SESSION['biblioteca']);

      $stmt->execute();


      if ($stmt->rowCount() == 0) { ?>
        <tr>
          <td colspan="9">Busca indefinida</td>
        </tr>
        <?php  } else {
        $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($lista as $linhas) {  ?>
          <div class="preview" data-target="<?php echo $linhas['idExemplar'] ?>">
            <div class="wrapperModal">
              <i class="fas fa-times"></i>
              <div class="left">
                <img src="../../../../<?php echo $linhas['capaLivro'] ?>" alt="" width="120">
                <h4><?php echo $linhas['nomeLivro'] ?></h4>
                <p><?php echo $linhas['nomeGenero'] ?></p>
                <p><?php echo $linhas['nomeAutor'] ?></p>
                <p><?php echo $linhas['nomeEditora'] ?></p>
                <p><?php echo $linhas['dtLancamento'] ?></p>
              </div>
              <div class="right">
                <div class="info">
                  <h3>Sinopse</h3>
                  <p> <?php echo $linhas['sinopseLivro'] ?><p>
                </div>
                <div class="buttons">
                  <a href="#" class="buy" style="font-size: 15px;"><?php if($linhas['statusExemplar'] == 1){echo "Disponivel";}else{echo "Indisponivel";} ?></a>
                </div>
              </div>
            </div>
          </div>
    <?php }
      }
    } ?>

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

  <!-- meu scritp  -->
  <script src="js/script.js"></script>
  <script src="js/foto.js"></script>
  <script src="js/modalPerfil.js"></script>
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