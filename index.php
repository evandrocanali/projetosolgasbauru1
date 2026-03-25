<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solgas - Tinta Automotiva & Estética Automotiva</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- HEADER E NAVEGAÇÃO -->
    <header class="navbar">
        <div class="container navbar-container">
            <a href="#home" class="logo">
                <img src="logo.png" alt="Solgas Logo" onerror="this.src='https://via.placeholder.com/60x60?text=Solgas'">
                <div class="logo-text">
                    <span>Solgas</span>
                    <small data-i18n="logo.sub">Estética Automotiva, Tintas, Complementos Automotivos e Gelo Seco</small>
                </div>
            </a>
            <nav class="nav-menu">
                <ul>
                    <li><a href="#home" class="nav-link" data-i18n="nav.home">Início</a></li>
                    <li><a href="#produtos" class="nav-link" data-i18n="nav.products">Produtos</a></li>
                    <li><a href="#servicos" class="nav-link" data-i18n="nav.services">Serviços</a></li>
                    <li><a href="#sobre" class="nav-link" data-i18n="nav.about">Sobre</a></li>
                    <li><a href="#contato" class="nav-link" data-i18n="nav.contact">Contato</a></li>
                </ul>
                <div class="header-social">
                    <a href="https://www.instagram.com/solgasbauru" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.facebook.com/solgasbauru" target="_blank" title="Facebook"><i class="fab fa-facebook"></i></a>
                </div>
                
                <!-- MENU IDIOMAS -->
                <div class="language-selector">
                    <button class="lang-btn" aria-label="Selecionar idioma">
                        <img src="https://flagcdn.com/w20/br.png" alt="Português"> <span>PT</span> <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="lang-dropdown">
                        <a href="#pt" class="lang-option active"><img src="https://flagcdn.com/w20/br.png" alt="Brasil"> Português</a>
                        <a href="#en" class="lang-option"><img src="https://flagcdn.com/w20/us.png" alt="USA"> English</a>
                        <a href="#es" class="lang-option"><img src="https://flagcdn.com/w20/es.png" alt="España"> Español</a>
                        <a href="#zh" class="lang-option"><img src="https://flagcdn.com/w20/cn.png" alt="China"> 中文</a>
                    </div>
                </div>

                <a href="https://wa.me/5514981223322" class="whatsapp-float" target="_blank" title="Fale Conosco pelo WhatsApp">
                    <i class="fab fa-whatsapp"></i>
                </a>
            </nav>
            <button class="hamburger" aria-label="Menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </header>


    <!-- HERO SECTION -->
    <section id="home" class="hero">
        <div class="hero-content">
            <h1 data-i18n="hero.title">Excelência em Estética Automotiva, Tintas, Complementos Automotivos e Gelo Seco</h1>
            <p data-i18n="hero.subtitle">Produtos premium para transformar seu veículo</p>
        </div>
        
        <div class="marcas-carousel">
            <div class="marcas-track">
                <!-- Lista Original -->
                <div class="marca-item" title="Lazzuril"><img src="lazzuril.png" alt="Lazzuril"></div>
                <div class="marca-item" title="Tintas Brazilian"><img src="brazilian.png" alt="Tintas Brazilian"></div>
                <div class="marca-item" title="Farben"><img src="farben.png" alt="Farben"></div>
                <div class="marca-item" title="Indasa"><img src="indasa.png" alt="Indasa"></div>
                <div class="marca-item" title="Norton"><img src="norton.png" alt="Norton"></div>
                <div class="marca-item" title="3M"><img src="3m.png" alt="3M"></div>
                <div class="marca-item" title="Auto América"><img src="autoamerica.png" alt="Auto América"></div>
                <div class="marca-item" title="Lincoln"><img src="lincoln.png" alt="Lincoln"></div>
                <div class="marca-item" title="Dub Boyz"><img src="dubboyz.png" alt="Dub Boyz"></div>
                <div class="marca-item" title="Nobrecar"><img src="nobrecar.png" alt="Nobrecar"></div>
                <div class="marca-item" title="Soft99"><img src="soft99.png" alt="Soft99"></div>
                <div class="marca-item" title="Vonixx"><img src="vonixx.png" alt="Vonixx"></div>
                <div class="marca-item" title="Menzerna"><img src="menzerna.png" alt="Menzerna"></div>
                <div class="marca-item" title="Maxi Rubber"><img src="maxirubber.png" alt="Maxi Rubber"></div>
                <div class="marca-item" title="Finisher"><img src="finisher.png" alt="Finisher"></div>
                
                <!-- Lista Duplicada para efeito Infinito -->
                <div class="marca-item" title="Lazzuril"><img src="lazzuril.png" alt="Lazzuril"></div>
                <div class="marca-item" title="Tintas Brazilian"><img src="brazilian.png" alt="Tintas Brazilian"></div>
                <div class="marca-item" title="Farben"><img src="farben.png" alt="Farben"></div>
                <div class="marca-item" title="Indasa"><img src="indasa.png" alt="Indasa"></div>
                <div class="marca-item" title="Norton"><img src="norton.png" alt="Norton"></div>
                <div class="marca-item" title="Indasa"><img src="indasa.png" alt="Indasa"></div>
            </div>
        </div>
    </section>

    <!-- BARRA DE DESTAQUE -->
    <div class="highlight-bar">
        <p>Referência em Proteção Cerâmica, produtos de estética automotiva, funilaria e pintura e gelo seco em Bauru e região</p>
    </div>

    <!-- PRODUTOS -->
    <section id="produtos" class="produtos">
        <div class="container">
            <h2 class="section-title" data-i18n="section.products">Nossos Produtos</h2>
            <p class="section-subtitle" data-i18n="section.products.sub">Qualidade e durabilidade garantidas</p>
            
            <div class="produtos-grid">
                <!-- Produto 1 -->
                <div class="produto-card">
                    <div class="produto-img">
                        <img src="geloseco.png" alt="Gelo Seco">
                    </div>
                    <div style="padding: 10px;">
                        <h3>Gelo Seco</h3>
                        <p>Solução ideal para refrigeração, transporte de perecíveis e efeitos especiais.</p>
                    </div>
                </div>
                <!-- Produto 2 -->
                <div class="produto-card">
                    <div class="produto-img">
                        <img src="tintaspremium.png" alt="Tintas Premium">
                    </div>
                    <div style="padding: 10px;">
                        <h3>Tintas Premium</h3>
                        <p>Tintas automotivas de alta qualidade com excelente cobertura e durabilidade.</p>
                    </div>
                </div>
                <!-- Produto 3 -->
                <div class="produto-card">
                    <div class="produto-img">
                        <img src="diluentesevernizes.png" alt="Diluentes e Vernizes">
                    </div>
                    <div style="padding: 10px;">
                        <h3>Diluentes e Vernizes</h3>
                        <p>Diluentes especiais e vernizes para proteção e brilho duradouro.</p>
                    </div>
                </div>
                <!-- Produto 4 -->
                <div class="produto-card">
                    <div class="produto-img">
                        <img src="protecaoceramica.png" alt="Proteção Cerâmica">
                    </div>
                    <div style="padding: 10px;">
                        <h3>Proteção Cerâmica</h3>
                        <p>Revestimento cerâmico para proteção extrema e brilho espelhado.</p>
                    </div>
                </div>
                <!-- Produto 5 -->
                <div class="produto-card">
                    <div class="produto-img">
                        <img src="produtosdelimpeza.png" alt="Produtos de Limpeza">
                    </div>
                    <div style="padding: 10px;">
                        <h3>Produtos de Limpeza</h3>
                        <p>Limpadores específicos para manutenção e conservação de pintura.</p>
                    </div>
                </div>
                <!-- Produto 6 -->
                <div class="produto-card">
                    <div class="produto-img">
                        <img src="polidoresespeciais.png" alt="Polidores Especiais">
                    </div>
                    <div style="padding: 10px;">
                        <h3>Polidores Especiais</h3>
                        <p>Polimentos que corrigem imperfeições e devolvem o brilho original.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CATEGORIAS / POR QUE ESCOLHER -->
    <section id="servicos" class="categorias">
        <div class="container">
            <h2 class="section-title" data-i18n="section.why">Por Que Escolher Solgas?</h2>
            <p class="section-subtitle" data-i18n="section.why.sub">Qualidade, variedade e preços competitivos</p>
            
            <div class="categorias-grid">
                <div class="categoria-item">
                    <div class="categoria-icon"><i class="fas fa-check-circle"></i></div>
                    <h3 data-i18n="why.premium.title">Produtos Premium</h3>
                    <p data-i18n="why.premium.desc">Marcas líderes do mercado com excelente custo-benefício.</p>
                </div>
                <div class="categoria-item">
                    <div class="categoria-icon"><i class="fas fa-truck"></i></div>
                    <h3 data-i18n="why.delivery.title">Entrega Rápida</h3>
                    <p data-i18n="why.delivery.desc">Conte com nosso serviço de entrega ágil e eficiente.</p>
                </div>
                <div class="categoria-item">
                    <div class="categoria-icon"><i class="fas fa-undo"></i></div>
                    <h3 data-i18n="why.warranty.title">Garantia Completa</h3>
                    <p data-i18n="why.warranty.desc">Todos os produtos com garantia de fábrica e suporte.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- SOBRE -->
    <section id="sobre" class="sobre">
        <div class="container">
            <div class="sobre-content">
                <div class="sobre-text">
                    <h2 data-i18n="section.about">Sobre a Solgas</h2>
                    <p>Com anos de experiência no mercado automotivo, a Solgas é especializada em oferecer soluções premium para pintura e estética automotiva.</p>
                    <p>Nossos produtos são escolhidos criteriosamente para garantir a máxima qualidade e durabilidade. Contamos com uma equipe de profissionais altamente treinados e equipamentos de ponta.</p>
                    
                    <div class="stats">
                        <div class="stat">
                            <h3>500+</h3>
                            <p>Clientes Satisfeitos</p>
                        </div>
                        <div class="stat">
                            <h3>100%</h3>
                            <p>Satisfação Garantida</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTATO -->
    <section id="contato" class="contato">
        <div class="container">
            <h2 class="section-title" data-i18n="section.contact">Entre em Contato</h2>
            <div class="contato-content">
                <div class="contato-info">
                    <div class="info-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <h3>Endereço</h3>
                            <p>Rua Benedito Ribeiro dos Santos 8-6, Geisel, Bauru - SP</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-phone"></i>
                        <div>
                            <h3>Telefone</h3>
                            <p>(14) 98122-3322</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <h3>Email</h3>
                            <p>contato@solgas.com.br</p>
                        </div>
                    </div>
                </div>
                <form class="contato-form">
                    <input type="text" placeholder="Seu Nome" required>
                    <input type="email" placeholder="Seu Email" required>
                    <textarea placeholder="Sua Mensagem" rows="4" required></textarea>
                    <button type="submit" class="btn" data-i18n="btn.send">Enviar Mensagem</button>
                </form>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h4>Solgas</h4>
                    <p>Referência em Estética Automotiva.</p>
                </div>
                <div class="footer-section">
                    <h4>Links</h4>
                    <ul>
                        <li><a href="#produtos">Produtos</a></li>
                        <li><a href="#sobre">Sobre</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2026 Solgas. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>
