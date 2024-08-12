<?php
require_once 'bancodedado.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $duracao = $_POST['duracao'];
    $diretor = $_POST['diretor'];
    $protagonista = $_POST['protagonista'];
    $stmt = $pdo->prepare("INSERT INTO filmes (nome, duracao, diretor, protagonista) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nome, $duracao, $diretor, $protagonista]);
    header('Location: read-filme.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Filme</title>
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
        <form method="POST">
            <div class="form-header">
                <h2>Adicionar Filme</h2>
            </div>
            <div class="form-body">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="duracao">Duração:</label>
            <input type="text" id="duracao" name="duracao" required>

            <label for="diretor">Diretor:</label>
            <input type="text" id="diretor" name="diretor" required>

            <label for="protagonista">Protagonista:</label>
            <input type="text" id="protagonista" name="protagonista" required>
            
            <button type="submit">Adicionar</button>
            </div>
        </form>

    </main>

    <footer>
        <p>&copy; 2024 - MIA COLUCCI FILMES</p>
    </footer>

</body>
</html>
