// Общие функции для всех страниц
document.addEventListener('DOMContentLoaded', function() {
    // Инициализация модальных окон
    initModals();
    
    // Инициализация жидких элементов
    initLiquidElements();
    
    // Добавление активного класса к текущей странице в навигации
    setActiveNavItem();
    
    // Инициализация анимаций карточек
    initCardAnimations();
});

// Инициализация модальных окон
function initModals() {
    const loginBtn = document.getElementById('loginBtn');
    const registerBtn = document.getElementById('registerBtn');
    const loginModal = document.getElementById('loginModal');
    const registerModal = document.getElementById('registerModal');
    const closeButtons = document.querySelectorAll('.close-btn');
    const switchToRegister = document.getElementById('switchToRegister');
    const switchToLogin = document.getElementById('switchToLogin');

    if (loginBtn && loginModal) {
        loginBtn.addEventListener('click', () => showModal(loginModal));
    }

    if (registerBtn && registerModal) {
        registerBtn.addEventListener('click', () => showModal(registerModal));
    }

    closeButtons.forEach(btn => {
        btn.addEventListener('click', hideModals);
    });

    if (switchToRegister) {
        switchToRegister.addEventListener('click', (e) => {
            e.preventDefault();
            hideModals();
            if (registerModal) showModal(registerModal);
        });
    }

    if (switchToLogin) {
        switchToLogin.addEventListener('click', (e) => {
            e.preventDefault();
            hideModals();
            if (loginModal) showModal(loginModal);
        });
    }

    // Обработка форм
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');

    if (loginForm) {
        loginForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const username = document.getElementById('loginUsername')?.value.trim();
            const password = document.getElementById('loginPassword')?.value;

            try {
                const res = await fetch('api/login.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ username: username, password: password })
                });

                if (!res.ok || !data.success) {
                    alert(data.message || 'Ошибка авторизации');
                    return;
                }

                // После успешной авторизации перезагружаем страницу,
                // чтобы PHP подтянул сессию и корректно отрисовал шапку и модальное окно аккаунта
                window.location.reload();
            } catch (err) {
                console.error(err);
                alert('Ошибка соединения с сервером: ' + (err.message || err));
            }
        });
    }

    if (registerForm) {
        registerForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const username = document.getElementById('regUsername')?.value.trim();
            const email = document.getElementById('regEmail')?.value.trim();
            const password = document.getElementById('regPassword')?.value;

            try {
                const res = await fetch('api/register.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ username, email, password })
                });

                const data = await res.json();

                if (!res.ok || !data.success) {
                    alert(data.message || 'Не удалось зарегистрироваться');
                    return;
                }

                alert('Регистрация прошла успешно! Теперь вы можете войти.');
                hideModals();
            } catch (err) {
                console.error(err);
                alert('Ошибка соединения с сервером');
            }
        });
    }

    // Закрытие модальных окон при клике вне их
    window.addEventListener('click', (e) => {
        if (loginModal && e.target === loginModal) hideModals();
        if (registerModal && e.target === registerModal) hideModals();
    });
}

// Функции для показа/скрытия модальных окон
function showModal(modal) {
    if (modal) {
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
}

function hideModals() {
    const modals = document.querySelectorAll('.modal');
    modals.forEach(modal => {
        modal.style.display = 'none';
    });
    document.body.style.overflow = 'auto';
}

// Инициализация жидких элементов
function initLiquidElements() {
    for (let i = 0; i < 5; i++) {
        const liquidEl = document.createElement('div');
        liquidEl.className = 'liquid-element';
        liquidEl.style.width = `${Math.random() * 150 + 50}px`;
        liquidEl.style.height = liquidEl.style.width;
        liquidEl.style.top = `${Math.random() * 100}%`;
        liquidEl.style.left = `${Math.random() * 100}%`;
        liquidEl.style.animationDuration = `${Math.random() * 20 + 15}s`;
        liquidEl.style.opacity = `${Math.random() * 0.1 + 0.05}`;
        document.body.appendChild(liquidEl);
    }
}

// Установка активного элемента навигации
function setActiveNavItem() {
    const currentPage = window.location.pathname.split('/').pop() || 'index.html';
    const navLinks = document.querySelectorAll('nav a');
    
    navLinks.forEach(link => {
        const linkHref = link.getAttribute('href');
        if (linkHref === currentPage || 
            (currentPage === 'index.html' && linkHref === '#') ||
            (currentPage === '' && linkHref === '#') ||
            (currentPage === 'index.html' && linkHref === 'index.html')) {
            link.classList.add('active');
        } else {
            link.classList.remove('active');
        }
    });
}

// Инициализация анимаций карточек
function initCardAnimations() {
    const threadCards = document.querySelectorAll('.thread-card');
    threadCards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
    });
}

// Функция для создания хлебных крошек
function createBreadcrumb(items) {
    const breadcrumb = document.querySelector('.breadcrumb');
    if (breadcrumb) {
        breadcrumb.innerHTML = '';
        items.forEach((item, index) => {
            const li = document.createElement('li');
            if (index === items.length - 1) {
                li.textContent = item.name;
            } else {
                const a = document.createElement('a');
                a.href = item.url;
                a.textContent = item.name;
                li.appendChild(a);
            }
            breadcrumb.appendChild(li);
        });
    }
}