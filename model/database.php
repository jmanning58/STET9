<?php
    $dsn = 'mysql:host=localhost;dbname=stet9_db';
    $username = 'stet_user';
    $password = 'pa55word';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_msg = $e->getMessage();
        echo $error_msg;
        exit();
    }
?>