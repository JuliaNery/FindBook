<?php
include_once('../../controller/valida-biblioteca.php');
require_once("../../model/exemplar.php");
require_once("../../model/livro.php");

try {
	$Livro = new Livro();
	$Exemplar = new Exemplar();

	$listaLivro = $Livro->listar();
	$listaExemplar = $Exemplar->listar();
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
	<link rel="stylesheet" href="css/styleExemplares.css">
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
	<title>biblioteca Exemplares</title>
	<link rel="icon" href="img/logopjt.png">
</head>

<body>

	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand"><i class='bx bxs-smile icon'></i> Biblioteca</a>
		<ul class="side-menu">
			<li><a href="index.php"><i class='bx bxs-dashboard icon'></i> Dashboard</a></li>
			<li class="divider" data-text="Biblioteca">Main</li>
			<li><a href="#" class="active"><i class='bx bxs-book icon'></i> Exemplares</a></li>
			<li><a href="graficos.php"><i class='bx bxs-analyse icon'></i> Análise</a></li>
			<li><a href="perfil.php"><i class='bx bxs-user icon'></i> Perfil biblioteca</a></li>
		</ul>
	</section>
	<!-- SIDEBAR -->

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

			<h1 class="title">Exemplares</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Home</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Exemplares</a></li>
			</ul>

			<br>

			<!-- TABELA	 -->
			<div class="container">
				<div class="table-wrapper">
					<table>
						<thead>
							<tr>
								<th>Livro</th>
								<th>Nome</th>
								<th>Exemplar</th>
								<th>Editora</th>
								<th>Autor</th>
								<th>Genêro</th>
								<th>Faixa Etária</th>
								<th>Situação</th>
								<th>Excluir</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($listaExemplar as $linhas) {  ?>
								<tr>
									<td>
										<div class="user">
											<img class="user-image" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8cGVyc29ufGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60" alt="">
										</div>
									</td>
									<td><?php echo $linhas['nomeLivro'] ?></td>
									<td><?php echo $linhas['numExemplar'] ?></td>
									<td><?php echo $linhas['nomeEditora'] ?></td>
									<td><?php echo $linhas['nomeAutor'] ?></td>
									<td><?php echo $linhas['nomeGenero'] ?></td>
									<td><?php echo $linhas['faixaEtaria'] ?></td>
									<td><button onclick="openModal3()" class="button button3">disponivel</button></td>
									<td><button onclick="openModal2()" class="button button3">Excluir</button></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- FIM TABELA -->




			<!-- <button class="button button4"><div class="editar">Cadastre exemplares aqui</div></button> -->

		</main>
		<!-- MAIN -->

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

		<div class="modal-container7">
			<div class="modal7">
				<h2>Deseja excluir?</h2>
				<hr />
				<span>
					Este item sera excluído permanentemente da sua conta. Deseja realmete excluir?
				</span>
				<hr />
				<div class="btns">
					<button class="btnOK" onclick="closeModal7()">deletar</button>
					<button class="btnClose" onclick="closeModal7()">fechar</button>
				</div>
			</div>
		</div>

		<!-- Modal alterar -->
		<div class="modal-container3">
			<div class="modal3">
				<h2>Disponibilidade</h2>
				<hr />
				<form action="#">
					<div class="form first">
						<div class="details personal"><br>
							<span class="title">Preencha as informações abaixo:</span>
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
						<input id="file-preview-js" type="file" accept="image/*" onchange="loaderFile(event)"><br><br>
						<!-- <input type="submit" value="Enviar"> -->


						<br>

						<div class="radio-container">
							<input type="radio" id="windows" name="os" />
							<label for="windows">Disponivel</label>

							<input type="radio" id="mac" name="os" />
							<label for="mac">Indisponível</label>
						</div>

						<br>



						<div class="fields">
							<div class="input-field">
								<label> Nome:</label>
								<input type="text" placeholder="Nome">
							</div>

							<div class="input-field">
								<label>Alugado: </label>
								<input type="date" placeholder="data">
							</div>

							<div class="input-field">
								<label>Devolução</label>
								<input type="date" placeholder="data">
							</div>
						</div>

					</div>
				</form>
				<hr />
				<div class="btns">
					<button class="btnOK" onclick="closeModal3()">alterar</button>
					<button class="btnClose" onclick="closeModal3()">fechar</button>
				</div>
			</div>
		</div>

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

		<!--MODAL CADASTRAR EXEMPLAR  -->
		<div onclick="openModal()" class="btn">Cadastre seu exemplar</div>


		<div id="modal-container" class="modal-container">
			<div class="modal">
				<button class="fechar" id="fechar">X</button>
				<div class="container">
					<form action="../../controller/cadastra-exemplar.php" method="post">
						<div class="wrapper">
							<div class="title">
								Cadastre seu exemplar:
							</div>
							<div class="inputfield">
								<label>Nome do livro:</label>

								<select name="livro">
									<option value="0">Selecione</option>
									<?php foreach ($listaLivro as $linha) { ?>
										<option value="<?php echo $linha['idLivro'] ?>">
											<?php echo $linha['nomeLivro'] ?>
										</option>
									<?php } ?>
								</select>
							</div><br>
							<div class="inputfield">
								<label>Qual o numero do seu exemplar: </label>
								<input type="number" name='txtNumExemplar' class="input">
							</div><br>
							<center><button class="button button5">Cadastrar</button></center>
							<br>
							<div class="inputfield">
								<label>Não achou o seu livro?<a href="cadastrarLivro.php"> Cadastre aqui!!</a> </label>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!--  FIM MODAL CADASTRAR EXEMPLAR -->
		</div>
		</div>
		<br><br>


		<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
		<script src="js/sidebar.js"></script>
		<script src="js/modalFoto.js"></script>

		<script>
			// modal excluir
			const modal2 = document.querySelector('.modal-container2')

			function openModal2() {
				modal2.classList.add('active')
			}

			function closeModal() {
				modal2.classList.remove('active')
			}

			// modal alterar
			const modal3 = document.querySelector('.modal-container3')

			function openModal3() {
				modal3.classList.add('active')
			}

			function closeModal3() {
				modal3.classList.remove('active')
			}
		</script>

		<script>
			// modal alterar
			const modal7 = document.querySelector('.modal-container7')

			function openModal7() {
				openModal7.classList.add('active')
			}

			function closeModal7() {
				modal7.classList.remove('active')
			}

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