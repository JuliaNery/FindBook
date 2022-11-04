<?php
include_once('../../controller/valida-biblioteca.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
	<link rel="stylesheet" href="css/stylePerfil.css">
	<link rel="stylesheet" type="text/css" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
	<title>biblioteca Perfil</title>

	<link rel="icon" href="img/logopjt.png">
</head>

<body>

	<!--------------SCROLL TOP------------------------>
	<a href="#" class="scrolltop" id="scroll-top">
		<i class='bx bx-chevrons-up scroll__top__icon'></i>
	</a>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand"><i class='bx bxs-smile icon'></i> Biblioteca</a>
		<ul class="side-menu">
			<li><a href="index.php"><i class='bx bxs-dashboard icon'></i> Dashboard</a></li>
			<li class="divider" data-text="Biblioteca">Main</li>
			<li><a href="exemplares.php"><i class='bx bxs-book icon'></i> Exemplares</a></li>
			<li><a href="graficos.php"><i class='bx bxs-analyse icon'></i> Análise</a></li>
			<li><a href="perfil.php" class="active"><i class='bx bxs-user icon'></i> Perfil biblioteca</a></li>
		</ul>
	</section>
	<!-- FIM SIDEBAR -->

	<!-- NAVBAR -->
	<section id="content">
		<nav>
			<i class='bx bx-menu toggle-sidebar'></i>
			<form action="#">
				<div class="form-group">
					<input type="text" placeholder="Pesquisar...">
					<i class='bx bx-search icon'></i>
				</div>
			</form>
			<span class="divider"></span>
			<div class="profile">
				<img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8cGVvcGxlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">
				<ul class="profile-link">
					<li><a href="#"><i class='bx bxs-cog'></i> Configurações</a></li>
					<li><a href="#" onclick="openModal01()"><i class='bx bxs-log-out-circle'></i> sair</a></li>
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
						<h3 class="titulo">Biblioteca <?php echo $_SESSION['nomeBiblioteca'] ?></h3>
						<div class="perfil-usuario-footer">
							<ul class="lista-datos">
								<li><i class="icono fas fa-phone-alt"></i>Numero </li>
								<li><i class="icono fas fa-calendar-alt"></i>Abertura <?php echo $_SESSION['horarioAbertura'] ?></li>
								<li><i class="icono fas fa-calendar-alt"></i>Fechamento<?php echo $_SESSION['horarioFechamento'] ?></li>
							</ul>
							<ul class="lista-datos">
								<li><i class="icono fas fa-user-check"></i><?php echo $_SESSION['emailBiblioteca'] ?></li>
								<li><i class="icono fas fa-map-marker-alt"></i>Localização</li>
							</ul>
						</div>

						<div onclick="openModal6()" class="btn">Editar</div>

					</div>
				</div>
			</section>
			<!-- FIM PERFIL -->

			<!-- MODAL FORMULARIO PERFIL-->
			<div class="modal-container6">
				<div class="modal6">
					<center>
						<h2>Edite seu perfil</h2>
					</center>
					<hr />
					<form action="#" method="post">
						<div class="form first">
							<div class="details personal"><br>
								<p>As informações adicionadas abaixo apareceram em seu perfil:</p>
							</div>
							<br>
							<div class="image">
								<div class="editar-content">
									<span>
										<i>editar</i>
									</span>
								</div>
								<div id="new">
									<div class="close-preview-js close-preview">x</div>
								</div>
								<img src="https://jamesrmoro.me/wp-content/uploads/2021/02/profile.png" alt="Sem imagem">
							</div>
							<br>
							<div class="ee">
								<input id="file-preview-js" type="file" accept="image/*" onchange="loaderFile(event)"><br><br>
								<!-- <input type="submit" value="Enviar"> -->
							</div>

							<br>
							<div class="fields">
								<div class="input-field">
									<label> Nome:</label>
									<input type="text" placeholder="Nome">
								</div>
								<div class="input-field">
									<label>Email: </label>
									<input type="text" placeholder="Nome">
								</div>
								<div class="input-field">
									<label>Horario Abertura:</label>
									<input type="time" placeholder="Nome">
								</div>
								<div class="input-field">
									<label>Horario Fechamento:</label>
									<input type="time" placeholder="Nome">
								</div>
								<div class="input-field">
									<label>Telefone</label>
									<input type="text" id="telefone" maxlength="10" placeholder="(11) 1111-1111">
								</div>
								<div class="input-field">
									<label>Celular</label>
									<input type="text" id="telefone" maxlength="11" placeholder="(11) 91111-1111">
								</div>
							</div>
						</div>
					</form>
					<hr />
					<div class="btns">
						<button class="btnOK" onclick="closeModal6()">alterar</button>
						<button class="btnClose" onclick="closeModal6()">fechar</button>
					</div>
				</div>
			</div>
			<!-- FIM MODAL FORMULARIO PERFIL -->
			<script>
				function mascara(o, f) {
					v_obj = o
					v_fun = f
					setTimeout("execmascara()", 1)
				}

				function execmascara() {
					v_obj.value = v_fun(v_obj.value)
				}

				function mtel(v) {
					v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
					v = v.replace(/^(\d{2})(\d)/g, "($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
					v = v.replace(/(\d)(\d{4})$/, "$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
					return v;
				}

				function id(el) {
					return document.getElementById(el);
				}
				window.onload = function() {
					id('telefone').onkeyup = function() {
						mascara(this, mtel);
					}
				}
			</script>
			<!-- MODAL SAIR -->
			<div class="modal-container01">
				<div class="modal01">
					<h2>Deseja sair?</h2>
					<hr />
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

			<br><br>

			<div class="container">

				<div class="products-container">

					<div class="product" data-name="p-1">
						<img src="img/livro.jpg" alt="">
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
			<script src="js/sidebar.js"></script>
			<script src="js/modalFoto.js"></script>
			<script src="js/modalCard.js"></script>

			<script>
				//Modal Editar perfil
				const modal6 = document.querySelector('.modal-container6')

				function openModal6() {
					modal6.classList.add('active')
				}

				function closeModal6() {
					modal6.classList.remove('active')
				}
			</script>


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