<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body>
    <div class="max-w-4xl mx-auto">
        <h2 class="text-center">Formulaire d'inscription</h2>
        <a href="index.php">Retour à l'accueil</a>

        <?php
            // $_POST est un tableau comme $_GET.
            var_dump($_POST);

            // Etape 1 - S'assurer que tout fonctionne avec le var_dump
            // Etape 2 - Récupère les champs dans des variables
            $email = $_POST['email'] ?? null;
            $password = $_POST['password'] ?? null;
            $success = false;

            // empty vérifie si le formulaire n'est pas vide donc envoyé
            if (!empty($_POST)) {
                // Etape 3 - Vérifier le formulaire (POST, erreurs...)

                // Etape 4 - Afficher un message de succès ou les erreurs
                $success = true;
            }
        ?>

        <?php if ($success) { ?>
            <h1>Merci <?= $email; ?>, vous êtes bien enregistré avec le mot de passe : <?= $password; ?></h1>
        <?php } ?>

        <form method="post" action="">
            <div class="mb-3">
                <label for="email" class="block">Email</label>
                <input class="w-full" type="text" name="email" id="email">
            </div>

            <div class="mb-3">
                <label for="password" class="block">Mot de passe</label>
                <input class="w-full" type="password" name="password" id="password">
            </div>

            <button class="bg-blue-600 text-white px-3 py-2 rounded w-full">S'inscrire</button>
        </form>
    </div>
</body>
</html>
