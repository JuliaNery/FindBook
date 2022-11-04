<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    require_once("../model/autor.php");
    require_once("../model/editora.php");
    require_once("../model/genero.php");
    require_once("../model/livro.php");

    try {
        $Autor = new Autor();
        $Genero = new Genero();
        $Editora = new Editora();
        $listaAutor = $Autor->listar();
        $listaGenero = $Genero->listar();
        $listaEditora = $Editora->listar();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    ?>
    <form action="../controller/cadastra-livro.php" method="post">
        <input type="text" name="txtNomeLivro" placeholder="Nome do Livro"><br><br>

        <input type="date" name="dtLancamento"><br><br>
 
        <textarea name="txtSinopseLivro" id="" cols="30" rows="5" placeholder="Digite a sinopse do livro" style="border-radius:10px ;"></textarea><br><br>

        <input type="number" name="txtFaixaEtaria" min="0" max="99"placeholder="Faixa Etaria"><br><br>

        <input type="file" name="imgCapaLivro" src="" alt=""><br><br>

        <select name="autor" id="" >
            <option value="0">Autor</option>
            <?php foreach ($listaAutor as $linha) { ?>
                <option value="<?php echo $linha['idAutor'] ?>">
                    <?php echo $linha['nomeAutor'] ?>
                </option>
            <?php } ?> 
        </select><br><br>

        <select name="editora" id="" >
            <option value="0">Editora</option>
            <?php foreach ($listaEditora as $linha) { ?>
                <option value="<?php echo $linha['idEditora'] ?>">
                    <?php echo $linha['nomeEditora'] ?>
                </option>
            <?php } ?> 
            
        </select><br><br>

        <select name="genero" id="" >
            <option value="0">Genero</option>
            <?php foreach ($listaGenero as $linha) { ?>
                <option value="<?php echo $linha['idGenero'] ?>">
                    <?php echo $linha['nomeGenero'] ?>
                </option>
            <?php } ?> 
        </select><br><br>

        <input type="submit" value="cadastrar">
    </form>
    
    <!-- private $idLivro;
        private $nomeLivro;
        private $dtLancamento;
        private $sinopseLivro;
        private $capaLivro;
        private $idAutor;
        private $idEditora;
        private $idGenero; -->
</body>
</html>