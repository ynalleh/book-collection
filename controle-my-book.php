<?php

include_once 'conexao.php';

$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$subtitulo = $_POST['subtitulo'];
$edicao = $_POST['edicao'];
$editora = $_POST['editora'];
$ano = $_POST['ano_publicacao'];

$pdo = Conexao::conectar('./configuracao.ini');

$sql = "INSERT INTO livros (titulo, autor, subtitulo, edicao, editora, ano_publicacao) VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $pdo->prepare($sql);
$stmt->execute([$titulo, $autor, $subtitulo, $edicao, $editora, $ano]);

if ($stmt->rowCount() > 0) {
    echo "Livro adicionado com sucesso.";
    header('Location: my-books.php');
} else {
    echo 'Algo não está certo! Tente Novamente';
    header('Location: my-books.php');
}
