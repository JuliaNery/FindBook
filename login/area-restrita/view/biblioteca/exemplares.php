<?php
include_once('../../controller/valida-biblioteca.php');
require_once("../../model/exemplar.php");
require_once("../../model/livro.php");
require_once("../../model/conexao.php");

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

	<!-- LINK ADICIONADO PARA OS MODAIS DA TABELA  -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	
</head>

<body>

	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand"><i class='bx bx-library icon'></i> Biblioteca</a>
		<ul class="side-menu">
			<li><a href="index.php"><i class='bx bxs-dashboard icon'></i> Dashboard</a></li>
			<li class="divider" data-text="Biblioteca">Main</li>
			<li><a href="exemplares.php" class="active"><i class='bx bxs-book icon'></i> Exemplares</a></li>
<!-- 			<li><a href="graficos.php"><i class='bx bxs-analyse icon'></i> Análise</a></li>
 -->			<li><a href="perfil.php"><i class='bx bxs-user icon'></i> Perfil biblioteca</a></li>
		</ul>
	</section>
	<!-- SIDEBAR -->
		
	<!-- NAVBAR -->
	<section id="content">
		<nav>
			<i class='bx bx-menu toggle-sidebar'></i>
			<form action="">
				<div class="form-group">
					<input type="text" name="pesquisa" <?php if(isset($_GET['pesquisa'])){ echo ('value="'.$_GET['pesquisa'].'"'); }?> placeholder="Pesquisar...">
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
				<li><a href="index.php">Home</a></li>
				<li class="divider">/</li>
				<li><a href="exemplares.php" class="active">Exemplares</a></li>
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
							<?php if(empty($listaExemplar)){?>
								<tr>
									<td colspan="9">sem exemplares cadastrados</td>
								</tr>
							<?php }else{
								if(!isset($_GET['pesquisa'])){foreach ($listaExemplar as $linhas) {  ?>
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
										<td style="text-transform: uppercase;"><?php echo $linhas['nomeGenero'] ?></td>
										<td>+<?php echo $linhas['faixaEtaria'] ?> anos</td>
										<td><button data-name1="<?php echo $linhas['idExemplar'] ?>" class="button button6"><?php if($linhas['statusExemplar'] == 1){echo "Disponivel";}else{echo "Indisponivel";} ?></button></td>
										<td><button data-name="<?php echo $linhas['idExemplar'] ?>" class="button button3">Excluir</button></td>
									
	
										<!-- LINHAS ATUALIZADAS DA TABELA (BOTÃO) -->
										<!-- FIM LINHAS ATUALIZADA DA TABELA (BOTÃO) -->
	
									</tr>
								<?php }}else{ 
									if(empty($_GET['pesquisa'])){
										foreach ($listaExemplar as $linhas) {  ?>
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
												<td style="text-transform: uppercase;"><?php echo $linhas['nomeGenero'] ?></td>
												<td>+<?php echo $linhas['faixaEtaria'] ?> anos</td>
												<td><button data-name1="<?php echo $linhas['idExemplar'] ?>" class="button button6"><?php if($linhas['statusExemplar'] == 1){echo "Disponivel";}else{echo "Indisponivel";} ?></button></td>
												<td><button data-name="<?php echo $linhas['idExemplar'] ?>" class="button button3">Excluir</button></td>
											
			
												<!-- LINHAS ATUALIZADAS DA TABELA (BOTÃO) -->
												<!-- FIM LINHAS ATUALIZADA DA TABELA (BOTÃO) -->
			
											</tr>
										<?php }
									}else{
	
									
									$conexao = Conexao::conectar();
									$busca = '%'.addslashes($_GET['pesquisa']).'%';
									$stmt = $conexao->prepare("SELECT * FROM vwExemplar
																WHERE 
																idBiblioteca = :id
																and nomeLivro like :busca 
																or nomeAutor like :busca 
																or nomeEditora like :busca 
																or nomeGenero like :busca 
																or numExemplar like :busca
																
																order by nomeLivro asc");
									$stmt->bindValue(':busca', $busca, PDO::PARAM_STR);
									$stmt->bindValue(':id', $_SESSION['idBiblioteca']);
	
									$stmt->execute();
	
							
									if($stmt->rowCount() == 0){ ?>
										<tr>
											<td colspan="9">Busca indefinida</td>
										</tr>
									
								<?php	}else{
									$lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
									foreach ($lista as $linhas) {  ?>
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
											<td style="text-transform: uppercase;"><?php echo $linhas['nomeGenero'] ?></td>
											<td>+<?php echo $linhas['faixaEtaria'] ?> anos</td>
											<td><button data-name1="<?php echo $linhas['idExemplar'] ?>" class="button button6"><?php if($linhas['statusExemplar'] == 1){echo "Disponivel";}else{echo "Indisponivel";} ?></button></td>
											<td><button data-name="<?php echo $linhas['idExemplar'] ?>" class="button button3">Excluir</button></td>
										
		
											<!-- LINHAS ATUALIZADAS DA TABELA (BOTÃO) -->
											<!-- FIM LINHAS ATUALIZADA DA TABELA (BOTÃO) -->
		
										</tr>
									<?php }
									}}
								} }?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- FIM TABELA -->


		</main>
		<!-- MAIN -->



			<!-- MODAL ATUALIZADO ABAIXO -->


		<!-- MODAL CARDS EXCLUIR INICIO-->
		<div class="products-preview">
		<?php foreach ($listaExemplar as $linhas) {  ?>

			<!-- MODAL P1 -->
			<div class="preview" data-target="<?php echo $linhas['idExemplar'] ?>">

				<!-- CONTEUDO MODAL -->
					<button type="RESET"><i class="fas fa-times"></i></button>
					<h2>Deseja excluir?</h2>
					<hr />
					<form action="../../controller/delete-exemplar.php" method="post">
					<span>
					Confirmando a exclusão do exemplar <?php echo $linhas['nomeLivro'] ?> de num°  <input type="text" style="width: 15px; border: none;" name="id" value="<?php echo $linhas['idExemplar'] ?>" disable>, todas os dados salvos serão apagados permanentemente.
						Tem certeza que deseja fazer isso?
					</span>
					
					<div class="btns">
							
						<button type="submit"  class="btnDeletar">Deletar</button>
						</form>
					</div>
				<!-- FIM CONTEUDO MODAL -->

			</div>
			<!-- FIM MODAL P1 -->
			<?php } ?>
		</div>
		<!-- MODAL CARDS EXCLUIR FIM -->



			<!-- MODAL CARDS DISPONIVEL INICIO-->
			<div class="products-preview1"> 
			<?php foreach ($listaExemplar as $linhas) {  ?>

				<!-- MODAL P2 -->
				<div class="preview1" data-target1="<?php echo $linhas['idExemplar'] ?>">

					 <!-- CONTEUDO MODAL -->
						<i class="fas fa-times"></i>
						<h2>Disponibilidade</h2>
						<hr />
						<form action="../../controller/update-statusExemplar.php" method="POST">
							<div class="form first">
								<div class="details personal"><br>
								<span class="title">Preencha as informações abaixo do exemplar: <input type="text" style="width: 15px; border: none;" name="id" value="<?php echo $linhas['idExemplar'] ?>" disable></span>
								</div>
								<br>
								<div class="image">
									<!-- <div class="editar-content">
									<span>
										<i>editar</i>
									</span>
									</div> -->
									<div id="new">
									<div class="close-preview-js close-preview">x</div>
									</div>
									<img src="../../../../<?php echo $linhas['capaLivro'] ?>" alt="Sem imagem">
								</div>
								<br>
								<!-- <input id="file-preview-js" type="file" accept="image/*" onchange="loaderFile(event)"><br><br> -->
								<br>
								<div class="radio-container">
									<input type="radio" value="1" id="windows" name="os"/>
									<label for="windows">Disponivel</label>

									<input type="radio" value="0" id="mac" name="os"/>
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
										<input type="date" name="dataAlugado" placeholder="data">
									</div>
									<div class="input-field">
										<label>Devolução</label>
										<input type="date" name="dataDevolucao" placeholder="data">
									</div>
								</div>
							</div>
							<div class="btns">
								<button type="submit" class="btnAlterar">Alterar</button>
							</div>
						</form>
						<hr />
						<!-- FIM CONTEUDO MODAL -->
				 </div>
				<!-- FIM MODAL P2 -->
				<?php } ?>

			</div>
			<!-- MODAL CARDS DISPONIVEL FIM -->

					<!-- FIM MODAL ATUALIZADO -->




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
					Confirmação de exclusão da conta '<?php echo $_SESSION['nomeBiblioteca']?>'. É impossível reverter essa ação! Todos os seus dados serão deletados do nosso sistema. Deseja continuar e apagar a sua conta?
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

		<script>
			function cadastroEx()
			{
				alert("<?php echo($_SESSION['cadastroExemplar']); unset($_SESSION['cadastroExemplar'])?>");
			}

    	</script>









		<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
		<script src="js/sidebar.js"></script>
		<script src="js/modalFoto.js"></script>

		<!-- SCRIPT ATUALIZADO -->
		<script src="js/modalTabela.js"></script>
		

		<script>
			// modal excluir
			// const modal2 = document.querySelector('.modal-container2')

			// function openModal2() {
			// 	modal2.classList.add('active')
			// }

			// function closeModal() {
			// 	modal2.classList.remove('active')
			// }

			// modal alterar
			// const modal3 = document.querySelector('.modal-container3')

			// function openModal3() {
			// 	modal3.classList.add('active')
			// }

			// function closeModal3() {
			// 	modal3.classList.remove('active')
			// }
		</script>

		<script>
			// modal alterar
			// const modal7 = document.querySelector('.modal-container7')

			// function openModal7() {
			// 	openModal7.classList.add('active')
			// }

			// function closeModal7() {
			// 	modal7.classList.remove('active')
			// }

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