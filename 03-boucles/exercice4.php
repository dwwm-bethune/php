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
        <div class="w-12 text-center py-3 font-bold border-b border-r bg-gray-200">x</div>
        <?php for ($i = 0; $i <= 10; $i++) { ?>
            <div class="w-12 text-center py-3 font-bold border-b <?= $i % 2 != 0 ? 'bg-gray-200' : ''; ?>"><?= $i; ?></div>
        <?php } ?>
    </div>

    <!-- A - En premier, on a simplement affiché le carré avec les résultats des multiplications -->
    <!-- B - Pour faire ça, on a 2 boucles ($table représente les lignes et $multiple représente les colonnes) -->
    <?php for ($table = 0; $table <= 10; $table++) { ?>
        <div class="flex justify-between">
        <!-- E - Ici, on affiche la légende (chaque ligne de 0 à 10) -->
        <div class="w-12 text-center py-2 font-bold border-r <?= $table % 2 != 0 ? 'bg-gray-200' : ''; ?>"><?= $table; ?></div>
        <!-- C - La 2ème boucle permet d'afficher chaque colonne ($multiple) -->
        <?php for ($multiple = 0; $multiple <= 10; $multiple++) {
            // H - Pour les cases en gris clair, on doit déterminer si $table et $multiple sont pairs
            // ou impairs en même temps
            $class = null;
            if ($multiple % 2 == $table % 2) {
                $class = 'bg-gray-200';
            }
            ?>
            <!-- G - Si on arrive sur un nombre carré (4 x 4 = 16 par exemple), on ajoutera
            un fond gris foncé sur la case du résultat. -->
            <div class="w-12 text-center py-2 <?= $class; ?> <?= $table == $multiple ? 'bg-gray-400' : ''; ?>">
                <!-- D - On affiche le résultat entre chaque ligne et chaque colonne -->
                <?= $table * $multiple; ?>
            </div>
        <?php } ?>
        </div>
    <?php } ?>
    </div>
</body>
</html>
