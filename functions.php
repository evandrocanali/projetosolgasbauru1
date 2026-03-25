<?php
/**
 * Funções de Gerenciamento CMS - Solgas
 */

define('DATA_FILE', __DIR__ . '/data.json');
define('UPLOAD_DIR', __DIR__ . '/uploads/');

// Garante que o diretório de uploads existe
if (!is_dir(UPLOAD_DIR)) {
    mkdir(UPLOAD_DIR, 0777, true);
}

/**
 * Carrega os dados do arquivo JSON
 */
function loadData() {
    if (!file_exists(DATA_FILE)) {
        return [];
    }
    $json = file_get_contents(DATA_FILE);
    $data = json_decode($json, true);
    return is_array($data) ? $data : [];
}

/**
 * Salva os dados no arquivo JSON
 */
function saveData($data) {
    $json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    return file_put_contents(DATA_FILE, $json);
}

/**
 * Processa upload de arquivos
 */
function handleUpload($file) {
    if (!$file || $file['error'] !== UPLOAD_ERR_OK) {
        return null;
    }

    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $allowed = ['jpg', 'jpeg', 'png', 'gif', 'mp4', 'webp'];
    
    if (!in_array(strtolower($ext), $allowed)) {
        return null;
    }

    $filename = time() . '_' . basename($file['name']);
    $target = UPLOAD_DIR . $filename;

    if (move_uploaded_file($file['tmp_name'], $target)) {
        return 'uploads/' . $filename;
    }

    return null;
}
?>
