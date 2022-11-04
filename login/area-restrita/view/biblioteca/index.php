<?php
	include_once('../../controller/valida-biblioteca.php');
	require_once("../../model/exemplar.php");
	require_once("../../model/livro.php");


	try{
		$Exemplar = new Exemplar();
		$Livro = new Livro();

		$qtdExemplar = $Exemplar->contador();
		$qtdLivro = $Livro->contador();

	}catch (Exception $e) {
	echo $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="css/styleDashboard.css">
	<title>Biblioteca dashboard</title>

	<link rel="icon" href="img/logopjt.png">
</head>

<body>

	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand"><i class='bx bxs-smile icon'></i> Biblioteca: <?php echo $_SESSION['nomeBiblioteca'] ?></a>
		<ul class="side-menu">
			<li><a href="index.php" class="active"><i class='bx bxs-dashboard icon'></i> Dashboard</a></li>
			<li class="divider" data-text="Biblioteca">Main</li>
			<li><a href="exemplares.php"><i class='bx bxs-book icon'></i> Exemplares</a></li>
			<li><a href="graficos.php"><i class='bx bxs-analyse icon'></i> Análise</a></li>
			<li><a href="perfil.php"><i class='bx bxs-user icon'></i> Perfil biblioteca</a></li>
		</ul>
		</ul>
	</section>
	<!-- SIDEBAR -->

	<!-- NAVBAR -->

	<section id="content">

		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu toggle-sidebar'></i>
			<form action="#">
				<div class="form-group">
					<input type="text" placeholder="pesquisar...">
					<i class='bx bx-search icon'></i>
				</div>
			</form>

			<span class="divider"></span>
			<div class="profile">
				<img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8cGVvcGxlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">
				<ul class="profile-link">
					<li><a href="#"><i class='bx bxs-cog'></i> Configurações</a></li>
					<li><a href="#" onclick="openModal01()"><i class='bx bxs-log-out-circle'></i> Sair</a></li>
				</ul>
			</div>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<h1 class="title">Dashboard</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Home</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Dashboard</a></li>
			</ul>

			<ul class="box-info">
				<li>
					<i class='bx bx-library'></i>
					<span class="text">
						<h3><?php foreach ($qtdLivro as $livro) {
                            echo ($livro['qtd']);
                        }?></h3>
						<p>Livros</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-copy'></i>
					<span class="text">
						<h3><?php foreach ($qtdExemplar as $a) {
                            echo ($a['qtd']);
                        }?></h3>
						<p>Exemplares</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-book'></i>
					<span class="text">
						<h3>0</h3>
						<p>Livros disponiveis</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-book-reader'></i>
					<span class="text">
						<h3>0</h3>
						<p>Livros alugados</p>
					</span>
				</li>
			</ul>
		</main>
		<!-- MAIN -->
	</section>
	<!-- NAVBAR -->


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

	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="js/sidebar.js"></script>
</body>

</html>