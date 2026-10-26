<?php
/*
 * Lancer une seule fois après avoir configuré config.php et importé schema.sql.
 * Ouvre /admin/create_admin.php, crée ton identifiant, puis SUPPRIME CE FICHIER.
 */
require_once dirname(__DIR__) . '/config.php';
$count = (int)db()->query('SELECT COUNT(*) FROM admins')->fetchColumn();
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $count === 0) {
    verify_csrf();
    $username = trim((string)($_POST['username'] ?? ''));
    $password = (string)($_POST['password'] ?? '');
    if (strlen($username) < 3 || strlen($password) < 12) {
        $msg = 'Choisis un nom d’utilisateur de 3 caractères minimum et un mot de passe de 12 caractères minimum.';
    } else {
        $stmt=db()->prepare('INSERT INTO admins(username,password_hash) VALUES(?,?)');
        $stmt->execute([$username,password_hash($password,PASSWORD_DEFAULT)]);
        $msg='Compte créé. Supprime immédiatement le fichier admin/create_admin.php via le gestionnaire de fichiers de ton hébergeur.';
        $count=1;
    }
}
?><!doctype html><html lang="fr"><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Créer l'administrateur</title><body style="font-family:Arial;max-width:500px;margin:40px auto;padding:20px"><h1>Créer le compte administrateur</h1><p><?=e($msg)?></p><?php if($count===0): ?><form method="post"><input type="hidden" name="csrf" value="<?=e(csrf_token())?>"><p>Nom d'utilisateur<br><input name="username" required minlength="3"></p><p>Mot de passe (12 caractères minimum)<br><input type="password" name="password" required minlength="12"></p><button>Créer le compte</button></form><?php else: ?><p>Un compte administrateur existe déjà. L'installation est verrouillée.</p><?php endif; ?></body></html>
