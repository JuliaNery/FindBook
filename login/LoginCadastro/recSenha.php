<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FindBook-Senha</title>
    <link rel="stylesheet" href="css/recSenha.css">
</head>
<body>
<div class="wrapper">
	<div class="header">
		<ul>
			<li class="active form_1_progessbar">
				<div>
					<p>1</p>
				</div>
			</li>
			<li class="form_2_progessbar">
				<div>
					<p>2</p>
				</div>
			</li>
			<li class="form_3_progessbar">
				<div>
					<p>3</p>
				</div>
			</li>
		</ul>
	</div>
	<div class="form_wrap">
		<div class="form_1 data_info">
			<h2>Alteração de senha</h2>
			<form>
				<div class="form_container">
					<div class="input_wrap">
						<label for="email">Email</label>
						<input type="text" name="Email" class="input" id="email">
					</div>
					<!-- <div class="input_wrap">
						<label for="password">Password</label>
						<input type="password" name="password" class="input" id="password">
					</div> -->
					<!-- <div class="input_wrap">
						<label for="confirm_password">Confirm Password</label>
						<input type="password" name="confirm password" class="input" id="confirm_password">
					</div> --><br>
				</div>
			</form>
		</div>
		<div class="form_2 data_info" style="display: none;">
			<h2>Validação por código</h2>
			<form>
				<div class="form_container">
					<div class="input_wrap">
						<label for="user_name">Código</label>
						<input type="text" name="codigo" class="input" id="user_name">
					</div>
					<!-- <div class="input_wrap">
						<label for="first_name">First Name</label>
						<input type="text" name="First Name" class="input" id="first_name">
					</div> -->
					<!-- <div class="input_wrap">
						<label for="last_name">Last Name</label>
						<input type="text" name="Last Name" class="input" id="last_name">
					</div> --><br>
				</div>
			</form>
		</div>
		<div class="form_3 data_info" style="display: none;">
			<h2>Nova Senha</h2>
			<form>
				<div class="form_container">
					<div class="input_wrap">
						<label for="password">Senha</label>
						<input type="password" name="password" class="input" id="password">
					</div>
					<div class="input_wrap">
						<label for="confirm_password">Confirme a Senha</label>
						<input type="password" name="confirm password" class="input" id="confirm_password">
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="btns_wrap">
		<div class="common_btns form_1_btns">
			<button type="button" class="btn_next">Próximo <span class="icon"><ion-icon name="arrow-forward-sharp"></ion-icon></span></button>
		</div>
		<div class="common_btns form_2_btns" style="display: none;">
			<button type="button" class="btn_back"><span class="icon"><ion-icon name="arrow-back-sharp"></ion-icon></span>Voltar</button>
			<button type="button" class="btn_next">Próximo <span class="icon"><ion-icon name="arrow-forward-sharp"></ion-icon></span></button>
		</div>
		<div class="common_btns form_3_btns" style="display: none;">
			<button type="button" class="btn_back"><span class="icon"><ion-icon name="arrow-back-sharp"></ion-icon></span>Voltar</button>
			<button type="button" class="btn_done">Salvar</button>
		</div>
	</div>
</div>

<div class="modal_wrapper">
	<div class="shadow"></div>
	<div class="success_wrap">
		<span class="modal_icon"><ion-icon name="checkmark-sharp"></ion-icon></span>
		<p>Você concluiu o processo com sucesso.</p>
	</div>
</div>

</body>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script src="js/script.js"></script>

</html>






