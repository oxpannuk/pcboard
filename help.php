<?php
require __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Помощь — PC Boards</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css">
</head>
<body>
    <div class="liquid-element"></div>
    <div class="liquid-element"></div>
    <div class="liquid-element"></div>

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
                    <li><a href="forum.php"><i class="fas fa-comments"></i> Форум</a></li>
                    <li><a href="sections.php"><i class="fas fa-th-large"></i> Разделы</a></li>
                    <li><a href="blog.php"><i class="fas fa-newspaper"></i> Блог</a></li>
                    <li><a href="reviews.php"><i class="fas fa-star"></i> Обзоры</a></li>
                    <li><a href="help.php" class="active"><i class="fas fa-question-circle"></i> Помощь</a></li>
                </ul>
            </nav>
            <div class="header-actions">
                <?php if (!empty($_SESSION['user_id'])): ?>
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

    <main class="container">
        <div class="page-header" data-aos="fade-up">
            <div>
                <h1 class="page-title">Помощь и поддержка</h1>
                <ul class="breadcrumb">
                    <li><a href="index.php">Главная</a></li>
                    <li>Помощь</li>
                </ul>
            </div>
        </div>

        <div class="layout">
            <div class="content">
                <div class="threads-container">
                    <div class="thread-card" data-aos="fade-up" data-aos-delay="0">
                        <div class="thread-header">
                            <div class="thread-info">
                                <h2 class="thread-title">Правила форума</h2>
                            </div>
                        </div>
                        <div class="thread-preview">
                            <p>Перед публикацией сообщений внимательно ознакомьтесь с правилами форума. Запрещены оскорбления, флуд, спам, реклама без согласования с администрацией.</p>
                        </div>
                    </div>

                    <div class="thread-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="thread-header">
                            <div class="thread-info">
                                <h2 class="thread-title">Часто задаваемые вопросы</h2>
                            </div>
                        </div>
                        <div class="thread-preview">
                            <p><strong>Как создать тему?</strong> — Перейдите в нужный раздел и нажмите «Новая тема».</p>
                            <p><strong>Как прикрепить скриншот?</strong> — Используйте форму загрузки файла под полем ввода текста.</p>
                        </div>
                    </div>

                    <div class="thread-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="thread-header">
                            <div class="thread-info">
                                <h2 class="thread-title">Связаться с администрацией</h2>
                            </div>
                        </div>
                        <div class="thread-preview">
                            <p>Если вы обнаружили ошибку на сайте, нарушение правил или хотите предложить улучшение — напишите нам через форму обратной связи или на email, указанный в подвале сайта.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="sidebar">
                <div class="sidebar-card" data-aos="fade-left" data-aos-delay="0">
                    <h3 class="sidebar-title">Быстрые ссылки</h3>
                    <ul class="footer-links">
                        <li><a href="#"><i class="fas fa-book"></i> Правила форума</a></li>
                        <li><a href="#"><i class="fas fa-question-circle"></i> FAQ</a></li>
                        <li><a href="#"><i class="fas fa-headset"></i> Техподдержка</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </main>

    <?php include __DIR__ . '/partials_footer_and_modals.php'; ?>
</body>
</html>