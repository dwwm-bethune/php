<?php
    require 'config/helpers.php';

    // Récupère les données
    $username = post('username');
    $password = post('password');
    $passwordConfirmation = post('password_confirmation');
    $errors = [];

    if (isSubmit()) {
        if (empty($username)) {
            $errors[] = 'Le pseudo est invalide.';
        }

        // On vérifie que le mot de passe soit rempli et qu'il soit identique
        // au champ password_confirmation
        if (empty($password) || $password != $passwordConfirmation) {
            $errors[] = 'Le mot de passe est invalide ou ne correspond pas.';
        }

        // Si on n'a pas d'erreurs, on inscrit l'utilisateur et on se connecte...
        if (empty($errors)) {
            insert('INSERT INTO user (username, email, password) VALUES (:username, :email, :password)', [
                'username' => $username,
                'email' => $username,
                'password' => $password,
            ]);

            $_SESSION['user'] = $username; // On se connecte (avec la session)
            header('Location: connecte.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body>
    <div class="h-screen flex items-center justify-center max-w-xl mx-auto">
        <div class="p-12 border rounded shadow flex-grow">
            <?php if (!empty($errors)) { ?>
                <div class="bg-red-300 p-5 rounded border border-red-800 text-red-800 mb-4">
                    <?php foreach ($errors as $error) { ?>
                        <p><?= $error; ?></p>
                    <?php } ?>
                </div>
            <?php } ?>

            <form action="" method="post" class="space-y-4">
                <div>
                    <input class="border-gray-300 w-full" type="text" name="username" placeholder="Login">
                </div>
                <div>
                    <input class="border-gray-300 w-full" type="password" name="password" placeholder="Mot de passe">
                </div>
                <div>
                    <input class="border-gray-300 w-full" type="password" name="password_confirmation" placeholder="Confirmer le mot de passe">
                </div>

                <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded w-full">S'inscrire</button>
                <a href="index.php" class="mt-4 text-center block text-sm text-gray-500">Déjà un compte ?</a>
            </form>
        </div>
    </div>
</body>
</html>
