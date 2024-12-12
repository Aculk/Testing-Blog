<?php
    $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS));
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_SPECIAL_CHARS));
    $pass = trim(filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS));

    $error = '';
    if(strlen($username) < 2)
        $error = 'Введите имя';
    else if(strlen($email) < 5)
        $error = 'Введите email';
    else if(strlen($login) < 3)
        $error = 'Введите логин';
    else if(strlen($pass) < 5)
        $error = 'Введите пароль';

    if($error != '') {
        echo $error;
        exit();
    }

    require_once "../lib/mysql.php";

    $salt = 'asdfagsdg3124123$333asd:asdasf';
    $pass = md5($salt.$pass);

    $sql = 'INSERT INTO users(name, email, login, password) VALUES(?, ?, ?, ?)';
    $query = $pdo->prepare($sql);
    $query->execute([$username, $email, $login, $pass]);

    echo "Done";