<?php
header('Content-Type: application/json; charset=utf-8');

require __DIR__ . '/../config/db.php';

try {
    $raw = file_get_contents('php://input');
    $data = json_decode($raw, true);

    if (!is_array($data)) {
        http_response_code(400);
        echo json_encode([
            'success' => false,
            'message' => 'Некорректные данные запроса (JSON)',
        ]);
        exit;
    }

    $username = trim($data['username'] ?? '');
    $password = $data['password'] ?? '';

    if ($username === '' || $password === '') {
        http_response_code(400);
        echo json_encode([
            'success' => false,
            'message' => 'Введите логин и пароль',
        ]);
        exit;
    }

    // Поиск по username или email
    $stmt = $pdo->prepare(
        'SELECT id, username, email, password_hash
         FROM users
         WHERE username = :u OR email = :e
         LIMIT 1'
    );

    $stmt->execute([
        ':u' => $username,
        ':e' => $username,
    ]);

    $user = $stmt->fetch();

    if (!$user || !password_verify($password, $user['password_hash'])) {
        http_response_code(401);
        echo json_encode([
            'success' => false,
            'message' => 'Неверный логин или пароль',
        ]);
        exit;
    }

    // Авторизация
    $_SESSION['user_id']  = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['email']    = $user['email'] ?? null;

echo json_encode([
    'success'  => true,
    'username' => $user['username'],
    'email'    => $user['email'] ?? null,
]);
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Ошибка сервера: ' . $e->getMessage(),
    ]);
}