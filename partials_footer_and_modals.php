<?php
// общий низ сайта: подвал, модалки, скрипты
?>
<footer>
    <div class="container">
        <div class="footer-content">
            <div class="footer-section">
                <h3>PC Boards</h3>
                <p>Крупнейшее сообщество энтузиастов компьютеров и технологий. Присоединяйтесь к нашему сообществу!</p>
            </div>
            <div class="footer-section">
                <h3>Разделы</h3>
                <ul class="footer-links">
                    <li><a href="sections.php"><i class="fas fa-microchip"></i> Процессоры</a></li>
                    <li><a href="sections.php"><i class="fas fa-desktop"></i> Видеокарты</a></li>
                    <li><a href="sections.php"><i class="fas fa-microchip"></i> Материнские платы</a></li>
                    <li><a href="sections.php"><i class="fas fa-keyboard"></i> Периферия</a></li>
                    <li><a href="sections.php"><i class="fas fa-tools"></i> Сборка ПК</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Помощь</h3>
                <ul class="footer-links">
                    <li><a href="help.php"><i class="fas fa-book"></i> Правила форума</a></li>
                    <li><a href="help.php"><i class="fas fa-question-circle"></i> Часто задаваемые вопросы</a></li>
                    <li><a href="help.php"><i class="fas fa-headset"></i> Техническая поддержка</a></li>
                    <li><a href="help.php"><i class="fas fa-comment-dots"></i> Обратная связь</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Контакты</h3>
                <ul class="footer-links">
                    <li><a href="#"><i class="fas fa-envelope"></i> Email: admin@pcboards.ru</a></li>
                    <li><a href="#"><i class="fas fa-phone"></i> Телефон: +7 (999) 123-45-67</a></li>
                    <li><a href="#"><i class="fas fa-map-marker-alt"></i> Адрес: Москва, ул. Технологическая, 15</a></li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; 2023 PC Boards. Все права защищены.</p>
        </div>
    </div>
</footer>

<!-- Модальные окна -->
<div class="modal" id="loginModal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title">Вход в аккаунт</h2>
            <button class="close-btn">&times;</button>
        </div>
        <div class="modal-body">
            <form id="loginForm">
                <div class="form-group">
                    <label class="form-label" for="loginUsername">Имя пользователя или Email</label>
                    <input type="text" id="loginUsername" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="loginPassword">Пароль</label>
                    <input type="password" id="loginPassword" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Войти</button>
            </form>
            <div class="form-footer">
                <p>Нет аккаунта? <a href="#" id="switchToRegister">Зарегистрироваться</a></p>
                <p><a href="#">Забыли пароль?</a></p>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="registerModal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title">Регистрация</h2>
            <button class="close-btn">&times;</button>
        </div>
        <div class="modal-body">
            <form id="registerForm">
                <div class="form-group">
                    <label class="form-label" for="regUsername">Имя пользователя</label>
                    <input type="text" id="regUsername" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="regEmail">Email</label>
                    <input type="email" id="regEmail" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="regPassword">Пароль</label>
                    <input type="password" id="regPassword" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="regConfirmPassword">Подтверждение пароля</label>
                    <input type="password" id="regConfirmPassword" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Зарегистрироваться</button>
            </form>
            <div class="form-footer">
                <p>Уже есть аккаунт? <a href="#" id="switchToLogin">Войти</a></p>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="accountModal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title">Аккаунт</h2>
            <button class="close-btn">&times;</button>
        </div>
        <div class="modal-body">
            <div class="account-info">
                <div class="account-row">
                    <span class="account-label">Имя пользователя:</span>
                    <span class="account-value" id="accountUsername">
                        <?= htmlspecialchars($_SESSION['username'] ?? '—') ?>
                    </span>
                </div>
                <div class="account-row">
                    <span class="account-label">Email:</span>
                    <span class="account-value" id="accountEmail">
                        <?= htmlspecialchars($_SESSION['email'] ?? '—') ?>
                    </span>
                </div>
            </div>
            <form action="logout.php" method="post" class="logout-form" style="margin-top: 20px;">
                <button type="submit" class="btn btn-outline btn-block">
                    <i class="fas fa-sign-out-alt"></i> Выйти
                </button>
            </form>
        </div>
    </div>
</div>

<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script src="assets/js/script.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Инициализация AOS
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 800,
                once: true
            });
        }

        // Обработка кнопки новой темы (если есть на странице)
        const newThreadBtn = document.getElementById('newThreadBtn');
        if (newThreadBtn) {
            newThreadBtn.addEventListener('click', () => {
                alert('Для создания новой темы необходимо войти в систему');
                const loginModal = document.getElementById('loginModal');
                if (loginModal && typeof showModal === 'function') {
                    showModal(loginModal);
                }
            });
        }

        // Обработка переключателей ответов (если есть)
        document.querySelectorAll('.answers-toggle').forEach(toggle => {
            toggle.addEventListener('click', (e) => {
                e.stopPropagation();
                const icon = toggle.querySelector('i');
                if (icon.classList.contains('fa-chevron-down')) {
                    icon.classList.remove('fa-chevron-down');
                    icon.classList.add('fa-chevron-up');
                    toggle.classList.add('expanded');
                } else {
                    icon.classList.remove('fa-chevron-up');
                    icon.classList.add('fa-chevron-down');
                    toggle.classList.remove('expanded');
                }
            });
        });

        // Открытие модального окна аккаунта по клику на аватар/имя (делегирование)
        document.addEventListener('click', (e) => {
            const trigger = e.target.closest('#userAccountTrigger');
            if (!trigger) return;

            const accountModal = document.getElementById('accountModal');
            if (accountModal && typeof showModal === 'function') {
                showModal(accountModal);
            }
        });
    });
</script>