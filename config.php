<?php
// Configurações de Autenticação - Solgas
session_start();

// Usuário e Senha Padrão
// RECOMENDAÇÃO: Em produção, utilize hashes de senha ou banco de dados.
define('ADMIN_USER', 'admin');
define('ADMIN_PASS', 'admin123');

/**
 * Função para verificar se o usuário está logado
 */
function checkAuth() {
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        header('Location: login.php');
        exit;
    }
}
?>
