<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Sessions</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body>
    <?php
        // Les sessions permettent de garder des variables en mémoire.
        // On pourra donc utiliser les variables sur plusieurs pages.

        // On doit toujours initialiser les sessions
        session_start();

        // Pour ajouter une valeur dans la session
        // $_SESSION['user'] = 'Fiorella'; // ['user' => 'Fiorella']
        $_SESSION['theme'] = 'blue'; // ['user' => 'Fiorella', 'theme' => 'blue']

        if (!empty($_POST)) {
            $_SESSION['user'] = $_POST['pseudo'];
            $_SESSION['theme'] = $_POST['theme'];

            // Syntaxe alternative
            $_SESSION = [
                'user' => $_POST['pseudo'],
                'theme' => $_POST['theme'],
            ];
        }

        $theme = $_SESSION['theme'];
    ?>

    <?php if ($user = $_SESSION['user'] ?? null) { ?>
    <h1 class="text-<?= $theme; ?>-500">Bonjour <?= $user; ?></h1>
    <a href="compte.php">Mon compte</a>
    <?php } ?>

    <form action="" method="post">
        <input type="text" name="pseudo">
        <select name="theme">
            <option value="blue">Bleu</option>
            <option value="emerald">Vert</option>
        </select>
        <button>Connexion</button>
    </form>
</body>
</html>
