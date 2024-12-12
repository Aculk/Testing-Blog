<?php
require_once '../lib/mysql.php'; // Подключение к базе данных

$stmt = $pdo->query("SELECT * FROM chat ORDER BY id DESC");
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($messages);
?>
