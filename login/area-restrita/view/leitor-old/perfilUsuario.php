<?php
	include_once('../../controller/valida-leitor.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
		<link rel="stylesheet" href="css/stylePerfil.css">
		<link rel="stylesheet" href="css/stylePerfilBiblioteca.css">
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
		<title>Perfil Usuário</title>
		<link rel="icon" href="img/logopjt.png">
	</head>
	<body>
        <!-- SIDEBAR -->
		<section id="sidebar">
			<a href="#" class="brand"><i class='bx bxs-book icon'></i> Leitor</a>
			<ul class="side-menu">
				<li><a href="paginaInicial.php"><i class='bx bxs-dashboard icon' ></i> Página inicial</a></li>
				<li class="divider" data-text="Leitor">Leitor</li>
				<li><a href="#" class="active"><i class='bx bxs-user icon' ></i> Perfil</a></li>
				<li><a href="procurar.php"><i class='bx bxs-book icon' ></i> Pesquisar</a></li>
			</ul>
		</section>
		<!-- SIDEBAR -->

		<!-- NAVBAR -->
		<section id="content">
		<nav>
			<i class='bx bx-menu toggle-sidebar' ></i>
			<form action="#">
				<div class="form-group">
					<input type="search" placeholder="pesquisar...">
					<i class='bx bx-search icon' ></i>
				</div>
			</form>
			<span class="divider"></span>
			<p><?php if(!empty($_SESSION['loginLeitor'])){ echo ($_SESSION['loginLeitor']); }else{ echo $_SESSION['nomeLeitor'];}?></p>

			<div class="profile">
				<img src="<?php if(!empty($_SESSION['fotoLeitor'])){ echo "../../../../".$_SESSION['fotoLeitor']; }else{ echo("https://jamesrmoro.me/wp-content/uploads/2021/02/profile.png");}?>" alt="">
				<ul class="profile-link">
					<li><a href="#"><i class='bx bxs-user-circle icon' ></i><div class="editar">editar senha</div></a></li>
					<li><a href="#"><i class='bx bxs-cog' ></i> configurações</a></li>
					<li><a href="#" onclick="openModal01()"><i class='bx bxs-log-out-circle'></i> Sair</a></li>
				</ul>
				</div>
		</nav>
		<!-- NAVBAR -->

		    <!-- MAIN -->
		    <main>
				<a href="#" class="scrolltop" id="scroll-top">
					<i class='bx bx-chevrons-up scroll__top__icon'></i>
				</a>

		        <!-- PERFIL user -->
				<section class="seccion-perfil-usuario">
					<div class="perfil-usuario-header">
						<div class="perfil-usuario-portada">
							<div class="perfil-usuario-avatar">
								<img src="<?php if(!empty($_SESSION['fotoLeitor'])){ echo "../../../../".$_SESSION['fotoLeitor']; }else{ echo("https://jamesrmoro.me/wp-content/uploads/2021/02/profile.png");}?>" style=""alt="Sem imagem">
							</div>
						</div>
						<!-- https://jamesrmoro.me/wp-content/uploads/2021/02/profile.png -->
					</div>
					<div class="perfil-usuario-body">
						<div class="perfil-usuario-bio">
							<h3 class="titulo"><?php if(!empty($_SESSION['loginLeitor'])){ echo ($_SESSION['loginLeitor']); }else{ echo $_SESSION['nomeLeitor'];}?></h3>
							<div class="perfil-usuario-footer">
								<ul class="lista-datos">
								    <li><i class="fas fa-user-alt"></i><?php echo $_SESSION['nomeLeitor'] ?></li>
									<li><i class="fas fa-restroom"></i> <?php echo $_SESSION['generoLeitor'] ?></li>
								</ul> 
								<ul class="lista-datos">
									<li><i class='bx bxs-envelope' ></i><?php echo $_SESSION['emailLeitor'] ?></li>
									<li><i class='icono fas fa-calendar-alt' ></i><?php echo $_SESSION['dtNascLeitor'] ?></li>
								</ul> 
							</div>
								<div onclick="openModal6()" class="btn">Editar</div>
								
						</div>

						<!-- MODAL FORMULARIO PERFIL-->
						<div class="modal-container6">
							<div class="modal6">
							<center><h2>Edite seu perfil</h2></center>
							<hr />
							<form action="../../controller/update-leitor.php" enctype="multipart/form-data" method="post">
								<div class="form first">
									<div class="details personal"><br>
										<p>As informações adicionadas abaixo apareceram em seu perfil:</p>
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
										<img src="<?php if(!empty($_SESSION['fotoLeitor'])){ echo "../../../../".$_SESSION['fotoLeitor']; }else{ echo("https://jamesrmoro.me/wp-content/uploads/2021/02/profile.png");}?>" style="height: 90px; width:90px;"  alt="Sem imagem">
									</div>
									<input id="file-preview-js" type="file" accept="image/*" name="foto" onchange="loaderFile(event)"  required>
									<div class="fields">
										<div class="input-field">
											<label> Nome:</label>
											<input type="text" name="nome" value="<?php echo $_SESSION['nomeLeitor'] ?>" required>
										</div>
										<div class="input-field">
											<label> Apelido:</label>
											<input type="text" name="nick" <?php if(!empty($_SESSION['loginLeitor'])){ echo ('value="'.$_SESSION['loginLeitor'].'"'); }else{ echo("placeholder='Apelido'");}?> required>
										</div>
										<div class="input-field">
											<label>Email: </label>
											<input type="text" name="email" value="<?php echo $_SESSION['emailLeitor'] ?>" required>
										</div>
										<div class="input-field">
											<label>CPF:</label>
											<input type="text" name="cpf" <?php if(!empty($_SESSION['cpfLeitor'])){ echo ('value="'.$_SESSION['cpfLeitor'].'"'); }else{ echo("placeholder='CPF'");}?> required>
										</div>
										<div class="input-field">
											<label>RG:</label>
											<input type="text" name="rg"  <?php if(!empty($_SESSION['rgLeitor'])){ echo ('value="'.$_SESSION['rgLeitor'].'"'); }else{ echo("placeholder='RG'");}?> required>
					    				</div>
										<div class="input-field">
											<label>Data de nascimento:</label>
											<input type="date" name="dtNasc"  <?php if(!empty($_SESSION['dtNascLeitor'])){ echo ('value="'.$_SESSION['dtNascLeitor'].'"'); }else{ echo("placeholder='Nome'");}?> required>
										</div>
										<div class="input-field">
											<label>Genero:</label>
											<select name="genero" required>
									     		<option value="Feminino">Feminino</option>
												<option value="Masculino">Masculino</option>
							    			</select>
										</div>
									</div>
								</div>
								<div class="btns">
										<button class="btnOK">Alterar</button>
										<button class="btnClose" type="" onclick="closeModal6()">Fechar</button>
									</div>
							</form>
							</div>
					    </div>
					    <!-- FIM MODAL FORMULARIO PERFIL -->

					</div>
				</section>
				<!-- FIM PERFIL -->
				<br><br>
				<div class="container">
					<h1 class="title">Favoritos</h1>
					<center>
					<form>
						<div class="wrapper">
							<input type="radio" name="select" id="option-1">
							<input type="radio" name="select" id="option-2">
							<input type="radio" name="select" id="option-3">
							<input type="radio" name="select" id="option-4">
							<label for="option-1" class="option option-1">
							<div class="dot"></div>
							<span>  Romance</span>
							</label>
							<br>
							<label for="option-2" class="option option-2">
							<div class="dot"></div>
							<span>  Terror</span>
							</label>
							<br>
							<label for="option-3" class="option option-3">
								<div class="dot"></div>
								<span>  Comédia</span>
							</label>
							<br>
							<label for="option-3" class="option option-3">
								<div class="dot"></div>
								<span>  Suspense</span>
							</label>
						</div>
					</form>
				 </center>
				 <br><br>
					<div class="products-container">
						<div class="product" data-name="p-1">
							<img src="img/livro.jpg"  alt="">
							<h3>Teste</h3>
						</div>
					
						<div class="product" data-name="p-2">
							<img src="img/livro.jpg" alt="">
							<h3>Teste</h3>
						</div>
					
						<div class="product" data-name="p-3">
							<img src="img/livro.jpg" alt="">
							<h3>Teste</h3>
						</div>
				
						
					</div>
				</div>
				<!-- FIM CARDS -->
			

				<!-- MODAL CARDS -->
				<div class="products-preview">
				
					<div class="preview" data-target="p-1">
						<i class="fas fa-times"></i>
						<img src="img/livro.jpg" alt="">
						<h3>Teste</h3>
						<p>Autor.</p>
						<p>Data lancamento.</p>
						<p>GENERO.</p>
						<p>Sinopse.</p>
						<div class="buttons">
							<a href="#" class="buy"><i class="fas fa-location-arrow"></i>Localizar</a>
							<a href="#" class="cart"> Remover</a>
						</div>
					</div>
				
					<div class="preview" data-target="p-2">
						<i class="fas fa-times"></i>
						<img src="img/livro.jpg" alt="">
						<h3>Teste</h3>
						<p>Autor.</p>
						<p>Data lancamento.</p>
						<p>GENERO.</p>
						<p>Sinopse.</p>
						<div class="buttons">
							<a href="#" class="buy"><i class="fas fa-location-arrow"></i>Localizar</a>
							<a href="#" class="cart"> Remover</a>
						</div>
					</div>
			
					<div class="preview" data-target="p-3">
						<i class="fas fa-times"></i>
						<img src="img/livro.jpg" alt="">
						<h3>Teste</h3>
						<p>Autor.</p>
						<p>Data lancamento.</p>
						<p>GENERO.</p>
						<p>Sinopse.</p>
						<div class="buttons">
							<a href="#" class="buy"><i class="fas fa-location-arrow"></i>Localizar</a>
							<a href="#" class="cart"> Remover</a>
					    </div>
					</div>
				</div>
				<!-- FIM MODAL CARDS -->
			</main>
			<!-- FIM MAIN -->
		</section>
			
		<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
		<script src="script.js"></script>
		<script src="js/cards2.js"></script>
		<script src="js/foto.js"></script>
		<script src="js/teste.js"></script>
			
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
			<script>
				const modal6 = document.querySelector('.modal-container6')
				function openModal6() {
				modal6.classList.add('active')
				}
				function closeModal6() {
				modal6.classList.remove('active')
				}
			</script>


        <!-- Modal sair -->
		<script>
			const modal01 = document.querySelector('.modal-container01')
			function openModal01() {
			modal01.classList.add('active')
			}
			function closeModal01() {
			modal01.classList.remove('active')
			}
		</script>


		<script>
			function inicialModal(modalId){
				const modal = document.getElementById(modalId);
				modal.classList.add('mostrar');
				modal.addEventListener('click', (e) => {
					if(e.target.id == modalId || e.target.className == 'fechar'){
						modal.classList.remove('mostrar');
					}
				});
			}
			const editar = document.querySelector('.editar');
			editar.addEventListener('click', () => inicialModal('modal-promocao'));
		</script>
		<!-- fim modal -->
	</body>
</html>