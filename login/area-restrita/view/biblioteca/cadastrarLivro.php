<?php
include_once('../../controller/valida-biblioteca.php');

require_once("../../model/autor.php");
require_once("../../model/editora.php");
require_once("../../model/genero.php");
require_once("../../model/livro.php");

try {
	$Autor = new Autor();
	$Genero = new Genero();
	$Editora = new Editora();
	$listaAutor = $Autor->listar();
	$listaGenero = $Genero->listar();
	$listaEditora = $Editora->listar();
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
	<link rel="stylesheet" href="css/styleCadastrarLivro.css">
	<title>Biblioteca dashboard</title>

	<link rel="icon" href="img/logopjt.png">
</head>

<body>
	<!-- MAIN -->
	<main>
		<div class="teste">
			<div class="container">
				<header>Cadastrar Livros</header>

				<form action="../../controller/cadastra-livro.php" method="POST">
					<div class="form first">
						<div class="details personal">
							<span class="title">Preencha as informações abaixo:</span>
							<div class="image">
								<div class="input-field">
									<label> <i class="fas fa-user"></i>Capa do livro:</label>
								</div>
								<img src="https://jamesrmoro.me/wp-content/uploads/2021/02/profile.png" alt="Sem imagem">
							</div>
							<input id="file-preview-js" type="file" accept="image/*" onchange="loaderFile(event)"><br><br>

							<div class="fields">
								<div class="input-field">
									<label>Nome do livro:</label>
									<input type="text" name="txtNomeLivro" placeholder="Digite aqui" required>
								</div>

								<div class="input-field">
									<label>Faixa Etaria: </label>
									<input type="text" name="txtFaixaEtaria" placeholder="Digite aqui" required>
								</div>

								<div class="input-field">
									<label>lançamento:</label>
									<input type="date" name="dtLancamento" placeholder="Digite aqui" required>
								</div>

								<div class="input-field">
									<label> Autor: </label>
									<select name="autor" required>
										<option value="0">Selecione</option>
										<?php foreach ($listaAutor as $linha) { ?>
											<option value="<?php echo $linha['idAutor'] ?>">
												<?php echo $linha['nomeAutor'] ?>
											</option>
										<?php } ?>
									</select>
									<!-- <label>Não temos o autor?<a href=""> Cadastre aqui!!</a> </label> -->
									<div class="inputfield">
										<label>Não temos o autor?<a href="#" onclick="openModal2()"> Cadastre aqui!!</a> </label>
										<!-- <div class="login-text">Não tem uma conta? <label href="#">Crie uma agora!</label></div> -->
									</div>
								</div>

								<div class="input-field">
									<label> Editora: </label>
									<select name="editora" required>
										<option value="0">Selecione</option>
										<?php foreach ($listaEditora as $linha) { ?>
											<option value="<?php echo $linha['idEditora'] ?>">
												<?php echo $linha['nomeEditora'] ?>
											</option>
										<?php } ?>
									</select>
									<!-- <label>Não temos a editora?<a href=""> Cadastre aqui!!</a> </label> -->
									<div class="inputfield">
										<label>Não temos a editora?<a href="#" onclick="openModal3()"> Cadastre aqui!!</a> </label>
										<!-- <div class="login-text">Não tem uma conta? <label href="#">Crie uma agora!</label></div> -->
									</div>
								</div>

								<div class="input-field">
									<label>Gênero: </label>
									<select name="genero" required>
										<option value="0">Selecione</option>
										<?php foreach ($listaGenero as $linha) { ?>
											<option value="<?php echo $linha['idGenero'] ?>">
												<?php echo $linha['nomeGenero'] ?>
											</option>
										<?php } ?>
									</select>
									<!-- <label>Não temos o gênero?<a href=""> Cadastre aqui!!</a> </label> -->
									<div class="inputfield">
										<label>Não temos o gênero?<a href="#" onclick="openModal4()"> Cadastre aqui!!</a> </label>
										<!-- <div class="login-text">Não tem uma conta? <label href="#">Crie uma agora!</label></div> -->
									</div>
								</div>

								<div class="input-field">
									<label> Sinopse: </label>
									<input name="txtSinopseLivro" type="text" placeholder="Digite aqui" maxlength="1000" required>
								</div>

								<div class="buttons">
									<button class="cadastrar">
										<span class="btnText"><a href="exemplares.html">Voltar</a></span>
										<i class="uil uil-navigator"></i>
									</button>
									<button class="cadastrar">
										<span class="btnText">Cadastrar</span>
										<i class="uil uil-navigator"></i>
									</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</main>

	<!-- modal excluir -->
	<div class="modal-container2">
		<div class="modal2">
			<h2>Cadastrar autor</h2>
			<hr />
			<form action="../../controller/cadastra-autor.php" method="post">
				<div class="input-field">
					<label> <i class='bx bxs-'></i>
						<h2>Qual o nome do autor que você deseja cadastrar? </h2>
					</label>
					<br>
					<input type="text" name="txtNomeAutor" placeholder="Digite aqui" required>
				</div>
				<div class="btns">
					<button class="btnOK" onclick="closeModal()">Cadastrar</button>
					<button class="btnClose" onclick="closeModal()">Fechar</button>
				</div>
			</form>
		</div>
	</div>

	<!-- modal excluir -->
	<div class="modal-container3">
		<div class="modal3">
			<h2>Cadastrar editora</h2>
			<hr />
			<form action="../../controller/cadastra-editora.php" method="post">
				<div class="input-field">
					<label> <i class='bx bxs-'></i>
						<h2> Qual o nome da editora que você quer cadastrar? </h2>
					</label>
					<input type="text" name="txtNomeEditora" placeholder="Digite aqui">
				</div>
				<div class="btns">
					<button class="btnOK" onclick="closeModal3()">Cadastrar</button>
					<button class="btnClose" onclick="closeModal3()">Fechar</button>
				</div>
			</form>
		</div>
	</div>

	<!-- modal excluir -->
	<div class="modal-container4">
		<div class="modal4">
			<h2>Cadastrar Genêro</h2>
			<hr />
			<form action="../../controller/cadastra-genero.php" method="post">
				<div class="input-field">
					<label> <i class='bx bxs-'></i>
						<h2> Qual gênero que você quer cadastrar? </h2>
					</label>
					<input type="text" name="txtNomeGenero" placeholder="Digite aqui">
				</div>
				<div class="btns">
					<button class="btnOK" onclick="closeModal4()">Cadastrar</button>
					<button class="btnClose" onclick="closeModal4()">Fechar</button>
				</div>
			</form>
		</div>
	</div>
	</section>


	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

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

		// modal alterar
		const modal4 = document.querySelector('.modal-container4')

		function openModal4() {
			modal4.classList.add('active')
		}

		function closeModal4() {
			modal4.classList.remove('active')
		}
	</script>

</body>

</html> -->