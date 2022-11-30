<?php
include_once('../../controller/valida-biblioteca.php');
require_once("../../model/exemplar.php");

try{
	$Exemplar = new Exemplar();

    $listaExemplar = $Exemplar->ultimosAdic();
	$qtdExemplar = $Exemplar->contador();

}catch(Exception $e) {
    echo $e->getMessage();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
	<link rel="stylesheet" href="css/stylePerfil.css">
	<link rel="stylesheet" type="text/css" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
	<title>biblioteca Perfil</title>

	<link rel="icon" href="img/logopjt.png">
</head>

<body>

	<!--------------SCROLL TOP------------------------>
	<a href="#" class="scrolltop" id="scroll-top">
		<i class='bx bx-chevrons-up scroll__top__icon'></i>
	</a>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand"><i class='bx bx-library icon'></i>Biblioteca</a>
		<ul class="side-menu">
			<li><a href="index.php"><i class='bx bxs-dashboard icon'></i> Dashboard</a></li>
			<li class="divider" data-text="Biblioteca">Main</li>
			<li><a href="exemplares.php"><i class='bx bxs-book icon'></i> Exemplares</a></li>
<!-- 			<li><a href="graficos.php"><i class='bx bxs-analyse icon'></i> Análise</a></li>
 -->			<li><a href="perfil.php" class="active"><i class='bx bxs-user icon'></i> Perfil biblioteca</a></li>
		</ul>
	</section>
	<!-- FIM SIDEBAR -->

	<!-- NAVBAR -->
	<section id="content">
		<nav>
			<i class='bx bx-menu toggle-sidebar' ></i>
			<form action="#">
				<div class="form-group">
				<input type="search" name="pesquisa" <?php if (isset($_GET['pesquisa'])) {
                                                  echo ('value="' . $_GET['pesquisa'] . '"');
                                                } ?> placeholder="pesquise aqui..." id="search-box">
				<i class='bx bx-search icon' ></i>
				</div>
			</form>
			<span class="divider"></span>
			<p><?php echo $_SESSION['nomeBiblioteca'] ?></p>

			<div class="profile">
				<img src="<?php if (!empty($_SESSION['fotoBiblioteca'])) {echo "../../../../" . $_SESSION['fotoBiblioteca'];} else { echo ("https://jamesrmoro.me/wp-content/uploads/2021/02/profile.png");} ?>" alt="">
				<ul class="profile-link">					
					<li><a href="#" onclick="openModal6()"><i class='bx bxs-pencil' ></i>Editar perfil</a></li>                                                                                        
					<li><a href="#" onclick="openModal03()"><i class='bx bx-edit-alt'></i> Alterar senha</a></li>
                    <li><a href="#" onclick="openModal02()"><i class='bx bxs-user-account'></i> Excluir conta</a></li> 
					<li><a href="#" onclick="openModal01()"><i class='bx bxs-log-out-circle' ></i> sair</a></li>
				</ul>
			</div>
		</nav>
		<!-- FIM NAVBAR -->

		<!-- MAIN -->
		<main>

			<!-- PERFIL DA BIBLIOTECA -->
			 <div class="header__wrapper">
				<header></header>
				<div class="testi">
				<div class="cols__container">
					<div class="left__col">
						<div class="img__container">
						<img src="<?php if(!empty($_SESSION['fotoBiblioteca'])){ echo "../../../../".$_SESSION['fotoBiblioteca']; }else{ echo("https://jamesrmoro.me/wp-content/uploads/2021/02/profile.png");}?>" alt="Sem imagem">
							<span onclick="openModal04()"><i class='bx bx-edit'></i></span> 
						</div><br>
							<h2>Biblioteca <?php echo $_SESSION['nomeBiblioteca'] ?></h2>
							
							<li><i class="icono fas fa-calendar-alt"></i>Abertura: <?php echo $_SESSION['horarioAbertura'] ?></li>
							<li><i class="icono fas fa-calendar-alt"></i>Fechamento: <?php echo" ".$_SESSION['horarioFechamento'] ?></li> 
							<li><i class="bx bxs-envelope"></i> Email:<?php echo $_SESSION['emailBiblioteca'] ?></li>
							<li><i class="icono fas fa-phone-alt"></i>Numero: <?php echo $_SESSION['telBiblioteca'] ?></li> 
							<ul style="margin-left: auto; margin-right: auto; margin-top: 30px;">
								<!-- <li><i class="icono fas fa-map-marker-alt"></i> Localização</li> -->
								<li><i class="icono fas fa-map-marker-alt"></i> <?php echo" ".$_SESSION['ruaBiblioteca']." ".$_SESSION['numBiblioteca'].", ".$_SESSION['bairroBiblioteca'].", ". $_SESSION['cidadeBiblioteca']."." ?></li>
							</ul>
					</div>
				  <div class="right__col">
					<nav>
					  <!-- FORM OPTION -->
					  <form>
						<!-- OPTION -->
						  <div class="wrapper">
							 <h2>Adicionados recentemente</h2>
						  </div>
						  <!-- FIM OPTION -->
					  </form>
					  <!-- FIM FORM OPTION -->
					</nav>
		  
					<!-- <div class="container"> -->
		  
					  <!-- CONTAINER CARDS DIVISÃO -->
					  <div class="photos">

						<!-- CONTAINER CARDS -->
						<div class="products-container">
	  
						  <!-- CARDS -->
						  <?php if (empty($_GET['pesquisa'])) {
                foreach ($listaExemplar as $linhas) {  ?>

                  <div class="product" data-name="<?php echo $linhas['idExemplar'] ?>">
                    <img src="../../../../<?php echo $linhas['capaLivro'] ?>" alt="">
                    <h3><?php echo $linhas['nomeLivro'] ?></h3>
                  </div>

                <?php }
              } else {

                $conexao = Conexao::conectar();
                if ($_GET['pesquisa'] == 'disponivel') {
                  $busca = '%1%';
                } elseif ($_GET['pesquisa'] == 'indisponivel') {
                  $busca = '%0%';
                } else {
                  $busca = '%' . addslashes($_GET['pesquisa']) . '%';
                }
                $stmt = $conexao->prepare("SELECT * FROM vwExemplar
															WHERE idBiblioteca = :id
															and nomeLivro like :busca 
															or nomeAutor like :busca 
															or nomeEditora like :busca 
															or nomeGenero like :busca 
															or numExemplar like :busca
                              or statusExemplar like :busca
															
															order by nomeLivro asc");
                $stmt->bindValue(':busca', $busca, PDO::PARAM_STR);
                $stmt->bindValue(':id', $_SESSION['idBiblioteca']);

                $stmt->execute();


                if ($stmt->rowCount() == 0) { ?>
                  <tr>
                    <td colspan="9">Busca indefinida</td>
                  </tr>
                  <?php  } else {
                  $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
                  foreach ($lista as $linhas) {  ?>
                    <div class="product" data-name="<?php echo $linhas['idExemplar'] ?>">
                      <img src="../../../../<?php echo $linhas['capaLivro'] ?>" alt="">
                      <h3><?php echo $linhas['nomeLivro'] ?></h3>
                    </div>
              <?php }
                }
              } ?>

						  
						  <!-- FIM CARDS -->
	  
						</div>
						
					  </div>
					  <!-- FIM CONTAINER DIVISAO CARDS -->
					  
				  </div>
				</div>
			  </div>
			</div>
			 <!-- FIM DO PERFIL -->



				<!-- MODAL FORMULARIO PERFIL-->
				<div class="modal-container6">
					<div class="modal6">
					<center><h2>Edite seu perfil</h2></center>
					<hr />
					<form action="../../controller/update-biblioteca.php" method="post">
							<div class="form first">
								<div class="details personal"><br>
									<p>As informações adicionadas abaixo apareceram em seu perfil:</p>
								</div>
								<br>
							<div class="fields">
								<div class="input-field">
									<label> Nome:</label>
									<input type="text" value="<?php echo $_SESSION['nomeBiblioteca'] ?>" name="nome" placeholder="Nome">
								</div>
								<div class="input-field">
									<label>Email: </label>
									<input type="text" name="email" value="<?php echo $_SESSION['emailBiblioteca'] ?>" placeholder="Email">
								</div>
								<div class="input-field">
									<label>Horario Abertura:</label>
									<input type="time" <?php if(!empty($_SESSION['horarioAbertura'])){ echo ('value="'.$_SESSION['horarioAbertura'].'"'); }?> name="abertura" >
								</div>
								<div class="input-field">
									<label>Horario Fechamento:</label>
									<input type="time" <?php if(!empty($_SESSION['horarioFechamento'])){ echo ('value="'.$_SESSION['horarioFechamento'].'"'); }?> name="fechamento" >
								</div>
								<div class="input-field">
									<label>Telefone</label>
									<input type="text" id="telefone" <?php if(!empty($_SESSION['telBiblioteca'])){ echo ('value="'.$_SESSION['telBiblioteca'].'"'); }else{ echo("placeholder='(11) 1111-1111'");}?> name="telefone" maxlength="14" placeholder="(11) 1111-1111">
								</div>                                      
								</div>
							</div>
						
						<div class="btns">
							<button class="btnOK" onclick="closeModal6()">alterar</button>
							<button class="btnClose" onclick="closeModal6()">fechar</button>
						</div>
						</form>
						<hr />
					</div>
				</div>
				<!-- FIM MODAL FORMULARIO PERFIL -->
				<script>
				function mascara(o, f) {
					v_obj = o
					v_fun = f
					setTimeout("execmascara()", 1)
				}

				function execmascara() {
					v_obj.value = v_fun(v_obj.value)
				}

				function mtel(v) {
					v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
					v = v.replace(/^(\d{2})(\d)/g, "($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
					v = v.replace(/(\d)(\d{4})$/, "$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
					return v;
				}

				function id(el) {
					return document.getElementById(el);
				}
				window.onload = function() {
					id('telefone').onkeyup = function() {
						mascara(this, mtel);
					}
				}
			</script>                                   

				<!-- MODAL EDITAR	FOTO -->
				<div class="modal-container04">
					<div class="modal04">
					  <h2> Alterar foto do perfil </h2><br>
					  <hr /><br>
						  <form action="../../controller/update-foto-biblioteca.php" method="post" enctype="multipart/form-data">
							  <div class="image">
								  <div class="editar-content">
									<span>
									  <i>editar</i>
									</span>
								  </div>
								  <div id="new">
									<div class="close-preview-js close-preview">x</div>
								  </div>
									<img src="<?php if(!empty($_SESSION['fotoBiblioteca'])){ echo "../../../../".$_SESSION['fotoBiblioteca']; }else{ echo("https://jamesrmoro.me/wp-content/uploads/2021/02/profile.png");}?>" alt="Sem imagem">
							  </div>
							 <br>
							  <input id="file-preview-js" type="file" accept="image/*" name="foto" onchange="loaderFile(event)"><br><br>
							  <div class="btns">
								<button class="btnOK04" onclick="closeModal04()">Alterar</button>
							</form>   
							<button class="btnClose04" onclick="closeModal04()">Voltar</button>
						</div>
					</div>
				  </div>
				<!-- FIM MODAL EDITAR	FOTO  -->
					


				<script>
					function mascara(o, f) {
						v_obj = o
						v_fun = f
						setTimeout("execmascara()", 1)
					}
	
					function execmascara() {
						v_obj.value = v_fun(v_obj.value)
					}
	
					function mtel(v) {
						v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
						v = v.replace(/^(\d{2})(\d)/g, "($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
						v = v.replace(/(\d)(\d{4})$/, "$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
						return v;
					}
	
					function id(el) {
						return document.getElementById(el);
					}
					window.onload = function() {
						id('telefone').onkeyup = function() {
							mascara(this, mtel);
						}
					}
				</script>

			
				   <!-- MODAL SAIR -->
				   <div class="modal-container01">
					<div class="modal01">
					  <h2>Deseja sair?</h2>
					  <span>
						Deseja realmente sair?
					  </span>
					  <div class="btns">
						<a href="../../../logout.php"><button class="btnOK01" onclick="closeModal01()">sair</button></a>
						<button class="btnClose01" onclick="closeModal01()">Não</button>
					  </div>
					</div>
				  </div>
					<!-- FIM MODAL SAIR  -->

			 <br><br>
			 

			  <!-- MODAL EXCLUIR CONTA -->
	  <div class="modal-container02">
		<div class="modal02">
		  <h2>Deseja realmente deletar esta conta?</h2>
		  <span>
		   Confirmação de exclusão da conta '<?php echo $_SESSION['nomeBiblioteca']?>'. É impossível reverter essa ação! Todos os seus dados serão deletados do nosso sistema.  Deseja continuar e apagar a sua conta?
		  </span>
		  <div class="btns">
			<button class="btnOK02" onclick="closeModal02()">Sim</button>
			<button class="btnClose02" onclick="closeModal02()">Não</button>
		  </div>
		</div>
	  </div>
		<!-- FIM MODAL EXCLUIR CONTA  -->

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

		
			<!-- MODAL CARDS -->
				
			<div class="products-preview">
			<?php if (empty($_GET['pesquisa'])) {
      foreach ($listaExemplar as $linhas) {  ?>

<div class="preview" data-target="<?php echo $linhas['idExemplar'] ?>">
            <div class="wrapperModal">
              <i class="fas fa-times"></i>
              <div class="left">
			  <img src="../../../../<?php echo $linhas['capaLivro'] ?>" alt="" width="120">
                <h4 style="text-transform: uppercase;"><?php echo $linhas['nomeLivro'] ?></h4><br>
				<p>Genero: </p>
                <p style="text-transform: uppercase;"><?php echo $linhas['nomeGenero'] ?></p><br>
				<p>Autor: </p>
                <p style="text-transform: uppercase;"> <?php echo $linhas['nomeAutor'] ?></p><br>
				<p>Editora: </p>
				<p style="text-transform: uppercase;"> <?php echo $linhas['nomeEditora'] ?></p><br>
				<p>Data de Lançamento: </p>
				<p style="text-transform: uppercase;"> <?php echo $linhas['dtLancamento'] ?></p><br>
              </div>
              <div class="right">
                <div class="info">
                  <h3>Sinopse</h3>
                  <p> <?php echo $linhas['sinopseLivro'] ?><p>
                </div>
                <div class="buttons">
                  <a href="#" class="buy"  style="font-size: 15px;"><?php if($linhas['statusExemplar'] == 1){echo "Disponivel";}else{echo "Indisponivel";} ?></a>
                </div>
              </div>
            </div>
          </div>

      <?php }
    } else {

      $conexao = Conexao::conectar();
      if ($_GET['pesquisa'] == 'disponivel') {
        $busca = '%1%';
      } elseif ($_GET['pesquisa'] == 'indisponivel') {
        $busca = '%0%';
      } else {
        $busca = '%' . addslashes($_GET['pesquisa']) . '%';
      }
      $stmt = $conexao->prepare("SELECT *,DATE_FORMAT(dtLancamento,'%d/%m/%Y') AS dtLancamento FROM vwExemplar
															WHERE idBiblioteca = :id
															and nomeLivro like :busca 
															or nomeAutor like :busca 
															or nomeEditora like :busca 
															or nomeGenero like :busca 
															or numExemplar like :busca
                              or statusExemplar like :busca
															
															order by nomeLivro asc");
      $stmt->bindValue(':busca', $busca, PDO::PARAM_STR);
      $stmt->bindValue(':id', $_SESSION['idBiblioteca']);

      $stmt->execute();


      if ($stmt->rowCount() == 0) { ?>
        <tr>
          <td colspan="9">Busca indefinida</td>
        </tr>
        <?php  } else {
        $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($lista as $linhas) {  ?>
          <div class="preview" data-target="<?php echo $linhas['idExemplar'] ?>">
            <div class="wrapperModal">
              <i class="fas fa-times"></i>
              <div class="left">
                <img src="../../../../<?php echo $linhas['capaLivro'] ?>" alt="" width="120">
                <h4 style="text-transform: uppercase;"><?php echo $linhas['nomeLivro'] ?></h4><br>
				<p>Genero: </p>
                <p style="text-transform: uppercase;"><?php echo $linhas['nomeGenero'] ?></p><br>
				<p>Autor: </p>
                <p style="text-transform: uppercase;"> <?php echo $linhas['nomeAutor'] ?></p><br>
				<p>Editora: </p>
				<p style="text-transform: uppercase;"> <?php echo $linhas['nomeEditora'] ?></p><br>
				<p>Data de Lançamento: </p>
				<p style="text-transform: uppercase;"> <?php echo $linhas['dtLancamento'] ?></p><br>
              </div>
              <div class="right">
                <div class="info">
                  <h3>Sinopse</h3>
                  <p> <?php echo $linhas['sinopseLivro'] ?><p>
                </div>
                <div class="buttons">
                  <a href="#" class="buy" style="font-size: 15px;"><?php if($linhas['statusExemplar'] == 1){echo "Disponivel";}else{echo "Indisponivel";} ?></a>
                </div>
              </div>
            </div>
          </div>
    <?php }
      }
    } ?>


			</div>
		<!-- FIM MODAL CARDS -->
	  
			 </div>
		</main>
	</section>
		
	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
			<script src="js/sidebar.js"></script>
			<script src="js/modalFoto.js"></script>
			<script src="js/modalCard.js"></script>
     
         <script>
         
             //Modal Editar perfil
             const modal6 = document.querySelector('.modal-container6')
             function openModal6() {
             modal6.classList.add('active')
             }
             function closeModal6() {
             modal6.classList.remove('active')
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
	  	<!-- modal excluir conta fim -->
	
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
		<!-- modal alterar senha -->                                                               
		                                    


<script>
	//Modal alterar foto
	const modal04 = document.querySelector('.modal-container04')
	function openModal04() {
	modal04.classList.add('active04')
	}
	function closeModal04() {
	modal04.classList.remove('active04')
	}
  </script>
 
                                

		


		<script>
				
			//Modal sair
			const modal01 = document.querySelector('.modal-container01')
			function openModal01() {
			modal01.classList.add('active01')
			}
			function closeModal01() {
			modal01.classList.remove('active01')
			}
			
		</script>
</body>
</html>