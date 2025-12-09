<?php
require __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форум — PC Boards</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">
</head>
<body>
    <div class="liquid-element"></div>
    <div class="liquid-element"></div>
    <div class="liquid-element"></div>

    <!-- ХЕДЕР КАК В index.php -->
    <header>
        <div class="container header-container" data-aos="fade-down">
            <div class="logo">
                <div class="logo-icon">
                    <i class="fas fa-microchip"></i>
                </div>
                <div class="logo-text">PC Boards</div>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php"><i class="fas fa-home"></i> Главная</a></li>
                    <li><a href="forum.php" class="active"><i class="fas fa-comments"></i> Форум</a></li>
                    <li><a href="sections.php"><i class="fas fa-th-large"></i> Разделы</a></li>
                    <li><a href="blog.php"><i class="fas fa-newspaper"></i> Блог</a></li>
                    <li><a href="reviews.php"><i class="fas fa-star"></i> Обзоры</a></li>
                    <li><a href="help.php"><i class="fas fa-question-circle"></i> Помощь</a></li>
                </ul>
            </nav>
            <div class="header-actions">
                <?php if (!empty($_SESSION['user_id'])): ?>
                    <!-- Пользователь авторизован: кнопки остаются в DOM для стилей/JS, но скрыты -->
                    <button class="btn btn-outline" id="loginBtn" style="display: none;">
                        <i class="fas fa-sign-in-alt"></i> Вход
                    </button>
                    <button class="btn btn-primary pulse" id="registerBtn" style="display: none;">
                        <i class="fas fa-user-plus"></i> Регистрация
                    </button>
                    <div class="user-menu" id="userAccountTrigger" style="cursor: pointer;">
                        <div class="avatar">
                            <?php
                            $name = $_SESSION['username'] ?? '';
                            if ($name !== '') {
                                $initials = mb_strtoupper(mb_substr($name, 0, 2, 'UTF-8'), 'UTF-8');
                                echo htmlspecialchars($initials);
                            } else {
                                echo '??';
                            }
                            ?>
                        </div>
                        <span><?= htmlspecialchars($_SESSION['username'] ?? 'Пользователь') ?></span>
                    </div>
                <?php else: ?>
                    <!-- Гость: показываем кнопки как раньше, user-menu спрятан -->
                    <button class="btn btn-outline" id="loginBtn">
                        <i class="fas fa-sign-in-alt"></i> Вход
                    </button>
                    <button class="btn btn-primary pulse" id="registerBtn">
                        <i class="fas fa-user-plus"></i> Регистрация
                    </button>
                    <div class="user-menu" id="userAccountTrigger" style="display: none; cursor: pointer;">
                        <div class="avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <span></span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <!-- ДАЛЬШЕ ТВОЙ КОНТЕНТ СТРАНИЦЫ ФОРУМА -->
    <main class="container">
        <div class="page-header" data-aos="fade-up">
            <div>
                <h1 class="page-title">Форум</h1>
                <ul class="breadcrumb">
                    <li><a href="index.php">Главная</a></li>
                    <li>Форум</li>
                </ul>
            </div>
            <button class="btn btn-primary" id="newThreadBtn">
                <i class="fas fa-plus"></i> Новая тема
            </button>
        </div>

        <!-- ... здесь можешь вставить свои блоки форума ... -->
    </main>

    <!-- НИЗ (подвал + модалки + скрипты) можешь скопировать из index.php как есть -->
    <?php include __DIR__ . '/partials_footer_and_modals.php'; ?>
</body>
</html>