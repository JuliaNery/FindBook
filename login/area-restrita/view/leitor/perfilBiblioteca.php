<?php
	include_once('../../controller/valida-leitor.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
		<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
		<link rel="stylesheet" href="css/stylePerfilBiblioteca.css">
		<link rel="stylesheet" type="text/css" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
		<title>Perfil Biblioteca</title>
		<link rel="icon" href="img/logopjt.png">
	</head>

   <body>
		<!-- SIDEBAR -->
		<section id="sidebar">
			<a href="#" class="brand"><i class='bx bxs-book icon'></i> Bem Vindo!</a>
			<ul class="side-menu">
				<li><a href="paginaInicial.php" ><i class='bx bxs-dashboard icon' ></i> Página inicial</a></li>
				<li class="divider" data-text="Leitor">Leitor</li>
				<li><a href="perfilUsuario.php" ><i class='bx bxs-user icon' ></i> Perfil</a></li>
				<li><a href="procurar.php" class="active"><i class='bx bxs-book icon' ></i> Pesquisar</a></li>
			</ul>
		</section>
		<!-- FIM SIDEBAR --> 
		
		<!-- NAVBAR -->
		<section id="content">
			<nav>
				<i class='bx bx-menu toggle-sidebar' ></i>
				<form action="#">
					<div class="form-group">
						<input type="text" placeholder="Pesquisar...">
						<i class='bx bx-search icon' ></i>
					</div>
				</form>
				<span class="divider"></span>
				<p><?php echo $_SESSION['nomeLeitor'] ?></p>

				<div class="profile">
					<img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8cGVvcGxlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">
					<ul class="profile-link">
						<li><a href="#"><i class='bx bxs-cog' ></i> Configurações</a></li>
						<li><a href="#" onclick="openModal01()"><i class='bx bxs-log-out-circle' ></i> sair</a></li>
					</ul>
				</div>
			</nav>
		<!-- FIM NAVBAR -->

		<!-- MAIN -->
		<main>

			<!-- PERFIL BIBLIOTECA -->
				<section class="seccion-perfil-usuario">
					<div class="perfil-usuario-header">
						<div class="perfil-usuario-portada">
							<div class="perfil-usuario-avatar">
								<img src="https://jamesrmoro.me/wp-content/uploads/2021/02/profile.png" alt="Sem imagem">
							</div>
						</div>
					</div>
					<div class="perfil-usuario-body">
						<div class="perfil-usuario-bio">
							<h3 class="titulo">Biblioteca Irineu</h3>
							<div class="perfil-usuario-footer">
								<ul class="lista-datos">
									<li><i class="icono fas fa-phone-alt"></i>Numero </li> 
									<li><i class="icono fas fa-calendar-alt"></i>Atendimento</li>
								</ul> 
								<ul class="lista-datos">
									<li><i class="icono fas fa-user-check"></i>Email</li>
									<li><i class="icono fas fa-map-marker-alt"></i>Localização</li>
								</ul> 
							</div>
						</div>
						<div class="redes-sociales">
							<a href="" class="boton-redes facebook fab fa-facebook-f"><i class="icon-facebook"></i></a>
							<a href="" class="boton-redes twitter fab fa-twitter"><i class="icon-twitter"></i></a>
							<a href="" class="boton-redes instagram fab fa-instagram"><i class="icon-instagram"></i></a>
						</div>
					</div>
				</section>
			 <!-- FIM PERFIL -->


			 <br><br>


			 <h1 class="title">Livros da biblioteca</h1>

			 <center>
			 <form>
				<div class="wrapper">
					<input type="radio" name="select" id="option-1">
					<input type="radio" name="select" id="option-2">
					<input type="radio" name="select" id="option-3">
					<input type="radio" name="select" id="option-4">
					
					<label for="option-1" class="option option-1">
					  <div class="dot"></div>
					  <span>Romance</span>
					</label>
					<br>
					<label for="option-2" class="option option-2">
					  <div class="dot"></div>
					  <span>Terror</span>
					</label>
					<br>
					<label for="option-3" class="option option-3">
						<div class="dot"></div>
						<span>Suspense</span>
					  </label>
					  <br>
					  <label for="option-4" class="option option-4">
						<div class="dot"></div>
						<span>Comédia</span>
					  </label>
				</div>
			</form>
		</center>

		<!-- CARDS -->
		<div class="container">
			<div class="products-container">
			    <div class="product" data-name="p-1">
					<img src="img/livro.jpg"  alt="">
					<h3>Teste</h3>
				</div>
				<div class="product" data-name="p-2">
				   <img src="img/livro.jpg" alt="">
				   <h3>Teste</h3>
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
				   <img src="img/livro.jpg" alt="">
				   <h3>Teste</h3>
				   <p>Autor.</p>
				   <p>Data lancamento.</p>
				   <p>GENERO.</p>
				   <p>Sinopse.</p>
				</div>
			 
				<div class="preview" data-target="p-2">
				   <i class="fas fa-times"></i>
				   <img src="img/livro.jpg" alt="">
				   <h3>Teste</h3>
				   <p>Autor.</p>
				   <p>Data lancamento.</p>
				   <p>GENERO.</p>
				   <p>Sinopse.</p>
				</div>
		
				<div class="preview" data-target="p-3">
					<i class="fas fa-times"></i>
					<img src="img/livro.jpg" alt="">
					<h3>Teste</h3>
					<p>Autor.</p>
					<p>Data lancamento.</p>
					<p>GENERO.</p>
					<p>Sinopse.</p>
				</div>
			</div>
			<!-- FIM MODAL CARDS -->
		
              
            
             <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
             <script src="script.js"></script>
             <script src="js/modalFoto.js"></script>
			 <script src="js/modalCard.js"></script>
     
             
        <script>
            // modal excluir
            const modal6 = document.querySelector('.modal-container6')
            function openModal6() {
            modal6.classList.add('active')
            }
            function closeModal6() {
            modal6.classList.remove('active')
            }
        </script>
	</body>
</html>