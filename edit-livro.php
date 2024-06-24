<?php

include_once 'conexao.php';

// Verifica se o ID do livro foi passado via parâmetro na URL
if (isset($_GET['id'])) {
    $id_livro = $_GET['id'];

    // Conectar ao banco de dados
    $pdo = Conexao::conectar('./configuracao.ini');

    // Consulta para obter os dados do livro com o ID fornecido
    $sql = "SELECT * FROM livros WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_livro]);
    $livro = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verifica se o livro foi encontrado
    if ($livro) {
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Online</title>
    <link rel="stylesheet" href="assets/css/my-books.css">
    <link rel="shortcut icon" href="assets/images/libro.png">
</head>

</html>
<?php
    } else {
        echo "Livro não encontrado.";
    }
} else {
    echo "ID do livro não foi fornecido.";
}
?>

<body>
    <nav>
        <ul class="navbar">
            <li><a href="painel.html">Home</a></li>
            <li><a href="my-books.php">Meus Livros</a></li>
            <li><a href="about.html">Sobre</a></li>
        </ul>
    </nav>

    <section id="meus-livros" class="meus-livros">
        <div class="container">
            <h2>Edite o Livro</h2>
    <form action="update-livro.php" method="POST">
        <input type="hidden" name="id_livro" value="<?php echo $livro['id']; ?>">
        <input type="text" id="titulo" name="titulo" value="<?php echo $livro['titulo']; ?>" required><br><br>
        <input type="text" id="autor" name="autor" value="<?php echo $livro['autor']; ?>" required><br><br>
        <input type="text" id="subtitulo" name="subtitulo" value="<?php echo $livro['subtitulo']; ?>"><br><br>
        <input type="text" id="edicao" name="edicao" value="<?php echo $livro['edicao']; ?>" required><br><br>
        <input type="text" id="editora" name="editora" value="<?php echo $livro['editora']; ?>" required><br><br>
        <input type="number" id="ano" name="ano_publicacao" value="<?php echo $livro['ano_publicacao']; ?>" required><br><br>
        
        <button type="submit">Atualizar Livro</button>
    </form>
</body>
               </tbody>
            </table>
        </div>
    </section>

    <script src="./assets/script.js"></script>
</body>
</html>
