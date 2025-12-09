<?php
// API: регистрация пользователя
require __DIR__ . '/../config/db.php';

header('Content-Type: application/json; charset=utf-8');

$data = json_decode(file_get_contents('php://input'), true);
$username = trim($data['username'] ?? '');
$email = trim($data['email'] ?? '');
$password = $data['password'] ?? '';

if ($username === '' || $email === '' || $password === '') {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Заполните все поля']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Некорректный email']);
    exit;
}

// Проверим, что пользователь/почта уникальны
$stmt = $pdo->prepare('SELECT COUNT(*) FROM users WHERE username = :u OR email = :e');
$stmt->execute(['u' => $username, 'e' => $email]);
if ($stmt->fetchColumn() > 0) {
    http_response_code(409);
    echo json_encode(['success' => false, 'message' => 'Пользователь с таким логином или email уже существует']);
    exit;
}

$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $pdo->prepare('INSERT INTO users (username, email, password_hash) VALUES (:u, :e, :p)');
$stmt->execute(['u' => $username, 'e' => $email, 'p' => $hash]);

echo json_encode(['success' => true]);
