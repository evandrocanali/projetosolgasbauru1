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
 * Processa upload de arquivos e retorna como string Base64 para salvar no JSON
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

    // Lê o conteúdo do arquivo temporário
    $data = file_get_contents($file['tmp_name']);
    if ($data === false) {
        return null;
    }

    // Detecta o tipo MIME para formar a data URI
    $mimeType = $file['type'] ?: 'image/' . strtolower($ext);
    
    // Converte para Base64
    $base64 = base64_encode($data);
    
    // Retorna a string completa que pode ser usada no src de tags <img> ou <video>
    return 'data:' . $mimeType . ';base64,' . $base64;
}
?>
