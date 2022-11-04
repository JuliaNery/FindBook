
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../controller/cadastra-genero.php" method="post">
        <label for="">Nome Genero</label>
        <input type="text" name="txtNomeGenero" placeholder="Genero">

        <input type="submit" name="cadastrar" value="Cadastrar">
    </form>

    <?php
    require_once('../model/genero.php');

    try {

        $Genero = new Genero();

    } catch (Exception $e) {
        echo ('erro ao cadastrar');
    }
?>
</body>
</html>