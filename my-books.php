<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Online</title>
    <link rel="stylesheet" href="assets/css/my-books.css">
    <link rel="shortcut icon" href="assets/images/libro.png">
</head>
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
            <h2>Meus Livros</h2>
            <form id="livro-form" action="controle-my-book.php" method="POST">
                <input type="text" id="titulo" name="titulo" placeholder="Título" required>
                <input type="text" id="autor" name="autor" placeholder="Autor" required>
                <input type="text" id="subtitulo" name="subtitulo" placeholder="Subtítulo">
                <input type="text" id="edicao" name="edicao" placeholder="Edição" required>
                <input type="text" id="editora" name="editora" placeholder="Editora" required>
                <input type="number" id="ano" name="ano_publicacao" placeholder="Ano de Publicação" required>
                <button type="submit">Adicionar Livro</button>
               
            </form>
            <table id="livro-tabela">
                <thead>

                </thead>
                <tbody>
                    <?php include_once 'list-books.php'; ?>
                    
        
                </tbody>
            </table>
        </div>
    </section>

    <script src="./assets/script.js"></script>
</body>
</html>
