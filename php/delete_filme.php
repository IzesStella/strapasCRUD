<?php
require_once 'bancodedado.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM filmes WHERE id = ?");
$stmt->execute([$id]);
header('Location: index-filme.php');
?>

