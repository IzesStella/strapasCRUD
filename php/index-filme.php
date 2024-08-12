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
    <title>CRUD Filmes</title>
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

        <input type="text" id="searchInput" placeholder="Buscar filme..." /> <!--caixa de pesq-->
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
                <?php if (!empty($filmes)): ?>
                    <?php foreach ($filmes as $filme): ?>
                        <tr>
                            <td><?= $filme['id'] ?></td>
                            <td><?= $filme['nome'] ?></td>
                            <td><?= $filme['duracao'] ?></td>
                            <td><?= $filme['diretor'] ?></td>
                            <td><?= $filme['protagonista'] ?></td>
                            <td>
                                <a href="update_filme.php?id=<?= $filme['id'] ?>">Editar</a>
                                <a href="delete_filme.php?id=<?= $filme['id'] ?>" onclick="return confirm('Você realmente deseja excluir este filme?');">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">Nenhum filme encontrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>

    <footer>
        <p>&copy; 2024 - MIA COLUCCI FILMES</p>
    </footer>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('searchInput');
        const tableBody = document.getElementById('filmeTableBody');
        const tableRows = tableBody.getElementsByTagName('tr');

        searchInput.addEventListener('input', function () {
            const searchTerm = searchInput.value.toLowerCase();

            for (let i = 0; i < tableRows.length; i++) {
                const row = tableRows[i];
                const filmName = row.getElementsByTagName('td')[1].textContent.toLowerCase();
                const directorName = row.getElementsByTagName('td')[3].textContent.toLowerCase();
                const protagonistName = row.getElementsByTagName('td')[4].textContent.toLowerCase();

                if (filmName.includes(searchTerm) || directorName.includes(searchTerm) || protagonistName.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        });
    });
    </script>
</body>