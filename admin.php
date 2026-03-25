<?php
require_once 'config.php';
require_once 'functions.php';
checkAuth();

$data = loadData();
$message = '';

// Processar formulários
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'save_hero') {
        $data['hero']['title'] = $_POST['title'];
        $data['hero']['subtitle'] = $_POST['subtitle'];
        $data['hero']['highlight'] = $_POST['highlight'];
        saveData($data);
        $message = 'Cabeçalho atualizado com sucesso!';
    } 
    elseif ($action === 'save_about') {
        $data['about']['title'] = $_POST['title'];
        $data['about']['text1'] = $_POST['text1'];
        $data['about']['text2'] = $_POST['text2'];
        // Stats
        $data['about']['stats'][0]['value'] = $_POST['stat0_val'];
        $data['about']['stats'][0]['label'] = $_POST['stat0_lab'];
        $data['about']['stats'][1]['value'] = $_POST['stat1_val'];
        $data['about']['stats'][1]['label'] = $_POST['stat1_lab'];
        saveData($data);
        $message = 'Seção "Sobre" atualizada!';
    }
    elseif ($action === 'save_contact') {
        $data['contact']['address'] = $_POST['address'];
        $data['contact']['phone'] = $_POST['phone'];
        $data['contact']['email'] = $_POST['email'];
        $data['contact']['hours'] = $_POST['hours'];
        saveData($data);
        $message = 'Contatos atualizados!';
    }
    elseif ($action === 'edit_product') {
        $id = (int)$_POST['product_id'];
        foreach ($data['products'] as &$product) {
            if ($product['id'] === $id) {
                $product['title'] = $_POST['title'];
                $product['desc'] = $_POST['desc'];
                
                // Upload de imagem se houver
                $newImage = handleUpload($_FILES['image']);
                if ($newImage) {
                    $product['image'] = $newImage;
                }
                break;
            }
        }
        saveData($data);
        $message = 'Produto atualizado!';
    }
    elseif ($action === 'add_product') {
        $newId = time();
        $image = handleUpload($_FILES['image']) ?: 'placeholder.png';
        $data['products'][] = [
            'id' => $newId,
            'title' => $_POST['title'],
            'desc' => $_POST['desc'],
            'image' => $image
        ];
        saveData($data);
        $message = 'Novo produto adicionado!';
    }
    elseif ($action === 'delete_product') {
        $id = (int)$_POST['product_id'];
        $data['products'] = array_filter($data['products'], function($p) use ($id) {
            return $p['id'] !== $id;
        });
        $data['products'] = array_values($data['products']); // Reindexar
        saveData($data);
        $message = 'Produto removido!';
    }
    elseif ($action === 'add_video') {
        $videoId = time();
        $type = $_POST['video_type']; // 'link' ou 'file'
        $url = '';
        
        if ($type === 'file') {
            $url = handleUpload($_FILES['video_file']);
        } else {
            $url = $_POST['video_url'];
        }

        if ($url) {
            $data['media']['videos'][] = [
                'id' => $videoId,
                'title' => $_POST['title'],
                'url' => $url,
                'type' => $type
            ];
            saveData($data);
            $message = 'Vídeo adicionado!';
        }
    }
    elseif ($action === 'delete_video') {
        $id = (int)$_POST['video_id'];
        $data['media']['videos'] = array_filter($data['media']['videos'], function($v) use ($id) {
            return $v['id'] !== $id;
        });
        $data['media']['videos'] = array_values($data['media']['videos']);
        saveData($data);
        $message = 'Vídeo removido!';
    }
    elseif ($action === 'add_catalog_item') {
        $productId = (int)$_POST['product_id'];
        $image = handleUpload($_FILES['item_image']) ?: 'placeholder.png';
        foreach ($data['products'] as &$product) {
            if ($product['id'] === $productId) {
                if (!isset($product['catalog'])) $product['catalog'] = [];
                $product['catalog'][] = [
                    'id' => time(),
                    'name' => $_POST['item_name'],
                    'desc' => $_POST['item_desc'],
                    'price' => $_POST['item_price'],
                    'image' => $image
                ];
                break;
            }
        }
        saveData($data);
        $message = 'Item adicionado ao catálogo!';
    }
    elseif ($action === 'delete_catalog_item') {
        $productId = (int)$_POST['product_id'];
        $itemId = (int)$_POST['item_id'];
        foreach ($data['products'] as &$product) {
            if ($product['id'] === $productId) {
                $product['catalog'] = array_filter((array)$product['catalog'], function($item) use ($itemId) {
                    return $item['id'] !== $itemId;
                });
                $product['catalog'] = array_values($product['catalog']);
                break;
            }
        }
        saveData($data);
        $message = 'Item removido do catálogo!';
    }
}

