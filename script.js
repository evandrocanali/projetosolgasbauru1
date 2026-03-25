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

    // Dicionário de Traduções
    const translations = {
        pt: {
            "nav.home": "Início",
            "nav.products": "Produtos",
            "nav.services": "Serviços",
            "nav.about": "Sobre",
            "nav.contact": "Contato",
            "logo.sub": "Estética Automotiva, Tintas, Complementos Automotivos e Gelo Seco",
            "hero.title": "Excelência em Estética Automotiva, Tintas, Complementos Automotivos e Gelo Seco",
            "hero.subtitle": "Produtos premium para transformar seu veículo",
            "hero.highlight": "Referência em Proteção Cerâmica, produtos de estética automotiva, gelo seco e funilaria e pintura em Bauru e região",
            "section.products": "Nossos Produtos",
            "section.products.sub": "Qualidade e durabilidade garantidas",
            "section.why": "Por Que Escolher Solgas?",
            "section.why.sub": "Qualidade, variedade e preços competitivos",
            "section.about": "Sobre a Solgas",
            "about.text1": "Com anos de experiência no mercado automotivo, a Solgas é especializada em oferecer soluções premium para pintura e estética automotiva.",
            "about.text2": "Nossos produtos são escolhidos criteriosamente para garantir a máxima qualidade e durabilidade. Contamos com uma equipe de profissionais altamente treinados e equipamentos de ponta.",
            "section.contact": "Entre em Contato",
            "section.contact.sub": "Estamos aqui para ajudar",
            "btn.send": "Enviar Mensagem",
            "prod.dryice.title": "Gelo Seco",
            "prod.dryice.desc": "Solução ideal para refrigeração, transporte de perecíveis e efeitos especiais.",
            "prod.paints.title": "Tintas Premium",
            "prod.paints.desc": "Tintas automotivas de alta qualidade com excelente cobertura e durabilidade.",
            "prod.varnish.title": "Diluentes e Vernizes",
            "prod.varnish.desc": "Diluentes especiais e vernizes para proteção e brilho duradouro.",
            "prod.ceramic.title": "Proteção Cerâmica",
            "prod.ceramic.desc": "Revestimento cerâmico para proteção extrema e brilho espelhado.",
            "prod.cleaning.title": "Produtos de Limpeza",
            "prod.cleaning.desc": "Limpadores específicos para manutenção e conservação de pintura.",
            "prod.polish.title": "Polidores Especiais",
            "prod.polish.desc": "Polimentos que corrigem imperfeições e devolvem o brilho original.",
            "why.premium.title": "Produtos Premium",
            "why.premium.desc": "Marcas líderes do mercado com excelente custo-benefício.",
            "why.delivery.title": "Entrega Rápida",
            "why.delivery.desc": "Conte com nosso serviço de entrega ágil e eficiente.",
            "why.warranty.title": "Garantia Completa",
            "why.warranty.desc": "Todos os produtos com garantia de fábrica e suporte.",
            "why.support.title": "Suporte Técnico",
            "why.support.desc": "Orientações de uso e dúvidas sobre aplicação.",
            "why.price.title": "Preços Competitivos",
            "why.price.desc": "Desconto para compras em quantidade e clientes VIP.",
            "why.store.title": "Loja Física",
            "why.store.desc": "Visite nossa loja e conheça todos os produtos em pessoa."
        },
        en: {
            "nav.home": "Home",
            "nav.products": "Products",
            "nav.services": "Services",
            "nav.about": "About Us",
            "nav.contact": "Contact",
            "logo.sub": "Automotive Aesthetics, Paints, Automotive Complements and Dry Ice",
            "hero.title": "Excellence in Paints, Automotive Complements and Dry Ice",
            "hero.subtitle": "Premium products to transform your vehicle",
            "hero.highlight": "Reference in automotive aesthetics products and dry ice in Bauru and region",
            "section.products": "Our Products",
            "section.products.sub": "Quality and durability guaranteed",
            "section.why": "Why Choose Solgas?",
            "section.why.sub": "Quality, variety and competitive prices",
            "section.about": "About Solgas",
            "about.text1": "With years of experience in the automotive market, Solgas specializes in offering premium solutions for painting and automotive aesthetics.",
            "about.text2": "Our products are imported and carefully chosen to ensure maximum quality and durability. We have a team of highly trained professionals and state-of-the-art equipment.",
            "section.contact": "Get in Touch",
            "section.contact.sub": "We are here to help",
            "btn.send": "Send Message",
            "prod.dryice.title": "Dry Ice",
            "prod.dryice.desc": "Ideal solution for refrigeration, perishable transport and special effects.",
            "prod.paints.title": "Premium Paints",
            "prod.paints.desc": "High quality automotive paints with excellent coverage and durability.",
            "prod.varnish.title": "Diluents & Varnishes",
            "prod.varnish.desc": "Special diluents and varnishes for protection and lasting shine.",
            "prod.ceramic.title": "Ceramic Protection",
            "prod.ceramic.desc": "Ceramic coating for extreme protection and mirror-like shine.",
            "prod.cleaning.title": "Cleaning Products",
            "prod.cleaning.desc": "Specific cleaners for paint maintenance and conservation.",
            "prod.polish.title": "Special Polishes",
            "prod.polish.desc": "Polishes that correct imperfections and restore original shine.",
            "why.premium.title": "Premium Products",
            "why.premium.desc": "Market leading brands with excellent cost-benefit.",
            "why.delivery.title": "Fast Delivery",
            "why.delivery.desc": "Count on our agile and efficient delivery service.",
            "why.warranty.title": "Full Warranty",
            "why.warranty.desc": "All products come with factory warranty and support.",
            "why.support.title": "Tech Support",
            "why.support.desc": "Usage guidelines and application questions.",
            "why.price.title": "Competitive Prices",
            "why.price.desc": "Discount for bulk purchases and VIP clients.",
            "why.store.title": "Physical Store",
            "why.store.desc": "Visit our store and see all products in person."
        },
        es: {
            "nav.home": "Inicio",
            "nav.products": "Productos",
            "nav.services": "Servicios",
            "nav.about": "Nosotros",
            "nav.contact": "Contacto",
            "logo.sub": "Estética Automotriz, Pinturas, Complementos Automotrices y Hielo Seco",
            "hero.title": "Excelencia en Pinturas, Complementos Automotrices y Hielo Seco",
            "hero.subtitle": "Productos premium para transformar su vehículo",
            "hero.highlight": "Referencia en productos de estética automotriz y hielo seco en Bauru y región",
            "section.products": "Nuestros Productos",
            "section.products.sub": "Calidad y durabilidad garantizadas",
            "section.why": "¿Por Qué Elegir Solgas?",
            "section.why.sub": "Calidad, variedad y precios competitivos",
            "section.about": "Sobre Solgas",
            "about.text1": "Con años de experiencia en el mercado automotriz, Solgas se especializa en ofrecer soluciones premium para pintura y estética automotriz.",
            "about.text2": "Nuestros productos son importados y elegidos cuidadosamente para garantizar la máxima calidad y durabilidad. Contamos con un equipo de profesionales altamente capacitados y equipos de última generación.",
            "section.contact": "Contáctenos",
            "section.contact.sub": "Estamos aquí para ayudar",
            "btn.send": "Enviar Mensaje",
            "prod.dryice.title": "Hielo Seco",
            "prod.dryice.desc": "Solución ideal para refrigeración, transporte de perecederos y efectos especiales.",
            "prod.paints.title": "Pinturas Premium",
            "prod.paints.desc": "Pinturas automotrices de alta calidad con excelente cobertura y durabilidad.",
            "prod.varnish.title": "Diluentes y Barnices",
            "prod.varnish.desc": "Diluentes especiales y barnices para protección y brillo duradero.",
            "prod.ceramic.title": "Protección Cerámica",
            "prod.ceramic.desc": "Recubrimiento cerámico para protección extrema y brillo espejo.",
            "prod.cleaning.title": "Productos de Limpieza",
            "prod.cleaning.desc": "Limpiadores específicos para mantenimiento y conservación de pintura.",
            "prod.polish.title": "Pulidores Especiales",
            "prod.polish.desc": "Pulimentos que corrigen imperfecciones y devuelven el brillo original.",
            "why.premium.title": "Productos Premium",
            "why.premium.desc": "Marcas líderes del mercado con excelente relación costo-beneficio.",
            "why.delivery.title": "Entrega Rápida",
            "why.delivery.desc": "Cuente con nuestro servicio de entrega ágil y eficiente.",
            "why.warranty.title": "Garantía Completa",
            "why.warranty.desc": "Todos los productos con garantía de fábrica y soporte.",
            "why.support.title": "Soporte Técnico",
            "why.support.desc": "Orientación de uso y dudas sobre aplicación.",
            "why.price.title": "Precios Competitivos",
            "why.price.desc": "Descuento para compras al por mayor y clientes VIP.",
            "why.store.title": "Tienda Física",
            "why.store.desc": "Visite nuestra tienda y conozca todos los productos en persona."
        },
        zh: {
            "nav.home": "首页",
            "nav.products": "产品",
            "nav.services": "服务",
            "nav.about": "关于我们",
            "nav.contact": "联系方式",
            "logo.sub": "油漆，汽车配件和干冰",
            "hero.title": "卓越的油漆，汽车配件和干冰",
            "hero.subtitle": "优质产品改变您的车辆",
            "hero.highlight": "巴鲁及周边地区汽车美容产品和干冰的参考",
            "section.products": "我们的产品",
            "section.products.sub": "质量和耐用性保证",
            "section.why": "为什么选择 Solgas？",
            "section.why.sub": "质量，品种和有竞争力的价格",
            "section.about": "关于 Solgas",
            "about.text1": "凭借在汽车市场的多年经验，Solgas 专注于为喷漆和汽车美容提供优质解决方案。",
            "about.text2": "我们的产品均为进口，经过精心挑选，以确保最高的质量和耐用性。我们拥有训练有素的专业团队和尖端设备。",
            "section.contact": "联系我们要",
            "section.contact.sub": "我们要来帮忙",
            "btn.send": "发送消息",
            "prod.dryice.title": "干冰",
            "prod.dryice.desc": "冷藏、易腐品运输和特效的理想解决方案。",
            "prod.paints.title": "优质油漆",
            "prod.paints.desc": "具有出色覆盖率和耐用性的高品质汽车油漆。",
            "prod.varnish.title": "添加剂和清漆",
            "prod.varnish.desc": "用于保护和持久光泽的特殊添加剂和清漆。",
            "prod.ceramic.title": "陶瓷保护",
            "prod.ceramic.desc": "用于极端保护和镜面光泽的陶瓷涂层。",
            "prod.cleaning.title": "清洁产品",
            "prod.cleaning.desc": "用于油漆维护和保养的专用清洁剂。",
            "prod.polish.title": "特殊抛光剂",
            "prod.polish.desc": "纠正瑕疵并恢复原有光泽的抛光剂。",
            "why.premium.title": "优质产品",
            "why.premium.desc": "性价比极高的市场领先品牌。",
            "why.delivery.title": "快速交货",
            "why.delivery.desc": "依靠我们需要敏捷高效的送货服务。",
            "why.warranty.title": "完整保修",
            "why.warranty.desc": "所有产品均附带工厂保修和支持。",
            "why.support.title": "技术支持",
            "why.support.desc": "使用指南和关于申请的问题。",
            "why.price.title": "有竞争力的价格",
            "why.price.desc": "批量购买和VIP客户的折扣。",
            "why.store.title": "实体店",
            "why.store.desc": "访问我们的商店并亲自了解所有产品。"
        }
    };

    const langBtn = langSelector.querySelector('.lang-btn');
    const langDropdown = langSelector.querySelector('.lang-dropdown');
    const langOptions = langSelector.querySelectorAll('.lang-option');

    if (langBtn && langDropdown && langOptions.length) {
        // Abrir/fechar o menu
        langBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            langSelector.classList.toggle('active');
        });

        // Lógica para selecionar um idioma
        langOptions.forEach(option => {
            option.addEventListener('click', function (e) {
                e.preventDefault();

                // Obter dados da opção clicada
                const newFlagSrc = this.querySelector('img').src;
                const newFlagAlt = this.querySelector('img').alt;
                const langCode = this.hash.substring(1); // 'pt', 'en', 'es', 'zh'
                const newLangCode = langCode.toUpperCase();

                // Atualizar o botão principal
                langBtn.querySelector('img').src = newFlagSrc;
                langBtn.querySelector('img').alt = newFlagAlt;
                langBtn.querySelector('span').textContent = newLangCode;

                // APLICAR TRADUÇÃO
                const textElements = document.querySelectorAll('[data-i18n]');
                if (translations[langCode]) {
                    textElements.forEach(el => {
                        const key = el.getAttribute('data-i18n');
                        if (translations[langCode][key]) {
                            el.textContent = translations[langCode][key];
                        }
                    });
                }

                // Atualizar a classe 'active' nas opções
                langOptions.forEach(opt => opt.classList.remove('active'));
                this.classList.add('active');

                // Fechar o menu
                langSelector.classList.remove('active');
            });
        });

        // Fechar ao clicar fora
        document.addEventListener('click', (e) => {
            if (!langSelector.contains(e.target)) {
                langSelector.classList.remove('active');
            }
        });
    }
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
