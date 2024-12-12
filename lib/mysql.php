<?php
    $user = 'root';
    $password = '';
    $db = 'web-block';
    $host = 'localhost';
    $port = '';

    $dsn = 'mysql:host='.$host.';dbname='.$db.';port='.$port;
    $pdo = new PDO($dsn, $user, $password);