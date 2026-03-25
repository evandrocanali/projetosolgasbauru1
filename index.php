<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'functions.php';
$data = loadData();
?>
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
            <h1 data-i18n="hero.title"><?php echo htmlspecialchars($data['hero']['title'] ?? 'Excelência em Estética Automotiva, Tintas, Complementos Automotivos e Gelo Seco'); ?></h1>
            <p data-i18n="hero.subtitle"><?php echo htmlspecialchars($data['hero']['subtitle'] ?? 'Produtos premium para transformar seu veículo'); ?></p>
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
        <p><?php echo htmlspecialchars($data['hero']['highlight'] ?? 'Referência em Estética Automotiva e Gelo Seco'); ?></p>
    </div>

    <!-- PRODUTOS -->
    <section id="produtos" class="produtos">
        <div class="container">
            <h2 class="section-title" data-i18n="section.products">Nossos Produtos</h2>
            <p class="section-subtitle" data-i18n="section.products.sub">Qualidade e durabilidade garantidas</p>
            
            <div class="produtos-grid">
                <?php foreach ($data['products'] as $product): ?>
                <a href="product.php?id=<?php echo $product['id']; ?>" class="produto-card" style="text-decoration: none; color: inherit; display: block;">
                    <div class="produto-img">
                        <img src="<?php echo $product['image']; ?>" alt="<?php echo htmlspecialchars($product['title']); ?>">
                    </div>
                    <div style="padding: 10px;">
                        <h3><?php echo htmlspecialchars($product['title']); ?></h3>
                        <p><?php echo htmlspecialchars($product['desc']); ?></p>
                        <span style="color: #1a1a2e; font-weight: bold; display: block; margin-top: 10px;">Ver Catálogo <i class="fas fa-chevron-right"></i></span>
                    </div>
                </a>
                <?php endforeach; ?>
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
                    <h2 data-i18n="section.about"><?php echo htmlspecialchars($data['about']['title'] ?? 'Sobre a Solgas'); ?></h2>
                    <p><?php echo nl2br(htmlspecialchars($data['about']['text1'] ?? '')); ?></p>
                    <p><?php echo nl2br(htmlspecialchars($data['about']['text2'] ?? '')); ?></p>
                    
                    <div class="stats">
                        <?php foreach (($data['about']['stats'] ?? []) as $stat): ?>
                        <div class="stat">
                            <h3><?php echo htmlspecialchars($stat['value']); ?></h3>
                            <p><?php echo htmlspecialchars($stat['label']); ?></p>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- GALERIA DE VÍDEOS -->
    <?php if (!empty($data['media']['videos'])): ?>
    <section id="videos" class="produtos" style="background: #121212; color: #fff;">
        <div class="container">
            <h2 class="section-title" style="color: #FFD700;">Vídeos e Demonstrações</h2>
            <p class="section-subtitle" style="color: #ccc;">Confira nossos produtos em ação</p>
            
            <div class="produtos-grid">
                <?php foreach ($data['media']['videos'] as $video): ?>
                <div class="produto-card" style="background: #1e1e1e; border: 1px solid #333;">
                    <div class="video-container" style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">
                        <?php if ($video['type'] === 'link'): ?>
                            <?php 
                                $url = $video['url'];
                                if (strpos($url, 'youtube.com/watch?v=') !== false) {
                                    $url = str_replace('watch?v=', 'embed/', $url);
                                } elseif (strpos($url, 'youtu.be/') !== false) {
                                    $url = str_replace('youtu.be/', 'youtube.com/embed/', $url);
                                }
                            ?>
                            <iframe src="<?php echo $url; ?>" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border:0;" allowfullscreen></iframe>
                        <?php else: ?>
                            <video controls style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                                <source src="<?php echo $video['url']; ?>" type="video/mp4">
                            </video>
                        <?php endif; ?>
                    </div>
                    <div style="padding: 15px;">
                        <h3 style="color: #FFD700; margin: 0; font-size: 1.1rem;"><?php echo htmlspecialchars($video['title']); ?></h3>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

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
                            <p><?php echo nl2br(htmlspecialchars($data['contact']['address'] ?? '')); ?></p>
                        </div>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-phone"></i>
                        <div>
                            <h3>Telefone</h3>
                            <p><?php echo htmlspecialchars($data['contact']['phone'] ?? ''); ?></p>
                        </div>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <h3>Email</h3>
                            <p><?php echo htmlspecialchars($data['contact']['email'] ?? ''); ?></p>
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
                        <li><a href="login.php" style="color: #FFE600;"><i class="fas fa-lock"></i> Admin</a></li>
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
