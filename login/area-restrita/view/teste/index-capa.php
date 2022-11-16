<?php
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php foreach ($listaLivro as $linhas) {  ?>
    <?php echo $linhas['idLivro'] ?> <br>
    <img src="../<?php echo $linhas['capaLivro'] ?>"> <br>
    <?php } ?>
</body>
</html>