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
        <h1>Bem-vindo ao Sistema de Gerenciamento de Filmes</h1>
        <nav>
        <ul class="menu">
            <li><a href="../index.php" class="button">Home</a></li>
            <li><a href="read-filme.php" class="button">Listar Filmes</a></li>
            <li><a href="create-filme.php" class="button">Adicionar Filme</a></li>
        </ul>
        </nav>
    </header>

    <main>
        <h2>Lista de Filmes</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Duração</th>
                    <th>Diretor</th>
                    <th>Protagonista</th>
                </tr>
            </thead>
            <tbody>
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
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento de Filmes</p>
    </footer>
</body>
</html>