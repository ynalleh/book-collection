<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_livro'])) {
    // Verifica se todos os campos foram preenchidos
    if (!empty($_POST['titulo']) && !empty($_POST['autor']) && !empty($_POST['edicao']) && !empty($_POST['editora']) && !empty($_POST['ano_publicacao'])) {
        $id_livro = $_POST['id_livro'];
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $subtitulo = isset($_POST['subtitulo']) ? $_POST['subtitulo'] : null;
        $edicao = $_POST['edicao'];
        $editora = $_POST['editora'];
        $ano = $_POST['ano_publicacao'];

        // Conectar ao banco de dados
        include_once 'conexao.php';
        $pdo = Conexao::conectar('./configuracao.ini');

        // Prepara a query para atualizar os dados do livro com o ID fornecido
        $sql = "UPDATE livros SET titulo = ?, autor = ?, subtitulo = ?, edicao = ?, editora = ?, ano_publicacao = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$titulo, $autor, $subtitulo, $edicao, $editora, $ano, $id_livro]);

        // Verifica se a atualização foi bem sucedida
        if ($stmt->rowCount() > 0) {
            // Redireciona de volta para a página de listagem de livros
            header("Location: my-books.php");
            exit();
        } else {
            echo "Erro ao atualizar livro.";
        }
    } else {
        echo "Por favor, preencha todos os campos.";
    }
} else {
    echo "Acesso não permitido.";
}
