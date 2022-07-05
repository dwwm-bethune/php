<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tables</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body>
    <div class="border max-w-lg mx-auto mt-6">
    <!-- F - Ici, on affiche la légende du haut de 0 à 10 avec x en premier -->
    <div class="flex justify-between">
        <div class="w-12 text-center py-3 font-bold border-b border-r">x</div>
        <?php for ($i = 0; $i <= 10; $i++) { ?>
            <div class="w-12 text-center py-3 font-bold border-b"><?= $i; ?></div>
        <?php } ?>
    </div>

    <!-- A - En premier, on a simplement affiché le carré avec les résultats des multiplications -->
    <!-- B - Pour faire ça, on a 2 boucles ($table représente les lignes et $multiple représente les colonnes) -->
    <?php for ($table = 0; $table <= 10; $table++) { ?>
        <div class="flex justify-between">
        <!-- E - Ici, on affiche la légende (chaque ligne de 0 à 10) -->
        <div class="w-12 text-center py-2 font-bold border-r"><?= $table; ?></div>
        <!-- C - La 2ème boucle permet d'afficher chaque colonne ($multiple) -->
        <?php for ($multiple = 0; $multiple <= 10; $multiple++) { ?>
            <div class="w-12 text-center py-2">
                <!-- D - On affiche le résultat entre chaque ligne et chaque colonne -->
                <?= $table * $multiple; ?>
            </div>
        <?php } ?>
        </div>
    <?php } ?>
    </div>
</body>
</html>