$active_tab = $_GET['tab'] ?? 'home';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo - Solgas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #FFD700;
            --dark: #121212;
            --card: #1e1e1e;
            --sidebar: #181818;
            --text: #ffffff;
            --text-muted: #b3b3b3;
            --accent: #FFD700;
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background-color: var(--dark);
            color: var(--text);
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: var(--sidebar);
            padding: 20px;
            display: flex;
            flex-direction: column;
            border-right: 1px solid rgba(255, 255, 255, 0.05);
            position: fixed;
            height: 100vh;
        }

        .logo-admin {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 40px;
            text-decoration: none;
        }

        .logo-admin img { width: 40px; }

        .logo-admin span {
            font-size: 1.2rem;
            font-weight: bold;
            color: var(--primary);
            letter-spacing: 1px;
        }

        .nav-admin ul { list-style: none; padding: 0; }

        .nav-admin li { margin-bottom: 5px; }

        .nav-admin a {
            color: var(--text-muted);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 15px;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .nav-admin a:hover, .nav-admin a.active {
            background: rgba(255, 215, 0, 0.1);
            color: var(--primary);
        }

        /* Main Content */
        .main-content {
            margin-left: 250px;
            flex-grow: 1;
            padding: 40px;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .message {
            background: rgba(46, 204, 113, 0.2);
            color: #2ecc71;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid rgba(46, 204, 113, 0.3);
        }

        .card {
            background: var(--card);
            padding: 30px;
            border-radius: 15px;
            margin-bottom: 30px;
            border: 1px solid rgba(255,255,255,0.05);
        }

        h2 { margin-top: 0; color: var(--primary); font-size: 1.5rem; margin-bottom: 20px; }

        form label { display: block; margin-bottom: 8px; color: var(--text-muted); font-size: 0.9rem; }

        form input[type="text"], form input[type="email"], form textarea {
            width: 100%;
            padding: 12px;
            background: #121212;
            border: 1px solid #333;
            border-radius: 8px;
            color: #fff;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        form input:focus, form textarea:focus {
            outline: none;
            border-color: var(--primary);
        }

        .btn-save {
            background: var(--primary);
            color: #000;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-save:hover { opacity: 0.9; transform: translateY(-2px); }

        /* Media Grid */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }

        .product-item {
            background: #252525;
            padding: 20px;
            border-radius: 12px;
            position: relative;
        }

        .product-item img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .product-actions {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .btn-delete { color: #ff4d4d; background: none; border: 1px solid #ff4d4d; padding: 5px 10px; border-radius: 5px; cursor: pointer; }
        .btn-delete:hover { background: rgba(255, 77, 77, 0.1); }

        .btn-add-modal {
            background: #2ecc71;
            color: #fff;
            padding: 12px 20px;
            border-radius: 8px;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <aside class="sidebar">
        <a href="index.php" class="logo-admin">
            <img src="logo.png" alt="Solgas">
            <span>ADMIN</span>
        </a>
        <nav class="nav-admin">
            <ul>
                <li><a href="?tab=home" class="<?php echo $active_tab == 'home' ? 'active' : ''; ?>"><i class="fas fa-home"></i> Início / Hero</a></li>
                <li><a href="?tab=products" class="<?php echo $active_tab == 'products' ? 'active' : ''; ?>"><i class="fas fa-box"></i> Produtos</a></li>
                <li><a href="?tab=about" class="<?php echo $active_tab == 'about' ? 'active' : ''; ?>"><i class="fas fa-info-circle"></i> Sobre Nós</a></li>
                <li><a href="?tab=videos" class="<?php echo $active_tab == 'videos' ? 'active' : ''; ?>"><i class="fas fa-video"></i> Vídeos</a></li>
                <li><a href="?tab=contact" class="<?php echo $active_tab == 'contact' ? 'active' : ''; ?>"><i class="fas fa-phone"></i> Contatos</a></li>
                <li><a href="logout.php" style="color: #ff4d4d; margin-top: 20px;"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
            </ul>
        </nav>
    </aside>

    <main class="main-content">
        <div class="top-bar">
            <h1>Gerenciar <?php echo ucfirst($active_tab); ?></h1>
            <div class="user-info">Bem-vindo, <strong>Admin</strong></div>
        </div>

        <?php if ($message): ?>
            <div class="message"><?php echo $message; ?></div>
        <?php endif; ?>

        <?php if ($active_tab === 'home'): ?>
            <div class="card">
                <h2>Editar Cabeçalho (Hero)</h2>
                <form action="admin.php?tab=home" method="POST">
                    <input type="hidden" name="action" value="save_hero">
                    <label>Título Principal</label>
                    <input type="text" name="title" value="<?php echo htmlspecialchars($data['hero']['title']); ?>" required>
                    
                    <label>Subtítulo</label>
                    <input type="text" name="subtitle" value="<?php echo htmlspecialchars($data['hero']['subtitle']); ?>">
                    
                    <label>Barra de Destaque (Texto Amarelo)</label>
                    <textarea name="highlight" rows="3"><?php echo htmlspecialchars($data['hero']['highlight']); ?></textarea>
                    
                    <button type="submit" class="btn-save">Salvar Alterações</button>
                </form>
            </div>

        <?php elseif ($active_tab === 'products'): ?>
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h2>Meus Produtos</h2>
                <button onclick="document.getElementById('addModal').style.display='block'" class="btn-add-modal"><i class="fas fa-plus"></i> Novo Produto</button>
            </div>

            <div class="product-grid">
                <?php foreach ($data['products'] as $p): ?>
                <div class="product-item">
                    <img src="<?php echo $p['image']; ?>" alt="">
                    <form action="admin.php?tab=products" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="edit_product">
                        <input type="hidden" name="product_id" value="<?php echo $p['id']; ?>">
                        <input type="text" name="title" value="<?php echo htmlspecialchars($p['title']); ?>" style="margin-bottom: 5px;">
                        <textarea name="desc" rows="2" style="font-size: 0.8rem;"><?php echo htmlspecialchars($p['desc']); ?></textarea>
                        <label>Alterar Imagem</label>
                        <input type="file" name="image" accept="image/*">
                        <div class="product-actions" style="border-bottom: 1px solid #444; padding-bottom: 15px; margin-bottom: 15px;">
                            <button type="submit" class="btn-save" style="padding: 5px 15px;">Salvar Principal</button>
                            <button type="submit" name="action" value="delete_product" class="btn-delete" onclick="return confirm('Excluir este produto?')">Excluir</button>
                        </div>
                    </form>

                    <div class="catalog-admin" style="margin-top: 10px;">
                        <h4 style="color: var(--primary); font-size: 0.9rem; border-bottom: 1px solid #333; padding-bottom: 5px; margin-bottom: 10px;">Gerenciar Catálogo deste Produto</h4>
                        
                        <!-- Listagem itens catálogo -->
                        <div style="max-height: 200px; overflow-y: auto; margin-bottom: 15px;">
                            <?php if (!empty($p['catalog'])): ?>
                                <?php foreach ($p['catalog'] as $item): ?>
                                    <div style="display: flex; align-items: center; gap: 10px; background: #121212; padding: 5px; border-radius: 5px; margin-bottom: 5px;">
                                        <img src="<?php echo $item['image']; ?>" style="width: 30px; height: 30px; margin: 0;">
                                        <div style="flex-grow: 1; font-size: 0.8rem;">
                                            <div><?php echo htmlspecialchars($item['name']); ?></div>
                                            <div style="color: #2ecc71;"><?php echo htmlspecialchars($item['price']); ?></div>
                                        </div>
                                        <form action="admin.php?tab=products" method="POST" style="margin: 0;">
                                            <input type="hidden" name="action" value="delete_catalog_item">
                                            <input type="hidden" name="product_id" value="<?php echo $p['id']; ?>">
                                            <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>">
                                            <button type="submit" class="btn-delete" style="padding: 2px 5px; font-size: 0.7rem;"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p style="font-size: 0.75rem; color: #666; text-align: center;">Vazio</p>
                            <?php endif; ?>
                        </div>

                        <!-- Add cat item form -->
                        <form action="admin.php?tab=products" method="POST" enctype="multipart/form-data" style="background: rgba(255,255,255,0.03); padding: 10px; border-radius: 8px;">
                            <input type="hidden" name="action" value="add_catalog_item">
                            <input type="hidden" name="product_id" value="<?php echo $p['id']; ?>">
                            <input type="text" name="item_name" placeholder="Nome do Item" style="padding: 5px; font-size: 0.8rem; margin-bottom: 5px;" required>
                            <input type="text" name="item_price" placeholder="Preço (ex: R$ 10,00)" style="padding: 5px; font-size: 0.8rem; margin-bottom: 5px;" required>
                            <textarea name="item_desc" placeholder="Desc. breve" rows="1" style="padding: 5px; font-size: 0.8rem; margin-bottom: 5px;"></textarea>
                            <input type="file" name="item_image" accept="image/*" style="font-size: 0.7rem; margin-bottom: 5px;">
                            <button type="submit" class="btn-save" style="width: 100%; padding: 5px; font-size: 0.8rem;">+ Item Catálogo</button>
                        </form>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Modal Adicionar -->
            <div id="addModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.8); z-index:1000;">
                <div class="card" style="max-width:500px; margin: 50px auto;">
                    <h2>Adicionar Novo Produto</h2>
                    <form action="admin.php?tab=products" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="add_product">
                        <label>Nome do Produto</label>
                        <input type="text" name="title" required>
                        <label>Descrição</label>
                        <textarea name="desc" required></textarea>
                        <label>Imagem</label>
                        <input type="file" name="image" accept="image/*" required>
                        <button type="submit" class="btn-save">Criar Produto</button>
                        <button type="button" onclick="document.getElementById('addModal').style.display='none'" class="btn-delete">Cancelar</button>
                    </form>
                </div>
            </div>

        <?php elseif ($active_tab === 'about'): ?>
            <div class="card">
                <h2>Editar Seção "Sobre"</h2>
                <form action="admin.php?tab=about" method="POST">
                    <input type="hidden" name="action" value="save_about">
                    <label>Título da Seção</label>
                    <input type="text" name="title" value="<?php echo htmlspecialchars($data['about']['title']); ?>">
                    
                    <label>Texto Parágrafo 1</label>
                    <textarea name="text1" rows="4"><?php echo htmlspecialchars($data['about']['text1']); ?></textarea>
                    
                    <label>Texto Parágrafo 2</label>
                    <textarea name="text2" rows="4"><?php echo htmlspecialchars($data['about']['text2']); ?></textarea>
                    
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                        <div>
                            <label>Estatística 1 - Valor</label>
                            <input type="text" name="stat0_val" value="<?php echo htmlspecialchars($data['about']['stats'][0]['value']); ?>">
                            <label>Estatística 1 - Legenda</label>
                            <input type="text" name="stat0_lab" value="<?php echo htmlspecialchars($data['about']['stats'][0]['label']); ?>">
                        </div>
                        <div>
                            <label>Estatística 2 - Valor</label>
                            <input type="text" name="stat1_val" value="<?php echo htmlspecialchars($data['about']['stats'][1]['value']); ?>">
                            <label>Estatística 2 - Legenda</label>
                            <input type="text" name="stat1_lab" value="<?php echo htmlspecialchars($data['about']['stats'][1]['label']); ?>">
                        </div>
                    </div>
                    
                    <button type="submit" class="btn-save">Salvar</button>
                </form>
            </div>

        <?php elseif ($active_tab === 'videos'): ?>
            <div class="card">
                <h2>Galeria de Vídeos</h2>
                <form action="admin.php?tab=videos" method="POST" enctype="multipart/form-data" style="margin-bottom: 40px; padding: 20px; border: 1px dashed var(--primary); border-radius: 10px;">
                    <input type="hidden" name="action" value="add_video">
                    <label>Título do Vídeo</label>
                    <input type="text" name="title" required>
                    
                    <label>Tipo de Mídia</label>
                    <select name="video_type" onchange="toggleVideoInputs(this.value)" style="width:100%; padding:10px; margin-bottom:20px; background:#121212; color:#fff; border-radius:8px;">
                        <option value="link">Link (YouTube/Vimeo)</option>
                        <option value="file">Arquivo Local</option>
                    </select>

                    <div id="video_link_input">
                        <label>URL do Vídeo</label>
                        <input type="text" name="video_url" placeholder="https://www.youtube.com/watch?v=...">
                    </div>

                    <div id="video_file_input" style="display:none;">
                        <label>Arquivo de Vídeo</label>
                        <input type="file" name="video_file" accept="video/*">
                    </div>

                    <button type="submit" class="btn-save">Adicionar Vídeo</button>
                </form>

                <div class="product-grid">
                    <?php foreach ($data['media']['videos'] as $v): ?>
                    <div class="product-item">
                        <div style="height:150px; background:#000; border-radius:8px; display:flex; align-items:center; justify-content:center;">
                            <i class="fas fa-video fa-3x" style="color: var(--primary);"></i>
                        </div>
                        <h3><?php echo htmlspecialchars($v['title']); ?></h3>
                        <p style="font-size:0.8rem; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;"><?php echo $v['url']; ?></p>
                        <form action="admin.php?tab=videos" method="POST">
                            <input type="hidden" name="action" value="delete_video">
                            <input type="hidden" name="video_id" value="<?php echo $v['id']; ?>">
                            <button type="submit" class="btn-delete" style="width:100%;">Excluir</button>
                        </form>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <script>
            function toggleVideoInputs(val) {
                document.getElementById('video_link_input').style.display = (val === 'link' ? 'block' : 'none');
                document.getElementById('video_file_input').style.display = (val === 'file' ? 'block' : 'none');
            }
            </script>

        <?php elseif ($active_tab === 'contact'): ?>
            <div class="card">
                <h2>Informações de Contato</h2>
                <form action="admin.php?tab=contact" method="POST">
                    <input type="hidden" name="action" value="save_contact">
                    <label>Endereço Completo</label>
                    <input type="text" name="address" value="<?php echo htmlspecialchars($data['contact']['address']); ?>">
                    
                    <label>Telefone</label>
                    <input type="text" name="phone" value="<?php echo htmlspecialchars($data['contact']['phone']); ?>">
                    
                    <label>E-mail</label>
                    <input type="email" name="email" value="<?php echo htmlspecialchars($data['contact']['email']); ?>">
                    
                    <label>Horário de Funcionamento</label>
                    <textarea name="hours" rows="3"><?php echo htmlspecialchars($data['contact']['hours']); ?></textarea>
                    
                    <button type="submit" class="btn-save">Salvar</button>
                </form>
            </div>
        <?php endif; ?>
    </main>
</body>
</html>
