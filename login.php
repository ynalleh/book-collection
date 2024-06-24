<?php

require_once 'Conexao.php';


$email = $_POST["email"];
$senha = $_POST["senha"];
 
$pdo = Conexao::conectar('./configuracao.ini');


$sql = "SELECT senha FROM usuarios WHERE email = ?";
$stmt = $pdo->prepare($sql);
$resultado = $stmt->execute([
    $email
]);


$senhaArmazenada = $stmt->fetch(PDO::FETCH_ASSOC);

var_dump($senhaArmazenada);


if ($resultado) {
    
    if ($senha == $senhaArmazenada['senha']) {
        header('Location: painel.html');
        exit();
    } else {
        echo 'Senha Incorreta';
    }
} else {
    echo 'Usuário não cadastrado.';
}
