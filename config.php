<?php
declare(strict_types=1);
/*
 * CONFIGURATION HB FASHION STORE
 * Remplace les valeurs par celles fournies par l'hébergeur.
 * Ne partage jamais ce fichier publiquement.
 */
define('DB_HOST', 'localhost');
define('DB_NAME', 'hb_fashion_store');
define('DB_USER', 'UTILISATEUR_BDD');
define('DB_PASS', 'MOT_DE_PASSE_BDD');
define('SITE_NAME', 'HB Fashion Store');
define('WHATSAPP_NUMBER', '221788105614'); // Format international, sans + ni espaces.
define('CURRENCY', 'FCFA');
define('UPLOAD_DIR', __DIR__ . '/uploads/');
define('MAX_IMAGE_SIZE', 5 * 1024 * 1024); // 5 Mo par image
define('SESSION_NAME', 'hbfs_admin');

if (session_status() !== PHP_SESSION_ACTIVE) {
    ini_set('session.use_strict_mode', '1');
    session_name(SESSION_NAME);
    session_set_cookie_params([
        'httponly' => true,
        'secure' => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off',
        'samesite' => 'Lax'
    ]);
    session_start();
}

function db(): PDO {
    static $pdo = null;
    if ($pdo instanceof PDO) return $pdo;
    $pdo = new PDO(
        'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4',
        DB_USER,
        DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]
    );
    return $pdo;
}
function e(?string $value): string {
    return htmlspecialchars((string)$value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
function csrf_token(): string {
    if (empty($_SESSION['csrf'])) $_SESSION['csrf'] = bin2hex(random_bytes(32));
    return $_SESSION['csrf'];
}
function verify_csrf(): void {
    $token = $_POST['csrf'] ?? '';
    if (!is_string($token) || !hash_equals($_SESSION['csrf'] ?? '', $token)) {
        http_response_code(403);
        exit('Requête refusée. Recharge la page et réessaie.');
    }
}
function is_admin(): bool {
    return !empty($_SESSION['admin_id']);
}
function require_admin(): void {
    if (!is_admin()) {
        header('Location: login.php');
        exit;
    }
}
function format_price($price): string {
    return number_format((float)$price, 0, ',', ' ') . ' FCFA';
}
function whatsapp_link(array $p): string {
    $message = 'Bonjour HB Fashion Store, je souhaite commander : ' . $p['name'] .
        '. Prix : ' . format_price($p['price']) . '. Catégorie : ' . $p['category'] .
        '. Merci de confirmer la disponibilité.';
    return 'https://wa.me/' . WHATSAPP_NUMBER . '?text=' . rawurlencode($message);
}
