<?php

require_once 'Conexao.php';

$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];

$pdo = Conexao::conectar('./configuracao.ini');




$sql = "INSERT INTO usuarios(nome, email, senha) " .
"VALUES(?, ?, ?)";

$stmt = $pdo->prepare($sql);
$resultado = $stmt->execute([
    $nome,
    $email,
    $senha
]);

if ($resultado) {
    echo 'Cadastrado com sucesso!';
    header('Location: login.html');
} else {
    echo 'Algo não está certo! Tente Novamente';
    header('Location: cadastro.html');
}

