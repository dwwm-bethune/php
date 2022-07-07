<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body>
    <?php
        $emails = [
            'matthieu@gmail.com',
            'fiorella@orange.fr',
            'jean@outlook.com',
            'fiorella@free.fr',
            'matthieu@gmail.com',
        ];

        $providers = ['gmail.com' => 0, 'orange.fr' => 0, 'outlook.com' => 0, 'free.fr' => 0, 'gmail.com' => 0];

        foreach ($emails as $email) {
            // On compte les fournisseurs
            $provider = str_replace('@', '', strstr($email, '@'));
            $providers[$provider]++;
        }

        /**
         * Petite fonction pour convertir une valeur en pourcentage
         * parmi un tableau de valeurs.
         */
        function percentage($value, $data) {
            return ($value * 100 / count($data)).'%';
        }
    ?>
    <div class="max-w-4xl mx-auto">
        <ul class="border mt-4 p-3">
        <?php foreach ($providers as $provider => $count) { ?>
            <li><?= $provider.' - '.percentage($count, $emails); ?></li>
        <?php } ?>
        </ul>

        <form method="get" action="">
            <?php foreach (array_keys($providers) as $provider) { ?>
                <label>
                    <input type="checkbox" name="filters[]" value="<?= $provider; ?>"> <?= $provider; ?>
                </label>
            <?php } ?>
            <button>Filtrer</button>
        </form>

        <ul class="border mt-4 p-3">
        <?php foreach ($emails as $email) { ?>
            <li><?= $email; ?></li>
        <?php } ?>
        </ul>
    </div>
</body>
</html>
