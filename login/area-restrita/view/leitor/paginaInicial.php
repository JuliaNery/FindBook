<?php
	include_once('../../controller/valida-leitor.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="css/styleDashboard.css">
	<title>Pagina Inicial</title>
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
			<li><a href="#" class="active"><i class='bx bxs-dashboard icon' ></i> Página inicial</a></li>
			<li class="divider" data-text="Leitor">Leitor</li>
			<li><a href="perfilUsuario.php" ><i class='bx bxs-user icon' ></i> Perfil</a></li>
			<li><a href="procurar.php"><i class='bx bxs-book icon' ></i> Pesquisar</a></li>
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
			<span class="divider"></span>
			<p><?php echo $_SESSION['nomeLeitor'] ?></p>
			<div class="profile">
				
				<img src="img/foto.png" alt="">
				<ul class="profile-link">
					<li><a href="#"><i class='bx bxs-cog' ></i> Configurações</a></li>
					<li><a href="#" onclick="openModal01()"><i class='bx bxs-log-out-circle' ></i> Sair</a></li>
				</ul>
			</div>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>

			<a href="#" class="scrolltop" id="scroll-top">
				<i class='bx bx-chevrons-up scroll__top__icon'></i>
			</a>
		    <div class="teste">	<img src="img/u.png" alt="" srcset=""> </div>
            <br>
			<!-- CARDS SWIPPER -->
			<div class="container-teste">
			<div class="featured">
				<h1 class="heading"> <span>Livros em Destaques</span> </h1>
				<div class="swiper featured-slider">
					<div class="swiper-wrapper">
						<div class="swiper-slide box">
							<div class="products-container"> 
							    <div class="product">	
									<div class="icons">
										<a href="#" class="fas fa-heart"></a>
										<a class="fas fa-eye" data-name="p-1" ></a>
									</div>
								</div>
							</div>
							<div class="image">
								<img src="img/livro.jpg"  alt="">
							</div>
							<div class="content">
								<h3>Teste</h3>
							</div>
						</div>
			
						<div class="swiper-slide box">
							<div class="products-container"> 
								<div class="product">	
									<div class="icons">
										<a href="#" class="fas fa-heart"></a>
										<a class="fas fa-eye" data-name="p-2" ></a>
									</div>
								</div>
							</div>
							<div class="image">
								<img src="img/livro.jpg"  alt="">
							</div>
							<div class="content">
								<h3>Teste</h3>
							</div>
						</div>
			
						<div class="swiper-slide box">
							<div class="products-container"> 
								<div class="product">	
									<div class="icons">
										<a href="#" class="fas fa-heart"></a>
										<a class="fas fa-eye" data-name="p-3" ></a>
									</div>
								</div>
							</div>
							<div class="image">
								<img src="img/livro.jpg"  alt="">
							</div>
							<div class="content">
								<h3>Teste</h3>
							</div>
						</div>
			
						<div class="swiper-slide box">
							<div class="products-container"> 
								<div class="product">	
									<div class="icons">
										<a href="#" class="fas fa-heart"></a>
										<a class="fas fa-eye" data-name="p-4" ></a>
									</div>
								</div>
							</div>
							<div class="image">
								<img src="img/livro.jpg"  alt="">
							</div>
							<div class="content">
								<h3>Teste</h3>
							</div>
						</div>
			
						<div class="swiper-slide box">
							<div class="products-container"> 
								<div class="product">	
									<div class="icons">
										<a href="#" class="fas fa-heart"></a>
										<a class="fas fa-eye" data-name="p-5" ></a>
									</div>
								</div>
							</div>
							<div class="image">
								<img src="img/livro.jpg"  alt="">
							</div>
							<div class="content">
								<h3>Teste</h3>
							</div>
						</div>
					</div>
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
				</div>
			</div>
		</div>

		<!-- FIM CARD SWIPPER -->


		<!-- CARDS SWIPPER ROMANCE -->
		<div class="container-teste">
			<div class="featured">
				<h1 class="heading"> <span>Romance</span> </h1>	
				<div class="swiper featured-slider">
					<div class="swiper-wrapper">
			
						<div class="swiper-slide box">
							<div class="products-container"> 
							<div class="product">	
							<div class="icons">
								<a href="#" class="fas fa-heart"></a>
								<a class="fas fa-eye" data-name="p-1" ></a>
									</div>
								</div>
							</div>
							<div class="image">
								<img src="img/livro.jpg"  alt="">
							</div>
							<div class="content">
								<h3>Teste</h3>
							</div>
						</div>
			
			
						<div class="swiper-slide box">
							<div class="products-container"> 
							<div class="product">	
							<div class="icons">
								<a href="#" class="fas fa-heart"></a>
								<a class="fas fa-eye" data-name="p-2" ></a>
									</div>
								</div>
							</div>
							<div class="image">
								<img src="img/livro.jpg"  alt="">
							</div>
							<div class="content">
								<h3>Teste</h3>
							</div>
						</div>
			
						<div class="swiper-slide box">
							<div class="products-container"> 
							<div class="product">	
							<div class="icons">
								<a href="#" class="fas fa-heart"></a>
								<a class="fas fa-eye" data-name="p-3" ></a>
									</div>
								</div>
							</div>
							<div class="image">
								<img src="img/livro.jpg"  alt="">
							</div>
							<div class="content">
								<h3>Teste</h3>
							</div>
						</div>
			
						<div class="swiper-slide box">
							<div class="products-container"> 
							<div class="product">	
							<div class="icons">
								<a href="#" class="fas fa-heart"></a>
								<a class="fas fa-eye" data-name="p-4" ></a>
									</div>
								</div>
							</div>
							<div class="image">
								<img src="img/livro.jpg"  alt="">
							</div>
							<div class="content">
								<h3>Teste</h3>
							</div>
						</div>
			
						<div class="swiper-slide box">
							<div class="products-container"> 
							<div class="product">	
							<div class="icons">
								<a href="#" class="fas fa-heart"></a>
								<a class="fas fa-eye" data-name="p-5" ></a>
									</div>
								</div>
							</div>
							<div class="image">
								<img src="img/livro.jpg"  alt="">
							</div>
							<div class="content">
								<h3>Teste</h3>
							</div>
						</div>
					</div>
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
				</div>
			</div>
		</div>

		<!-- FIM CARD SWIPPER ROMANCE-->



		<!-- CARDS SWIPPER FICÇAO CIENTIFICA -->
		<div class="container-teste">

			<div class="featured">

				<h1 class="heading"> <span>Ficção Ciêntifica</span> </h1>
			
				<div class="swiper featured-slider">
			
					<div class="swiper-wrapper">
			
						<div class="swiper-slide box">
							<div class="products-container"> 
							<div class="product">	
							<div class="icons">
								<a href="#" class="fas fa-heart"></a>
								<a class="fas fa-eye" data-name="p-1" ></a>
									</div>
								</div>
							</div>
							<div class="image">
								<img src="img/livro.jpg"  alt="">
							</div>
							<div class="content">
								<h3>Teste</h3>
							</div>
						</div>
			
			
						<div class="swiper-slide box">
							<div class="products-container"> 
							<div class="product">	
							<div class="icons">
								<a href="#" class="fas fa-heart"></a>
								<a class="fas fa-eye" data-name="p-2" ></a>
									</div>
								</div>
							</div>
							<div class="image">
								<img src="img/livro.jpg"  alt="">
							</div>
							<div class="content">
								<h3>Teste</h3>
							</div>
						</div>
			
						<div class="swiper-slide box">
							<div class="products-container"> 
							<div class="product">	
							<div class="icons">
								<a href="#" class="fas fa-heart"></a>
								<a class="fas fa-eye" data-name="p-3" ></a>
									</div>
								</div>
							</div>
							<div class="image">
								<img src="img/livro.jpg"  alt="">
							</div>
							<div class="content">
								<h3>Teste</h3>
							</div>
						</div>
			
						<div class="swiper-slide box">
							<div class="products-container"> 
							<div class="product">	
							<div class="icons">
								<a href="#" class="fas fa-heart"></a>
								<a class="fas fa-eye" data-name="p-4" ></a>
									</div>
								</div>
							</div>
							<div class="image">
								<img src="img/livro.jpg"  alt="">
							</div>
							<div class="content">
								<h3>Teste</h3>
							</div>
						</div>
			
						<div class="swiper-slide box">
							<div class="products-container"> 
							<div class="product">	
							<div class="icons">
								<a href="#" class="fas fa-heart"></a>
								<a class="fas fa-eye" data-name="p-5" ></a>
									</div>
								</div>
							</div>
							<div class="image">
								<img src="img/livro.jpg"  alt="">
							</div>
							<div class="content">
								<h3>Teste</h3>
							</div>
						</div>
					</div>
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
				</div>
			</div>
		</div>

		<!-- FIM CARD SWIPPER FICÇAO CIENTIFICA-->






		<!-- CARDS SWIPPER COMEDIA -->
		<div class="container-teste">

			<div class="featured">

				<h1 class="heading"> <span>Comédia</span> </h1>
			
				<div class="swiper featured-slider">
			
					<div class="swiper-wrapper">
			
						<div class="swiper-slide box">
							<div class="products-container"> 
							<div class="product">	
							<div class="icons">
								<a href="#" class="fas fa-heart"></a>
								<a class="fas fa-eye" data-name="p-1" ></a>
									</div>
								</div>
							</div>
							<div class="image">
								<img src="img/livro.jpg"  alt="">
							</div>
							<div class="content">
								<h3>Teste</h3>
							</div>
						</div>
			
			
						<div class="swiper-slide box">
							<div class="products-container"> 
							<div class="product">	
							<div class="icons">
								<a href="#" class="fas fa-heart"></a>
								<a class="fas fa-eye" data-name="p-2" ></a>
									</div>
								</div>
							</div>
							<div class="image">
								<img src="img/livro.jpg"  alt="">
							</div>
							<div class="content">
								<h3>Teste</h3>
							</div>
						</div>
			
						<div class="swiper-slide box">
							<div class="products-container"> 
							<div class="product">	
							<div class="icons">
								<a href="#" class="fas fa-heart"></a>
								<a class="fas fa-eye" data-name="p-3" ></a>
									</div>
								</div>
							</div>
							<div class="image">
								<img src="img/livro.jpg"  alt="">
							</div>
							<div class="content">
								<h3>Teste</h3>
							</div>
						</div>
			
						<div class="swiper-slide box">
							<div class="products-container"> 
							<div class="product">	
							<div class="icons">
								<a href="#" class="fas fa-heart"></a>
								<a class="fas fa-eye" data-name="p-4" ></a>
									</div>
								</div>
							</div>
							<div class="image">
								<img src="img/livro.jpg"  alt="">
							</div>
							<div class="content">
								<h3>Teste</h3>
							</div>
						</div>
			
						<div class="swiper-slide box">
							<div class="products-container"> 
							<div class="product">	
							<div class="icons">
								<a href="#" class="fas fa-heart"></a>
								<a class="fas fa-eye" data-name="p-5" ></a>
									</div>
								</div>
							</div>
							<div class="image">
								<img src="img/livro.jpg"  alt="">
							</div>
							<div class="content">
								<h3>Teste</h3>
							</div>
						</div>
					</div>
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
				</div>
			</div>
		</div>

		<!-- FIM CARD SWIPPER COMEDIA-->






		<!-- CARDS SWIPPER TERROR -->
		<div class="container-teste">

			<div class="featured">

				<h1 class="heading"> <span>Terror</span> </h1>
			
				<div class="swiper featured-slider">
			
					<div class="swiper-wrapper">
			
						<div class="swiper-slide box">
							<div class="products-container"> 
							<div class="product">	
							<div class="icons">
								<a href="#" class="fas fa-heart"></a>
								<a class="fas fa-eye" data-name="p-1" ></a>
									</div>
								</div>
							</div>
							<div class="image">
								<img src="img/livro.jpg"  alt="">
							</div>
							<div class="content">
								<h3>Teste</h3>
							</div>
						</div>
			
			
						<div class="swiper-slide box">
							<div class="products-container"> 
							<div class="product">	
							<div class="icons">
								<a href="#" class="fas fa-heart"></a>
								<a class="fas fa-eye" data-name="p-2" ></a>
									</div>
								</div>
							</div>
							<div class="image">
								<img src="img/livro.jpg"  alt="">
							</div>
							<div class="content">
								<h3>Teste</h3>
							</div>
						</div>
			
						<div class="swiper-slide box">
							<div class="products-container"> 
							<div class="product">	
							<div class="icons">
								<a href="#" class="fas fa-heart"></a>
								<a class="fas fa-eye" data-name="p-3" ></a>
									</div>
								</div>
							</div>
							<div class="image">
								<img src="img/livro.jpg"  alt="">
							</div>
							<div class="content">
								<h3>Teste</h3>
							</div>
						</div>
			
						<div class="swiper-slide box">
							<div class="products-container"> 
							<div class="product">	
							<div class="icons">
								<a href="#" class="fas fa-heart"></a>
								<a class="fas fa-eye" data-name="p-4" ></a>
									</div>
								</div>
							</div>
							<div class="image">
								<img src="img/livro.jpg"  alt="">
							</div>
							<div class="content">
								<h3>Teste</h3>
							</div>
						</div>
			
						<div class="swiper-slide box">
							<div class="products-container"> 
							<div class="product">	
							<div class="icons">
								<a href="#" class="fas fa-heart"></a>
								<a class="fas fa-eye" data-name="p-5" ></a>
									</div>
								</div>
							</div>
							<div class="image">
								<img src="img/livro.jpg"  alt="">
							</div>
							<div class="content">
								<h3>Teste</h3>
							</div>
						</div>
					</div>
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
				</div>
			</div>
		</div>

		<!-- FIM CARD SWIPPER TERROR-->


	

		<!-- MODAL CARDS -->
			 
		<div class="products-preview">
			<div class="preview" data-target="p-1">
			   <i class="fas fa-times"></i>
			   <img src="img/livro.jpg" alt="">
			   <h3>A culpa é das estrelas</h3>
			   <h2>teste2</h2>
				<div class="buttons">
					<a href="#" class="buy"><i class="fas fa-location-arrow"></i>localizar</a>
					<a href="#" class="cart"> <i class="fas fa-heart"></i> Favoritos</a>
				</div>
			</div>
			 
			<div class="preview" data-target="p-2">
				<i class="fas fa-times"></i>
				<img src="img/livro.jpg" alt="">
				<h3>A culpa é das estrelas</h3>
				<h2>teste2</h2>
				<div class="buttons">
				   <a href="#" class="buy"><i class="fas fa-location-arrow"></i>localizar</a>
				   <a href="#" class="cart"> <i class="fas fa-heart"></i> Favoritos</a>
				</div>
			</div>
			 
			<div class="preview" data-target="p-3">
				<i class="fas fa-times"></i>
				<img src="img/livro.jpg" alt="">
				<h3>A culpa é das estrelas</h3>
				<h2>teste2</h2>
				<div class="buttons">
				   <a href="#" class="buy"><i class="fas fa-location-arrow"></i>localizar</a>
				   <a href="#" class="cart"> <i class="fas fa-heart"></i> Favoritos</a>
				</div>
			</div>
			 
			<div class="preview" data-target="p-4">
				<i class="fas fa-times"></i>
				<img src="img/livro.jpg" alt="">
				<h3>A culpa é das estrelas</h3>
				<h2>teste2</h2>
				<div class="buttons">
				   <a href="#" class="buy"><i class="fas fa-location-arrow"></i>localizar</a>
				   <a href="#" class="cart"> <i class="fas fa-heart"></i> Favoritos</a>
				</div>
			</div>
			 
			<div class="preview" data-target="p-5">
				<i class="fas fa-times"></i>
				<img src="img/livro.jpg" alt="">
				<h3>A culpa é das estrelas</h3>
				<h2>teste2</h2>
				<div class="buttons">
				   <a href="#" class="buy"><i class="fas fa-location-arrow"></i>localizar</a>
				   <a href="#" class="cart"> <i class="fas fa-heart"></i> Favoritos</a>
				</div>
			</div>

			<div class="preview" data-target="p-6">
				<i class="fas fa-times"></i>
				<img src="img/livro.jpg" alt="">
				<h3>A culpa é das estrelas</h3>
				<h2>teste2</h2>
				<div class="buttons">
				   <a href="#" class="buy"><i class="fas fa-location-arrow"></i>localizar</a>
				   <a href="#" class="cart"> <i class="fas fa-heart"></i> Favoritos</a>
				</div>
			</div>
		</div>
		<!-- FIM MODAL CARDS -->
	
		</main>
		<!-- MAIN -->
	</section>


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

	<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="script.js"></script>
	<script src="js/cards.js"></script>
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