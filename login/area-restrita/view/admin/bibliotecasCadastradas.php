<?php
include_once('../../controller/valida-permanencia.php');
require_once("../../model/biblioteca.php");

try {
	$Biblioteca = new Biblioteca();

	$listaBiblioteca = $Biblioteca->listar();
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
	<link rel="stylesheet" href="css/bibliotecasCadastradas.css">
	<link rel="icon" href="img/logopjt.png">
	<title>Bibliotecas Cadastradas</title>
</head>
<body>
	
	<!-- SIDEBAR -->
	<section id="sidebar">
		<!-- <a href="#" class="brand"><img src="img/logopjt.png" alt="" srcset=""> Administração</a> -->
		<!-- <a href="#" class="brand"><i class='bx bxs-smile icon'></i> Administração</a> -->
		<a href="#" class="brand"><i class='bx bxs-book icon'></i> Find Book</a>
		<ul class="side-menu">
			<li><a href="index.php" ><i class='bx bxs-dashboard icon' ></i> Dashboard</a></li>
			<li class="divider" data-text="Administração">Main</li>
			<li><a href="bibliotecasCadastradas.php" class="active"><i class='bx bx-library icon' ></i> Bibliotecas cadastradas</a></li>
			<li><a href="usuariosCadastrados.php"><i class='bx bxs-user icon' ></i>Leitores cadastrados</a></li>
			<li><a href="livrosCadastrados.php"><i class='bx bxs-book icon' ></i> Livros cadastrados</a></li>
		</ul>
	</section>
	<!-- SIDEBAR -->


	<section id="content">

		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu toggle-sidebar' ></i>
			<form action="#">
				<div class="form-group">
				<input type="text" name="pesquisa" <?php if(isset($_GET['pesquisa'])){ echo ('value="'.$_GET['pesquisa'].'"'); }?> placeholder="Pesquisar...">
					<i class='bx bx-search icon' ></i>
				</div>
			</form>
			
			<span class="divider"></span>
			<p>administração</p>
			<div class="profile">
				<img src="../../img/logopjt.png" alt="">
				<ul class="profile-link">
					<li><a href="#"><i class='bx bxs-cog' ></i> Configurações</a></li>
					<li><a href="#" onclick="openModal01()"><i class='bx bxs-log-out-circle' ></i> Sair</a></li>
				</ul>
			</div>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<h1 class="title">Bibliotecas Cadastradas</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Home</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Dashboard</a></li>
			</ul>
		

			<!-- <a href="#" class="btn-download">
				<i class='bx bxs-cloud-download' ></i>
				<span class="text">Download PDF</span>
			</a> --> 
			<br><br><br>

				
			<br>
			  <!-- TABELA  -->
			  <div class="container">
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
								<th>foto</th>
                                <th>Nome</th>
                                <th>Rua</th>
							    <th>Número</th>
                                <th>CEP</th>
                                <th>Bairro</th>
                                <th>Cidade</th>
                                <th>Email</th>
                                <th>Número Telefone</th>
                            </tr>
                        </thead>
                        <tbody>
						<?php if(!isset($_GET['pesquisa'])){foreach ($listaBiblioteca as $linhas) {  ?>
							<tr>
                                <td>
                                    <div class="user">
                                    <img class="user-image" src="<?php if(!empty($linhas['fotoBiblioteca'])){ echo "../../../../".$linhas['fotoBiblioteca']; }else{ echo("https://jamesrmoro.me/wp-content/uploads/2021/02/profile.png");}?>" alt="">
                                    <div class="user-info">
                                </td>
                                <td><?php echo $linhas['nomeBiblioteca'] ?></td>
                                <td><?php echo $linhas['ruaBiblioteca'] ?></td>
								<td><?php echo $linhas['numBiblioteca'] ?></td>
								<td><?php echo $linhas['cepBiblioteca'] ?></td>
                                <td><?php echo $linhas['bairroBiblioteca'] ?> </td>
                                <td> <?php echo $linhas['cidadeBiblioteca'] ?> </td>
                                <td><?php echo $linhas['emailBiblioteca'] ?></td>
                                <td><?php echo $linhas['telBiblioteca'] ?></td>
                            </tr>
								<?php }
						}else{ 
									
									$conexao = Conexao::conectar();
									$busca = '%'.addslashes($_GET['pesquisa']).'%';
									$stmt = $conexao->prepare("SELECT * FROM tbBiblioteca
																WHERE 
																nomeBiblioteca like :busca 
																or ruaBiblioteca like :busca 
																or cepBiblioteca like :busca 
																or bairroBiblioteca like :busca
																or cidadeBiblioteca like :busca 
																or emailBiblioteca like :busca  
 
																
																order by idBiblioteca asc");
									$stmt->bindValue(':busca', $busca, PDO::PARAM_STR);

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
												<img class="user-image" src="<?php if(!empty($linhas['fotoBiblioteca'])){ echo "../../../../".$linhas['fotoBiblioteca']; }else{ echo("https://jamesrmoro.me/wp-content/uploads/2021/02/profile.png");}?>"" alt="">
												<div class="user-info">
											</td>
											<td><?php echo $linhas['nomeBiblioteca'] ?></td>
											<td><?php echo $linhas['ruaBiblioteca'] ?></td>
											<td><?php echo $linhas['numBiblioteca'] ?></td>
											<td><?php echo $linhas['cepBiblioteca'] ?></td>
											<td><?php echo $linhas['bairroBiblioteca'] ?> </td>
											<td> <?php echo $linhas['cidadeBiblioteca'] ?> </td>
											<td><?php echo $linhas['emailBiblioteca'] ?></td>
											<td></td>
										</tr>
									<?php }
									}
								} ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- FIM TABELA -->



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