// ==================== MENU RESPONSIVO ====================
function initMobileMenu() {
    const hamburger = document.querySelector('.hamburger');
    const navMenu = document.querySelector('.nav-menu');
    const navLinks = document.querySelectorAll('.nav-link');

    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('active');
        navMenu.classList.toggle('active');
    });

    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            hamburger.classList.remove('active');
            navMenu.classList.remove('active');
        });
    });
}

// ==================== VALIDAÇÃO DE FORMULÁRIO ====================
function initContactForm() {
    const form = document.querySelector('.contato-form');

    if (!form) return;

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const nome = form.querySelector('input[placeholder="Seu Nome"]').value;
        const email = form.querySelector('input[placeholder="Seu Email"]').value;
        const telefone = form.querySelector('input[placeholder="Seu Telefone"]').value;
        const assunto = form.querySelector('select').value;
        const mensagem = form.querySelector('textarea').value;

        if (nome && email && telefone && assunto && mensagem) {
            // Simular envio
            console.log('Formulário enviado:', {
                nome,
                email,
                telefone,
                assunto,
                mensagem
            });

            // Mostrar notificação de sucesso
            showNotification('✓ Mensagem enviada com sucesso! Retornaremos em breve.', 'success');
            form.reset();
        } else {
            showNotification('⚠ Por favor, preencha todos os campos.', 'error');
        }
    });
}

// ==================== NOTIFICAÇÃO ====================
function showNotification(message, type = 'success') {
    const notification = document.createElement('div');
    notification.className = `notification ${type}`;
    notification.textContent = message;
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background-color: ${type === 'success' ? '#27ae60' : '#e74c3c'};
        color: white;
        padding: 1rem 1.5rem;
        border-radius: 5px;
        z-index: 10000;
        animation: slideIn 0.3s ease;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    `;

    document.body.appendChild(notification);

    setTimeout(() => {
        notification.style.animation = 'slideOut 0.3s ease';
        setTimeout(() => notification.remove(), 300);
    }, 4000);
}

// ==================== ANIMAÇÕES SCHroll ====================
function initScrollAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animated');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Aplicar observador a elementos
    const cards = document.querySelectorAll('.produto-card, .servico-item, .galeria-item');
    cards.forEach(card => observer.observe(card));
}

// ==================== BOTÃO PARA CONHECER PRODUTOS ====================
function initHeroButton() {
    const heroBtn = document.querySelector('.hero .btn-primary');
    if (heroBtn) {
        heroBtn.addEventListener('click', () => {
            const produtosSection = document.querySelector('#gelo-seco') || document.querySelector('#produtos');
            produtosSection.scrollIntoView({ behavior: 'smooth' });
        });
    }
}

// ==================== CONTADOR DE ESTATÍSTICAS ====================
function initStatsCounter() {
    const stats = document.querySelectorAll('.stat h3');
    let isStarted = false;

    const observerOptions = {
        threshold: 0.5
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !isStarted) {
                isStarted = true;
                stats.forEach(stat => {
                    const finalValue = parseInt(stat.textContent);
                    const increment = Math.ceil(finalValue / 50);
                    let currentValue = 0;

                    const counter = setInterval(() => {
                        currentValue += increment;
                        if (currentValue >= finalValue) {
                            stat.textContent = finalValue + '+';
                            clearInterval(counter);
                        } else {
                            stat.textContent = currentValue;
                        }
                    }, 30);
                });
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    const statsSection = document.querySelector('.stats');
    if (statsSection) {
        observer.observe(statsSection);
    }
}

// ==================== ADICIONAR ESTILOS PARA ANIMAÇÕES ====================
function addAnimationStyles() {
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideIn {
            from {
                transform: translateX(400px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideOut {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(400px);
                opacity: 0;
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .produto-card, .servico-item, .galeria-item {
            opacity: 0;
            animation: fadeInUp 0.6s ease forwards;
        }

        .produto-card.animated {
            animation: fadeInUp 0.6s ease forwards;
        }

        .servico-item.animated {
            animation: fadeInUp 0.6s ease forwards;
        }

        .galeria-item.animated {
            animation: fadeInUp 0.6s ease forwards;
        }

        .destaque-gelo-seco {
            border: 2px solid #00a8ff;
            box-shadow: 0 0 20px rgba(0, 168, 255, 0.3);
        }
    `;
    document.head.appendChild(style);
}

