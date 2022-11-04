
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../controller/cadastra-autor.php" method="post">
        <label for="">Nome Autor</label>
        <input type="text" name="txtNomeAutor" placeholder="Autor">

        <input type="submit" name="cadastrar" value="Cadastrar">
    </form>

    <?php
    require_once('../model/autor.php');

    try {

        $Autor = new Autor();

    } catch (Exception $e) {
        echo ('erro ao cadastrar');
    }
?>
</body>
</html>