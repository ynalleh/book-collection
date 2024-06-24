<?php

include_once 'conexao.php';

$pdo = Conexao::conectar('./configuracao.ini');

$sql = "SELECT * FROM livros";
$stmt = $pdo->query($sql);
$livros = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($livros) > 0) {
    echo "<table id='livro-tabela'>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Subtítulo</th>
                <th>Edição</th>
                <th>Editora</th>
                <th>Ano de Publicação</th>
            </tr>";
    foreach ($livros as $livro) {
        echo "<tr>
                <td>{$livro['titulo']}</td>
                <td>{$livro['autor']}</td>
                <td>{$livro['subtitulo']}</td>
                <td>{$livro['edicao']}</td>
                <td>{$livro['editora']}</td>
                <td>{$livro['ano_publicacao']}</td>
                 <td>
                
                                        
                 <form action='edit-livro.php' method='GET' style='display: inline;'>
                    <input type='hidden' name='id' value='{$livro['id']}'>
                   <button type='submit' name='editar_livro'>Editar</button>
                 </form>

                 <form action='delete-livros.php' method='POST' style='display: inline;'>
                    <input type='hidden' name='id_livro' value='{$livro['id']}'>
                    <button type='submit' name='excluir_livro'>Excluir</button>
                 </form>
                  
              </tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum livro encontrado.";
}