// ==================== EFEITO PARALLAX NO HERO ====================
function initParallax() {
    const hero = document.querySelector('.hero');

    window.addEventListener('scroll', () => {
        const scrollPosition = window.pageYOffset;
        if (scrollPosition < window.innerHeight) {
            hero.style.backgroundPosition = `0 ${scrollPosition * 0.5}px`;
        }
    });
}

// ==================== FILTRO DE GALERIA (OPCIONAL) ====================
function initGalleryLightbox() {
    const galeriaItems = document.querySelectorAll('.galeria-item');

    galeriaItems.forEach(item => {
        item.addEventListener('click', () => {
            const img = item.querySelector('img');
            const overlay = item.querySelector('.galeria-overlay');
            const title = overlay.querySelector('h4').textContent;
            const desc = overlay.querySelector('p').textContent;

            // Aqui você pode implementar um lightbox ou modal
            console.log('Clicado em:', title, desc);
        });
    });
}

// ==================== DESTAQUE PRODUTO (GELO SECO) ====================
function highlightDryIceItem() {
    const cards = document.querySelectorAll('.produto-card');

    cards.forEach(card => {
        // Verifica se o título ou texto do card contém "Gelo Seco"
        if (card.textContent.toLowerCase().includes('gelo seco')) {
            card.classList.add('destaque-gelo-seco');

            // Adiciona um selo de "Destaque" visualmente
            const badge = document.createElement('div');
            badge.textContent = '⭐ Destaque';
            badge.style.cssText = `
                position: absolute;
                top: -12px;
                right: 20px;
                background-color: #00a8ff;
                color: white;
                padding: 5px 15px;
                border-radius: 20px;
                font-weight: bold;
                font-size: 0.85rem;
                box-shadow: 0 4px 10px rgba(0, 168, 255, 0.4);
                z-index: 5;
            `;

            // Garante que o card tenha posição relativa para o badge se posicionar
            card.style.position = 'relative';
            card.style.overflow = 'visible'; // Permite que o badge saia um pouco do card
            card.appendChild(badge);
        }
    });
}

// ==================== INICIALIZAÇÃO GERAL ====================
document.addEventListener('DOMContentLoaded', function () {
    addAnimationStyles();
    initMobileMenu();
    initContactForm();
    initScrollAnimations();
    initHeroButton();
    initStatsCounter();
    initParallax();
    initGalleryLightbox();
    highlightDryIceItem();

    // Smooth Scroll para links internos
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            const navMenu = document.querySelector('.nav-menu');
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
                if (navMenu) {
                    navMenu.classList.remove('active');
                }
            }
        });
    });

    console.log('✓ Solgas - Sistema de inicialização completo!');
});

// ==================== LOG DAS FUNCIONALIDADES ====================
console.log(`
╔════════════════════════════════════╗
║   SOLGAS - TINTA AUTOMOTIVA       ║
║   Sistema carregado com sucesso    ║
╚════════════════════════════════════╝

Funcionalidades ativas:
✓ Menu responsivo
✓ Formulário de contato
✓ Animações de scroll
✓ Contador de estatísticas
✓ Efeito parallax
✓ Galeria interativa
✓ Suporte Mobile/PWA
`);

// ==================== SERVICE WORKER (Mobile App / PWA) ====================
if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
        navigator.serviceWorker.register('./service-worker.js')
            .then(reg => console.log('Service Worker registrado com sucesso!', reg.scope))
            .catch(err => console.log('Erro ao registrar o Service Worker:', err));
    });
}
