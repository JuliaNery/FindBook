<?php

// Carregar o Composer
require './vendor/autoload.php';

// Incluir conexao com BD
include_once './conexao2.php';

// QUERY para recuperar os registros do banco de dados
$query_biblioteca = "SELECT idBiblioteca, nomeBiblioteca, emailBiblioteca FROM tbbiblioteca";
$query_leitor = "SELECT idLeitor, nomeLeitor, emailLeitor FROM tbleitor";
$query_livro = "SELECT idLivro, nomeLivro FROM tblivro";

// Prepara a QUERY
$result_biblioteca = $conn->prepare($query_biblioteca);
$result_leitor = $conn->prepare($query_leitor);
$result_livro = $conn->prepare($query_livro);

// Executar a QUERY
$result_biblioteca->execute();
$result_leitor->execute();
$result_livro->execute();

// Informacoes para o PDF
$dados = "<!DOCTYPE html>";
$dados .= "<html lang='pt-br'>";
$dados .= "<head>";
$dados .= "<meta charset='UTF-8'>";
$dados .= "<title>Find Book - PDF</title>";
$dados .= "</head>";
$dados .= "<body>";
$dados .= "<h1>Listar quantidade de bibliotecas cadastradas</h1>";

// Ler os registros retornado do BD

//BIBLIOTECA
while($row_biblioteca = $result_biblioteca->fetch(PDO::FETCH_ASSOC)){
    //var_dump($row_usuario);
    extract($row_biblioteca);
    $dados .= "ID: $idBiblioteca <br>";
    $dados .= "Nome: $nomeBiblioteca <br>";
    $dados .= "E-mail: $emailBiblioteca <br>";
    $dados .= "<hr>";
}

//LEITOR
$dados .= "<br><br><h1>Listar quantidade de leitores cadastrados</h1>";
while($row_leitor = $result_leitor->fetch(PDO::FETCH_ASSOC)){
    //var_dump($row_usuario);
    extract($row_leitor);
    $dados .= "ID: $idLeitor <br>";
    $dados .= "Nome: $nomeLeitor <br>";
    $dados .= "E-mail: $emailLeitor <br>";
    $dados .= "<hr>";
}

//LIVROS
$dados .= "<br><br><h1>Listar quantidade de livros cadastrados</h1>";
while($row_livro = $result_livro->fetch(PDO::FETCH_ASSOC)){
    //var_dump($row_usuario);
    extract($row_livro);
    $dados .= "ID: $idLivro <br>";
    $dados .= "Nome: $nomeLivro <br>";
    $dados .= "<hr>";
}



// Referenciar o namespace Dompdf
use Dompdf\Dompdf;

// Instanciar e usar a classe dompdf
$dompdf = new Dompdf(['enable_remote' => true]);

// Instanciar o metodo loadHtml e enviar o conteudo do PDF
$dompdf->loadHtml($dados);

// Configurar o tamanho e a orientacao do papel
// landscape - Imprimir no formato paisagem
//$dompdf->setPaper('A4', 'landscape');
// portrait - Imprimir no formato retrato
$dompdf->setPaper('A4', 'portrait');

// Renderizar o HTML como PDF
$dompdf->render();

// Gerar o PDF
$dompdf->stream();
