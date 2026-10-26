<?php
require_once dirname(__DIR__) . '/config.php';
if (is_admin()) { header('Location: index.php'); exit; }
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_csrf();
    $username = trim((string)($_POST['username'] ?? ''));
    $password = (string)($_POST['password'] ?? '');
    $stmt = db()->prepare('SELECT id, username, password_hash FROM admins WHERE username = ? LIMIT 1');
    $stmt->execute([$username]);
    $admin = $stmt->fetch();
    if ($admin && password_verify($password, $admin['password_hash'])) {
        session_regenerate_id(true);
        $_SESSION['admin_id'] = (int)$admin['id'];
        $_SESSION['admin_username'] = $admin['username'];
        header('Location: index.php'); exit;
    }
    $error = 'Identifiants incorrects.';
}
?><!doctype html><html lang="fr"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Connexion — HB Fashion Store</title>
<style>:root{--pink:#d95788;--pale:#fff0f5;--ink:#30232a}*{box-sizing:border-box}body{font-family:Arial;background:linear-gradient(135deg,#fff0f5,#fff);color:var(--ink);margin:0;min-height:100vh;display:grid;place-items:center;padding:20px}.box{width:min(420px,100%);background:white;border:1px solid #f0dce4;border-radius:16px;padding:28px;box-shadow:0 10px 35px #b33e6810}h1{color:var(--pink);text-align:center}label{display:block;margin:14px 0 6px;font-weight:bold}input{width:100%;padding:12px;border:1px solid #e4d6dc;border-radius:8px;font:inherit}.btn{margin-top:18px;width:100%;padding:12px;border:0;border-radius:24px;background:var(--pink);color:white;font-weight:bold;font-size:16px;cursor:pointer}.err{color:#a92e4c}</style></head><body><div class="box"><h1>HB Fashion Store</h1><h2>Administration</h2><?php if($error): ?><p class="err"><?= e($error) ?></p><?php endif; ?><form method="post"><input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>"><label>Nom d'utilisateur</label><input name="username" required autocomplete="username"><label>Mot de passe</label><input name="password" type="password" required autocomplete="current-password"><button class="btn">Se connecter</button></form><p><a href="../index.php">Retour à la boutique</a></p></div></body></html>
