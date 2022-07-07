<?php
    // Le __DIR__ renvoie le chemin du dossier actuel
    // C:\wamp64\www\08-includes\partials
    require __DIR__.'/../config/config.php';

    $title = isset($title) ? $title : 'Gameshop';
    // La superglobale $_SERVER nous donne accès à pas mal d'informations sur la requête HTTP
    $pageUrl = basename($_SERVER['REQUEST_URI'], '.php'); // /php/index.php => index
    $pageUrl = pageName();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body>
    <header>
        <a href="index.php" class="<?= $pageUrl == 'index' ? 'text-blue-400': ''; ?>">Accueil</a>
        <a href="contact.php" class="<?= $pageUrl == 'contact' ? 'text-blue-400': ''; ?>">Contact</a>
    </header>
