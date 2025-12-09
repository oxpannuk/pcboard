<?php
const DB_HOST = 'localhost';
const DB_NAME = 'pc_boards';   // или своё имя базы
const DB_USER = 'root';        // или свой пользователь
const DB_PASS = '';            // или твой пароль, если он есть
const DB_CHARSET = 'utf8mb4';

session_start();

$dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET;

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
} catch (PDOException $e) {
    die('Ошибка подключения к базе данных: ' . $e->getMessage());
}