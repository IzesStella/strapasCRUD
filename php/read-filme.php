<?php
require_once 'bancodedado.php';

$stmt = $pdo->query("SELECT * FROM filmes");
$filmes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Filmes</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Sistema de Gerenciamento de Filmes</h1>
        <nav>
        <ul class="menu">
            <li><a href="../index.php" class="button">Home</a></li>
            <li><a href="read-filme.php" class="button">Listar Filmes</a></li>
            <li><a href="create-filme.php" class="button">Adicionar Filme</a></li>
        </ul>
        </nav>
    </header>

    <main> 
        <div class="wrapper">
        <h2>Lista de Filmes</h2>

        <input type="text" id="searchInput" placeholder="Buscar filme..." /> <!-- caixa de pesquisa -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Duração</th>
                    <th>Diretor</th>
                    <th>Protagonista</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody id="filmeTableBody">
                <?php foreach ($filmes as $filme): ?>
                    <tr>
                        <td><?= $filme['id'] ?></td>
                        <td><?= $filme['nome'] ?></td>
                        <td><?= $filme['duracao'] ?></td>
                        <td><?= $filme['diretor'] ?></td>
                        <td><?= $filme['protagonista'] ?></td>
                        <td>
                            <a href="update_filme.php?id=<?= $filme['id'] ?>">Editar</a>
                            <a href="delete_filme.php?id=<?= $filme['id'] ?>">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 - MIA COLUCCI FILMES</p>
    </footer>

    <!-- Confirmação de exclusão ao tentar excluir um filme, para evitar exclusões acidentais -->
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Função para confirmação de exclusão
        const deleteLinks = document.querySelectorAll('a[href*="delete_filme.php"]');
        deleteLinks.forEach(link => {
            link.addEventListener('click', function (event) {
                if (!confirm('Você realmente deseja excluir este filme?')) {
                    event.preventDefault(); // Impede o redirecionamento se o usuário cancelar
                }
            });
        });

        // Função de filtro
        const searchInput = document.getElementById('searchInput');
        const tableRows = document.querySelectorAll('#filmeTableBody tr');

        searchInput.addEventListener('input', function () {
            const searchTerm = searchInput.value.toLowerCase();

            tableRows.forEach(row => {
                const filmName = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                const directorName = row.querySelector('td:nth-child(4)').textContent.toLowerCase();
                const protagonistName = row.querySelector('td:nth-child(5)').textContent.toLowerCase();

                if (filmName.includes(searchTerm) || directorName.includes(searchTerm) || protagonistName.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
    </script>
</body>
</html>