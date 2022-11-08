<?php
	include_once('../../controller/valida-permanencia.php');
	require_once("../../model/exemplar.php");
	require_once("../../model/livro.php");
	require_once("../../model/leitor.php");
	require_once("../../model/biblioteca.php");




	try{
		$Exemplar = new Exemplar();
		$Livro = new Livro();
		$Biblioteca = new Biblioteca();
		$Leitor = new Leitor();

		$qtdExemplar = $Exemplar->contadorAdmin();
		$qtdLivro = $Livro->contadorAdmin();
		$qtdBiblioteca = $Biblioteca->contador();
		$qtdLeitor = $Leitor->contador();

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
	<link rel="icon" href="img/logopjt.png">
	<title>Admin dashboard</title>
</head>
<body>
	
	<!-- SIDEBAR -->
	<section id="sidebar">
		<!-- <a href="#" class="brand"><img src="img/logopjt.png" alt="" srcset=""> Administração</a> -->
		<a href="#" class="brand"><i class='bx bxs-smile icon'></i> Administração</a>
		<ul class="side-menu">
			<li><a href="#" class="active"><i class='bx bxs-dashboard icon' ></i> Dashboard</a></li>
			<li class="divider" data-text="Administração">Main</li>
			<li><a href="graficos.php" ><i class='bx bxs-chart icon' ></i> Análise</a></li>
			<li><a href="bibliotecasCadastradas.php"><i class='bx bx-library icon' ></i> Bibliotecas cadastradas</a></li>
			<li><a href="usuariosCadastrados.php"><i class='bx bxs-user icon' ></i> Leitores cadastrados</a></li>
			<li><a href="livrosCadastrados.php"><i class='bx bxs-book icon' ></i> Livros cadastradas</a></li>
		</ul>
	</section>
	<!-- SIDEBAR -->

	
	<section id="content">

		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu toggle-sidebar' ></i>
			<form action="#">
				<div class="form-group">
					<input type="text" placeholder="pesquisar...">
					<i class='bx bx-search icon' ></i>
				</div>
			</form>
			
			<span class="divider"></span>
			<div class="profile">
				<img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8cGVvcGxlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">
				<ul class="profile-link">
					<li><a href="#"><i class='bx bxs-cog' ></i> Configurações</a></li>
					<li><a href="#" onclick="openModal01()"><i class='bx bxs-log-out-circle' ></i> Sair</a></li>
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

			<a href="#" class="btn-download">
				<i class='bx bxs-cloud-download' ></i>
				<span class="text">Download PDF</span>
			</a>

			<ul class="box-info">
				<li>
					<i class='bx bxs-user-plus'></i>
					<span class="text">
						<h3><?php foreach ($qtdLeitor as $leitor) {
                            echo ($leitor['qtd']);
                        }?></h3>
						<p>Usuários cadastrados</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3> 0 </h3>
						<p>Visitas no site</p>
					</span>
				</li>
				<li>
					<i class='bx bx-library'></i>
					<span class="text">
						<h3><?php foreach ($qtdBiblioteca as $biblioteca) {
                            echo ($biblioteca['qtd']);
                        }?></h3>
						<p>Bibliotecas cadastradas</p>
					</span>
				</li>
			</ul>

			<ul class="box-info">
				<li>
					<i class='bx bxs-book'></i>
					<span class="text">
						<h3><?php foreach ($qtdLivro as $livro) {
                            echo ($livro['qtd']);
                        }?></h3>
						<p>Total de livros cadastrados</p>
					</span>
				</li>
				<li>
				<i class='bx bxs-group' ></i>
					<span class="text">
						<h3> 0 </h3>
						<p>Livros Disponiveis</p>
					</span>
				</li>
				<li>
				<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>0</h3>
						<p>Livros Alugados</p>
					</span>
				</li>
			</ul>

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

			
		</main>
		<!-- MAIN -->
	</section>
	

	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="script.js"></script>


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