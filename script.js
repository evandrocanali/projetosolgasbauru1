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

// ==================== MENU IDIOMAS ====================
function initLanguageMenu() {
    const langSelector = document.querySelector('.language-selector');
    if (!langSelector) return;

    const translations = {
        pt: {
            "logo.sub": "Estética Automotiva, Tintas, Complementos Automotivos e Gelo Seco",
            "nav.home": "Início", "nav.products": "Produtos", "nav.services": "Serviços", "nav.about": "Sobre", "nav.contact": "Contato",
            "hero.title": "Excelência em Estética Automotiva, Tintas, Complementos Automotivos e Gelo Seco",
            "hero.subtitle": "Produtos premium para transformar seu veículo",
            "highlight.text": "Referência em Proteção Cerâmica, produtos de estética automotiva, funilaria e pintura e gelo seco em Bauru e região",
            "section.products": "Nossos Produtos", "section.products.sub": "Qualidade e durabilidade garantidas",
            "prod.dryice.title": "Gelo Seco", "prod.dryice.desc": "Solução ideal para refrigeração, transporte de perecíveis e efeitos especiais.",
            "prod.paints.title": "Tintas Premium", "prod.paints.desc": "Tintas automotivas de alta qualidade com excelente cobertura e durabilidade.",
            "prod.vernish.title": "Diluentes e Vernizes", "prod.vernish.desc": "Diluentes especiais e vernizes para proteção e brilho duradouro.",
            "prod.ceramic.title": "Proteção Cerâmica", "prod.ceramic.desc": "Revestimento cerâmico para proteção extrema e brilho espelhado.",
            "prod.cleaning.title": "Produtos de Limpeza", "prod.cleaning.desc": "Limpadores específicos para manutenção e conservação de pintura.",
            "prod.polish.title": "Polidores Especiais", "prod.polish.desc": "Polimentos que corrigem imperfeições e devolvem o brilho original.",
            "section.why": "Por Que Escolher Solgas?", "section.why.sub": "Qualidade, variedade e preços competitivos",
            "why.premium.title": "Produtos Premium", "why.premium.desc": "Marcas líderes do mercado com excelente custo-benefício.",
            "why.delivery.title": "Entrega Rápida", "why.delivery.desc": "Conte com nosso serviço de entrega ágil e eficiente.",
            "why.warranty.title": "Garantia Completa", "why.warranty.desc": "Todos os produtos com garantia de fábrica e suporte.",
            "section.about": "Sobre a Solgas", "about.text1": "Com anos de experiência no mercado automotivo, a Solgas é especializada em oferecer soluções premium para pintura e estética automotiva.", "about.text2": "Nossos produtos são escolhidos criteriosamente para garantir a máxima qualidade e durabilidade.",
            "stat.clients": "Clientes Satisfeitos", "stat.satisfaction": "Satisfação Garantida",
            "section.contact": "Entre em Contato", "info.address": "Endereço", "info.phone": "Telefone", "info.email": "Email", "btn.send": "Enviar Mensagem",
            "footer.ref": "Referência em Estética Automotiva.", "footer.links": "Links"
        },
        en: {
            "logo.sub": "Automotive Aesthetics, Paints, Automotive Complements and Dry Ice",
            "nav.home": "Home", "nav.products": "Products", "nav.services": "Services", "nav.about": "About", "nav.contact": "Contact",
            "hero.title": "Excellence in Automotive Aesthetics, Paints and Dry Ice",
            "hero.subtitle": "Premium products to transform your vehicle",
            "highlight.text": "Reference in Ceramic Protection, automotive aesthetics products, and dry ice in Bauru and region",
            "section.products": "Our Products", "section.products.sub": "Guaranteed quality and durability",
            "prod.dryice.title": "Dry Ice", "prod.dryice.desc": "Ideal solution for cooling, transport of perishables and special effects.",
            "prod.paints.title": "Premium Paints", "prod.paints.desc": "High quality automotive paints with excellent coverage and durability.",
            "prod.vernish.title": "Diluents & Varnishes", "prod.vernish.desc": "Special diluents and varnishes for protection and lasting shine.",
            "prod.ceramic.title": "Ceramic Protection", "prod.ceramic.desc": "Ceramic coating for extreme protection and mirror shine.",
            "prod.cleaning.title": "Cleaning Products", "prod.cleaning.desc": "Specific cleaners for paint maintenance and conservation.",
            "prod.polish.title": "Special Polishes", "prod.polish.desc": "Polishes that correct imperfections and restore original shine.",
            "section.why": "Why Choose Solgas?", "section.why.sub": "Quality, variety and competitive prices",
            "why.premium.title": "Premium Products", "why.premium.desc": "Leading market brands with excellent cost-benefit.",
            "why.delivery.title": "Fast Delivery", "why.delivery.desc": "Count on our agile and efficient delivery service.",
            "why.warranty.title": "Full Warranty", "why.warranty.desc": "All products with factory warranty and support.",
            "section.about": "About Solgas", "about.text1": "With years of experience in the automotive market, Solgas specializes in premium solutions.", "about.text2": "Our products are carefully chosen to ensure maximum quality and durability.",
            "stat.clients": "Satisfied Clients", "stat.satisfaction": "Guaranteed Satisfaction",
            "section.contact": "Contact Us", "info.address": "Address", "info.phone": "Phone", "info.email": "Email", "btn.send": "Send Message",
            "footer.ref": "Reference in Automotive Aesthetics.", "footer.links": "Links"
        },
        es: {
            "logo.sub": "Estética Automotriz, Pinturas, Complementos y Hielo Seco",
            "nav.home": "Inicio", "nav.products": "Productos", "nav.services": "Servicios", "nav.about": "Nosotros", "nav.contact": "Contacto",
            "hero.title": "Excelencia en Estética Automotriz, Pinturas y Hielo Seco",
            "hero.subtitle": "Productos premium para transformar su vehículo",
            "highlight.text": "Referencia em Protección Cerámica, productos de estética automotriz y hielo seco en Bauru",
            "section.products": "Nuestros Productos", "section.products.sub": "Calidad y durabilidad garantizadas",
            "prod.dryice.title": "Hielo Seco", "prod.dryice.desc": "Solución ideal para refrigeración, transporte y efectos especiales.",
            "prod.paints.title": "Pinturas Premium", "prod.paints.desc": "Pinturas automotrices de alta calidad con excelente cobertura.",
            "prod.vernish.title": "Diluentes y Barnices", "prod.vernish.desc": "Diluentes especiales y barnices para protección y brillo.",
            "prod.ceramic.title": "Protección Cerámica", "prod.ceramic.desc": "Recubrimiento cerámico para protección extrema y brillo espejo.",
            "prod.cleaning.title": "Productos de Limpieza", "prod.cleaning.desc": "Limpiadores específicos para mantenimiento de pintura.",
            "prod.polish.title": "Pulidores Especiales", "prod.polish.desc": "Pulimentos que corrigen imperfecciones y devuelven el brillo.",
            "section.why": "¿Por qué elegir Solgas?", "section.why.sub": "Calidad, variedad y precios competitivos",
            "why.premium.title": "Productos Premium", "why.premium.desc": "Marcas líderes del mercado con excelente costo-beneficio.",
            "why.delivery.title": "Entrega Rápida", "why.delivery.desc": "Contamos con un servicio de entrega ágil y eficiente.",
            "why.warranty.title": "Garantía Completa", "why.warranty.desc": "Todos los productos con garantía de fábrica.",
            "section.about": "Sobre Solgas", "about.text1": "Con años de experiencia, Solgas se especializa en soluciones premium.", "about.text2": "Nuestros productos son elegidos para garantizar calidad.",
            "stat.clients": "Clientes Satisfechos", "stat.satisfaction": "Satisfacción Garantizada",
            "section.contact": "Contáctenos", "info.address": "Dirección", "info.phone": "Teléfono", "info.email": "Email", "btn.send": "Enviar Mensaje",
            "footer.ref": "Referencia en Estética Automotriz.", "footer.links": "Enlaces"
        },
        zh: {
            "logo.sub": "汽车美容、油漆、汽车辅料和干冰",
            "nav.home": "首页", "nav.products": "产品", "nav.services": "服务", "nav.about": "关于我们", "nav.contact": "联系我们",
            "hero.title": "卓越的汽车美容、油漆和干冰解决方案",
            "hero.subtitle": "优质产品助您的爱车焕然一新",
            "highlight.text": "巴鲁及周边地区陶瓷保护、汽车美容产品和干冰的标杆",
            "section.products": "我们的产品", "section.products.sub": "质量与耐用性保证",
            "prod.dryice.title": "干冰", "prod.dryice.desc": "制冷、易腐品运输和特效的理想选择。",
            "prod.paints.title": "优质油漆", "prod.paints.desc": "具有出色覆盖率和耐用性的高质量汽车漆。",
            "prod.vernish.title": "稀释剂和清漆", "prod.vernish.desc": "用于保护和持久光泽的特殊稀释剂和清漆。",
            "prod.ceramic.title": "陶瓷保护", "prod.ceramic.desc": "用于极端保护和镜面光泽的纳米陶瓷涂层。",
            "prod.cleaning.title": "清洁产品", "prod.cleaning.desc": "用于漆面维护和保养的专用清洁剂。",
            "prod.polish.title": "专用抛光剂", "prod.polish.desc": "修复瑕疵并恢复原始光泽的抛光产品。",
            "section.why": "为什么选择 Solgas？", "section.why.sub": "品质卓越、品种齐全、价格极具竞争力",
            "why.premium.title": "优质产品", "why.premium.desc": "性价比极高的市场领先品牌。",
            "why.delivery.title": "快速配送", "why.delivery.desc": "依靠我们敏捷高效的配送服务。",
            "why.warranty.title": "全面保修", "why.warranty.desc": "所有产品均享有原厂保修和支持。",
            "section.about": "关于 Solgas", "about.text1": "凭借多年的经验，Solgas 专注于提供优质解决方案。", "about.text2": "我们的产品经过精心挑选，以确保最高的质量。",
            "stat.clients": "满意客户", "stat.satisfaction": "满意保证",
            "section.contact": "联系我们", "info.address": "地址", "info.phone": "电话", "info.email": "电子邮件", "btn.send": "发送消息",
            "footer.ref": "汽车美容领域的标杆。", "footer.links": "链接"
        }
    };

    const langBtn = langSelector.querySelector('.lang-btn');
    const langOptions = langSelector.querySelectorAll('.lang-option');

    langBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        langSelector.classList.toggle('active');
    });

    langOptions.forEach(option => {
        option.addEventListener('click', function(e) {
            e.preventDefault();
            const lang = this.getAttribute('href').replace('#', '');
            
            // Atualizar UI do botão
            langBtn.querySelector('img').src = this.querySelector('img').src;
            langBtn.querySelector('span').textContent = lang.toUpperCase();
            
            // Aplicar traduções
            document.querySelectorAll('[data-i18n]').forEach(el => {
                const key = el.getAttribute('data-i18n');
                if (translations[lang][key]) {
                    el.textContent = translations[lang][key];
                }
            });

            // Classe ativa
            langOptions.forEach(opt => opt.classList.remove('active'));
            this.classList.add('active');
            langSelector.classList.remove('active');
        });
    });

    document.addEventListener('click', () => langSelector.classList.remove('active'));
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
    initLanguageMenu();
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
