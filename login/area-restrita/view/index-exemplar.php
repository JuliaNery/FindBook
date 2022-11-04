<?php
    require_once("../model/exemplar.php");
    require_once("../model/livro.php");

    try {
        $Livro = new Livro();

        $listaLivro= $Livro->listar();
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
    
<form action="../controller/cadastra-exemplar.php" method="post">

<input name='txtNumExemplar' type="number">
<select name="livro" id="" >
            <option value="0">Livro</option>
            <?php foreach ($listaLivro as $linha) { ?>
                <option value="<?php echo $linha['idLivro'] ?>">
                    <?php echo $linha['nomeLivro'] ?>
                </option>
            <?php } ?> 
        </select><br><br>
        <input type="submit" value="cadastrar">
</form>
</body>
</html>