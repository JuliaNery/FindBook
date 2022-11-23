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
		<a href="#" class="brand"><i class='bx bx-library'></i> Biblioteca</a>
		<ul class="side-menu">
			<li><a href="index.php"><i class='bx bxs-dashboard icon'></i> Dashboard</a></li>
			<li class="divider" data-text="Biblioteca">Main</li>
			<li><a href="#" class="active"><i class='bx bxs-book icon'></i> Exemplares</a></li>
<!-- 			<li><a href="graficos.php"><i class='bx bxs-analyse icon'></i> Análise</a></li>
 -->			<li><a href="perfil.php"><i class='bx bxs-user icon'></i> Perfil biblioteca</a></li>
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
			<p><?php echo $_SESSION['nomeBiblioteca']?></p>
			<div class="profile">
				<img src="<?php if(!empty($_SESSION['fotoBiblioteca'])){ echo "../../../../".$_SESSION['fotoBiblioteca']; }else{ echo("https://jamesrmoro.me/wp-content/uploads/2021/02/profile.png");}?>" alt="">
				<ul class="profile-link">
					<li><a href="#" onclick="openModal03()"><i class='bx bx-edit-alt'></i> Alterar senha</a></li>
					<li><a href="#" onclick="openModal02()"><i class='bx bxs-user-account'></i> Excluir conta</a></li>
					<li><a href="#" onclick="openModal01()"><i class='bx bxs-log-out-circle'></i> Sair</a></li>
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
							<?php if(isset($listaExemplar)){foreach ($listaExemplar as $linhas) {  ?>
								<tr>
									<td>
										<div class="user">
											<img class="user-image" src="../../../../<?php echo $linhas['capaLivro'] ?>" alt="">
										</div>
									</td>
									<td><?php echo $linhas['nomeLivro'] ?></td>
									<td><?php echo $linhas['numExemplar'] ?></td>
									<td><?php echo $linhas['nomeEditora'] ?></td>
									<td><?php echo $linhas['nomeAutor'] ?></td>
									<td><?php echo $linhas['nomeGenero'] ?></td>
									<td><?php echo $linhas['faixaEtaria'] ?></td>
									<td><button onclick="openModal3()" data-name="<?php echo $linhas['numExemplar'] ?>" class="button button3">disponivel</button></td>
									<td><button onclick="openModal2()"  class="button button3">Excluir</button></td>
								</tr>
							<?php }}else{ echo '<tr><td><h3>Nenhum exemplar cadastrado</h3></td></tr>';} ?>
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
			<?php foreach ($listaExemplar as $linhas) {  ?>
				<div class="modal2" data-target="<?php echo $linhas['idExemplar'] ?>">
					<h2>Deseja excluir?</h2>
					<hr />
					<span>
						Confirmando a exclusão do exemplar <?php echo $linhas['nomeLivro'] ?> de num° <?php echo $linhas['numExemplar'] ?>, todas os dados salvos serão apagados permanentemente.
						Tem certeza que deseja fazer isso?
					</span>
					<hr />
					<div class="btns">
						<button class="btnOK" onclick="closeModal()">Excluir</button>
						<button class="btnClose" onclick="closeModal()">Cancelar</button>
					</div>
				</div>
			<?php } ?>
		</div>

		<!-- Modal alterar -->
		<div class="modal-container3" >
			<?php foreach ($listaExemplar as $linhas) {  ?>
				<div class="modal3" data-target="<?php echo $linhas['numExemplar'] ?>">
					<h2>Disponibilidade</h2>
					<hr />
					<form action="#">
						<div class="form first">
							<div class="details personal"><br>
								<span class="title">Preencha as informações abaixo:</span>
								<p>exemplar num°<?php echo $linhas['numExemplar'] ?></p>
							</div>

							<br>
							<div class="image">
								<div id="new">
									<div class="close-preview-js close-preview">x</div>
								</div>
								<img src="../../../../<?php echo $linhas['capaLivro'] ?>" alt="Sem imagem">
							</div>
							<br>
							<!-- <input type="submit" value="Enviar"> -->
							<br>
							<div class="radio-container">
								<input type="radio" id="windows" checked name="os" />
								<label for="windows">Disponivel</label>
								<input type="radio" id="mac" name="os" />
								<label for="mac">Indisponível</label>
							</div>
							<br>
							<div class="fields">
								<!-- <div class="input-field">
									<label> Nome:</label>
									<input type="text" placeholder="Nome">
								</div> -->

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
				<?php }  ?>
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
					Confirmação de exclusão da conta 'EMAIL DO LEITOR'. É impossível reverter essa ação! Todos os seus dados serão deletados do nosso sistema. Deseja continuar e apagar a sua conta?
				</span>
				<div class="btns">
					<button class="btnOK02" onclick="closeModal02()">Sim</button>
					<button class="btnClose02" onclick="closeModal02()">Não</button>
				</div>
			</div>
		</div>
		<!-- FIM MODAL EXCLUIR CONTA  -->

		<!--MODAL CADASTRAR EXEMPLAR  -->
		<div onclick="openModal()" class="btn">Cadastre seu exemplar</div>


		<div id="modal-container" class="modal-container">
			<div class="modal">
				<button class="fechar" id="fechar">X</button>
				<form action="../../controller/cadastra-exemplar.php" method="post">
					<div class="container">

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
							<center><button onclick="cadastro()" class="button button5">Cadastrar</button></center>
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

		<script>
			function cadastro()
			{
				alert("<?php echo($_SESSION['cadastroExemplar']); unset($_SESSION['cadastroExemplar'])?>");
			}

    	</script>
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

</body>

</html>