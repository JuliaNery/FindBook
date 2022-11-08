<?php
	include_once('../../controller/valida-leitor.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
		<link rel="stylesheet" href="css/styleProcurar.css">
		<title>Procurar</title>
		<link rel="icon" href="img/logopjt.png">
		<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
		<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	</head>
	<body>
		
		<!-- SIDEBAR -->
		<section id="sidebar">
			<a href="#" class="brand"><i class='bx bxs-book icon'></i> Bem Vindo!</a>
			<ul class="side-menu">
				<li><a href="paginaInicial.php" ><i class='bx bxs-dashboard icon' ></i> Página inicial</a></li>
				<li class="divider" data-text="Leitor">Leitor</li>
				<li><a href="perfilUsuario.php" ><i class='bx bxs-user icon' ></i> Perfil</a></li>
				<li><a href="#" class="active"><i class='bx bxs-book icon' ></i> Pesquisar</a></li>
			</ul>
		</section>
		<!-- SIDEBAR -->

		<!-- NAVBAR -->
		<section id="content">
			<nav>
				<i class='bx bx-menu toggle-sidebar' ></i>
				<form action="#">
					<div class="form-group">
						<input type="text" placeholder="pesquisar...">
						<i class='bx bx-search icon' ></i>
					</div>
				</form>
				<button id="cart-btn">
					<i class='bx bx-filter'></i>
				</button>
				<span class="divider"></span>
				<p><?php echo $_SESSION['nomeLeitor'] ?></p>

				<div class="profile">
					<img src="img/foto.png" alt="">
					<ul class="profile-link">
						<li><a href="#"><i class='bx bxs-cog' ></i> configurações</a></li>
						<li><a href="#" onclick="openModal01()" ><i class='bx bxs-log-out-circle' ></i> Sair</a></li>
					</ul>
				</div>

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
					   <form>
						    <div class="input-field">
							    <label> Categoria: </label>
							    <select name="Digite">
								   <option value="0">Selecione</option>
								   <option value="0"><a href="">claudia leite</a> </option>
							    </select>
						    </div>

							<div class="input-field">
								<label> Faixa etária: </label>
								<select name="Digite">
									<option value="0">Selecione</option>
									<option value="0"><a href="">claudia leite</a> </option>
								</select>
							</div>

							<div class="fields">
								<div class="input-field">
									<label>Cep:</label>
									<input type="text" placeholder="Digite aqui">
								</div>
							</div>

						    <div class="wrapper">
								<input type="radio" name="select" id="option-1">
								<input type="radio" name="select" id="option-2">
								<input type="radio" name="select" id="option-3">
								<input type="radio" name="select" id="option-4">
								<label for="option-1" class="option option-1">
							        <div class="dot"></div>
							        <span>Livro</span>
							    </label>
							    <br>
							    <label for="option-2" class="option option-2">
							        <div class="dot"></div>
							        <span>Biblioteca</span>
							    </label>
							    <br>
							    <label for="option-3" class="option option-3">
							     	<div class="dot"></div>
								    <span>Autor</span>
							    </label>
							    <br>
							    <label for="option-4" class="option option-4">
								    <div class="dot"></div>
								    <span>Editora</span>
							    </label>
						    </div>
							</div>
							<div class="cart-footer">
								<div class="total"></div>
								<a href="#" class="btn2">Filtrar</a>
								<a href="#" class="btn2">Apagar</a>
							</div>
				</div>
				</form>
				
			</nav>
			<!-- NAVBAR -->

			<!-- MAIN -->
			<main>
				<a href="#" class="scrolltop" id="scroll-top">
					<i class='bx bx-chevrons-up scroll__top__icon'></i>
				</a>

				<!-- CARDS -->

				<div class="container">
					<h1 class="title1">Resultado</h1>
					<br><br>
					<div class="products-container">
						<div class="product" data-name="p-1">
							<img src="img/biblioteca.jpg"  alt="">
							<h3>Nome Biblioteca</h3>
						</div>
					
						<div class="product" data-name="p-2">
							<img src="img/livro.jpg" alt="">
							<h3>Nome Livro</h3>
						</div>
					
						<div class="product" data-name="p-3">
							<img src="img/livro.jpg" alt="">
							<h3>Teste</h3>
						</div>
					</div>
				</div>
				<!-- FIM CARDS -->


				<!-- MODAL CARDS -->
				
				<div class="products-preview">
				
					<div class="preview" data-target="p-1">
						<i class="fas fa-times"></i>
						<img src="img/biblioteca.jpg" alt="">
						<h3>Nome Biblioteca</h3>
						<div class="buttons">
							<a href="perfilBiblioteca.html" class="buy"><i class="fas fa-user"></i>Ver perfil</a>
							<a href="#" class="cart"> <i class="fas fa-location-arrow"></i> Ver endereço</a>
						</div>
					</div>
				
					<div class="preview" data-target="p-2">
						<i class="fas fa-times"></i>
						<img src="img/livro.jpg" alt="">
						<h3>Nome livro</h3>
						<p>autor</p>
						<p>Editora</p>
						<p>Sinopse....</p>
						<div class="buttons">
							<a href="#" class="buy"><i class="fas fa-location-arrow"></i>Localizar</a>
							<a href="#" class="cart"> <i class="fas fa-heart"></i> Favoritos</a>
						</div>
					</div>

					<div class="preview" data-target="p-3">
						<i class="fas fa-times"></i>
						<img src="img/livro.jpg" alt="">
						<h3>Teste</h3>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, dolorem.</p>
						<div class="buttons">
							<a href="#" class="buy">buy now</a>
							<a href="#" class="cart">add to cart</a>
						</div>
					</div>
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
			</main>

		</section>
		<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
		<script src="script.js"></script>
		<script src="js/cards2.js"></script>
		<script src="js/teste.js"></script>
		
		
		<script>
			//Modal sair
			const modal01 = document.querySelector('.modal-container01')
			function openModal01() {
			modal01.classList.add('active')
			}
			function closeModal01() {
			modal01.classList.remove('active')
			}
		</script>
	</body>
</html>