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
                <input type="search" name="" placeholder="pesquise aqui..." id="search-box">
                <label for="search-box" class="fas fa-search"></label> 
            </form>
            <button id="cart-btn">
             <a>FILTRO</a><i class='bx bx-filter'></i>
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
                            <i class='bx bx-x' ></i>
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
						<div class="product" data-name="p-1">
							<img src="image/livro.jpg"  alt="">
							<h3>Nome Livro</h3>
						</div>
					
						<div class="product" data-name="p-2">
							<img src="image/livro.jpg" alt="">
							<h3>Nome Livro</h3>
						</div>

                        <div class="product" data-name="p-3">
							<img src="image/livro.jpg" alt="">
							<h3>Nome Livro</h3>
						</div>
					
						<div class="product" data-name="p-4">
							<img src="image/livro.jpg" alt="">
							<h3>Nome Livro</h3>
						</div>

                        <div class="product" data-name="p-5">
							<img src="image/biblioteca.jpg"  alt="">
							<h3>Nome Biblioteca</h3>
						</div>

                        <div class="product" data-name="p-6">
							<img src="image/biblioteca.jpg"  alt="">
							<h3>Nome Biblioteca</h3>
						</div>
					
						<div class="product" data-name="p-7">
							<img src="image/biblioteca.jpg"  alt="">
							<h3>Nome Biblioteca</h3>
						</div>
					
						<div class="product" data-name="p-8">
							<img src="image/biblioteca.jpg"  alt="">
							<h3>Nome Biblioteca</h3>
						</div>
					</div>
                    <!-- FIM CARDS -->
				</div>
                <!-- FIM CONTAINER CARDS -->
				

           
               <!-- MODAL CARDS -->
				<div class="products-preview">

                    <!-- MODAL LIVROS -->
					<div class="preview" data-target="p-1">
                        <div class="wrapperModal">
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
                                        aaaa aaaa aaaa aaaa aaa aaa aaaa aaaa aaa aa a aaaaaaaa<p>
                                </div>
                                <div class="buttons">
                                  <a href="#" class="buy"><i class="fas fa-location-arrow"></i>  -Localizar</a>
                                  <a href="#" class="buy"> <i class="fas fa-heart"></i>  -Favoritar</a>
                                  </div>
                            </div>
                        </div>
					</div>
				
					<div class="preview" data-target="p-2">
                        <div class="wrapperModal">
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
                                        aaaa aaaa aaaa aaaa aaa aaa aaaa aaaa aaa aa a aaaaaaaa<p>
                                </div>
                                <div class="buttons">
                                    <a href="#" class="buy"><i class="fas fa-location-arrow"></i>  -Localizar</a>
                                    <a href="#" class="buy"> <i class="fas fa-heart"></i>  -Favoritar</a>
                                  </div>
                            </div>
                        </div>
					</div>

					<div class="preview" data-target="p-3">
                        <div class="wrapperModal">
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
                                        aaaa aaaa aaaa aaaa aaa aaa aaaa aaaa aaa aa a aaaaaaaa<p>
                                </div>
                                <div class="buttons">
                                    <a href="#" class="buy"><i class="fas fa-location-arrow"></i>  -Localizar</a>
                                    <a href="#" class="buy"> <i class="fas fa-heart"></i>  -Favoritar</a>
                                  </div>
                            </div>
                        </div>
					</div>

                    <div class="preview" data-target="p-4">
                        <div class="wrapperModal">
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
                                        aaaa aaaa aaaa aaaa aaa aaa aaaa aaaa aaa aa a aaaaaaaa<p>
                                </div>
                                <div class="buttons">
                                  <a href="#" class="buy"><i class="fas fa-location-arrow"></i>  -Localizar</a>
                                  <a href="#" class="buy"> <i class="fas fa-heart"></i>  -Favoritos</a>
                                  <a href="#" class="buy"> <i class="fas fa-book"></i>  -Disponibilidade</a>
                                  </div>
                            </div>
                        </div>
					</div>
                    <!-- FIM MODAL LIVROS -->

                
                    <!-- MODAL BIBLIOTECA -->
                        <div class="preview" data-target="p-5">
                            <div class="wrapper2">
                                <i class="fas fa-times"></i>
                                <div class="left">
                                    <img src="image/biblioteca.jpg" alt="" width="200">
                                </div>
                                <div class="right">
                                    <div class="info">
                                        <h3>Biblioteca alguma coisa</h3>
                                        <p>Rua México</p>
                                        <p>Número: 42</p>
                                        <p>Bairro: Jardim Melilo</p>
                                        <p>Cidade: Ferraz de vasconcelos</p>
                                        <p>Telefone: 4674-5927</p>
                                    </div>
                                    <div class="buttons">
                                        <a href="#" class="cart"><i class="fas fa-user"></i> Perfil</a>
                                        <a href="#" class="cart"><i class="fas fa-location-arrow"></i> Localizar</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="preview" data-target="p-6">
						<div class="wrapper2">
                            <i class="fas fa-times"></i>
                            <div class="left">
                                <img src="image/biblioteca.jpg" alt="" width="190">
                            </div>
                            <div class="right">
                                <div class="info">
                                    <h3>Biblioteca alguma coisa</h3>
                                    <p>Rua México</p>
                                    <p>Número: 42</p>
                                    <p>Bairro: Jardim Melilo</p>
                                    <p>Cidade: Ferraz de vasconcelos</p>
                                    <p>Telefone: 4674-5927</p>
                                </div>
                                <div class="buttons">
                                    <a href="#" class="cart"><i class="fas fa-user"></i> Perfil</a>
                                    <a href="#" class="cart"><i class="fas fa-location-arrow"></i> Localizar</a> 
                                </div>
                            </div>
                        </div>
			    	</div>

                    <div class="preview" data-target="p-7">
						<div class="wrapper2">
                            <i class="fas fa-times"></i>
                            <div class="left">
                                <img src="image/biblioteca.jpg" alt="" width="190">
                            </div>
                            <div class="right">
                                <div class="info">
                                    <h3>Biblioteca alguma coisa</h3>
                                    <p>Rua México</p>
                                    <p>Número: 42</p>
                                    <p>Bairro: Jardim Melilo</p>
                                    <p>Cidade: Ferraz de vasconcelos</p>
                                    <p>Telefone: 4674-5927</p>
                                </div>
                                <div class="buttons">
                                    <a href="#" class="cart"><i class="fas fa-user"></i> Perfil</a>
                                    <a href="#" class="cart"><i class="fas fa-location-arrow"></i> Localizar</a>
                                </div>
                            </div>
                        </div>
			    	</div>

                    <div class="preview" data-target="p-8">
						<div class="wrapper2">
                            <i class="fas fa-times"></i>
                            <div class="left">
                                <img src="image/biblioteca.jpg" alt="" width="190">
                            </div>
                            <div class="right">
                                <div class="info">
                                    <h3>Biblioteca alguma coisa</h3>
                                    <p>Rua México</p>
                                    <p>Número: 42</p>
                                    <p>Bairro: Jardim Melilo</p>
                                    <p>Cidade: Ferraz de vasconcelos</p>
                                    <p>Telefone: 4674-5927</p>
                                </div>
                                <div class="buttons">
                                    <a href="#" class="cart"><i class="fas fa-user"></i> Perfil</a>
                                    <a href="#" class="cart"><i class="fas fa-location-arrow"></i> Localizar</a>
                                </div>
                            </div>
                        </div>
                   </div>
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
           Confirmação de exclusão da conta 'EMAIL DO LEITOR'. É impossível reverter essa ação! Todos os seus dados serão deletados do nosso sistema.  Deseja continuar e apagar a sua conta?
          </span>
          <div class="btns">
            <button class="btnOK02" onclick="closeModal02()">Sim</button>
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