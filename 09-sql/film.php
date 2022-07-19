<?php
    require 'config/db.php';

    // Récupèrer l'id du film dans l'url
    $id = $_GET['id'] ?? null;

    // Une requête préparée protège les entrées utilisateurs
    $query = $db->prepare('SELECT * FROM movie WHERE id = :id');
    $query->bindValue(':id', $id); // On doit remplacer chaque paramètre de la requête préparée
    $query->execute(); // Ne pas oublier d'exécuter la requête

    // $query->execute([':id' => $id]); // Solution 2 plus rapide...

    // fetch au lieu de fetchAll car on est sûr d'avoir un seul film
    $movie = $query->fetch();

    if (!$movie) {
        // @todo Faire une vraie 404
        echo '404';
        die();
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $movie['title']; ?></title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body class="bg-gray-100">
    <div class="max-w-5xl mx-auto mt-16">
        <div class="mb-4">
            <a href="index.php">Liste des films</a>
            <span class="mx-3">/</span>
            <span class="text-gray-400"><?= $movie['title']; ?></span>
        </div>

        <div class="flex border py-6 rounded-xl shadow bg-white">
            <div class="w-1/2">
                <img class="w-72 mx-auto" src="img/<?= $movie['cover']; ?>" alt="<?= $movie['title']; ?>">
            </div>
            <div class="w-1/2">
                <h1 class="text-center text-3xl mb-4"><?= $movie['title']; ?></h1>
                <p class="font-bold">Durée: <?= $movie['duration']; ?></p>
                <p class="font-bold">Date de sortie: <?= date('d F Y', strtotime($movie['released_at'])); ?></p>
                <p class="mt-4"><?= $movie['description']; ?></p>
            </div>
        </div>
    </div>
</body>
</html>
