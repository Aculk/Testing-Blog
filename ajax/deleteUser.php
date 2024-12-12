<?php
require_once "../lib/mysql.php";

if (!$pdo) {
    die("Ошибка соединения с базой данных.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']); 

    if ($id > 0) {
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
        if ($stmt->execute([$id])) {
            echo "Пользователь с ID $id успешно удален.";
        } else {
            $errorInfo = $stmt->errorInfo(); 
            echo "Ошибка при удалении: " . $errorInfo[2];
        }
    } else {
        echo "Некорректный ID пользователя.";
    }
} else {
    echo "Некорректный запрос или ID не передан.";
}
