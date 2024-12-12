<?php
require_once "lib/mysql.php"; 
$sql = "SELECT id, name, login FROM users";
$query = $pdo->query($sql);

if ($query) {
    $users = $query->fetchAll(PDO::FETCH_ASSOC); 
} else {
    die("Ошибка выполнения запроса: " . $pdo->errorInfo()[2]);
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <?php 
        $website_title = "Список всех пользователей на сайте";
        require "blocks/head.php"
    ?>
</head>

<body>
    <?php require "blocks/header.php"?>

    <main>
    <div>
        <h4>Список пользователей</h4>
        <?php foreach ($users as $user): ?>
            <div class="user-item">
            <span>
                Имя: <?php echo $user['name']; ?>, логин: <?php echo $user['login']; ?>
            </span>
            <button class="delete-btn" onclick="deleteUser(<?php echo $user['id']; ?>)">Удалить</button>
            </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>

    <?php require "blocks/aside.php"?>

    <?php require "blocks/footer.php"?>

    <script>
        function deleteUser(id) {
        console.log("Удаление пользователя с ID:", id);
        if (confirm("Вы уверены, что хотите удалить этого пользователя?")) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/deleteUser.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                console.log("Статус ответа:", xhr.status); 
                if (xhr.status === 200) {
                    console.log("Ответ сервера:", xhr.responseText);
                    alert(xhr.responseText);
                    location.reload(); 
                } else {
                    alert("Ошибка при удалении. Статус: " + xhr.status);
                }
            }
        };
        xhr.send("id=" + id);
    }
}
    </script>
</body>

</html>