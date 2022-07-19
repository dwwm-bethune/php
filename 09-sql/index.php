<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO PHP Webflix</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body>
    <?php
        require 'config/db.php';

        // On va écrire une requête SQL dans le PHP
        $query = $db->query('SELECT * FROM movie');

        // On exécute la requête pour avoir un tableau avec tous les films
        $movies = $query->fetchAll(); // Tableau qu'on va parcourir...

        // var_dump($movies);

        function truncate($text, $ending = '...') {
            if (strlen($text) > 15) {
                return substr($text, 0, 15).$ending;
            }

            return $text;
        }
    ?>

    <div class="max-w-5xl mx-auto">
        <h1 class="text-center text-xl">Les films</h1>

        <div class="flex flex-wrap">
            <?php foreach ($movies as $movie) { ?>
                <div class="w-1/2 md:w-1/3 lg:w-1/4">
                    <div class="border rounded-lg shadow m-3">
                        <?php if ($movie['cover']) { ?>
                        <img class="h-[300px] w-full object-cover rounded-t" src="img/<?= $movie['cover']; ?>" alt="<?= $movie['title']; ?>">
                        <?php } ?>
                        <div class="p-3">
                            <h2 title="<?= $movie['title']; ?>"><?= truncate($movie['title']); ?></h2>
                            <p class="text-xs text-gray-400"><?= substr($movie['released_at'], 0, 4); ?></p>
                            <a href="film.php?id=<?= $movie['id']; ?>" class="px-3 py-2 bg-gray-200 hover:bg-gray-400 duration-500 inline-block rounded-lg mt-3">Voir</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>
