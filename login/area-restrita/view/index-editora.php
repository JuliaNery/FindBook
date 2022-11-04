
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../controller/cadastra-editora.php" method="post">
        <label for="">Nome Editora</label>
        <input type="text" name="txtNomeEditora" placeholder="Editora">

        <input type="submit" name="cadastrar" value="Cadastrar">
    </form>

    <?php
    require_once('../model/editora.php');

    try {

        $editora = new Editora();

    } catch (Exception $e) {
        echo ('<h1>erro ao cadastrar</h1>');
    }
?>
</body>
</html>