<?php


    if (isset($_POST['id_livro'])) {
        $id_livro = $_POST['id_livro'];

        include_once 'conexao.php';

        $pdo = Conexao::conectar('./configuracao.ini');

        $sql = "DELETE FROM livros WHERE id = ?";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute([$id_livro])) {
           
            if ($stmt->rowCount() > 0) {
                
                header("Location: my-books.php");
                exit();
            } else {
                echo "Nenhum livro foi excluído.";
            }
        }
    }

    
