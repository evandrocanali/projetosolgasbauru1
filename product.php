<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'functions.php';
$data = loadData();

$productId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$product = null;

foreach ($data['products'] as $p) {
    if ($p['id'] === $productId) {
        $product = $p;
        break;
    }
}

if (!$product) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['title']); ?> - Solgas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .product-hero {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('<?php echo $product['image']; ?>');
            background-size: cover;
            background-position: center;
            padding: 100px 0;
            text-align: center;
            color: white;
        }
        .catalog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 40px 0;
        }
        .catalog-item {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.3s;
        }
        .catalog-item:hover {
            transform: translateY(-5px);
        }
        .item-img {
            height: 200px;
            width: 100%;
            object-fit: cover;
        }
        .item-info {
            padding: 15px;
        }
        .item-info h4 {
            margin: 0 0 10px;
            color: #1a1a2e;
        }
        .item-price {
            color: #25d366;
            font-weight: bold;
            font-size: 1.2rem;
        }
        .back-btn {
            display: inline-block;
            margin-bottom: 20px;
            color: #1a1a2e;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header class="navbar">
        <div class="container navbar-container">
            <a href="index.php" class="logo">
                <img src="logo.png" alt="Solgas Logo">
                <div class="logo-text">
                    <span>Solgas</span>
                    <small>Estética Automotiva, Tintas, Complementos Automotivos e Gelo Seco</small>
                </div>
            </a>
            <a href="index.php" class="btn" style="background: #FFE600; text-decoration: none; color: #1a1a2e;">Voltar ao Início</a>
        </div>
    </header>

    <section class="product-hero">
        <div class="container">
            <h1><?php echo htmlspecialchars($product['title']); ?></h1>
            <p><?php echo htmlspecialchars($product['desc']); ?></p>
        </div>
    </section>

    <div class="container" style="padding: 40px 20px;">
        <a href="index.php" class="back-btn"><i class="fas fa-arrow-left"></i> Voltar para Home</a>
        
        <h2 class="section-title">Catálogo de Itens</h2>
        
        <?php if (empty($product['catalog'])): ?>
            <p style="text-align: center; padding: 40px; color: #666;">Ainda não há itens cadastrados neste catálogo. Volte em breve!</p>
        <?php else: ?>
            <div class="catalog-grid">
                <?php foreach ($product['catalog'] as $item): ?>
                <div class="catalog-item">
                    <img src="<?php echo $item['image']; ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" class="item-img">
                    <div class="item-info">
                        <h4><?php echo htmlspecialchars($item['name']); ?></h4>
                        <p><?php echo htmlspecialchars($item['desc'] ?? ''); ?></p>
                        <div class="item-price"><?php echo htmlspecialchars($item['price'] ?? ''); ?></div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="footer-bottom">
                <p>&copy; 2026 Solgas. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>
</body>
</html>
