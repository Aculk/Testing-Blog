<?php
require_once '../lib/mysql.php'; // Подключение к базе данных

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = trim($_POST['message']);

    if (!empty($message)) {
        $stmt = $pdo->prepare("INSERT INTO chat (message) VALUES (:message)");
        $stmt->execute(['message' => $message]);
        echo 'Сообщение добавлено';
    } else {
        echo 'Пустое сообщение не может быть отправлено';
    }
}
?>
