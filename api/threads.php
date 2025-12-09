<?php
// API: список тем форума (упрощенный)
require __DIR__ . '/../config/db.php';

header('Content-Type: application/json; charset=utf-8');

$stmt = $pdo->query('
    SELECT t.id, t.title, t.created_at, u.username,
           (SELECT COUNT(*) FROM posts p WHERE p.thread_id = t.id) AS posts_count
    FROM threads t
    JOIN users u ON u.id = t.user_id
    ORDER BY t.created_at DESC
    LIMIT 50
');

$threads = $stmt->fetchAll();
echo json_encode(['threads' => $threads], JSON_UNESCAPED_UNICODE);
