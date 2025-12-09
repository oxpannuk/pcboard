<?php
require __DIR__ . '/config/db.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Блог — PC Boards</title>
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
                    <li><a href="blog.php" class="active"><i class="fas fa-newspaper"></i> Блог</a></li>
                    <li><a href="reviews.php"><i class="fas fa-star"></i> Обзоры</a></li>
                    <li><a href="help.php"><i class="fas fa-question-circle"></i> Помощь</a></li>
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
                <h1 class="page-title">Блог</h1>
                <ul class="breadcrumb">
                    <li><a href="index.php">Главная</a></li>
                    <li>Блог</li>
                </ul>
            </div>
        </div>

        <div class="layout">
            <div class="content">
                <div class="threads-container">
                    <div class="thread-card" data-aos="fade-up" data-aos-delay="0">
                        <div class="thread-header">
                            <div class="thread-info">
                                <h2 class="thread-title">Обзор новинок видеокарт 2023</h2>
                                <div class="thread-meta">
                                    <span class="thread-author">PC Boards Team</span>
                                    <span class="thread-date">01.05.2023</span>
                                </div>
                            </div>
                        </div>
                        <div class="thread-preview">
                            <p>Рассматриваем ключевые модели видеокарт этого года, сравниваем производительность, энергопотребление и цену.</p>
                        </div>
                    </div>

                    <div class="thread-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="thread-header">
                            <div class="thread-info">
                                <h2 class="thread-title">Как выбрать процессор для игр и работы</h2>
                                <div class="thread-meta">
                                    <span class="thread-author">AlexTech</span>
                                    <span class="thread-date">15.05.2023</span>
                                </div>
                            </div>
                        </div>
                        <div class="thread-preview">
                            <p>Разбираемся, на что смотреть при выборе CPU в 2023 году: количество ядер, частоты, кэш, поддержка технологий.</p>
                        </div>
                    </div>

                    <div class="thread-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="thread-header">
                            <div class="thread-info">
                                <h2 class="thread-title">Мониторинг температуры и нагрузки</h2>
                                <div class="thread-meta">
                                    <span class="thread-author">TechSupport</span>
                                    <span class="thread-date">22.05.2023</span>
                                </div>
                            </div>
                        </div>
                        <div class="thread-preview">
                            <p>Подбор утилит для мониторинга железа, настройка отображения, советы по интерпретации показаний.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="sidebar">
                <div class="sidebar-card" data-aos="fade-left" data-aos-delay="0">
                    <h3 class="sidebar-title">Категории блога</h3>
                    <ul class="footer-links">
                        <li><a href="#"><i class="fas fa-microchip"></i> Железо</a></li>
                        <li><a href="#"><i class="fas fa-gamepad"></i> Игры</a></li>
                        <li><a href="#"><i class="fas fa-wrench"></i> Гайды</a></li>
                        <li><a href="#"><i class="fas fa-bolt"></i> Оптимизация</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </main>

    <?php include __DIR__ . '/partials_footer_and_modals.php'; ?>
</body>
</html>