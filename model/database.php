<?php
    $dsn = 'mysql:host=localhost;dbname=toyshop5rest1';
    $username = 'mgs_user';
    $password = 'pwd';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>