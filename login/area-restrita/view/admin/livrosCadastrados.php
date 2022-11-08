<?php
include_once('../../controller/valida-permanencia.php');
require_once("../../model/livro.php");

try {
	$Livro = new Livro();

	$listaLivro = $Livro->listar();
} catch (Exception $e) {
	echo $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="css/livrosCadastrados.css">
	<link rel="icon" href="img/logopjt.png">
	<title>Livros Cadastrados</title>
</head>
<body>
	
	<!-- SIDEBAR -->
	<section id="sidebar">
		<!-- <a href="#" class="brand"><img src="img/logopjt.png" alt="" srcset=""> Administração</a> -->
		<a href="#" class="brand"><i class='bx bxs-smile icon'></i> Administração</a>
		<ul class="side-menu">
			<li><a href="index.php" ><i class='bx bxs-dashboard icon' ></i> Dashboard</a></li>
			<li class="divider" data-text="Administração">Main</li>
			<li><a href="graficos.php" ><i class='bx bxs-chart icon' ></i> Análise</a></li>
			<li><a href="bibliotecasCadastradas.php"><i class='bx bx-library icon' ></i> Bibliotecas cadastradas</a></li>
			<li><a href="usuariosCadastrados.php"><i class='bx bxs-user icon' ></i> Leitores cadastrados</a></li>
			<li><a href=""  class="active"><i class='bx bxs-book icon' ></i> Livros cadastradas</a></li>
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
			<h1 class="title">livros Cadastrados</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Home</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Dashboard</a></li>
			</ul>
			
			<a href="#" class="btn-download">
				<i class='bx bxs-cloud-download' ></i>
				<span class="text">Download PDF</span>
			</a>

			<br>
			  <!-- TABELA  -->
			  <div class="container">
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Livro</th>
                                <th>Nome</th>
                                <th>Autor</th>
                                <th>Editora</th>
                                <th>Genêro</th>
                                <th>Faixa Etária</th>
                                <th>Data Lançamento</th>
                                <th>Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php foreach ($listaLivro as $linhas) {  ?>
                            <tr>
                                <td>
                                    <div class="user">
                                    <img class="user-image" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8cGVyc29ufGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60" alt="">
                                    <div class="user-info">
                                </td>
                                <td><?php echo $linhas['nomeLivro'] ?></td>
                                <td><?php echo $linhas['nomeAutor'] ?></td>
                                <td><?php echo $linhas['nomeEditora'] ?></td>
                                <td><?php echo $linhas['nomeGenero'] ?> </td>
                                <td><?php echo $linhas['faixaEtaria'] ?> anos</td>
                                <td><?php echo $linhas['dtLancamento'] ?></td>
                                <td><button onclick="openModal2()" class="button button3">Excluir</button></td>
                            </tr>
							<?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- FIM TABELA -->



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

			   <!-- modal excluir -->
			   <div class="modal-container2">
				<div class="modal2">
				  <h2>Deseja excluir?</h2>
				  <hr />
				  <span>
					   Confirmando a exclusão deste item, todas os dados salvos serão apagados permanentemente. 
					   Tem certeza que deseja fazer isso?
				  </span>
				  <hr />
				  <div class="btns">
						<button class="btnOK" onclick="closeModal()">deletar</button>
						<button class="btnClose" onclick="closeModal()">fechar</button>
				  </div>
				</div>
			</div>
			  <!-- fim modal excluir -->


		
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


	// modal excluir
	const modal2 = document.querySelector('.modal-container2')
        function openModal2() {
        modal2.classList.add('active')
        }
        function closeModal() {
        modal2.classList.remove('active')
        }

    </script>
</body>
</html>