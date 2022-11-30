<?php
	include_once('../../controller/valida-biblioteca.php');
	require_once("../../model/exemplar.php");
	require_once("../../model/livro.php");


	try{
		$Exemplar = new Exemplar();
		$Livro = new Livro();

		$qtdExemplar = $Exemplar->contador();
		$qtdDisp = $Exemplar->contadorDisp();
		$qtdInd = $Exemplar->contadorInd();
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
		<a href="#" class="brand"><i class='bx bx-library icon'></i> Biblioteca</a>
		<ul class="side-menu">
			<li><a href="index.php" class="active"><i class='bx bxs-dashboard icon'></i> Dashboard</a></li>
			<li class="divider" data-text="Biblioteca">Main</li>
			<li><a href="exemplares.php"><i class='bx bxs-book icon'></i> Exemplares</a></li>
<!-- 			<li><a href="graficos.php"><i class='bx bxs-analyse icon'></i> Análise</a></li>
 -->			<li><a href="perfil.php"><i class='bx bxs-user icon'></i> Perfil biblioteca</a></li>
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
			<p><?php echo $_SESSION['nomeBiblioteca'] ?></p>
			<div class="profile">
				<img src="<?php if(!empty($_SESSION['fotoBiblioteca'])){ echo "../../../../".$_SESSION['fotoBiblioteca']; }else{ echo("https://jamesrmoro.me/wp-content/uploads/2021/02/profile.png");}?>" alt="">
				<ul class="profile-link">
					<li><a href="#" onclick="openModal03()"><i class='bx bx-edit-alt'></i> Alterar senha</a></li>
					<li><a href="#" onclick="openModal02()"><i class='bx bxs-user-account'></i> Excluir conta</a></li>
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

			<!-- <ul class="box-info">
				<li>
					<i class='bx bx-library'></i>
					<span class="text">
						<h3><?php $n = 0; foreach ($qtdLivro as $livro) {
                            
							$n++;
                        }echo ($n);?></h3>
						<p>Livro</p>
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
			</ul> -->

			<br><br><br>


			<div class="table-data">
				<div class="order">
					
				<ul class="box-info">
				<li>
					<i class='bx bx-library'></i>
					<span class="text">
						<h3><?php $n = 0; foreach ($qtdLivro as $livro) {
                            
							$n++;
                        }echo ($n);?></h3>
						<p>Livro</p>
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
						<h3><?php foreach ($qtdDisp as $a) {
								echo ($a['qtd']);
							}?></h3>	
						<p>Livros disponiveis</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-book-reader'></i>
					<span class="text">
						<h3><?php foreach ($qtdInd as $a) {
									echo ($a['qtd']);
						}?></h3>
						<p>Livros alugados</p>
					</span>
				</li>
			</ul>

				</div>
				<div class="todo">
					

				<div class="container-grafico">

 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <script type="text/javascript">
   google.charts.load("current", {packages:['corechart']});
   google.charts.setOnLoadCallback(drawChart);
   function drawChart() {
	 var data = google.visualization.arrayToDataTable([
	   ["Element", "Density", { role: "style" } ],
	   ["Exemplar", <?php foreach ($qtdExemplar as $a) {echo ($a['qtd']);}?>, "#FFDEAD"],
	   ["Livros", <?php  echo ($n);?>, "DEB887"],
	   ["Disponiveis", <?php foreach ($qtdDisp as $a) {echo ($a['qtd']);}?>, "F4A460"],
	   ["Alugados", <?php foreach ($qtdInd as $a) {echo ($a['qtd']);}?>, "color: #EEE8AA"]

	 ]);

	 var view = new google.visualization.DataView(data);
	 view.setColumns([0, 1,
					  { calc: "stringify",
						sourceColumn: 1,
						type: "string",
						role: "annotation" },
					  2]);

	 var options = {
	   title: "Dashboard",
	   width: 527,
	   height: 400,
	   bar: {groupWidth: "95%"},
	   legend: { position: "none" },
	 };
	 var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
	 chart.draw(view, options);
 }
 </script>

<!-- <div class="teste" id="columnchart_values" style="width: 1400px; height: 400px;"></div> -->
<div class="teste" id="columnchart_values" ></div>


					</div>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- NAVBAR -->


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

	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="js/sidebar.js"></script>
</body>

</html>