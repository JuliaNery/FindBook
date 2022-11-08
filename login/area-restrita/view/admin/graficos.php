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
	<link rel="stylesheet" href="css/styleGraficos.css">
	<link rel="icon" href="img/logopjt.png">
	<title>Adm análise</title>
</head>
<body>
	
	<!-- SIDEBAR -->
	<section id="sidebar">
		<!-- <a href="#" class="brand"><img src="img/logopjt.png" alt="" srcset=""> Administração</a> -->
		<a href="#" class="brand"><i class='bx bxs-smile icon'></i> Administração</a>
		<ul class="side-menu">
			<li><a href="index.php" ><i class='bx bxs-dashboard icon' ></i> Dashboard</a></li>
			<li class="divider" data-text="Administração">Main</li>
			<li><a href="#" class="active"><i class='bx bxs-chart icon' ></i> Análise</a></li>
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
			<h1 class="title">Análise</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Home</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Dashboard</a></li>
			</ul>
			<a href="#" class="btn-download">
				<i class='bx bxs-cloud-download' ></i>
				<span class="text">Download PDF</span>
			</a>


						
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <script type="text/javascript">
   google.charts.load("current", {packages:['corechart']});
   google.charts.setOnLoadCallback(drawChart);
   function drawChart() {
	 var data = google.visualization.arrayToDataTable([
	   ["Element", "Density", { role: "style" } ],
	   ["Exemplar", <?php foreach ($qtdExemplar as $a) {echo ($a['qtd']);}?>, "#FFDEAD"],
	   ["Livros", <?php foreach ($qtdLivro as $a) {echo ($a['qtd']);}?>, "DEB887"],
	   ["Leitores", <?php foreach ($qtdLeitor as $a) {echo ($a['qtd']);}?>, "F4A460"],
	   ["Bibliotecas", <?php foreach ($qtdBiblioteca as $a) {echo ($a['qtd']);}?>, "color: #EEE8AA"]
	 ]);

	 var view = new google.visualization.DataView(data);
	 view.setColumns([0, 1,
					  { calc: "stringify",
						sourceColumn: 1,
						type: "string",
						role: "annotation" },
					  2]);

	 var options = {
	   title: "Teste",
	   width: 600,
	   height: 400,
	   bar: {groupWidth: "95%"},
	   legend: { position: "none" },
	 };
	 var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
	 chart.draw(view, options);
 }
 </script>

<div class="teste" id="columnchart_values" style="width: 1400px; height: 400px;"></div>


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