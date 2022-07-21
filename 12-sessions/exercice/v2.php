<?php
    require 'config/helpers.php';

    // Récupère les données
    $username = post('username');
    $password = post('password');
    $passwordConfirmation = post('password_confirmation');
    $remember = (bool) post('remember');
    $errors = [];

    // Formulaire INSCRIPTION
    if (isSubmit() && isset($_POST['register'])) {
        if (empty($username)) {
            $errors[] = 'Le pseudo est invalide.';
        }

        // On vérifie que le mot de passe soit rempli et qu'il soit identique
        // au champ password_confirmation
        if (empty($password) || $password != $passwordConfirmation) {
            $errors[] = 'Le mot de passe est invalide ou ne correspond pas.';
        }

        // On va vérifier si l'utilisateur existe déjà
        $user = selectOne('SELECT * FROM user WHERE username = :username', [
            'username' => $username,
        ]);

        if ($user) {
            $errors[] = 'Le pseudo est déjà utilisé.';
        }

        // Si on n'a pas d'erreurs, on inscrit l'utilisateur et on se connecte...
        if (empty($errors)) {
            insert('INSERT INTO user (username, email, password, token) VALUES (:username, :email, :password, :token)', [
                'username' => $username,
                'email' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'token' => bin2hex(random_bytes(16)),
            ]);

            $_SESSION['user'] = $username; // On se connecte (avec la session)
            header('Location: connecte.php');
        }
    }

    // Formulaire CONNEXION
    if (isSubmit() && isset($_POST['login'])) {
        // VERSION 1
        // if ($username != 'admin' || $password != 'admin') {
        //     $errors[] = 'Les identifiants sont invalides.';
        // }

        // VERSION 2
        // On vérifie que l'utilisateur est inscrit
        $user = selectOne('SELECT * FROM user WHERE username = :username', [
            'username' => $username,
        ]);

        // password_verify('password', 'afeuhfe627362764'); // Renvoie true ou false

        if (!$user || !password_verify($password, $user['password'])) {
            $errors[] = 'Les identifiants sont invalides.';
        }

        // Si on n'a pas d'erreurs, on se connecte...
        if (empty($errors)) {
            $_SESSION['user'] = $username; // On se connecte (avec la session)

            if ($remember) { // Si la case est coché, on fait un cookie
                // Préparation du cookie secure
                setcookie('remember', $user['token'], time() + 60 * 60 * 24 * 365);
            }

            header('Location: connecte.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription / Connexion</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body>
    <div class="h-screen flex items-center justify-between gap-8 max-w-5xl mx-auto">
        <div class="p-12 border rounded shadow flex-grow">
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

                <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded w-full" name="register">S'inscrire</button>
            </form>
        </div>

        <div class="p-12 border rounded shadow flex-grow">
            <form action="" method="post" class="space-y-4">
                <div>
                    <input class="border-gray-300 w-full" type="text" name="username" placeholder="Login" value="<?= $username; ?>">
                </div>
                <div>
                    <input class="border-gray-300 w-full" type="password" name="password" placeholder="Mot de passe">
                </div>

                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="border-gray-300 mr-4">
                    <label for="remember" class="text-sm text-gray-500">Se rappeller de moi</label>
                </div>

                <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded w-full" name="login">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
