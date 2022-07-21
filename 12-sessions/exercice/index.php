<?php
    require 'config/helpers.php';

    // Récupère les données
    $username = post('username');
    $password = post('password');
    $errors = [];

    if (isSubmit()) {
        // VERSION 1
        // if ($username != 'admin' || $password != 'admin') {
        //     $errors[] = 'Les identifiants sont invalides.';
        // }

        // VERSION 2
        // On vérifie que l'utilisateur est inscrit
        $user = selectOne('SELECT * FROM user WHERE username = :username AND password = :password', [
            'username' => $username,
            'password' => $password,
        ]);

        if (!$user) {
            $errors[] = 'Les identifiants sont invalides.';
        }

        // Si on n'a pas d'erreurs, on se connecte...
        if (empty($errors)) {
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
    <title>Connexion</title>
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
                    <input class="border-gray-300 w-full" type="text" name="username" placeholder="Login" value="<?= $username; ?>">
                </div>
                <div>
                    <input class="border-gray-300 w-full" type="password" name="password" placeholder="Mot de passe">
                </div>

                <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded w-full">Login</button>
                <a href="register.php" class="mt-4 text-center block text-sm text-gray-500">Pas de compte ?</a>
            </form>
        </div>
    </div>
</body>
</html>
