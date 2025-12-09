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

        <div class="layout">
            <div class="content">
                <div class="filters" data-aos="fade-up" data-aos-delay="100">
                    <div class="filter-group">
                        <span class="filter-label">Сортировка:</span>
                        <select class="filter-select">
                            <option>Сначала новые</option>
                            <option>Сначала старые</option>
                            <option>Сначала популярные</option>
                        </select>
                    </div>
                    <div class="search-box">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" placeholder="Поиск по темам...">
                    </div>
                </div>

                <div class="threads-container">
                    <div class="thread-card" data-aos="fade-up" data-aos-delay="0">
                        <div class="thread-header">
                            <div class="thread-info">
                                <h2 class="thread-title">Общие вопросы по сборке ПК</h2>
                                <div class="thread-meta">
                                    <span class="thread-author">Admin</span>
                                    <span class="thread-date">01.04.2023</span>
                                    <span class="thread-category">Общие вопросы</span>
                                </div>
                            </div>
                            <div class="thread-stats">
                                <div class="stat">
                                    <div class="stat-value">120</div>
                                    <div class="stat-label">Тем</div>
                                </div>
                                <div class="stat">
                                    <div class="stat-value">2.4K</div>
                                    <div class="stat-label">Сообщений</div>
                                </div>
                            </div>
                        </div>
                        <div class="thread-preview">
                            <p>Обсуждение сборок, совместимости комплектующих, подбор конфигураций под разные задачи.</p>
                        </div>
                    </div>

                    <div class="thread-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="thread-header">
                            <div class="thread-info">
                                <h2 class="thread-title">Разгон и оптимизация</h2>
                                <div class="thread-meta">
                                    <span class="thread-author">OC_Master</span>
                                    <span class="thread-date">05.04.2023</span>
                                    <span class="thread-category">Разгон</span>
                                </div>
                            </div>
                            <div class="thread-stats">
                                <div class="stat">
                                    <div class="stat-value">89</div>
                                    <div class="stat-label">Тем</div>
                                </div>
                                <div class="stat">
                                    <div class="stat-value">1.1K</div>
                                    <div class="stat-label">Сообщений</div>
                                </div>
                            </div>
                        </div>
                        <div class="thread-preview">
                            <p>Обсуждение разгона процессоров, видеокарт, оперативной памяти, настройка BIOS и тестирование стабильности.</p>
                        </div>
                    </div>

                    <div class="thread-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="thread-header">
                            <div class="thread-info">
                                <h2 class="thread-title">Помощь и диагностика</h2>
                                <div class="thread-meta">
                                    <span class="thread-author">SupportTeam</span>
                                    <span class="thread-date">10.04.2023</span>
                                    <span class="thread-category">Поддержка</span>
                                </div>
                            </div>
                            <div class="thread-stats">
                                <div class="stat">
                                    <div class="stat-value">230</div>
                                    <div class="stat-label">Тем</div>
                                </div>
                                <div class="stat">
                                    <div class="stat-value">3.5K</div>
                                    <div class="stat-label">Сообщений</div>
                                </div>
                            </div>
                        </div>
                        <div class="thread-preview">
                            <p>Если ваш компьютер начал вести себя странно — пишите сюда. Поможем с диагностикой и решением проблем.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="sidebar">
                <div class="sidebar-card" data-aos="fade-left" data-aos-delay="0">
                    <h3 class="sidebar-title">Статистика форума</h3>
                    <ul class="trending-topics">
                        <li class="trending-topic">
                            <span>Всего разделов</span>
                            <div class="trending-meta">
                                <span>12</span>
                            </div>
                        </li>
                        <li class="trending-topic">
                            <span>Всего тем</span>
                            <div class="trending-meta">
                                <span>4 762</span>
                            </div>
                        </li>
                        <li class="trending-topic">
                            <span>Всего сообщений</span>
                            <div class="trending-meta">
                                <span>19 215</span>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="sidebar-card" data-aos="fade-left" data-aos-delay="100">
                    <h3 class="sidebar-title">Правила раздела</h3>
                    <p>Перед созданием новой темы обязательно ознакомьтесь с правилами форума и воспользуйтесь поиском — возможно, на ваш вопрос уже отвечали.</p>
                </div>
            </div>
        </div>
    </main>

    <?php include __DIR__ . '/partials_footer_and_modals.php'; // см. ниже, если не используешь partial, просто скопируй footer+modals из index.php ?>
</body>
</html>