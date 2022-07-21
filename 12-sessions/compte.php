<?php
    session_start();

    // Si l'utilisateur veut se déconnecter, on supprimer le user
    // de la session
    if (isset($_GET['logout'])) {
        unset($_SESSION['user']);
    }

    // Si l'utilisateur n'est pas connecté, on va le rediriger vers index.php
    if (!isset($_SESSION['user'])) {
        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon compte</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body>
    <h1>Bienvenue <?= $_SESSION['user']; ?></h1>
    <a href="compte.php?logout=1">Déconnexion</a>
</body>
</html>
