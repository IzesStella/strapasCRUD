<?php
require_once 'bancodedado.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM filmes WHERE id = ?");
$stmt->execute([$id]);
$filmes = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $duracao = $_POST['duracao'];
    $diretor = $_POST['diretor'];
    $protagonista = $_POST['protagonista'];
    $stmt = $pdo->prepare("UPDATE filmes SET nome = ?, duracao = ?, diretor = ?, protagonista = ? WHERE id = ?");
    $stmt->execute([$nome, $duracao, $diretor, $protagonista, $id]);
    header('Location: read-filme.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar filme</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <header>
        <h1>Bem-vindo ao Sistema de Gerenciamento de filmes</h1>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="read-filme.php">Listar filmes</a></li>
                <li><a href="create-filme.php">Adicionar filme</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Editar filme</h2>
        <form method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?= $filmes['nome'] ?>" required>
            <label for="duracao">Duração:</label>
            <input type="text" id="duracao" name="duracao" value="<?= $filmes['duracao'] ?>" required>
            <label for="diretor">Diretor:</label>
            <input type="text" id="diretor" name="diretor" value="<?= $filmes['diretor'] ?>" required>
            <label for="text">Protagonista:</label>
            <input type="text" id="protagonista" name="protagonista" value="<?= $filmes['protagonista'] ?>" required>
            <button type="submit">Atualizar</button>
        </form>
    </main>

    <footer>
        <p>&copy; 2024 - Sistema de Gerenciamento de filmes</p>
    </footer>
</body>
</html>