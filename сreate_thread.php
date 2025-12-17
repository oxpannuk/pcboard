<?php
require __DIR__ . '/config/db.php';

// если не авторизован — редирект на главную
if (empty($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Новая тема — PC Boards</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <?php /* можешь скопировать сюда тот же header, что и в index.php */ ?>

    <main class="container">
        <div class="page-header">
            <div>
                <h1 class="page-title">Создание новой темы</h1>
                <ul class="breadcrumb">
                    <li><a href="index.php">Главная</a></li>
                    <li><a href="forum.php">Форум</a></li>
                    <li>Новая тема</li>
                </ul>
            </div>
        </div>

        <div class="thread-card" style="max-width: 700px; margin: 0 auto;">
            <form>
                <div class="form-group">
                    <label class="form-label">Заголовок темы</label>
                    <input type="text" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Раздел</label>
                    <select class="form-control">
                        <option>Процессоры</option>
                        <option>Видеокарты</option>
                        <option>Материнские платы</option>
                        <option>Память и накопители</option>
                        <option>Периферия</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Сообщение</label>
                    <textarea class="form-control" rows="8" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Опубликовать тему</button>
            </form>
        </div>
    </main>
</body>
</html>